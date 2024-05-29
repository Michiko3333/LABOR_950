<?php

namespace App\Livewire;

use App\EgovAPI\Egov;
use Livewire\Component;
use App\Models\CurrentUser;
use App\Models\Egov_account;
use Carbon\Carbon;

class IssuesList extends BaseTable
{
    public $limit = 10;
    public $search = '';
    public $date_from = '2024-04-19';
    public $date_to = '2024-06-01';

    public function mount($page = 1, $search = '')
    {
        $this->page = $page;
        $this->search = $search;
    }

    public function render()
    {
        $currentCompany = CurrentUser::currentCompany();
        $account = Egov_account::where('company_id', $currentCompany->id)->where('delete_flg', 0)->first();
        $this->offset = ($this->page - 1) * $this->limit;
        if (!empty($account)) {
            $api = Egov::accessToken($account->access_token);
            $r = $this->call($api);
            if ($r->status() == 401) {
                \Log::info('トークン再取得：開始');
                $refreshed = Egov::refreshToken($account->refresh_token)->getToken();
                if ($refreshed && $refreshed->status() == 200) {
                    \Log::info('トークン再取得：成功');
                    $access_token = $refreshed['access_token'];
                    $refresh_token = $refreshed['refresh_token'];
                    $account->access_token = $access_token;
                    $account->refresh_token = $refresh_token;
                    $account->delete_flg = 0;
                    $account->save();
                    $api = Egov::accessToken($access_token);
                    $r = $this->call($api);
                }
            }

            if ($r->status() == 200) {
                $response = $r->json();
                $resultset = $response['resultset'];
                $results = $response['results']['apply_list'];
                $this->data = $this->getDataFromAPI($resultset, $results);
            }
        }

        return view('livewire.issues-list');
    }

    public function getDataFromAPI($resultset, $items)
    {
        if (!$this->paginated) $this->page = 1;
        $page = $this->page;
        $pageSize = $this->limit;

        // 条件を満たす全アイテム数を効率的に取得
        $totalItems = $resultset['all_count'];
        // 全ページ数を計算
        $totalPages = ceil($totalItems / $pageSize);

        $this->paginated = false;

        // ページ情報とデータを返す
        return [
            'items' => $items,
            'pagination' => [
                'totalItems' => $totalItems,
                'currentPage' => $page,
                'pageSize' => $pageSize,
                'totalPages' => $totalPages,
            ],
        ];
    }

    private function call($api)
    {
        return $api->getListApplications(null, $this->date_from, $this->date_to, $this->limit, $this->offset);
    }
}
