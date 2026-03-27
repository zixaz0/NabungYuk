<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $balance = Saving::getBalance();

        $recentTx = Transaction::recent(5);

        // Kontribusi per user (total deposit & withdraw)
        $contributions = User::withSum(
                ['transactions as total_deposit'  => fn($q) => $q->where('type', 'deposit')],
                'amount'
            )
            ->withSum(
                ['transactions as total_withdraw' => fn($q) => $q->where('type', 'withdraw')],
                'amount'
            )
            ->get();

        return view('dashboard', compact('balance', 'recentTx', 'contributions'));
    }
}