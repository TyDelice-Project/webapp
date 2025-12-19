<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('personal_discounts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('application_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_discounts');
    }
};
