<?php

namespace App\Http\Controllers;

use App\Models\CurrentUser;
use App\Permission;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\PdfService\ShiftCalendar;
use Carbon\Carbon;

class ShiftCalendarController extends Controller
{
    public function index()
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(12)) {
            return redirect()->route('home.index');
        }
        return view('calendar.shift', ['userPermission' => $userPermission]);
    }

    public function download(Request $request)
    {
        $userPermission = new Permission();
        if (!$userPermission->isReadableFor(12) && $userPermission->isBasicDepartment()) {
            return redirect()->back();
        }
        if ($request->session()->has('shift-pdf-data')) {
            $message = $request->session()->get('shift-pdf-data');
        } else {
            return redirect()->back();
        }

        $current_company = CurrentUser::currentCompany();
        $now = $now = Carbon::now();

        $shiftCalendar = new ShiftCalendar($message);
        $shiftCalendar->run();

        $path = 'shift-calendar/' . $current_company->id . '/' . $now->year;
        if (!Storage::exists('shift-calendar/' . $current_company->id)) {
            Storage::makeDirectory('shift-calendar/' . $current_company->id);
        }
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        $file = $now->format('YmdHis');
        $xlsx = Storage::path($path . '/' . $file . '.xlsx');
        $pdf = $path . '/' . $file . '.pdf';

        $shiftCalendar->outputToFile($xlsx);
        $res = $shiftCalendar->export($xlsx, Storage::path($path));

        if (!Storage::exists($pdf)) {
            throw new \Exception('faild to create pdffile at ' . $file . '.pdf');
        }
        $name = $message['origin']['title'];
        return Storage::download($pdf, '休日カレンダー_' . $name . '.pdf');
    }
}
