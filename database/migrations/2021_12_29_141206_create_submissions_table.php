<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('video')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();

            $table->string('kit_name')->nullable();
            $table->string('switch_name')->nullable();
            $table->string('pcb_name')->nullable();
            $table->string('plate_name')->nullable();
            $table->string('case_name')->nullable();
            $table->string('stab_name')->nullable();
            $table->string('keycaps_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
