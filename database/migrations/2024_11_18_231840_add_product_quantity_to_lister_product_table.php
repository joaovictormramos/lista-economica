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
        Schema::table('lister_product', function (Blueprint $table) {
            $table->decimal('product_quantity', 8, 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lister_product', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('product_quantity');
        });
    }
};
