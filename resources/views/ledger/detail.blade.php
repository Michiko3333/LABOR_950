<x-layout title="申請案件詳細">
    <style type="text/css">
        .detail-table .title {
            width: 150px;
            background-color: #F7F7F7;
        }

        .official-table td {
            font-size: 0.8em;
        }
    </style>
    <section class="content">
        <div class="ui breadcrumb huge mb-0">
            <a class="section" href="/">ホーム</a>
            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route('ledger.issues') }}">申請案件一覧</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">申請案件状況</div>
        </div>
        <h2>申請案件状況</h2>
        <table class="ui celled table detail-table">
            <thead>
                <tr>
                    <th colspan="2">
                        申請情報
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="title">
                        到達番号
                    </td>
                    <td>{{ $detail->arrive_id }}</td>
                </tr>
                <tr>
                    <td class="title">
                        法人名
                    </td>
                    <td>{{ $detail->corporation_name }}</td>
                </tr>
                <tr>
                    <td class="title">
                        申請者名
                    </td>
                    <td>{{ $detail->applicant_name }}</td>
                </tr>
                <tr>
                    <td class="title">
                        手続名称
                    </td>
                    <td>{{ $detail->proc_name }}</td>
                </tr>
                <tr>
                    <td class="title">
                        提出先組織
                    </td>
                    <td>{{ $detail->submission_destination }}</td>
                </tr>
            </tbody>
        </table>

        <table class="ui celled table detail-table">
            <thead>
                <tr>
                    <th colspan="2">
                        ステータス：{{ $detail->status }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="title">
                        到達日時
                    </td>
                    <td>{{ $detail->arrive_date }}</td>
                </tr>
            </tbody>
        </table>

        <h3>公文書</h3>
        <table class="ui striped table official-table">
            <thead>
                <tr>
                    <th>件名</th>
                    <th style="width: 200px;">発行日時</th>
                    <th style="width: 200px;">取得期限</th>
                    <th style="width: 200px;">取得完了日時</th>
                    <th style="width: 60px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($official_list as $official)
                    <tr>
                        <form action="{{ route('ledger.detail_official', $detail->arrive_id ?? 0) }}" method="post">
                            @csrf
                            <input type="hidden" name="notice_sub_id" value="{{ $official->notice_sub_id }}">
                            <td>{{ $official->doc_title }}</td>
                            <td>{{ $official->allowed_date }}</td>
                            <td>{{ $official->doc_download_expired_date }}</td>
                            <td>{{ $official->doc_download_date }}</td>
                            <td>
                                <button type="submit">取得</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>
