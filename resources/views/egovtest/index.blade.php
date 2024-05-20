<x-layout title="e-Govテスト結果" useRightContent="{{ false }}">
    <script>
        function dl(target_no, target_date) {
            const form = document.getElementById('testform');
            const elm_target_no = document.getElementById('target_no');
            const elm_target_date = document.getElementById('target_date');

            elm_target_no.value = target_no;
            elm_target_date.value = target_date;

            form.submit();
        }
    </script>
    <section class="content">
        <form id="testform" name="testform" action="{{ route('egovtest.download') }}" method="post">
            @csrf
            <input type="hidden" id="target_no" name="target_no" value=''>
            <input type="hidden" id="target_date" name="target_date" value=''>
            <table class="ui celled structured table">
                <thead>
                    <tr>
                        <th rowspan="2">試験No</th>
                        <th rowspan="2">実施日時（Server）</th>
                        <th colspan="4">ファイル</th>
                    </tr>
                    <tr>
                        <th>header</th>
                        <th>body</th>
                        <th>response</th>
                        <th>ダウンロード</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($directories as $d)
                        <tr>
                            <td>{{ $d['no'] }}</td>
                            <td>{{ $d['modified_date'] }}</td>
                            <td class="center aligned">
                                @if ($d['exists_header'])
                                    <i class="large green checkmark icon"></i>
                                @else
                                    <i class="large red times icon"></i>
                                @endif
                            </td>
                            <td class="center aligned">
                                @if ($d['exists_body'])
                                    <i class="large green checkmark icon"></i>
                                @else
                                    <i class="large red times icon"></i>
                                @endif
                            </td>
                            <td class="center aligned">
                                @if ($d['exists_response'])
                                    <i class="large green checkmark icon"></i>
                                @else
                                    <i class="large red times icon"></i>
                                @endif
                            </td>
                            <td class="center aligned">
                                <button type="button" class="ui button primary"
                                    onClick='dl("{{ $d['no'] }}", "{{ $d['modified_date_raw'] }}")'>ダウンロード</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </section>
</x-layout>
