<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('folders', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('name');
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users');
    });

    // Update notes table to add a relation to folders table
    Schema::table('notes', function (Blueprint $table) {
      $table->unsignedBigInteger('folder_id')->nullable();
      $table->foreign('folder_id')->references('id')->on('folders');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('folders');
  }
};
