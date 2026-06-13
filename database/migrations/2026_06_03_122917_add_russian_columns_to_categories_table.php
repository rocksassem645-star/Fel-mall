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
    Schema::table('categories', function (Blueprint $table) {
        $table->string('title_ru')->nullable()->after('title_ar');
        $table->string('description_ru')->nullable()->after('description_ar');
    });
}
public function down()
{
    Schema::table('categories', function (Blueprint $table) {
        $table->dropColumn(['title_ru', 'description_ru']);
    });
}
};
