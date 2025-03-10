<!-- ②呼び出し元のLivewireのBladeファイル（デザインファイル） 使いまわせる画面側の実装-->
<div>
    <button type="button" id="edit_wage_amount_btn" wire:click="openEditWageAmountModal" style="height: 37px;">編集</button>
    
    <style type="text/css">

    </style>




    <!-- 除外金額編集の画面デザイン -->
    <div id="edit_wage_amount" class="ui large modal edit_wage_amount">

        <i class="close icon"></i>
        <div class="header">
            賃金額より除外する項目
        </div>
        <p style="margin: 1.25rem 1.5rem;">賃金額より除外する項目にチェックをいれてください。</p>
        <div class="content" > 
            <div>
                <div class="ui basic label" style="height: 38px; padding: 10px 5px;">
                    <label>除外後の賃金額</label>
                    <input id="wage_amount_after_exclusion" name="wage_amount_after_exclusion" type="number">

                    <label>除外合計</label>
                    <input id="total_exclusion" name="total_exclusion" type="number">

                
                </div>
                <div class="ui basic label" style="height: 38px; padding: 10px 5px;">

                    <label>総支給額</label>
                    <input id="total_payment_amount" name="total_payment_amount" type="number">
                    
                    <label>基本給</label>
                    <input id="base_salary" name="base_salary" type="number">

                    <label>職務給</label>
                    <input id="job_salary" name="job_salary" type="number">

                    <label>歩合給または報奨金</label>
                    <input id="commission_or_bonus" name="commission_or_bonus" type="number">
                    
                </div>
            </div>

            <div class="exclusion_table_conteiner" style="display: flex;" > 
                <div class="left_conteiner" style="width:50%; margin: 1rem;"> 
                    <!-- １個目のテーブル -->
                    <table class="ui celled structured table">
                        <thead>
                            <tr>
                            <th rowspan="2">時間外手当</th>
                            <th rowspan="2">金額</th>
                            <th rowspan="2">除外</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <td>所定残業金額</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                            <div class="checkbox">
                                <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                            </div>
                            </td>
                            </tr>
                            <tr>
                            <td>普通残業金額</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>深夜残業金額</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>その他残業代</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr> 
                        </tbody>
                    </table>

                    <!-- ２個目のテーブル -->
                    <table class="ui celled structured table">

                        <!-- 縦１列目の2段目 -->
                        <thead>
                            <tr>
                            <th rowspan="2">支給控除</th>
                            <th rowspan="2">金額</th>
                            <th rowspan="2">除外</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <td>欠勤控除</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>遅早控除</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>その他控除</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    
                    </table>
                </div>

                <div class="right_conteiner" style="width:50%; margin: 1rem;"> 

                    <!-- ３個目のテーブル -->
                    <table class="ui celled structured table">
                        <thead>
                            <tr>
                            <th rowspan="2">諸手当合計</th>
                            <th rowspan="2">金額</th>
                            <th rowspan="2">除外</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            <td>通勤手当</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>資格手当</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>役職手当</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>住宅手当</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>車輛手当</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>通信手当</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>その他手当１</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>その他手当２</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td>その他手当３</td>
                            <td><!-- 金額入る--></td> 
                            <td class="center aligned">
                                <div class="checkbox">
                                    <input id="" name="checkbox" type="checkbox" value="有" style="width: 20px; height: 20px;">
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="actions">
            <button class="ui negative button" onClick="javascript:$lw.onCancel()" type="button">キャンセル</button>
            <div class="ui primary button" onClick="javascript:$lw.onEdit()">確定</div>
        </div>
    </div>

    <script type="module">

        Livewire.on('showEditWageAmountModal', () => {
            $('#edit_wage_amount').modal({
                blurring: true, // 背景をぼかす
            }).modal('show');
        });

    </script>

</div>
