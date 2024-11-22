<div class="content" wire:ignore>
    <div class="ui top attached tabular menu modal-menu">
        <a class="item active" data-tab="sample">給与</a>
        <a class="item" data-tab="sample2">賞与</a>
        <a class="item" data-tab="sample3">報奨金</a>
    </div>
    <div class="ui bottom attached segment tab modal-segment" data-tab="sample">
    </div>
    <div class="ui bottom attached segment tab modal-segment" data-tab="sample2">
    </div>
    <div class="ui bottom attached segment tab modal-segment" data-tab="sample3">
    </div>
    <div class="basic actions">
        <a class="ui negative button" href="javascript:closeModal">戻る</a>
    </div>
</div>

@script
    <script type="module">
        window.closeModal = () => {
            setTimeout(() => {
                $('.confirm-modal').modal('hide');
            }, 230);
        };
        function formatAppliedDate(appliedDate) {
            const match = appliedDate.match(/(\d{1,2})月\s+(\d{4})/);
            if (match) {
                const [month, year] = match.slice(1);
                return `${year}-${month.padStart(2, '0')}`;
            } else {
                return "";
            }
        }
        window.addEventListener('salariesDataUpdated', event => {
            const { salariesByBranch, bonusByBranch, bountyByBranch, index: thisIndex } = event.detail[0];
            const parentElement = $('.branch-area-' + thisIndex);
            const sampleElement = $('.ui.bottom.attached.segment.modal-segment[data-tab="sample"]');
            const sample2Element = $('.ui.bottom.attached.segment.modal-segment[data-tab="sample2"]');
            const sample3Element = $('.ui.bottom.attached.segment.modal-segment[data-tab="sample3"]');

            const salaryIds = parentElement.find(`input[name="sa-id[${thisIndex}][]"]`).map((_, e) => e.value).get();
            const bonusIds = parentElement.find(`input[name="bo-id[${thisIndex}][]"]`).map((_, e) => e.value).get();
            const bountyIds = parentElement.find(`input[name="bou-id[${thisIndex}][]"]`).map((_, e) => e.value).get();

            sampleElement.empty();
            sample2Element.empty();
            sample3Element.empty();

            let salaryAnyChanges = false;
            let bonusAnyChanges = false;
            let bountyAnyChanges = false;
            salaryIds.forEach((salaryId, saIndex) => {
                const salaryElement = parentElement.find(`input[name="sa-id[${thisIndex}][]"]`).eq(saIndex);
                const thisElement = salaryElement.closest('.salary.fields');
                const departmentsElement = thisElement.find(`select[name="sa-departments[${thisIndex}][${saIndex}][]"] option:selected`).map((_, el) => $(el).text()).get();
                const departmentNames = departmentsElement.join('，');
                const deadlineElement = thisElement.find(`select[name="sa-payroll_deadline[${thisIndex}][]"] option:selected`).text();
                const monthElement = thisElement.find(`select[name="sa-payroll_month[${thisIndex}][]"] option:selected`).text();
                const dayElement = thisElement.find(`select[name="sa-payroll_day[${thisIndex}][]"] option:selected`).text();
                const notFormattedDateElement = thisElement.find(`input[name="sa-applied_date[${thisIndex}][]"]`).val();
                const dateElement = notFormattedDateElement ? formatAppliedDate(notFormattedDateElement) : "未選択";

                const currentDate = new Date();
                const formattedDate = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(currentDate.getDate()).padStart(2, '0')}`;
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
                    const oldSalary = salariesByBranch[saIndex] || {};
                    const deallineMapping = { '1': '15日', '2': '20日', '3': '25日', '4': '末締め' };
                    const monthMapping = { '1': '当月', '2': '翌月' };
                    const dayMapping = {
                        '1': '5日', '2': '10日', '3': '15日', '4': '20日', '5': '25日',
                        '6': '末日', '7': '第1営業日', '8': '第2営業日', '9': '第3営業日',
                        '10': '第4営業日', '11': '第5営業日'
                    };

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
                                        <td class="applied-date-cell ${oldSalary.applied_date !== dateElement ? 'red-text' : ''}">${dateElement}</td>
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
            bonusIds.forEach((bonusId, boIndex) => {
                const bonusElement = parentElement.find(`input[name="bo-id[${thisIndex}][]"]`).eq(boIndex);
                const thisElement = bonusElement.closest('.bonus.fields');
                const departmentsElement = thisElement.find(`select[name="bo-departments[${thisIndex}][${boIndex}][]"] option:selected`).map((_, el) => $(el).text()).get();
                const departmentNames = departmentsElement.join('，');
                const monthsElement = thisElement.find(`select[name="bo-bonus_payment_month[${thisIndex}][${boIndex}][]"] option:selected`).map((_, el) => $(el).text()).get();
                const monthElement = monthsElement.join('，');
                const notFormattedDateElement = thisElement.find(`input[name="bo-applied_date[${thisIndex}][]"]`).val();
                const dateElement = notFormattedDateElement ? formatAppliedDate(notFormattedDateElement) : "未選択";

                const currentDate = new Date();
                const formattedDate = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(currentDate.getDate()).padStart(2, '0')}`;

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
                                        <td class="applied-date-cell ${oldBonus.applied_date !== dateElement ? 'red-text' : ''}">${dateElement}</td>
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
            bountyIds.forEach((bountyId, bouIndex) => {
                const bountyElement = parentElement.find(`input[name="bou-id[${thisIndex}][]"]`).eq(bouIndex);
                const thisElement = bountyElement.closest('.bounty.fields');
                const departmentsElement = thisElement.find(`select[name="bou-departments[${thisIndex}][${bouIndex}][]"] option:selected`).map((_, el) => $(el).text()).get();
                const departmentNames = departmentsElement.join('，');
                const monthsElement = thisElement.find(`select[name="bou-bonus_payment_month[${thisIndex}][${bouIndex}][]"] option:selected`).map((_, el) => $(el).text()).get();
                const monthElement = monthsElement.join('，');
                const notFormattedDateElement = thisElement.find(`input[name="bou-applied_date[${thisIndex}][]"]`).val();
                const dateElement = notFormattedDateElement ? formatAppliedDate(notFormattedDateElement) : "未選択";

                const currentDate = new Date();
                const formattedDate = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(currentDate.getDate()).padStart(2, '0')}`;

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
                                        <td class="applied-date-cell ${oldBounty.applied_date !== dateElement ? 'red-text' : ''}">${dateElement}</td>
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
            if (!salaryAnyChanges) {
                sampleElement.append(`<div>該当変更なし</div>`);
            }
            if (!bonusAnyChanges) {
                sample2Element.append(`<div>該当変更なし</div>`);
            }
            if (!bountyAnyChanges) {
                sample3Element.append(`<div>該当変更なし</div>`);
            }
        });
    </script>
@endscript