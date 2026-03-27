<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:1000',
            'note'   => 'nullable|string|max:100',
        ], [
            'amount.required' => 'Jumlah wajib diisi.',
            'amount.integer'  => 'Jumlah harus berupa angka.',
            'amount.min'      => 'Minimal nabung Rp 1.000.',
            'note.max'        => 'Catatan maksimal 100 karakter.',
        ]);

        DB::transaction(function () use ($request) {
            $current = Saving::getBalance();
            $new     = $current + (int) $request->amount;

            Saving::setBalance($new);

            Transaction::create([
                'user_id'       => auth()->id(),
                'type'          => 'deposit',
                'amount'        => (int) $request->amount,
                'note'          => $request->note,
                'balance_after' => $new,
            ]);
        });

        return redirect()->route('dashboard')
            ->with('success', 'Yeay berhasil nabung! 🐷💚 +Rp ' . number_format($request->amount, 0, ',', '.'));
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:1000',
            'note'   => 'nullable|string|max:100',
        ], [
            'amount.required' => 'Jumlah wajib diisi.',
            'amount.integer'  => 'Jumlah harus berupa angka.',
            'amount.min'      => 'Minimal ambil Rp 1.000.',
            'note.max'        => 'Catatan maksimal 100 karakter.',
        ]);

        $current = Saving::getBalance();

        if ((int) $request->amount > $current) {
            return redirect()->route('dashboard')
                ->with('error', 'Saldo tidak cukup! Saldo sekarang Rp ' . number_format($current, 0, ',', '.'));
        }

        DB::transaction(function () use ($request, $current) {
            $new = $current - (int) $request->amount;

            Saving::setBalance($new);

            Transaction::create([
                'user_id'       => auth()->id(),
                'type'          => 'withdraw',
                'amount'        => (int) $request->amount,
                'note'          => $request->note,
                'balance_after' => $new,
            ]);
        });

        return redirect()->route('dashboard')
            ->with('success', 'Berhasil ambil tabungan ❤️ -Rp ' . number_format($request->amount, 0, ',', '.'));
    }
}