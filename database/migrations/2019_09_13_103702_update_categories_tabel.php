<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCategoriesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'description') && Schema::hasColumn('votes', 'description')) {
                dropColumn(['votes', 'description']);
                $table->string('description',  255)->nullable();
                $table->bigInteger('votes')->default(0) //	Declare a default value for a column
                      ->unsigned();	// Set INTEGER to UNSIGNED
            }
        });
    }
}
