<div class="scrolling content" wire:ignore>
    <div class="ui top attached tabular menu modal-menu">
        <a class="item active" data-tab="給与">給与</a>
        <a class="item" data-tab="賞与">賞与</a>
        <a class="item" data-tab="報奨金">報奨金</a>
        <a class="item" data-tab="手当">手当</a>
    </div>
    <div class="ui bottom attached segment tab modal-segment" data-tab="給与">
    </div>
    <div class="ui bottom attached segment tab modal-segment" data-tab="賞与">
    </div>
    <div class="ui bottom attached segment tab modal-segment" data-tab="報奨金">
    </div>
    <div class="ui bottom attached segment tab modal-segment" data-tab="手当">
    </div>
    <div class="basic actions">
        <a class="ui negative button" href="javascript:closeModal">戻る</a>
    </div>
    
    @script
        <script type="module">
            window.closeModal = () => {
                setTimeout(() => {
                    $('.branch-payment-confirm-modal').modal('hide');
                }, 0);
            };

            function formatAppliedDate(appliedDate) {
                const match = appliedDate.match(/(\d{4})年(\d{1,2})月/);
                if (match) {
                    const [year, month] = match.slice(1);
                    return `${year}-${month.padStart(2, '0')}`;
                } else {
                    return "";
                }
            }
            function arrayDiff(array1, array2) {
                return array1.filter(item => !array2.includes(item));
            }
            window.addEventListener('salariesDataUpdated', event => {
                const {
                    salariesByBranch,
                    bonusByBranch,
                    bountyByBranch,
                    allowanceByBranch,
                    index: thisIndex,
                    salariesID,
                    bonusID,
                    bountyID,
                    allowanceID,
                } = event.detail[0];
                const parentElement = $('.branch-area-' + thisIndex);
                const sampleElement = $('.ui.bottom.attached.segment.modal-segment[data-tab="給与"]');
                const sample2Element = $('.ui.bottom.attached.segment.modal-segment[data-tab="賞与"]');
                const sample3Element = $('.ui.bottom.attached.segment.modal-segment[data-tab="報奨金"]');
                const sample4Element = $('.ui.bottom.attached.segment.modal-segment[data-tab="手当"]');

                const salaryIds = parentElement.find(`input[name="sa-id[${thisIndex}][]"]`).map((_, e) => e.value)
                    .get();
                const bonusIds = parentElement.find(`input[name="bo-id[${thisIndex}][]"]`).map((_, e) => e.value).get();
                const bountyIds = parentElement.find(`input[name="bou-id[${thisIndex}][]"]`).map((_, e) => e.value).get();
                const allowanceIds = parentElement.find(`input[name="al-id[${thisIndex}][]"]`).map((_, e) => e.value).get();

                sampleElement.empty();
                sample2Element.empty();
                sample3Element.empty();
                sample4Element.empty();

                let salaryAnyChanges = false;
                let bonusAnyChanges = false;
                let bountyAnyChanges = false;
                let allowanceAnyChanges = false;

                const deallineMapping = { '1': '15日', '2': '20日', '3': '25日', '4': '末締め' };
                const monthMapping = { '1': '当月', '2': '翌月' };
                const dayMapping = {
                    '1': '5日', '2': '10日', '3': '15日', '4': '20日', '5': '25日',
                    '6': '末日', '7': '第1営業日', '8': '第2営業日', '9': '第3営業日',
                    '10': '第4営業日', '11': '第5営業日'
                };
                const paymonthMapping = {
                    '1': '毎月',
                    '2': '2ヵ月毎',
                    '3': '3ヵ月毎',
                    '4': '4ヵ月毎',
                    '5': '5ヵ月毎',
                    '6': '6ヵ月毎',
                    '7': '7ヵ月毎',
                    '8': '8ヵ月毎',
                    '9': '9ヵ月毎',
                    '10': '10ヵ月毎',
                    '11': '11ヵ月毎',
                    '12': '12ヵ月毎',
                    '13': '不定期',
                };
                const currentDate = new Date();
                const formattedDate = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(currentDate.getDate()).padStart(2, '0')}`;
                salaryIds.forEach((salaryId, saIndex) => {
                    const salaryElement = parentElement.find(`input[name="sa-id[${thisIndex}][]"][value="${salaryId}"]`);
                    const thisElement = salaryElement.closest('.salary.fields');
                    const departmentsElement = thisElement.find(
                        `select[name="sa-departments[${thisIndex}][${saIndex}][]"] option:selected`).map((_,
                        el) => $(el).text()).get();
                    const departmentNames = departmentsElement.join('，');
                    const deadlineElement = thisElement.find(
                        `select[name="sa-payroll_deadline[${thisIndex}][]"] option:selected`).text();
                    const monthElement = thisElement.find(
                        `select[name="sa-payroll_month[${thisIndex}][]"] option:selected`).text();
                    const dayElement = thisElement.find(
                        `select[name="sa-payroll_day[${thisIndex}][]"] option:selected`).text();
                    const notFormattedDateElement = thisElement.find(
                        `input[name="sa-applied_date[${thisIndex}][]"]`).val();
                    const dateElement = notFormattedDateElement ? formatAppliedDate(notFormattedDateElement) :
                        "未選択";

                    if (salaryId === "0") {
                        const $newSalaryTable = $(`
                            <div class="new-salary mb-2 mt-0">
                                <h3>新規</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>締め日</th><th>支払月</th><th>支払日</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                    <tbody><tr>
                                        <td class="departments-cell">${departmentNames}</td>
                                        <td class="deadline-cell">${deadlineElement}</td>
                                        <td class="month-cell">${monthElement}</td>
                                        <td class="day-cell">${dayElement}</td>
                                        <td class="applied-date-cell">${dateElement}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);
                        sampleElement.append($newSalaryTable);
                        salaryAnyChanges = true;
                    } else {
                        const oldSalary = salariesByBranch.find(salary => salary.salary_id == salaryId) || {};
                        const isChanged = oldSalary.department_names !== departmentNames ||
                            deallineMapping[oldSalary.payroll_deadline] !== deadlineElement ||
                            monthMapping[oldSalary.payroll_month] !== monthElement ||
                            dayMapping[oldSalary.payroll_day] !== dayElement ||
                            oldSalary.applied_date.substring(0, 7) !== dateElement;

                        if (isChanged) {
                            const $beforeChangedSalaryTable = $(`
                                <div class="before-changed-salary mb-2 mt-0">
                                    <h3>変更前</h3>
                                    <table class="ui celled table center aligned">
                                        <thead><tr><th>該当部署</th><th>締め日</th><th>支払月</th><th>支払日</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                        <tbody><tr>
                                            <td class="departments-cell">${oldSalary.department_names || ''}</td>
                                            <td class="deadline-cell">${deallineMapping[oldSalary.payroll_deadline] || ''}</td>
                                            <td class="month-cell">${monthMapping[oldSalary.payroll_month] || ''}</td>
                                            <td class="day-cell">${dayMapping[oldSalary.payroll_day] || ''}</td>
                                            <td class="applied-date-cell">${oldSalary.applied_date.substring(0, 7) || ''}</td>
                                            <td class="register-date-cell">${oldSalary.updated_at || ''}</td>
                                        </tr></tbody>
                                    </table>
                                    <div class="ui divider my-2"></div>
                                </div>
                            `);
                            const $changedSalaryTable = $(`
                                <div class="changed-salary mb-2 mt-0">
                                    <h3>変更</h3>
                                    <table class="ui celled table center aligned">
                                        <thead><tr><th>該当部署</th><th>締め日</th><th>支払月</th><th>支払日</th><th>適用年月</th><th>更新日付</th></tr></thead>
                                        <tbody><tr>
                                            <td class="departments-cell ${oldSalary.department_names !== departmentNames ? 'red-text' : ''}">${departmentNames}</td>
                                            <td class="deadline-cell ${deallineMapping[oldSalary.payroll_deadline] !== deadlineElement ? 'red-text' : ''}">${deadlineElement}</td>
                                            <td class="month-cell ${monthMapping[oldSalary.payroll_month] !== monthElement ? 'red-text' : ''}">${monthElement}</td>
                                            <td class="day-cell ${dayMapping[oldSalary.payroll_day] !== dayElement ? 'red-text' : ''}">${dayElement}</td>
                                            <td class="applied-date-cell ${oldSalary.applied_date.substring(0, 7) !== dateElement ? 'red-text' : ''}">${dateElement}</td>
                                            <td class="register-date-cell">${formattedDate}</td>
                                        </tr></tbody>
                                    </table>
                                    <div class="ui divider my-2"></div>
                                </div>
                            `);

                            sampleElement.append($beforeChangedSalaryTable).append($changedSalaryTable);
                            salaryAnyChanges = true;
                        }
                    }
                });
                if (arrayDiff(salariesID, salaryIds).length != 0) {
                    deleteIDs = [...new Set(arrayDiff(salariesID, salaryIds))];
                    deleteIDs.forEach((deleteID, deleteIndex) => {
                        const deletedSalary = salariesByBranch.find(salary => salary.salary_id == deleteID);
                        const $deletedSalaryTable = $(`
                            <div class="deleted-salary mb-2 mt-0">
                                <h3>削除</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>締め日</th><th>支払月</th><th>支払日</th><th>適用年月</th><th>削除日付</th></tr></thead>
                                    <tbody class="deleted"><tr>
                                        <td class="departments-cell">${deletedSalary.department_names || ''}</td>
                                        <td class="deadline-cell">${deallineMapping[deletedSalary.payroll_deadline] || ''}</td>
                                        <td class="month-cell">${monthMapping[deletedSalary.payroll_month] || ''}</td>
                                        <td class="day-cell">${dayMapping[deletedSalary.payroll_day] || ''}</td>
                                        <td class="applied-date-cell">${deletedSalary.applied_date.substring(0, 7) || ''}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);

                        sampleElement.append($deletedSalaryTable);
                        salaryAnyChanges = true;
                    });
                }
                bonusIds.forEach((bonusId, boIndex) => {
                    const bonusElement = parentElement.find(`input[name="bo-id[${thisIndex}][]"][value="${bonusId}"]`);
                    const thisElement = bonusElement.closest('.bonus.fields');
                    const departmentsElement = thisElement.find(
                        `select[name="bo-departments[${thisIndex}][${boIndex}][]"] option:selected`).map((_,
                        el) => $(el).text()).get();
                    const departmentNames = departmentsElement.join('，');
                    const monthsElement = thisElement.find(
                            `select[name="bo-bonus_payment_month[${thisIndex}][${boIndex}][]"] option:selected`)
                        .map((_, el) => $(el).text()).get();
                    const monthElement = monthsElement.join('，');
                    const notFormattedDateElement = thisElement.find(
                        `input[name="bo-applied_date[${thisIndex}][]"]`).val();
                    const dateElement = notFormattedDateElement ? formatAppliedDate(notFormattedDateElement) :
                        "未選択";

                    if (bonusId === "0") {
                        const $newBonusTable = $(`
                            <div class="new-bonus mb-2 mt-0">
                                <h3>新規</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                    <tbody><tr>
                                        <td class="departments-cell">${departmentNames}</td>
                                        <td class="month-cell">${monthElement}</td>
                                        <td class="applied-date-cell">${dateElement}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);
                        sample2Element.append($newBonusTable);
                        bonusAnyChanges = true;
                    } else {
                        const oldBonus = bonusByBranch[boIndex] || {};

                        const isChanged = oldBonus.department_names !== departmentNames ||
                            oldBonus.bonus_payment_month !== monthElement ||
                            oldBonus.applied_date.substring(0, 7) !== dateElement;

                        if (isChanged) {
                            const $beforeChangedBonusTable = $(`
                                <div class="before-changed-bonus mb-2 mt-0">
                                    <h3>変更前</h3>
                                    <table class="ui celled table center aligned">
                                        <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                        <tbody><tr>
                                            <td class="departments-cell">${oldBonus.department_names || ''}</td>
                                            <td class="month-cell">${oldBonus.bonus_payment_month || ''}</td>
                                            <td class="applied-date-cell">${oldBonus.applied_date.substring(0, 7) || ''}</td>
                                            <td class="register-date-cell">${oldBonus.updated_at || ''}</td>
                                        </tr></tbody>
                                    </table>
                                    <div class="ui divider my-2"></div>
                                </div>
                            `);

                        const $changedBonusTable = $(`
                            <div class="changed-bonus mb-2 mt-0">
                                <h3>変更</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>更新日付</th></tr></thead>
                                    <tbody><tr>
                                        <td class="departments-cell ${oldBonus.department_names !== departmentNames ? 'red-text' : ''}">${departmentNames}</td>
                                        <td class="month-cell ${oldBonus.bonus_payment_month !== monthElement ? 'red-text' : ''}">${monthElement}</td>
                                        <td class="applied-date-cell ${oldBonus.applied_date.substring(0, 7) !== dateElement ? 'red-text' : ''}">${dateElement}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);

                            sample2Element.append($beforeChangedBonusTable).append($changedBonusTable);
                            bonusAnyChanges = true;
                        }
                    }
                });
                if (arrayDiff(bonusID, bonusIds).length != 0) {
                    deleteIDs = [...new Set(arrayDiff(bonusID, bonusIds))];
                    deleteIDs.forEach((deleteID, deleteIndex) => {
                        const deletedBonus = bonusByBranch.find(bonus => bonus.bonus_id == deleteID);
                        const $deletedBonusTable = $(`
                            <div class="deleted-bonus mb-2 mt-0">
                                <h3>削除</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>削除日付</th></tr></thead>
                                    <tbody class="deleted"><tr>
                                        <td class="departments-cell">${deletedBonus.department_names || ''}</td>
                                        <td class="month-cell">${deletedBonus.bonus_payment_month || ''}</td>
                                        <td class="applied-date-cell">${deletedBonus.applied_date.substring(0, 7) || ''}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);

                        sample2Element.append($deletedBonusTable);
                        bonusAnyChanges = true;
                    });
                }
                bountyIds.forEach((bountyId, bouIndex) => {
                    const bountyElement = parentElement.find(`input[name="bou-id[${thisIndex}][]"][value="${bountyId}"]`);
                    const thisElement = bountyElement.closest('.bounty.fields');
                    const departmentsElement = thisElement.find(
                        `select[name="bou-departments[${thisIndex}][${bouIndex}][]"] option:selected`).map((
                        _, el) => $(el).text()).get();
                    const departmentNames = departmentsElement.join('，');
                    const monthsElement = thisElement.find(
                        `select[name="bou-bonus_payment_month[${thisIndex}][${bouIndex}][]"] option:selected`
                    ).map((_, el) => $(el).text()).get();
                    const monthElement = monthsElement.join('，');
                    const notFormattedDateElement = thisElement.find(
                        `input[name="bou-applied_date[${thisIndex}][]"]`).val();
                    const dateElement = notFormattedDateElement ? formatAppliedDate(notFormattedDateElement) :
                        "未選択";

                    if (bountyId === "0") {
                        const $newBountyTable = $(`
                            <div class="new-bounty mb-2 mt-0">
                                <h3>新規</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                    <tbody><tr>
                                        <td class="departments-cell">${departmentNames}</td>
                                        <td class="month-cell">${monthElement}</td>
                                        <td class="applied-date-cell">${dateElement}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);
                        sample3Element.append($newBountyTable);
                        bountyAnyChanges = true;
                    } else {
                        const oldBounty = bountyByBranch[bouIndex] || {};

                        const isChanged = oldBounty.department_names !== departmentNames ||
                            oldBounty.bonus_payment_month !== monthElement ||
                            oldBounty.applied_date.substring(0, 7) !== dateElement;

                        if (isChanged) {
                            const $beforeChangedBountyTable = $(`
                                <div class="before-changed-bounty mb-2 mt-0">
                                    <h3>変更前</h3>
                                    <table class="ui celled table center aligned">
                                        <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                        <tbody><tr>
                                            <td class="departments-cell">${oldBounty.department_names || ''}</td>
                                            <td class="month-cell">${oldBounty.bonus_payment_month || ''}</td>
                                            <td class="applied-date-cell">${oldBounty.applied_date.substring(0, 7) || ''}</td>
                                            <td class="register-date-cell">${oldBounty.updated_at || ''}</td>
                                        </tr></tbody>
                                    </table>
                                    <div class="ui divider my-2"></div>
                                </div>
                            `);

                        const $changedBountyTable = $(`
                            <div class="changed-bounty mb-2 mt-0">
                                <h3>変更</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>更新日付</th></tr></thead>
                                    <tbody><tr>
                                        <td class="departments-cell ${oldBounty.department_names !== departmentNames ? 'red-text' : ''}">${departmentNames}</td>
                                        <td class="month-cell ${oldBounty.bonus_payment_month !== monthElement ? 'red-text' : ''}">${monthElement}</td>
                                        <td class="applied-date-cell ${oldBounty.applied_date.substring(0, 7) !== dateElement ? 'red-text' : ''}">${dateElement}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);

                            sample3Element.append($beforeChangedBountyTable).append($changedBountyTable);
                            bountyAnyChanges = true;
                        }
                    }
                });
                if (arrayDiff(bountyID, bountyIds).length != 0) {
                    deleteIDs = [...new Set(arrayDiff(bountyID, bountyIds))];
                    deleteIDs.forEach((deleteID, deleteIndex) => {
                        const deletedBounty = bountyByBranch.find(bounty => bounty.bounty_id == deleteID);
                        const $deletedBountyTable = $(`
                            <div class="deleted-bounty mb-2 mt-0">
                                <h3>削除</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>該当部署</th><th>支払月</th><th>適用年月</th><th>削除日付</th></tr></thead>
                                    <tbody class="deleted"><tr>
                                        <td class="departments-cell">${deletedBounty.department_names || ''}</td>
                                        <td class="month-cell">${deletedBounty.bonus_payment_month || ''}</td>
                                        <td class="applied-date-cell">${deletedBounty.applied_date.substring(0, 7) || ''}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);

                        sample3Element.append($deletedBountyTable);
                        bountyAnyChanges = true;
                    });
                }
                allowanceIds.forEach((allowanceId, alIndex) => {
                    const allowanceElement = parentElement.find(`input[name="al-id[${thisIndex}][]"][value="${allowanceId}"]`);
                    const thisElement = allowanceElement.closest('.allowance.fields');
                    const secondElement = allowanceElement.closest('.allowance.fields').next('.allowance.fields');
                    const nameElement = thisElement.find(`select[name="al-allowance[${thisIndex}][]"] option:selected`).text();
                    const amountElement = thisElement.find(`input[name="al-amount[${thisIndex}][]"]`).val();
                    const monthElement = thisElement.find(`select[name="al-pay_month[${thisIndex}][]"] option:selected`).text();
                    const targetElement = secondElement.find(`input[name="al-target[${thisIndex}][]"]`).val();
                    const remarksElement = secondElement.find(`input[name="al-remarks[${thisIndex}][]"]`).val();
                    const notFormattedDateElement = secondElement.find(`input[name="al-applied_date[${thisIndex}][]"]`).val();
                    const dateElement = notFormattedDateElement ? formatAppliedDate(notFormattedDateElement) : "未選択";

                    if (allowanceId === "0") {
                        const $newAllowanceTable = $(`
                            <div class="new-allowance mb-2 mt-0">
                                <h3>新規</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>手当名</th><th>金額</th><th>支払月</th><th>対象者</th><th>備考</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                    <tbody><tr>
                                        <td class="names-cell">${nameElement}</td>
                                        <td class="amount-cell">${amountElement}</td>
                                        <td class="month-cell">${monthElement}</td>
                                        <td class="target-cell">${targetElement}</td>
                                        <td class="remarks-cell">${remarksElement}</td>
                                        <td class="applied-date-cell">${dateElement}</td>
                                        <td class="register-date-cell">${formattedDate}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);
                        sample4Element.append($newAllowanceTable);
                        allowanceAnyChanges = true;
                    } else {
                        const oldAllowance = allowanceByBranch.find(allowance => allowance.id == allowanceId) || {};

                        const isChanged = oldAllowance.allowance !== nameElement || oldAllowance.target !== targetElement ||
                            oldAllowance.amount != amountElement || paymonthMapping[oldAllowance.pay_month] !== monthElement ||
                            oldAllowance.remarks !== remarksElement || oldAllowance.applied_date.substring(0, 7) !== dateElement;

                        if (isChanged) {
                            const $beforeChangedAllowanceTable = $(`
                                <div class="before-changed-allowance mb-2 mt-0">
                                    <h3>変更前</h3>
                                    <table class="ui celled table center aligned">
                                        <thead><tr><th>手当名</th><th>金額</th><th>支払月</th><th>対象者</th><th>備考</th><th>適用年月</th><th>登録日付</th></tr></thead>
                                        <tbody><tr>
                                            <td class="names-cell">${oldAllowance.allowance || ''}</td>
                                            <td class="amount-cell">${oldAllowance.amount ?? ''}</td>
                                            <td class="month-cell">${paymonthMapping[oldAllowance.pay_month] || ''}</td>
                                            <td class="target-cell">${oldAllowance.target || ''}</td>
                                            <td class="remarks-cell">${oldAllowance.remarks || ''}</td>
                                            <td class="applied-date-cell">${oldAllowance.applied_date.substring(0, 7) || ''}</td>
                                            <td class="register-date-cell">${oldAllowance.updated_at.substring(0, 10) || ''}</td>
                                        </tr></tbody>
                                    </table>
                                    <div class="ui divider my-2"></div>
                                </div>
                            `);

                            const $changedAllowanceTable = $(`
                                <div class="changed-allowance mb-2 mt-0">
                                    <h3>変更</h3>
                                    <table class="ui celled table center aligned">
                                        <thead><tr><th>手当名</th><th>金額</th><th>支払月</th><th>対象者</th><th>備考</th><th>適用年月</th><th>更新日付</th></tr></thead>
                                        <tbody><tr>
                                            <td class="names-cell  ${oldAllowance.allowance !== nameElement ? 'red-text' : ''}">${nameElement}</td>
                                            <td class="amount-cell  ${oldAllowance.amount != amountElement ? 'red-text' : ''}">${amountElement}</td>
                                            <td class="month-cell  ${paymonthMapping[oldAllowance.pay_month] !== monthElement ? 'red-text' : ''}">${monthElement}</td>
                                            <td class="target-cell  ${oldAllowance.target !== targetElement ? 'red-text' : ''}">${targetElement}</td>
                                            <td class="remarks-cell  ${oldAllowance.remarks !== remarksElement ? 'red-text' : ''}">${remarksElement}</td>
                                            <td class="applied-date-cell  ${oldAllowance.applied_date.substring(0, 7) !== dateElement ? 'red-text' : ''}">${dateElement}</td>
                                            <td class="register-date-cell">${formattedDate}</td>
                                        </tr></tbody>
                                    </table>
                                    <div class="ui divider my-2"></div>
                                </div>
                            `);

                            sample4Element.append($beforeChangedAllowanceTable).append($changedAllowanceTable);
                            allowanceAnyChanges = true;
                        }
                    }
                });
                if (arrayDiff(allowanceID, allowanceIds).length != 0) {
                    deleteIDs = arrayDiff(allowanceID, allowanceIds);
                    deleteIDs.forEach((deleteID, deleteIndex) => {
                        const deletedAllowance = allowanceByBranch.find(allowance => allowance.id == deleteID);
                        const $deletedAllowanceTable = $(`
                            <div class="deleted-allowance mb-2 mt-0">
                                <h3>削除</h3>
                                <table class="ui celled table center aligned">
                                    <thead><tr><th>手当名</th><th>金額</th><th>支払月</th><th>対象者</th><th>備考</th><th>適用年月</th><th>削除日付</th></tr></thead>
                                    <tbody class="deleted"><tr>
                                        <td class="names-cell">${deletedAllowance.allowance || ''}</td>
                                        <td class="amount-cell">${deletedAllowance.amount ?? ''}</td>
                                        <td class="month-cell">${paymonthMapping[deletedAllowance.pay_month] || ''}</td>
                                        <td class="target-cell">${deletedAllowance.target || ''}</td>
                                        <td class="remarks-cell">${deletedAllowance.remarks || ''}</td>
                                        <td class="applied-date-cell">${deletedAllowance.applied_date.substring(0, 7) || ''}</td>
                                        <td class="register-date-cell">${deletedAllowance.updated_at.substring(0, 10) || ''}</td>
                                    </tr></tbody>
                                </table>
                                <div class="ui divider my-2"></div>
                            </div>
                        `);

                        sample4Element.append($deletedAllowanceTable);
                        allowanceAnyChanges = true;
                    });
                }
                if (!salaryAnyChanges) {
                    sampleElement.append(`<div>該当変更なし</div>`);
                }
                if (!bonusAnyChanges) {
                    sample2Element.append(`<div>該当変更なし</div>`);
                }
                if (!bountyAnyChanges) {
                    sample3Element.append(`<div>該当変更なし</div>`);
                }
                if (!allowanceAnyChanges) {
                    sample4Element.append(`<div>該当変更なし</div>`);
                }
            });
        </script>
    @endscript
    <style>
    .deleted {
    background: lightgray;
    }
    </style>
</div>

