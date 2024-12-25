<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('about_us_text_color')->after('about_us')->nullable();
            $table->string('copy_right_text_color')->after('copy_right')->nullable();
            $table->string('footer_links_color')->after('copy_right_text_color')->nullable();
            $table->string('footer_links_hover_color')->after('footer_links_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn('about_us_text_color');
            $table->dropColumn('copy_right_text_color');
            $table->dropColumn('footer_links_color');
            $table->dropColumn('footer_links_hover_color');
        });
    }
}
