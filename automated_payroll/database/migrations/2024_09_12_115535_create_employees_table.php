<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_employees_table.php

public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone')->nullable();
        $table->string('designation')->nullable();
        $table->decimal('salary', 10, 2)->nullable();
        $table->string('salary_type')->default('salaried'); 
        $table->decimal('hourly_rate', 8, 2)->nullable(); 
        $table->decimal('overtime_rate', 8, 2)->nullable(); 
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
