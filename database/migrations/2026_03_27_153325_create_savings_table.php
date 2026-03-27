<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel saldo tabungan bersama (hanya 1 baris)
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('balance')->default(0); // dalam rupiah
            $table->timestamps();
        });

        // Tabel riwayat transaksi
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['deposit', 'withdraw']);
            $table->bigInteger('amount');
            $table->string('note', 100)->nullable();
            $table->bigInteger('balance_after');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('savings');
    }
};