<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('post_has_tags', function (Blueprint $table) {
            
            $table->dropForeign('post_has_tags_tag_id_foreign');
            $table->foreignId('tag_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->dropForeign('post_has_tags_post_id_foreign');
            $table->foreignId('post_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
           
            
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
