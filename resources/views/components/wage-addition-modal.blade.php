<div id="{{ $id }}" class="ui modal mini addition-modal">
    <i class="close icon"></i>
    <div class="header">
        項目を追加
    </div>
    <div class="content ui form">
        <p class="mt-0">追加する名称の記述と配置（項目）の選択をして下さい</p>
        <div class="field">
            <label for="{{ $additionName }}">名称</label>
            <input type="text" name="" id="{{ $additionName }}" class="ui input" placeholder="〇〇手当"
                maxLength="15">
        </div>
        <div class="field">
            <label for="{{ $additionType }}">配置（項目）</label>
            <select name="" id="{{ $additionType }}" class="ui dropdown">
                <option value="salary_values">支給金</option>
                @if ($isBonus === false)
                    <option value="overtime_values">時間外手当</option>
                    <option value="allowance_values">諸手当</option>
                @endif
                <option value="deduction_values">控除</option>
            </select>
        </div>
    </div>
    <div class="actions">
        <button class="ui button cancel" type="button">キャンセル</button>
        <div class="ui approve primary button">追加</div>
    </div>
</div>
