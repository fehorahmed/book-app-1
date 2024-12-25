<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToGalleryHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_headers', function (Blueprint $table) {
            $table->string('top_title_text_color')->after('sub_title')->nullable();
            $table->string('sub_title_text_color')->after('top_title_text_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_headers', function (Blueprint $table) {
            $table->dropColumn('top_title_text_color');
            $table->dropColumn('sub_title_text_color');
        });
    }
}
