<div class="user-modal-content">
    <div class="left-content">
        <div class="ui middle aligned selection list">
            <div class="item {{ $tab === 0 ? 'active' : '' }}" wire:click="tabPage(0)">
                <div class="content">
                    <div class="header">プロフィール</div>
                </div>
            </div>
            @if ($role_id === 100)
                <div class="item {{ $tab === 1 ? 'active' : '' }}" wire:click="tabPage(1)">
                    <div class="content">
                        <div class="header">旧姓・通称名</div>
                    </div>
                </div>
            @endif
            @if ($role_id === 100)
                <div class="item {{ $tab === 2 ? 'active' : '' }}" wire:click="tabPage(2)">
                    <div class="content">
                        <div class="header">緊急連絡先</div>
                    </div>
                </div>
            @endif
            <div class="item {{ $tab === 3 ? 'active' : '' }}" wire:click="tabPage(3)">
                <div class="content">
                    <div class="header">ログイン情報</div>
                </div>
            </div>
        </div>
    </div>
    <div class="center-content"></div>
    <div class="right-content">
        @if ($tab === 0)
            <section>
                <form wire:submit="saveIcon">
                    <div class="area profile">
                        <div class="icon-content p-2">
                            <p class="description">画像の変更・削除はアイコンをクリック</p>
                            <div class="user-icon" wire:click="openImgOperation"><!-- クリックするとimg-operationが出てくる -->
                            @if(!empty($profiles['file_path']))
                                <img src="{{ asset('storage/' . $profiles['file_path']) }}">
                            @else
                                <img src="{{ asset('img/image.png') }}">
                            @endif
                            </div>
                            <div class="img-operation">
                                <div class="img-select" wire:click="openInputFile">画像を変更する</div>
                                <input type="file" accept=".jpeg,.jpg,.png" name="icon_file" wire:model.live="icon_file" class="img-select-input"><!-- このinputは隠す -->
                                <div class="img-delete" wire:click="deleteIcon">削除</div>
                            </div>
                        </div>
                        <div class="information">
                            @if ($role_id == 999)
                                <a class="ui red tag label">管理者アカウント</a>
                            @endif
                            @if ($role_id === 500)
                                <a class="ui red tag label">社労士アカウント</a>
                            @endif
                            @if ($role_id === 100)
                                <a class="ui red tag label">一般アカウント</a>
                            @endif
                            <h1 class="mt-1">{{ $profiles['name'] }}</h1>
                            <h3>{{ $profiles['company_name'] }}</h3>
                            <p>配属：{{ $profiles['branch_name'] }}</p>
                            <p>部署：{{ implode(', ', $profiles['departments']) }}</p>
                            <p>役職：{{ empty($profiles['managerial_position']) ? '-' : $profiles['managerial_position']->name }}
                            </p>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button class="ui button small primary" type="submit">保存</button>
                    </div>
                </form>
            </section>
        @endif
        @if ($tab === 1)
            <section class="area">
                <h3>名前</h3>
                <form class="ui form" wire:submit="namesSave">
                    <div class="two fields">
                        <div class="field {{ err($errors, 'names_edit.old_last_name') }}">
                            <label for="old_last_name">旧氏</label>
                            <input type="text" id="old_last_name" name="old_last_name"
                                wire:model.live="names_edit.old_last_name"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'names_edit.old_first_name') }}">
                            <label for="old_first_name">旧名</label>
                            <input type="text" id="old_first_name" name="old_first_name"
                                wire:model.live="names_edit.old_first_name"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>

                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err($errors, 'names_edit.old_last_name_kana') }}">
                            <label for="old_last_name_kana">旧氏（カナ）</label>
                            <input type="text" id="old_last_name_kana" name="old_last_name_kana"
                                wire:model.live="names_edit.old_last_name_kana"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'names_edit.old_first_name_kana') }}">
                            <label for="old_first_name_kana">旧名（カナ）</label>
                            <input type="text" id="old_first_name_kana" name="old_first_name_kana"
                                wire:model.live="names_edit.old_first_name_kana"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err($errors, 'names_edit.old_last_name_alphabet') }}">
                            <label for="old_last_name_alphabet">旧氏（アルファベット）</label>
                            <input type="text" id="old_last_name_alphabet" name="old_last_name_alphabet"
                                wire:model.live="names_edit.old_last_name_alphabet"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'names_edit.old_first_name_alphabet') }}">
                            <label for="old_first_name_alphabet">旧名（アルファベット）</label>
                            <input type="text" id="old_first_name_alphabet" name="old_first_name_alphabet"
                                wire:model.live="names_edit.old_first_name_alphabet"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err($errors, 'names_edit.name_common') }}">
                            <label for="name_common">通称名</label>
                            <input type="text" id="name_common" name="name_common"
                                wire:model.live="names_edit.name_common"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'names_edit.name_common_kana') }}">
                            <label for="name_common_kana">通称名（カナ）</label>
                            <input type="text" id="name_common_kana" name="name_common_kana"
                                wire:model.live="names_edit.name_common_kana"
                                {{ $names_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div style="text-align: right;">
                        @if ($names_edit_flg)
                            <button class="ui button small" type="button" wire:click="namesCancel">キャンセル</button>
                            <button class="ui button small primary" type="submit">保存</button>
                        @else
                            <button class="ui button small" type="button" wire:click="namesEdit">編集</button>
                        @endif
                    </div>
                </form>

            </section>
        @endif
        @if ($tab === 2)
            <section class="area">
                <form class="ui form" wire:submit="emergencySave">
                    <h3>緊急連絡先１件目</h3>
                    <div class="two fields">
                        <div class="field {{ err($errors, 'emergency_edit.emergency_contact1') }}">
                            <label for="emergency_contact1">緊急連絡先名</label>
                            <input type="text" id="emergency_contact1" name="emergency_contact1"
                                wire:model.live="emergency_edit.emergency_contact1"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_relationship1') }}">
                            <label for="emergency_relationship1">続柄</label>
                            <input type="text" id="emergency_relationship1" name="emergency_relationship1"
                                wire:model.live="emergency_edit.emergency_relationship1"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="field {{ err($errors, 'emergency_edit.emergency_tel1') }}">
                        <label for="emergency_tel1">電話番号</label>
                        <input type="text" id="emergency_tel1" name="emergency_tel1"
                            wire:model.live="emergency_edit.emergency_tel1" pattern="[\d\-]*" maxlength="12"
                            {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                    </div>
                    <div class="three fields">
                        <div class="field {{ err($errors, 'emergency_edit.emergency_post_code1') }}">
                            <label for="emergency_post_code1">郵便番号</label>
                            <input type="text" name="emergency_post_code1"
                                wire:model.live="emergency_edit.emergency_post_code1"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_prefecture1') }}">
                            <label for="emergency_address_prefecture1">都道府県</label>
                            <select class="ui fluid dropdown" name="emergency_address_prefecture1"
                                wire:model.live="emergency_edit.emergency_address_prefecture1"
                                {{ $emergency_edit_flg == false ? 'disabled' : '' }} style="height: 49px;">
                                <option value="">未選択</option>
                                @foreach ($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_city1') }}">
                            <label for="emergency_address_city1">市区町村</label>
                            <input type="text" id="emergency_address_city1" name="emergency_address_city1"
                                wire:model.live="emergency_edit.emergency_address_city1"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_ward1') }}">
                            <label for="emergency_address_ward1">丁目・番地</label>
                            <input type="text" id="emergency_address_ward1" name="emergency_address_ward1"
                                wire:model.live="emergency_edit.emergency_address_ward1"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_apartment1') }}">
                            <label for="emergency_address_apartment1">アパート・マンション名等</label>
                            <input type="text" id="emergency_address_apartment1"
                                name="emergency_address_apartment1"
                                wire:model.live="emergency_edit.emergency_address_apartment1"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <h3>緊急連絡先２件目</h3>
                    <div class="two fields">
                        <div class="field {{ err($errors, 'emergency_edit.emergency_contact2') }}">
                            <label for="emergency_contact2">緊急連絡先名</label>
                            <input type="text" id="emergency_contact2" name="emergency_contact2"
                                wire:model.live="emergency_edit.emergency_contact2"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_relationship2') }}">
                            <label for="emergency_relationship2">続柄</label>
                            <input type="text" id="emergency_relationship2" name="emergency_relationship2"
                                wire:model.live="emergency_edit.emergency_relationship2"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="field {{ err($errors, 'emergency_edit.emergency_tel2') }}">
                        <label for="emergency_tel1">電話番号</label>
                        <input type="text" id="emergency_tel2" name="emergency_tel2"
                            wire:model.live="emergency_edit.emergency_tel2" pattern="[\d\-]*" maxlength="12"
                            {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                    </div>
                    <div class="three fields">
                        <div class="field {{ err($errors, 'emergency_edit.emergency_post_code2') }}">
                            <label for="emergency_post_code2">郵便番号</label>
                            <input type="text" name="emergency_post_code2"
                                wire:model.live="emergency_edit.emergency_post_code2"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_prefecture2') }}">
                            <label for="emergency_address_prefecture2">都道府県</label>
                            <select class="ui fluid dropdown" name="emergency_address_prefecture2"
                                wire:model.live="emergency_edit.emergency_address_prefecture2"
                                {{ $emergency_edit_flg == false ? 'disabled' : '' }} style="height: 49px;">
                                <option value="">未選択</option>
                                @foreach ($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_city2') }}">
                            <label for="emergency_address_city2">市区町村</label>
                            <input type="text" id="emergency_address_city2" name="emergency_address_city2"
                                wire:model.live="emergency_edit.emergency_address_city2"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_ward2') }}">
                            <label for="emergency_address_ward2">丁目・番地</label>
                            <input type="text" id="emergency_address_ward2" name="emergency_address_ward2"
                                wire:model.live="emergency_edit.emergency_address_ward2"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        <div class="field {{ err($errors, 'emergency_edit.emergency_address_apartment2') }}">
                            <label for="emergency_address_apartment2">アパート・マンション名等</label>
                            <input type="text" id="emergency_address_apartment2"
                                name="emergency_address_apartment2"
                                wire:model.live="emergency_edit.emergency_address_apartment2"
                                {{ $emergency_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                    </div>

                    <div class="ui divider"></div>
                    <div style="text-align: right;">
                        @if ($emergency_edit_flg)
                            <button class="ui button small" type="button"
                                wire:click="emergencyCancel">キャンセル</button>
                            <button class="ui button small primary" type="submit">保存</button>
                        @else
                            <button class="ui button small" type="button" wire:click="emergencyEdit">編集</button>
                        @endif
                    </div>
                </form>
            </section>
        @endif
        @if ($tab === 3)
            <section class="area">
                <h3>ログイン用メールアドレス</h3>
                <form class="ui form" wire:submit="loginEmailSave">
                    <div class="two fields">
                        <div class="field {{ err($errors, 'login_email_edit') }}">
                            <input type="text" id="login_email" name="login_email"
                                wire:model.live="login_email_edit"
                                {{ $login_email_edit_flg == false ? 'readonly' : '' }}>
                        </div>
                        @if ($login_email_error)
                            <p class="error" style="font-size: 0.8em; color: var(--color-red);">既に登録されています</p>
                        @endif
                    </div>
                    <div style="text-align: right;">
                        @if ($login_email_edit_flg)
                            <button class="ui button small" type="button"
                                wire:click="loginEmailCancel">キャンセル</button>
                            <button class="ui button small primary" type="submit">保存</button>
                        @else
                            <button class="ui button small" type="button" wire:click="loginEmailEdit">編集</button>
                        @endif
                    </div>
                </form>

                <div class="ui divider"></div>
                <h3>パスワードの再設定</h3>
                <form class="ui form" wire:submit="loginPassSave">
                    @if ($login_pass_edit_flg)
                        <div class="two fields">
                            <div class="field {{ err($errors, 'login_pass_edit') }}">
                                <label for="login_pass">新しいパスワード</label>
                                <input type="password" id="login_pass" name="login_pass"
                                    wire:model.live="login_pass_edit">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field {{ err($errors, 'login_pass_confirm') }}">
                                <label for="login_pass_confirm">新しいパスワード（確認）</label>
                                <input type="password" id="login_pass_confirm" name="login_pass_confirm"
                                    wire:model.live="login_pass_confirm_edit">
                            </div>
                            <div class="field pt-2">
                                @if ($login_pass_valid['confirm'] === false)
                                    <p><span class="ui error text small">入力したパスワードと一致しません</span></p>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div style="text-align: right;">
                        @if ($login_pass_edit_flg)
                            <button class="ui button small" type="button"
                                wire:click="loginPassCancel">キャンセル</button>
                            <button class="ui button small primary" type="submit">保存</button>
                        @else
                            <button class="ui button small" type="button" wire:click="loginPassEdit">編集</button>
                        @endif
                    </div>
                </form>
            </section>
        @endif
        @if ($tab === 4)
            <section class="area"></section>
        @endif
    </div>
</div>
