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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            // $table->unsignedBigInteger('period_id')->nullable();
            // $table->unsignedBigInteger('exam_id')->nullable();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->unsignedBigInteger('lead_id')->nullable();
            // $table->unsignedBigInteger('lead_id')->nullable();
            $table->timestamps();

            // $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
            // $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        });

        Schema::create('lead_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->unsignedBigInteger('lead_id');
            $table->timestamps();

            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        });

        Schema::create('period_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->unsignedBigInteger('period_id');
            $table->timestamps();

            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
        Schema::dropIfExists('lead_note');
        Schema::dropIfExists('period_note');
    }
};
