<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'th' ? 'th' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('transactions_page.page_title') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f4f6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* â”€â”€â”€ HEADER â”€â”€â”€ */
        header {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: #fff; padding: 10px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        }
        .header-pill {
            display: flex; align-items: center; justify-content: space-between;
            max-width: 1450px; margin: 0 auto;
        }
        .header-left { display: flex; align-items: center; gap: 16px; }
        .logo img { height: 38px; }
        .cat-dropdown {
            display: flex; align-items: center; gap: 8px; background: #f1f5f9;
            padding: 9px 16px; border-radius: 25px; font-size: 13.5px; font-weight: 500;
            color: #475569; border: 1px solid #e2e8f0; cursor: pointer;
        }
        .search-wrap { position: relative; width: 260px; }
        .search-wrap input {
            width: 100%; height: 40px; background: #f1f5f9; border: none; border-radius: 25px;
             padding: 0 15px 0 50px; font-size: 13.5px; outline: none;
        }
        .search-wrap svg { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .header-right { display: flex; align-items: center; gap: 14px; }
        .h-icon-btn {
            width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;
            color: #64748b; text-decoration: none; position: relative;
        }
        .notif-badge {
            position: absolute; top: 4px; right: 4px; background: #f97316; color: #fff;
            font-size: 9px; font-weight: 800; width: 15px; height: 15px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; border: 2px solid #fff;
        }
        .profile-pill {
            display: flex; align-items: center; gap: 10px; padding: 5px 14px 5px 5px;
            border-radius: 35px; background: #f8fafc; border: 1px solid #e2e8f0;
            color: #1e293b; font-weight: 600; font-size: 13.5px; text-decoration: none;
        }
        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        /* â”€â”€â”€ LAYOUT â”€â”€â”€ */
        .shell {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 25px;
            max-width: 1450px;
            margin: 0 auto;
            padding: 90px 30px 50px;
            flex: 1;
            width: 100%;
        }

        /* â”€â”€â”€ SIDEBAR â”€â”€â”€ */
        .sidebar {
            background: #fff;
            border-radius: 20px;
            padding: 20px 10px 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            position: sticky;
            top: 80px;
            align-self: start;
        }
        .nav-item {
            display: flex; align-items: center; gap: 14px; padding: 12px 18px;
            border-radius: 12px; text-decoration: none; color: #64748b;
            font-size: 14px; font-weight: 500; margin-bottom: 2px; transition: 0.2s;
        }
        .nav-item:hover { background: #f1f5f9; color: #0f172a; }
        .nav-item.active { background: #f1f5f9; color: #003a70; font-weight: 700; }
        .nav-item img { width: 22px; height: 22px; opacity: 0.7; }
        .nav-item.active img { opacity: 1; }

        /* â”€â”€â”€ MAIN CONTENT â”€â”€â”€ */
        .content { display: flex; flex-direction: column; gap: 20px; }

        .page-title {
            font-size: 18px; font-weight: 700; color: #1a202c;
        }

        /* â”€â”€â”€ TABS â”€â”€â”€ */
        .tabs-wrap {
            background: #fff;
            border-radius: 16px;
            padding: 6px;
            display: flex;
            gap: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .tab-btn {
            flex: 1; padding: 10px 20px; border: none; border-radius: 12px;
            font-size: 14px; font-weight: 500; cursor: pointer; background: transparent;
            color: #64748b; transition: 0.2s; font-family: 'Inter', sans-serif;
        }
        .tab-btn.active {
            background: #fff; color: #1e293b; font-weight: 700;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* â”€â”€â”€ TABLE â”€â”€â”€ */
        .table-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: #f8fafc;
            border-bottom: 1px solid #f1f5f9;
        }

        thead th {
            padding: 14px 20px;
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #f8fafc;
            transition: background 0.15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #fafbfc; }

        tbody td {
            padding: 16px 20px;
            font-size: 13.5px;
            color: #1e293b;
            vertical-align: middle;
        }

        .txn-id {
            font-size: 12px;
            color: #64748b;
            font-family: monospace;
            letter-spacing: 0.5px;
        }

        .invoice-cell { display: flex; align-items: center; gap: 12px; }
        .invoice-avatar {
            width: 34px; height: 34px; border-radius: 50%; background: #e2e8f0;
            flex-shrink: 0;
        }
        .invoice-name { font-size: 13.5px; font-weight: 700; color: #1e293b; line-height: 1.2; }
        .invoice-sub { font-size: 11.5px; color: #94a3b8; margin-top: 1px; }

        .stripe-link { color: #6366f1; font-weight: 500; text-decoration: none; font-size: 13.5px; }
        .stripe-link:hover { text-decoration: underline; }

        .date-cell { color: #475569; font-size: 13px; }

        .amount-cell { font-size: 14px; font-weight: 700; color: #1e293b; }

        .status-cell { display: flex; align-items: center; gap: 12px; }

        .badge {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 4px 14px; border-radius: 20px; font-size: 12px; font-weight: 600;
            min-width: 68px;
        }
        .badge-paid { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        .badge-unpaid { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

        .btn-download {
            padding: 7px 16px; border-radius: 8px; font-size: 12.5px; font-weight: 600;
            cursor: pointer; border: none; font-family: 'Inter', sans-serif; transition: 0.2s;
        }
        .btn-download.active { background: #003a70; color: #fff; }
        .btn-download.active:hover { background: #002a55; }
        .btn-download.inactive { background: #e2e8f0; color: #94a3b8; cursor: not-allowed; }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'transaction'])

        <!-- Main Content -->
        <main class="content">
            <h2 class="page-title">{{ __('transactions_page.heading') }}</h2>

            <!-- Tabs -->
            <div class="tabs-wrap">
                <button type="button" class="tab-btn active" onclick="switchTab(this, 'transactions')">{{ __('transactions_page.tab_transactions') }}</button>
                <a href="{{ route('refund') }}" class="tab-btn" style="text-decoration:none; text-align:center;">{{ __('transactions_page.tab_refunds') }}</a>
            </div>

            <!-- Table -->
            <div class="table-card" id="transactions">
                <table>
                    <thead>
                        <tr>
                            <th>{{ __('transactions_page.th_txn_id') }}</th>
                            <th>{{ __('transactions_page.th_invoice') }}</th>
                            <th>{{ __('transactions_page.th_payment_method') }}</th>
                            <th>{{ __('transactions_page.th_details') }}</th>
                            <th>{{ __('transactions_page.th_amount') }}</th>
                            <th>{{ __('transactions_page.th_status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="txn-id">Txn980723</span></td>
                            <td>
                                <div class="invoice-cell">
                                    <div class="invoice-avatar"></div>
                                    <div>
                                        <div class="invoice-name">{{ __('transactions_page.teacher_1') }}</div>
                                        <div class="invoice-sub">{{ __('transactions_page.course_1') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="stripe-link">Stripe</a></td>
                            <td><span class="date-cell">{{ __('transactions_page.date_1') }}</span></td>
                            <td><span class="amount-cell">$9.99</span></td>
                            <td>
                                <div class="status-cell">
                                    <span class="badge badge-paid">{{ __('transactions_page.paid') }}</span>
                                    <button type="button" class="btn-download active">{{ __('transactions_page.download') }}</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="txn-id">Txn980724</span></td>
                            <td>
                                <div class="invoice-cell">
                                    <div class="invoice-avatar"></div>
                                    <div>
                                        <div class="invoice-name">{{ __('transactions_page.teacher_2') }}</div>
                                        <div class="invoice-sub">{{ __('transactions_page.course_2') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="stripe-link">Stripe</a></td>
                            <td><span class="date-cell">{{ __('transactions_page.date_2') }}</span></td>
                            <td><span class="amount-cell">$10.00</span></td>
                            <td>
                                <div class="status-cell">
                                    <span class="badge badge-unpaid">{{ __('transactions_page.unpaid') }}</span>
                                    <button type="button" class="btn-download inactive" disabled>{{ __('transactions_page.download') }}</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="txn-id">Txn980725</span></td>
                            <td>
                                <div class="invoice-cell">
                                    <div class="invoice-avatar"></div>
                                    <div>
                                        <div class="invoice-name">{{ __('transactions_page.teacher_3') }}</div>
                                        <div class="invoice-sub">{{ __('transactions_page.course_3') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="#" class="stripe-link">Stripe</a></td>
                            <td><span class="date-cell">{{ __('transactions_page.date_3') }}</span></td>
                            <td><span class="amount-cell">$9.99</span></td>
                            <td>
                                <div class="status-cell">
                                    <span class="badge badge-paid">{{ __('transactions_page.paid') }}</span>
                                    <button type="button" class="btn-download active">{{ __('transactions_page.download') }}</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Refunds tab content (hidden by default) -->
            <div class="table-card" id="refunds" style="display:none; padding: 40px; text-align: center; color: #94a3b8; font-size: 14px;">
                {{ __('transactions_page.no_refunds') }}
            </div>
        </main>
    </div>

    <script>
        function switchTab(btn, tabId) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('transactions').style.display = tabId === 'transactions' ? 'block' : 'none';
            document.getElementById('refunds').style.display = tabId === 'refunds' ? 'block' : 'none';
        }
    </script>
</body>
</html>
