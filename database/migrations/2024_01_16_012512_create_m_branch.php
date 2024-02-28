<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_branch', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('支店ID');
            $table->integer('company_id')->comment('会社ID');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->string('address_prefecture', 255)->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_ward', 255)->nullable()->comment('住所（丁目・番地）');
            $table->string('address_apartment', 255)->nullable()->comment('住所（アパート・マンション名等）');
            $table->string('name', 255)->nullable()->comment('名称');
            $table->string('tel_area_code', 10)->nullable()->comment('電話番号（市外局番）');
            $table->string('tel_city_code', 10)->nullable()->comment('電話番号（市内局番）');
            $table->string('tel_subscriber_code', 10)->nullable()->comment('電話番号（加入者番号）');
            $table->string('tel_overseas', 10)->nullable()->comment('国外電話番号');
            $table->integer('place_type')->default(1)->comment('国内外');
            $table->integer('branch_type')->nullable()->comment('区分');
            $table->string('labor_insurance_no', 20)->nullable()->comment('労働保険番号');
            $table->integer('labor_insurance_payment_method')->nullable()->comment('労働保険納付区分');
            $table->integer('insurance_type_id')->nullable()->comment('労働保険種類の分類');
            $table->date('labor_insurance_establishment_date')->nullable()->comment('労働保険成立年月日');
            $table->string('insurance_office_no', 20)->nullable()->comment('事業所番号（保険）');
            $table->string('insurance_office_reference_no', 20)->nullable()->comment('事業所整理記号（保険）');
            $table->string('pension_office_no', 10)->nullable()->comment('事業所番号（厚生年金）');
            $table->string('pension_office_reference_prefecture', 10)->nullable()->comment('事業所整理記号（厚生年金）用の都道府県コード');
            $table->string('pension_office_reference_no_cities', 10)->nullable()->comment('事業所整理記号（厚生年金）郡市区記号');
            $table->string('pension_office_reference_no_office', 10)->nullable()->comment('事業所整理記号（厚生年金）事業所記号');
            $table->integer('pension_office_id')->nullable()->comment('年金事務所ID');
            $table->string('employment_insurance_office_no', 20)->nullable()->comment('事業所番号（雇用保険）');
            $table->date('employment_insurance_establishment_date')->nullable()->comment('雇用保険設立年月日');
            $table->integer('hello_work_id')->nullable()->comment('管轄（公共職業安定所）');
            $table->integer('labor_bureau_id')->nullable()->comment('管轄（労働局）');
            $table->integer('labor_supervision_id')->nullable()->comment('管轄（労働基準監督）');
            $table->integer('start_date_of_month')->nullable()->comment('開始設定(月の始まり)');
            $table->integer('start_days_of_week')->nullable()->comment('開始設定(週の始まり)');
            $table->time('start_time_of_day')->nullable()->comment('開始設定(日の始まり)');
            $table->time('work_time_start')->nullable()->comment('就業時間(開始)');
            $table->time('work_time_end')->nullable()->comment('就業時間(終了)');
            $table->integer('work_time_standards_id')->nullable()->comment('年金事務所ID');
            $table->string('agreed_hours_year', 255)->nullable()->comment('所定労働時間(年)');
            $table->time('agreed_hours_month')->nullable()->comment('所定労働時間(月)');
            $table->time('agreed_hours_week')->nullable()->comment('所定労働時間(週)');
            $table->time('agreed_hours_day')->nullable()->comment('所定労働時間(日)');
            $table->integer('working_days_yearly')->nullable()->comment('労働日数(年間)');
            $table->tinyInteger('working_days_monthly')->nullable()->comment('労働日数(月間)');
            $table->integer('holiday_yearly')->nullable()->comment('休日日数(年間)');
            $table->tinyInteger('hoiday_monthly')->nullable()->comment('休日日数(月間)');
            $table->string('holiday_legal', 255)->nullable()->comment('休日内容(基本の法定休日)');
            $table->string('holiday_not_logal', 255)->nullable()->comment('休日内容(法定外休日)');
            $table->integer('work_style_type')->nullable()->comment('体制区分');
            $table->string('matters_of_retirement')->default('1　定年制：　あり（　60歳　）希望により再雇用をすることがある。 \n2　自己都合退職の手続き：　退職する3カ月以上前に届け出ること。 \n3　解雇の事由および手続き：　詳細は就業規則による。')->comment('退職に関する事項');
            $table->string('other_contract_matters', 800)->default('1　社会保険等の加入：　厚生年金・健康保険・雇用保険・労災保険 \n2　事業の都合および本人の適性により、業務内容の変更を命ずることがある。 \n3　労働契約期間内に知り得た会社に関する秘密情報を、本契約の期間内はもちろん、\n本契約終了後においても、第三者に開示もしくは漏洩してはならない。 \n4　労働契約期間内に社外に持ち出す事となった資料・データ等、その所有権が会社に\n帰属するものに関して、その契約終了時には一切の例外なく返却しなければならない。 \n5　労働契約に違反すると認められた場合は、直ちに契約を解除するものとする。 \n6　会社所定の誓約書等がある場合は、必要書類を提出しその内容を遵守するものとす\nる。 \n※この書面に記載されていない事項については、就業規則および諸規程を準用する。')->comment('その他の契約事項');
            $table->tinyInteger('delete_flg')->default(0)->comment('削除フラグ');
            $table->timestamps();
            $table->comment('支店マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_branch');
    }
};

