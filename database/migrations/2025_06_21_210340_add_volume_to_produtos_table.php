<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('volume')->nullable()->change();
            
        });
    }


    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('volume', 8, 2)->nullable()->change();
            
        });
    }
};
