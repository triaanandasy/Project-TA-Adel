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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); //varchar 255
            $table->string('email'); //varchar 255
            $table->string('no_hp')->nullable(); //varchar 255
            $table->string('alamat')->nullable(); //varchar 255
            $table->string('foto')->nullable(); //varchar 255
            $table->string('created_by')->nullable(); //varchar 255
            $table->string('updated_by')->nullable(); //varchar 255
            $table->string('deleted_by')->nullable();//varchar 255
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
