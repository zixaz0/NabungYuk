<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nabung Bareng 💕</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --rose:     #d4546e;
            --rose-l:   #e8637a;
            --rose-xl:  #f7d0d8;
            --blush:    #fce8ec;
            --cream:    #fdf7f4;
            --warm:     #f5ebe6;
            --text:     #26181c;
            --text-s:   #6b4a54;
            --muted:    #a07888;
            --border:   #eddde2;
            --white:    #ffffff;
            --green:    #2d9e6b;
            --green-l:  #38b880;
            --green-bg: #e8f8f1;
            --red:      #c94760;
            --red-bg:   #fef0f3;
        }

        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--cream); color: var(--text); min-height: 100vh; }

        /* ── Navbar ── */
        nav {
            position: sticky; top: 0; z-index: 100;
            background: rgba(253,247,244,0.88); backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            padding: 0 32px; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .nav-brand { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 600; color: var(--rose); display: flex; align-items: center; gap: 8px; }
        .nav-right  { display: flex; align-items: center; gap: 14px; }
        .nav-user   { font-size: 0.85rem; color: var(--text-s); }
        .nav-user strong { color: var(--text); font-weight: 600; }
        .btn-logout {
            padding: 7px 16px; background: transparent;
            border: 1.5px solid var(--border); border-radius: 10px;
            font-family: 'DM Sans', sans-serif; font-size: 0.82rem;
            color: var(--muted); cursor: pointer; transition: all 0.2s;
        }
        .btn-logout:hover { border-color: var(--rose); color: var(--rose); }

        /* ── Main ── */
        main { max-width: 900px; margin: 0 auto; padding: 40px 24px 80px; }

        /* ── Hero ── */
        .hero {
            background: linear-gradient(135deg, #c94760 0%, #e8637a 55%, #f0889a 100%);
            border-radius: 28px; padding: 48px 44px;
            color: white; position: relative; overflow: hidden;
            margin-bottom: 24px;
            animation: fadeUp 0.45s ease both;
        }
        .hero::before { content:''; position:absolute; width:300px; height:300px; border-radius:50%; background:rgba(255,255,255,.07); top:-80px; right:-80px; }
        .hero::after  { content:''; position:absolute; width:180px; height:180px; border-radius:50%; background:rgba(255,255,255,.05); bottom:-50px; left:50px; }
        .hero-label   { font-size:.75rem; font-weight:500; text-transform:uppercase; letter-spacing:.12em; opacity:.8; margin-bottom:10px; }
        .hero-amount  { font-family:'Cormorant Garamond',serif; font-size:clamp(2.8rem,6vw,4rem); font-weight:600; line-height:1; position:relative; z-index:1; }
        .hero-rp      { font-size:.4em; vertical-align:super; margin-right:3px; opacity:.85; }
        .hero-sub     { margin-top:10px; font-size:.82rem; opacity:.7; }
        .hero-badge   { position:absolute; top:28px; right:40px; font-size:3rem; opacity:.9; z-index:1; animation:heartbeat 2.5s ease-in-out infinite; }

        /* ── Alerts ── */
        .alert { padding:12px 16px; border-radius:12px; font-size:.85rem; margin-bottom:18px; display:flex; align-items:center; gap:8px; }
        .alert-success { background:var(--green-bg); color:var(--green); border:1px solid #a7e9cb; }
        .alert-error   { background:var(--red-bg);   color:var(--red);   border:1px solid #f5b8c4; }

        /* ── Quick Actions ── */
        .quick-actions { display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:24px; animation:fadeUp 0.45s 0.08s ease both; }
        .btn-action {
            padding:16px; border-radius:16px; border:none;
            font-family:'DM Sans',sans-serif; font-size:.92rem; font-weight:500;
            cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;
            transition:transform .15s, box-shadow .15s; text-decoration:none;
        }
        .btn-deposit  { background:linear-gradient(135deg,#2d9e6b,#38b880); color:white; box-shadow:0 4px 14px rgba(45,158,107,.25); }
        .btn-withdraw { background:linear-gradient(135deg,#c94760,#e8637a); color:white; box-shadow:0 4px 14px rgba(201,71,96,.25); }
        .btn-action:hover  { transform:translateY(-2px); box-shadow:0 6px 20px rgba(0,0,0,.14); }
        .btn-action:active { transform:translateY(0); }

        /* ── Grid ── */
        .grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:20px; }

        /* ── Card ── */
        .card { background:var(--white); border-radius:20px; padding:26px; border:1px solid var(--border); animation:fadeUp .45s ease both; }
        .card:nth-child(1) { animation-delay:.12s; }
        .card:nth-child(2) { animation-delay:.18s; }
        .card-title { font-size:.72rem; font-weight:600; text-transform:uppercase; letter-spacing:.1em; color:var(--muted); margin-bottom:18px; }

        /* ── Kontribusi ── */
        .contrib-item { display:flex; align-items:center; gap:13px; padding:13px 0; border-bottom:1px solid var(--blush); }
        .contrib-item:first-child { padding-top:0; }
        .contrib-item:last-child  { border-bottom:none; padding-bottom:0; }
        .contrib-avatar { width:42px; height:42px; border-radius:50%; background:linear-gradient(135deg,var(--rose-xl),var(--blush)); display:flex; align-items:center; justify-content:center; font-family:'Cormorant Garamond',serif; font-weight:600; font-size:1rem; color:var(--rose); flex-shrink:0; }
        .contrib-info { flex:1; min-width:0; }
        .contrib-name { font-weight:600; font-size:.92rem; color:var(--text); display:flex; align-items:center; gap:6px; }
        .badge-you    { font-size:.62rem; background:var(--blush); color:var(--rose); padding:2px 7px; border-radius:20px; font-weight:500; }
        .contrib-stats { font-size:.78rem; color:var(--muted); margin-top:3px; display:flex; gap:10px; }
        .contrib-stats .in  { color:var(--green); }
        .contrib-stats .out { color:var(--red); }
        .contrib-net { text-align:right; flex-shrink:0; }
        .contrib-net .amount { font-family:'Cormorant Garamond',serif; font-size:1.15rem; font-weight:600; color:var(--text); }
        .contrib-net .lbl   { font-size:.7rem; color:var(--muted); }

        /* ── Transaksi ── */
        .tx-item { display:flex; align-items:center; gap:13px; padding:12px 0; border-bottom:1px solid var(--blush); }
        .tx-item:first-child { padding-top:0; }
        .tx-item:last-child  { border-bottom:none; padding-bottom:0; }
        .tx-icon { width:36px; height:36px; border-radius:11px; display:flex; align-items:center; justify-content:center; font-size:.95rem; flex-shrink:0; }
        .tx-icon.deposit  { background:var(--green-bg); }
        .tx-icon.withdraw { background:var(--red-bg); }
        .tx-info { flex:1; min-width:0; }
        .tx-who  { font-size:.86rem; font-weight:500; color:var(--text); }
        .tx-note { font-size:.76rem; color:var(--muted); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
        .tx-amount { text-align:right; flex-shrink:0; }
        .tx-amount .value { font-family:'Cormorant Garamond',serif; font-size:1.05rem; font-weight:600; }
        .tx-amount .value.deposit  { color:var(--green); }
        .tx-amount .value.withdraw { color:var(--red); }
        .tx-amount .after { font-size:.7rem; color:var(--muted); }

        .empty-state { text-align:center; padding:28px 0; color:var(--muted); font-size:.85rem; }
        .empty-state .emoji { font-size:2rem; display:block; margin-bottom:8px; }

        /* ── Modal Overlay ── */
        .modal-overlay {
            position:fixed; inset:0; z-index:200;
            background:rgba(38,24,28,.45);
            backdrop-filter:blur(6px);
            display:flex; align-items:center; justify-content:center;
            padding:24px;
            opacity:0; pointer-events:none;
            transition:opacity .25s ease;
        }
        .modal-overlay.active { opacity:1; pointer-events:all; }

        .modal {
            background:var(--white); border-radius:24px;
            padding:36px 32px; width:100%; max-width:420px;
            border:1px solid var(--border);
            box-shadow:0 20px 60px rgba(38,24,28,.18);
            transform:translateY(20px) scale(.97);
            transition:transform .25s ease;
        }
        .modal-overlay.active .modal { transform:translateY(0) scale(1); }

        .modal-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:24px; }
        .modal-title  { font-family:'Cormorant Garamond',serif; font-size:1.5rem; font-weight:600; color:var(--text); display:flex; align-items:center; gap:8px; }
        .modal-close  {
            width:32px; height:32px; border-radius:50%; border:none;
            background:var(--blush); color:var(--rose); font-size:1.1rem;
            cursor:pointer; display:flex; align-items:center; justify-content:center;
            transition:background .2s;
        }
        .modal-close:hover { background:var(--rose-xl); }

        /* Saldo info di modal */
        .modal-balance-info {
            background:var(--blush); border-radius:14px;
            padding:12px 16px; margin-bottom:22px;
            font-size:.83rem; color:var(--text-s);
            display:flex; align-items:center; justify-content:space-between;
        }
        .modal-balance-info .bal { font-family:'Cormorant Garamond',serif; font-size:1.15rem; font-weight:600; color:var(--rose); }

        /* Form di modal */
        .form-group { margin-bottom:18px; }
        .form-label { display:block; font-size:.82rem; font-weight:500; color:var(--text-s); margin-bottom:7px; }

        /* Input wrapper dengan prefix Rp */
        .input-wrap { position:relative; }
        .input-prefix {
            position:absolute; left:14px; top:50%; transform:translateY(-50%);
            font-size:.88rem; color:var(--muted); font-weight:500;
            pointer-events:none;
        }
        .input-wrap input { padding-left:38px !important; }

        .form-input {
            width:100%; padding:11px 15px;
            border:1.5px solid var(--border); border-radius:12px;
            font-family:'DM Sans',sans-serif; font-size:.92rem;
            color:var(--text); background:var(--cream);
            outline:none; transition:border-color .2s, box-shadow .2s;
        }
        .form-input:focus { border-color:var(--rose-l); box-shadow:0 0 0 3px rgba(212,84,110,.1); }
        .form-input.green:focus { border-color:var(--green-l); box-shadow:0 0 0 3px rgba(45,158,107,.1); }

        /* Quick amount chips */
        .chips { display:flex; gap:8px; flex-wrap:wrap; margin-top:8px; }
        .chip {
            padding:5px 12px; border-radius:20px;
            border:1.5px solid var(--border); background:var(--cream);
            font-size:.78rem; color:var(--text-s); cursor:pointer;
            transition:all .15s; font-family:'DM Sans',sans-serif;
        }
        .chip:hover { border-color:var(--rose); color:var(--rose); background:var(--blush); }
        .chip.green:hover { border-color:var(--green); color:var(--green); background:var(--green-bg); }

        /* Buttons */
        .btn-submit {
            width:100%; padding:13px; margin-top:4px;
            border:none; border-radius:14px;
            font-family:'DM Sans',sans-serif; font-size:.95rem; font-weight:600;
            cursor:pointer; transition:transform .15s, box-shadow .15s;
        }
        .btn-submit.deposit  { background:linear-gradient(135deg,#2d9e6b,#38b880); color:white; box-shadow:0 4px 14px rgba(45,158,107,.28); }
        .btn-submit.withdraw { background:linear-gradient(135deg,#c94760,#e8637a); color:white; box-shadow:0 4px 14px rgba(201,71,96,.28); }
        .btn-submit:hover  { transform:translateY(-2px); }
        .btn-submit:active { transform:translateY(0); }

        .field-error { font-size:.77rem; color:var(--red); margin-top:5px; }
        .input-error { border-color:var(--red) !important; }

        /* Responsive */
        @media(max-width:620px) {
            .grid-2   { grid-template-columns:1fr; }
            .hero     { padding:36px 28px; }
            .hero-badge { font-size:2rem; top:20px; right:22px; }
            nav       { padding:0 18px; }
            .modal    { padding:28px 22px; }
            .quick-actions { grid-template-columns:1fr 1fr; }
        }

        @keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
        @keyframes heartbeat { 0%,100%{transform:scale(1)}14%{transform:scale(1.15)}28%{transform:scale(1)}42%{transform:scale(1.08)} }
    </style>
</head>
<body>

{{-- ─────────────── Navbar ─────────────── --}}
<nav>
    <div class="nav-brand"><span>💕</span> Nabung Bareng</div>
    <div class="nav-right">
        <span class="nav-user">Halo, <strong>{{ auth()->user()->name }}</strong></span>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Keluar</button>
        </form>
    </div>
</nav>

{{-- ─────────────── Main ─────────────── --}}
<main>

    @if (session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">⚠️ {{ session('error') }}</div>
    @endif

    {{-- Hero Saldo --}}
    <div class="hero">
        <div class="hero-badge">🐷</div>
        <div class="hero-label">Total Tabungan Bersama</div>
        <div class="hero-amount">
            <span class="hero-rp">Rp</span>{{ number_format($balance, 0, ',', '.') }}
        </div>
        <div class="hero-sub">Terakhir diperbarui {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMM YYYY, HH:mm') }}</div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="quick-actions">
        <button type="button" class="btn-action btn-deposit" onclick="openModal('deposit')">＋ &nbsp;Tambah Tabungan</button>
        <button type="button" class="btn-action btn-withdraw" onclick="openModal('withdraw')">− &nbsp;Ambil Tabungan</button>
    </div>

    <div class="grid-2">

        {{-- Kontribusi --}}
        <div class="card">
            <div class="card-title">👫 Kontribusi Masing-masing</div>
            @foreach ($contributions as $user)
                @php
                    $dep = (int)($user->total_deposit  ?? 0);
                    $wdr = (int)($user->total_withdraw ?? 0);
                    $net = $dep - $wdr;
                @endphp
                <div class="contrib-item">
                    <div class="contrib-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <div class="contrib-info">
                        <div class="contrib-name">
                            {{ $user->name }}
                            @if ($user->id === auth()->id())
                                <span class="badge-you">Kamu</span>
                            @endif
                        </div>
                        <div class="contrib-stats">
                            <span class="in">+Rp {{ number_format($dep, 0, ',', '.') }}</span>
                            <span class="out">-Rp {{ number_format($wdr, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="contrib-net">
                        <div class="amount">Rp {{ number_format($net, 0, ',', '.') }}</div>
                        <div class="lbl">net</div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Transaksi Terakhir --}}
        <div class="card">
            <div class="card-title">🕐 5 Transaksi Terakhir</div>
            @if ($recentTx->isEmpty())
                <div class="empty-state">
                    <span class="emoji">🐷</span>
                    Belum ada transaksi.<br>Yuk mulai nabung bareng!
                </div>
            @else
                @foreach ($recentTx as $tx)
                    <div class="tx-item">
                        <div class="tx-icon {{ $tx->type }}">
                            {{ $tx->type === 'deposit' ? '💚' : '❤️' }}
                        </div>
                        <div class="tx-info">
                            <div class="tx-who">{{ $tx->user->name }}</div>
                            <div class="tx-note">{{ $tx->note ?? ($tx->type === 'deposit' ? 'Nabung' : 'Ambil') }}</div>
                        </div>
                        <div class="tx-amount">
                            <div class="value {{ $tx->type }}">
                                {{ $tx->type === 'deposit' ? '+' : '−' }}Rp {{ number_format($tx->amount, 0, ',', '.') }}
                            </div>
                            <div class="after">Sisa Rp {{ number_format($tx->balance_after, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</main>

{{-- ─────────────── Modal Deposit ─────────────── --}}
<div class="modal-overlay" id="modalDeposit" onclick="closeOnOverlay(event, 'deposit')">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">💚 Tambah Tabungan</div>
            <button type="button" class="modal-close" onclick="closeModal('deposit')">✕</button>
        </div>

        <div class="modal-balance-info">
            <span>Saldo saat ini</span>
            <span class="bal">Rp {{ number_format($balance, 0, ',', '.') }}</span>
        </div>

        <form method="POST" action="{{ route('deposit') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="deposit_amount">Jumlah Nabung</label>
                <div class="input-wrap">
                    <span class="input-prefix">Rp</span>
                    <input
                        type="number"
                        id="deposit_amount"
                        name="amount"
                        class="form-input green"
                        placeholder="0"
                        min="1000"
                        step="1000"
                        value="{{ old('amount') }}"
                        oninput="formatPreview(this, 'deposit_preview')"
                    >
                </div>
                <div class="chips" id="deposit_chips">
                    <span class="chip green" onclick="setAmount('deposit_amount', 5000,  'deposit_preview')">5rb</span>
                    <span class="chip green" onclick="setAmount('deposit_amount', 10000, 'deposit_preview')">10rb</span>
                    <span class="chip green" onclick="setAmount('deposit_amount', 20000, 'deposit_preview')">20rb</span>
                    <span class="chip green" onclick="setAmount('deposit_amount', 50000, 'deposit_preview')">50rb</span>
                    <span class="chip green" onclick="setAmount('deposit_amount', 100000,'deposit_preview')">100rb</span>
                    <span class="chip green" onclick="setAmount('deposit_amount', 200000,'deposit_preview')">200rb</span>
                </div>
                <div id="deposit_preview" style="font-size:.78rem;color:var(--green);margin-top:6px;font-weight:500;min-height:18px;"></div>
            </div>

            <div class="form-group">
                <label class="form-label" for="deposit_note">Catatan <span style="color:var(--muted);font-weight:400;">(opsional)</span></label>
                <input
                    type="text"
                    id="deposit_note"
                    name="note"
                    class="form-input green"
                    placeholder="Misal: Uang jajan bulan ini 🐷"
                    maxlength="100"
                    value="{{ old('note') }}"
                >
            </div>

            <button type="submit" class="btn-submit deposit">Tambah Tabungan 💚</button>
        </form>
    </div>
</div>

{{-- ─────────────── Modal Withdraw ─────────────── --}}
<div class="modal-overlay" id="modalWithdraw" onclick="closeOnOverlay(event, 'withdraw')">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">❤️ Ambil Tabungan</div>
            <button type="button" class="modal-close" onclick="closeModal('withdraw')">✕</button>
        </div>

        <div class="modal-balance-info">
            <span>Saldo tersedia</span>
            <span class="bal">Rp {{ number_format($balance, 0, ',', '.') }}</span>
        </div>

        <form method="POST" action="{{ route('withdraw') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="withdraw_amount">Jumlah Diambil</label>
                <div class="input-wrap">
                    <span class="input-prefix">Rp</span>
                    <input
                        type="number"
                        id="withdraw_amount"
                        name="amount"
                        class="form-input"
                        placeholder="0"
                        min="1000"
                        step="1000"
                        value="{{ old('amount') }}"
                        oninput="formatPreview(this, 'withdraw_preview')"
                    >
                </div>
                <div class="chips">
                    <span class="chip" onclick="setAmount('withdraw_amount', 5000,  'withdraw_preview')">5rb</span>
                    <span class="chip" onclick="setAmount('withdraw_amount', 10000, 'withdraw_preview')">10rb</span>
                    <span class="chip" onclick="setAmount('withdraw_amount', 20000, 'withdraw_preview')">20rb</span>
                    <span class="chip" onclick="setAmount('withdraw_amount', 50000, 'withdraw_preview')">50rb</span>
                    <span class="chip" onclick="setAmount('withdraw_amount', 100000,'withdraw_preview')">100rb</span>
                    <span class="chip" onclick="setAmountAll('withdraw_amount', {{ $balance }}, 'withdraw_preview')">Semua</span>
                </div>
                <div id="withdraw_preview" style="font-size:.78rem;color:var(--red);margin-top:6px;font-weight:500;min-height:18px;"></div>
            </div>

            <div class="form-group">
                <label class="form-label" for="withdraw_note">Catatan <span style="color:var(--muted);font-weight:400;">(opsional)</span></label>
                <input
                    type="text"
                    id="withdraw_note"
                    name="note"
                    class="form-input"
                    placeholder="Misal: Beli hadiah ulang tahun 🎁"
                    maxlength="100"
                    value="{{ old('note') }}"
                >
            </div>

            <button type="submit" class="btn-submit withdraw">Ambil Tabungan ❤️</button>
        </form>
    </div>
</div>

<script>
    // ── Modal open/close ──
    function openModal(type) {
        const id = type === 'deposit' ? 'modalDeposit' : 'modalWithdraw';
        document.getElementById(id).classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeModal(type) {
        const id = type === 'deposit' ? 'modalDeposit' : 'modalWithdraw';
        document.getElementById(id).classList.remove('active');
        document.body.style.overflow = '';
    }
    function closeOnOverlay(e, type) {
        const id = type === 'deposit' ? 'modalDeposit' : 'modalWithdraw';
        if (e.target === document.getElementById(id)) closeModal(type);
    }
    // ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('deposit');
            closeModal('withdraw');
        }
    });

    // ── Chip helpers ──
    function setAmount(inputId, val, previewId) {
        const inp = document.getElementById(inputId);
        inp.value = val;
        formatPreview(inp, previewId);
    }
    function setAmountAll(inputId, val, previewId) {
        setAmount(inputId, val, previewId);
    }

    // ── Preview format Rupiah ──
    function formatPreview(input, previewId) {
        const val = parseInt(input.value);
        const el  = document.getElementById(previewId);
        if (!isNaN(val) && val > 0) {
            el.textContent = 'Rp ' + val.toLocaleString('id-ID');
        } else {
            el.textContent = '';
        }
    }

    // ── Auto-open modal kalau ada validation error (old input) ──
    @if (old('amount') && session()->has('errors'))
        // tidak bisa tahu modal mana yang error, buka berdasarkan route terakhir
        // tapi karena kita redirect ke dashboard, skip dulu
    @endif
</script>

</body>
</html>