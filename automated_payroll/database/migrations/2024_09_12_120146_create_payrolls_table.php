<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_payrolls_table.php

public function up()
{
    Schema::create('payrolls', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained()->onDelete('cascade');
        $table->decimal('basic_pay', 10, 2);
        $table->decimal('overtime_pay', 10, 2)->nullable();
        $table->decimal('tax_deductions', 10, 2)->nullable();
        $table->decimal('net_pay', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
