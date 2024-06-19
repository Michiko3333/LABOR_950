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
        Schema::create('m_dependent', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('被扶養者ID');
            $table->integer('employee_id')->comment('社員ID');
            $table->string('insurance_office_no', 20)->nullable()->comment('被保険者番号');
            $table->string('mynumber_card_no', 20)->nullable()->comment('マイナンバーカード番号');
            $table->string('pension_no', 10)->nullable()->comment('基礎年金番号');
            $table->string('last_name', 255)->nullable()->comment('氏');
            $table->string('last_name_kana', 255)->nullable()->comment('氏（カナ）');
            $table->string('first_name', 255)->nullable()->comment('名');
            $table->string('first_name_kana', 255)->nullable()->comment('名（カナ）');
            $table->string('name_common', 255)->nullable()->comment('通称名');
            $table->string('name_common_kana', 255)->nullable()->comment('通称名（カナ）');
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->integer('sex')->nullable()->comment('性別');
            $table->integer('relationship')->nullable()->comment('被扶養者の続柄区分');
            $table->integer('relationship_sex')->nullable()->comment('第3号被保険者性別（続柄）区分');
            $table->integer('cared_family_member_relationship')->nullable()->comment('介護対象家族の続柄区分');
            $table->integer('country_id')->nullable()->comment('第3号被保険者外国籍');
            $table->integer('living_type')->nullable()->comment('同居区分');
            $table->integer('annual_income')->nullable()->comment('収入（年収）');
            $table->string('post_code', 20)->nullable()->comment('郵便番号');
            $table->integer('address_prefecture')->nullable()->comment('住所（都道府県）');
            $table->string('address_city', 255)->nullable()->comment('住所（市区町村）');
            $table->string('address_ward', 255)->nullable()->comment('住所（丁目・番地）');
            $table->string('address_apartment', 255)->nullable()->comment('住所（アパート・マンション名等）');
            $table->integer('tel_type')->nullable()->comment('電話番号区分');
            $table->string('tel_area_code', 10)->nullable()->comment('連絡先電話番号（市外局番）');
            $table->string('tel_city_code', 10)->nullable()->comment('連絡先電話番号（市内局番）');
            $table->string('tel_subscriber_code', 10)->nullable()->comment('連絡先電話番号（加入者番号）');
            $table->date('dependent_become_date')->nullable()->comment('被扶養者になった年月日');
            $table->integer('dependent_reason_type')->nullable()->comment('被扶養者になった理由区分');
            $table->string('dependent_reason', 255)->nullable()->comment('被扶養者になった理由のその他');
            $table->date('dependent_remove_date')->nullable()->comment('被扶養者でなくなった年月日');
            $table->integer('dependent_remove_reason_type')->nullable()->comment('被扶養者になった理由区分');
            $table->string('dependent_remove_reason', 255)->nullable()->comment('被扶養者でなくなった理由のその他');
            $table->date('dependent_passed_away_date')->nullable()->comment('被扶養者の死亡年月日');
            $table->integer('category3_insured_occupation_type')->nullable()->comment('第3号被保険者職業区分');
            $table->string('category3_insured_occupation', 255)->nullable()->comment('第3号被保険者職業のその他');
            $table->integer('dependent_occupation_type')->nullable()->comment('被扶養者職業区分');
            $table->tinyInteger('dependent_occupation_grade')->nullable()->comment('被扶養者職業学年');
            $table->string('dependent_occupation', 255)->nullable()->comment('被扶養者職業のその他');
            $table->tinyInteger('special_requirements_applicable_flg')->nullable()->comment('第3号被保険者特例要件該当フラグ');
            $table->date('special_requirements_applicable_date')->nullable()->comment('第3号被保険者特例要件該当年月日');
            $table->integer('special_requirements_applicable_reason_type')->nullable()->comment('第3号被保険者特例要件該当理由区分');
            $table->string('special_requirements_applicable_reason', 255)->nullable()->comment('第3号被保険者特例要件該当理由のその他');
            $table->date('special_requirements_non_applicable_date')->nullable()->comment('第3号被保険者特例要件非該当年月日');
            $table->integer('special_requirements_non_applicable_reason_type')->nullable()->comment('第3号被保険者特例要件非該当理由');
            $table->string('special_requirements_non_applicable_reason', 255)->nullable()->comment('第3号被保険者特例要件非該当理由のその他');
            $table->date('domestic_transfer_date')->nullable()->comment('第3号被保険者国内転入年月日');
            $table->tinyInteger('delete_flg')->nullable()->comment('削除フラグ');
            $table->timestamps();
            $table->comment('被扶養者マスタ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_dependent');
    }
};
