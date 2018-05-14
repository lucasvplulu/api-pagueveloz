<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('public_id')->unique();
            $table->smallInteger('is_fixed')->default(0);
        });
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('public_id')->unique();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('extra_info_1')->nullable();
            $table->string('extra_info_2')->nullable();
            $table->smallInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('leads_rel_category', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('leads_category')->onDelete('cascade');

            $table->integer('lead_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads_rel_category', function (Blueprint $table) {
            $table->dropForeign('leads_rel_category_category_id_foreign');
            $table->dropForeign('leads_rel_category_lead_id_foreign');
        });

        Schema::dropIfExists('leads_rel_category');
        Schema::dropIfExists('leads_category');
        Schema::dropIfExists('leads');
    }
}
