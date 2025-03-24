<?php

namespace App\Livewire;

use App\Models\CurrentUser;
use App\Models\Employee;
use App\Models\Salary_revision;
use App\Models\Salary_revision_history;
use App\Models\Wage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Carbon\Carbon;
use ZipArchive;

class ImportMonthlyStandard extends Component
{
    use WithFileUploads;

    public $extractedContent = null;
    public $import_employees = [];
    public $temp_list = ['insertData' => [], 'unknownData' => []];
    public $fixed_flg = 0;
    #[Validate('mimetypes:application/zip|max:1024')] // 1MB Max
    public $zip;

    public function render()
    {
        return view('livewire.import-monthly-standard');
    }

    #[On('on-import-modal-show')]
    public function onImportModalShow()
    {
        $this->temp_list = ['insertData' => [], 'unknownData' => []];
        $this->resetErrorBag();
        $this->reset('zip');
    }

    public function updatedZip()
    {
        $this->temp_list = ['insertData' => [], 'unknownData' => []];
        if (!$this->zip) {
            return;
        }

        $path = $this->zip->store('temp');

        // ZIP ファイルのフルパス
        $fullPath = Storage::path($path);

        $zip = new ZipArchive;
        if ($zip->open($fullPath) === TRUE) {
            $targetFile = '7140001.xml';
            $fileContent = $this->searchFileInZip($zip, $targetFile);
            if ($fileContent !== null) {
                $this->extractedContent = $fileContent;
                $data = $this->parseXml($fileContent);
                $this->temp_list = $this->createData($data);
            } else {
                \Log::error("指定されたファイルが見つかりません: " . $targetFile);
                $this->extractedContent = null;
            }
            $zip->close();
        } else {
            \Log::error("ZIPファイルを開けませんでした");
            $this->extractedContent = null;
        }
        Storage::delete($path);
        $this->dispatch('import-data-updated', $this->temp_list);
    }

    #[On('importDataSubmitted')]
    public function save()
    {
        DB::beginTransaction();
        try {
            $insertData = $this->temp_list['insertData'];
            foreach ($insertData as $data) {
                Salary_revision::create([
                    'employee_id' => $data['employee_id'],
                    'monthly_standard_salary' => $data['standard_kenpo'],
                    'health_insurance' => str_replace(',', '', $data['standard_kenpo']),
                    'welfare_annuity_insurance' => str_replace(',', '', $data['standard_welfare']),
                    'revision_date' => $data['revision_date'],
                    'fixed_flg' => $this->fixed_flg,
                ]);
                Salary_revision_history::create([
                    'employee_id' => $data['employee_id'],
                    'monthly_standard_salary' => $data['standard_kenpo'],
                    'health_insurance' => str_replace(',', '', $data['standard_kenpo']),
                    'welfare_annuity_insurance' => str_replace(',', '', $data['standard_welfare']),
                    'revision_date' => $data['revision_date'],
                ]);
            }
            DB::commit();
            $this->dispatch('import-modal-closed', true);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("データの保存に失敗: " . $e->getMessage());
            $this->dispatch('import-modal-closed', false);
            throw $e;
        }
    }

    private function createData($array)
    {
        $current_company = CurrentUser::currentCompany();
        $insertData = [];
        $unknownData = [];

        foreach ($array as $key => $data) {
            if ($key != '_被保険者') continue;

            $era = $data['改定年月_元号'];
            $year = $data['改定年月_年'];
            $western_year = $this->convertToSeireki($era, $year);
            $month = (int) $data['改定年月_月'];

            $full_name = $data['被保険者氏名'];
            $full_name_array = explode('　', $full_name);
            $name_search_target = $full_name_array[1];
            $standard_kenpo = $this->extractAndMultiplyThousand($data['決定後の標準報酬月額_健保']);
            $standard_welfare = $this->extractAndMultiplyThousand($data['決定後の標準報酬月額_厚年']);

            $pension_office_reference_no = $data['事業所整理記号'];
            $pension_office_reference_no_array = $this->splitHalfKanaString($pension_office_reference_no);
            $pension_office_reference_no_cities = $pension_office_reference_no_array[0];
            $pension_office_reference_no_office = $pension_office_reference_no_array[1];

            $pension_office_employee_no = (int) $data['被保険者整理番号'];

            $branch = $current_company->branch()->select('id', 'pension_office_reference_no_cities', 'pension_office_reference_no_office')
                ->where('pension_office_reference_no_cities', $pension_office_reference_no_cities)
                ->where('pension_office_reference_no_office', $pension_office_reference_no_office)
                ->first();
            if (empty($branch)) continue;

            $employee = Employee::where('branch_id', $branch->id)
                ->where('insurer_reference_no', $pension_office_employee_no)
                ->where('first_name', 'LIKE', '%' . $name_search_target . '%')
                ->orderBy('employee_status', 'asc')
                ->first();

            if (empty($employee)) {
                $unknownData[] = [
                    'employee_no' => $pension_office_employee_no,
                    'employee_name' => $full_name,
                    'standard_kenpo' => $standard_kenpo,
                    'standard_welfare' => $standard_welfare,
                    'revision_date' => $western_year . '-' . $month . '-01',
                ];
                continue;
            };

            $insertData[] = [
                'employee_id' => $employee->id,
                'employee_no' => $employee->employee_no,
                'employee_name' => $employee->last_name . ' ' . $employee->first_name,
                'standard_kenpo' => $standard_kenpo,
                'standard_welfare' => $standard_welfare,
                'revision_date' => $western_year . '-' . $month . '-01',
            ];
        }
        return ['insertData' => $insertData, 'unknownData' => $unknownData];
    }

    private function extractAndMultiplyThousand(string $text): int
    {
        if (preg_match('/(\d+)千円/u', $text, $matches)) {
            return (int)$matches[1] * 1000;
        }

        return 0;
    }

    private function splitHalfKanaString(string $text): array
    {
        $convertedText = mb_convert_kana($text, "KV");

        if (preg_match('/^(\d+)-(.+)$/u', $convertedText, $matches)) {
            return [$matches[1], $matches[2]];
        }

        return [$text, ""];
    }

    private function convertToSeireki(string $era, string $year): int
    {
        $era_map = [
            'R'  => 2018,
            '令和' => 2018,
            'H'  => 1988,
            '平成' => 1988,
            'S'  => 1925,
            '昭和' => 1925,
        ];

        if (!isset($era_map[$era])) {
            throw new \InvalidArgumentException("無効な元号です: " . $era);
        }

        $western_year = $era_map[$era] + (int)$year;
        return $western_year;
    }

    private function searchFileInZip(ZipArchive $zip, string $targetFile): ?string
    {
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $fileName = $zip->getNameIndex($i);

            if (basename($fileName) === $targetFile) {
                return $zip->getFromIndex($i);
            }
        }
        return null;
    }

    private function parseXml(string $xmlContent): ?array
    {
        try {
            $xml = new \SimpleXMLElement($xmlContent, LIBXML_NOCDATA);
            return json_decode(json_encode($xml), true);
        } catch (\Exception $e) {
            \Log::error("XML の解析に失敗: " . $e->getMessage());
            return null;
        }
    }
}
