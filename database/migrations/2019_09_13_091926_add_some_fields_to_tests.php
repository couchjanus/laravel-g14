<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tests')) {
            Schema::table('tests', function (Blueprint $table) {
                // Checking For Existence Of Columns
                if (!Schema::hasColumn('tests', 'name')) {
                    $table->string('name');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            if (Schema::hasColumn('tests', 'name')) {
                $table->dropColumn('name');
            }
        });
    }
}
