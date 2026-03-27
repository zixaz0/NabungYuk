<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = ['balance'];

    /**
     * Ambil saldo (selalu 1 baris, auto-create kalau belum ada)
     */
    public static function getBalance(): int
    {
        $saving = static::first();
        if (! $saving) {
            $saving = static::create(['balance' => 0]);
        }
        return (int) $saving->balance;
    }

    /**
     * Update saldo
     */
    public static function setBalance(int $amount): self
    {
        $saving = static::first();
        if (! $saving) {
            $saving = static::create(['balance' => $amount]);
        } else {
            $saving->update(['balance' => $amount]);
        }
        return $saving;
    }
}