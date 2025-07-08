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
        Schema::table('product', function (Blueprint $table) {
            $table->integer('id_category')->after('price');
            $table->integer('id_brand')->after('id_category');
            $table->string('status')->after('id_brand')->default(0)->comment = '1: active; 0: inactive';
            $table->integer('sale')->after('status')->default(0);
            $table->string('company')->after('sale');
            $table->string('images')->after('company')->nullable();
            $table->string('detail')->after('images')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            //
        });
    }
};
