<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('centre_id')->constrained();
            $table->date('date');
            $table->string('from_time');
            $table->string('till_time');
            $table->string('teachers_present');
            $table->string('start_age');
            $table->string('end_age');
            $table->string('assessed_quantity');
            $table->string('centre_setting_quantity');
            $table->boolean('completed')->default(false);
            $table->json('questionData')->nullable();
            $table->string('notes');
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
        Schema::dropIfExists('assessments');
    }
}
