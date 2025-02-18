<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lists', function (Blueprint $table) {
            $table->date('scheduled_date')->default(DB::raw('CURRENT_DATE'))->change();
        });
    }

    public function down()
    {
        Schema::table('lists', function (Blueprint $table) {
            $table->date('scheduled_date')->nullable()->change();
        });
    }
};
