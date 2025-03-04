<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('goal_months', function (Blueprint $table) {
            $table->id();
            $table->decimal('goal_value', 10, 2)->default(0);
            $table->timestamps();
        });
    }
    
};
