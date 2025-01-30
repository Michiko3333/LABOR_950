<main id="{{ $id ?? 'pt' }}">
    @isset($actionTop)
        <div class="{{ $classActionsTop ?? 'pt-actions-top' }}">
            {{ $actionTop }}
        </div>
    @endisset
    <div id="{{ $idList ?? 'pt-list' }}" class="power-table">
        <table>
            <thead>
                <tr id="{{ $idHeader ?? 'pt-list-header' }}">
                </tr>
            </thead>
            <tbody id="{{ $idHeader ?? 'pt-list-body' }}"></tbody>
        </table>
    </div>
    <div class="{{ $classActionsTop ?? 'pt-actions-bottom' }}">
        <button class="ui button" id="pt-edit-button">編集</button>
        <button class="ui button" id="pt-cancel-button">キャンセル</button>
        <button class="ui button primary" id="pt-submit-button">保存</button>
    </div>
</main>
