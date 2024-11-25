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
        Schema::create('usermeta', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('gender');
            $table->integer('region_id');
            $table->integer('organizational_id');
            $table->string('address1');
            $table->string('address2');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usermeta');
    }
};
