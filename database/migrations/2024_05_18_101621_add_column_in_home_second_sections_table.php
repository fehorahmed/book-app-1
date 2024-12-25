<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInHomeSecondSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_second_sections', function (Blueprint $table) {
            $table->string('main_title_color')->nullable()->after('main_title');
            $table->string('sub_title_color')->nullable()->after('main_title_color');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_second_sections', function (Blueprint $table) {
            $table->dropColumn('main_title_color');
            $table->dropColumn('sub_title_color');
        });
    }
}
