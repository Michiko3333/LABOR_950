<div class="content">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form id="monthly_standard_form" wire:submit="save">
        <div class="ui form">
            <div class="field">
                <label>通知決定書ファイル（*.zip）</label>
                <div class="ui file input">
                    <input type="file" id="monthly_standard_zip" wire:model="zip">
                </div>
            </div>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" wire:model="fixed_flg" value="0" name="fixed_flg">
                        <label>定時</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" wire:model="fixed_flg" value="1" name="fixed_flg">
                        <label>随時</label>
                    </div>
                </div>
            </div>
        </div>

        @error('zip')
            <div class="ui negative message">
                <span class="error">ファイルの読込に失敗しました</span>
            </div>
        @enderror
    </form>
    <div class="ui divider"></div>
    <h3>インポート対象</h3>
    <div class="header-fixed-table import">
        <table>
            <thead>
                <tr>
                    <th>従業員番号</th>
                    <th style="width: 150px;">従業員名</th>
                    <th>標準報酬月額<br>（健保）</th>
                    <th>標準報酬月額<br>（厚年）</th>
                    <th>改定年月</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->temp_list['insertData'] as $data)
                    <tr class="list-item">
                        <td>{{ $data['employee_no'] }}</td>
                        <td>{{ $data['employee_name'] }}</td>
                        <td>{{ $data['standard_kenpo'] }}</td>
                        <td>{{ $data['standard_welfare'] }}</td>
                        <td>{{ $data['revision_date'] }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @if (count($this->temp_list['unknownData']) > 0)
        <div class="ui divider"></div>
        <h3>インポート不可</h3>
        <div class="header-fixed-table unknown">
            <table>
                <thead>
                    <tr>
                        <th>従業員番号</th>
                        <th style="width: 150px;">従業員名</th>
                        <th>標準報酬月額<br>（健保）</th>
                        <th>標準報酬月額<br>（厚年）</th>
                        <th>改定年月</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->temp_list['unknownData'] as $data)
                        <tr class="list-item">
                            <td>{{ $data['employee_no'] }}</td>
                            <td>{{ $data['employee_name'] }}</td>
                            <td>{{ $data['standard_kenpo'] }}</td>
                            <td>{{ $data['standard_welfare'] }}</td>
                            <td>{{ $data['revision_date'] }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endif
</div>
