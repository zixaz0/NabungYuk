<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'note',
        'balance_after',
    ];

    protected $casts = [
        'amount'        => 'integer',
        'balance_after' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Format amount ke Rupiah
     */
    public function getFormattedAmountAttribute(): string
    {
        return 'Rp ' . number_format($this->amount, 0, ',', '.');
    }

    /**
     * 5 transaksi terakhir
     */
    public static function recent(int $limit = 5)
    {
        return static::with('user')
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();
    }
}