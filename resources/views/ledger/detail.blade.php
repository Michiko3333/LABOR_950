<x-layout title="申請案件詳細">
    <style type="text/css">
        .detail-table .title {
            width: 150px;
            background-color: #F7F7F7;
        }

        .detail-table th {
            font-size: 16px;
        }

        .detail-table td {
            font-size: 16px;
        }

        .official-table td {
            font-size: 16px;
        }

        .official-table th {
            font-size: 16px;
        }

        .status {
            font-weight: 900;
        }

        .prev-btn {
            display: flex;
            justify-content: flex-end;
        }
    </style>
    <section class="content">
        <div class="ui breadcrumb huge mb-0">
            <a class="section" href="/">ホーム</a>
            <i class="right chevron icon divider"></i>
            <a class="section ledger-back" href="{{ route('ledger.issues') }}">申請案件一覧</a>
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
                        ステータス
                    </td>
                    <td><p class="status">{{ $detail->status }}</p></td>
                </tr>
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
                <tr>
                    <td class="title">
                        対象者
                    </td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>

        <table class="ui celled table detail-table">
            <thead>
                <tr>
                    <th style="width: 25%;">
                        到達日時
                    </th>
                    <th style="width: 25%;">
                        公文書完了日
                    </th>
                    <th style="width: 25%;">
                        補正受付日時
                    </th>
                    <th style="width: 25%;">
                        取り下げ依頼日時
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $detail->arrive_date }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
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
                @if($official_list)
                    @foreach ($official_list as $official)
                        <tr>
                            <form action="{{ route('ledger.detail_notice', $detail->arrive_id ?? 0) }}" method="post">
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
                @else
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
        </table>

        <h3>コメント</h3>
        <table class="ui striped table detail-table">
            <thead>
                <tr>
                    <th style="width: 30%;">タイトル</th>
                    <th style="width: 60%;">本文</th>
                    <th style="width: 10%; text-align: center;">添付ファイル</th>
                </tr>
            </thead>
            <tbody>
                @if($notice_list)
                    @foreach ($notice_list as $notice)
                        <tr>
                            <form action="{{ route('ledger.detail_notice', $detail->arrive_id ?? 0) }}" method="post">
                                @csrf
                                <input type="hidden" name="notice_sub_id" value="{{ $notice->notice_sub_id }}">
                                <td>{{ $notice->notice_title }}</td>
                                <td>{{ $notice->notice_sentence }}</td>
                                <td style="text-align: center;">
                                    @if($notice->file)
                                        <button type="submit">取得</button>
                                    @endif
                                </td>
                            </form>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="prev-btn">
            <a class="ui button negative basic ledger-back my-2" type="button" style="width: 200px; font-size: 14px;"
                href="{{ route('ledger.issues') }}">戻る</a>
        </div>
    </section>

    <script type="module">
        $(document).ready(function() {
            const sessionHistory = JSON.parse(sessionStorage.getItem('pageHistory'));
            $('.ledger-back').attr('href', sessionHistory.toString());
        });
    </script>
</x-layout>
