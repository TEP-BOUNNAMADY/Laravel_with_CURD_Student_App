<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable(); 
            $table->string('skill')->nullable();
            $table->string('class')->nullable(); 
            $table->timestamps(); 
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

