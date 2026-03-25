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
        /* --- PAGE-SPECIFIC COMPONENTS --- */
        .page-title {
            font-size: 20px; font-weight: 800; color: #1a202c; margin-bottom: 24px;
        }

        .table-card {
            background: #ffffff; border-radius: 24px; padding: 40px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.02); min-height: 500px;
        }

        /* --- TABS --- */
        .tabs-wrap {
            background: #f1f5f9; border-radius: 14px; padding: 6px;
            display: flex; gap: 5px; margin-bottom: 30px;
        }
        .tab-btn {
            flex: 1; padding: 12px; text-align: center; border: none; border-radius: 10px;
            font-size: 13.5px; font-weight: 600; color: #475569; cursor: pointer;
            background: transparent; transition: 0.2s; font-family: 'Inter', sans-serif;
        }
        .tab-btn.active {
            background: #ffffff; color: #1e293b; box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* --- TABLE --- */
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #cbd5e1; }
        thead th { padding: 14px 20px; font-size: 13px; font-weight: 700; color: #475569; text-align: left; }
        tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.15s; }
        tbody td { padding: 20px; font-size: 14px; color: #1e293b; font-weight: 700; vertical-align: middle; }

        .invoice-cell { display: flex; align-items: center; gap: 12px; }
        .invoice-avatar { width: 38px; height: 38px; border-radius: 50%; background: #e2e8f0; flex-shrink: 0; }
        .invoice-name { font-size: 14px; font-weight: 800; color: #1e293b; }
        .invoice-sub { font-size: 12px; color: #94a3b8; font-weight: 500; }

        .stripe-link { color: #6366f1; font-weight: 700; text-decoration: none; }
        .status-cell { display: flex; align-items: center; gap: 15px; }

        .badge {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 6px 16px; border-radius: 20px; font-size: 11px; font-weight: 800; min-width: 70px;
        }
        .badge-paid { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        .badge-unpaid { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

        .btn-download {
            padding: 8px 18px; border-radius: 20px; font-size: 11px; font-weight: 700;
            cursor: pointer; border: none; font-family: 'Inter', sans-serif; transition: 0.2s;
        }
        .btn-download.active { background: #003a70; color: #fff; }
        .btn-download.inactive { background: #e2e8f0; color: #94a3b8; cursor: not-allowed; }

        @media (max-width: 1024px) {
            .shared-shell { grid-template-columns: 1fr; padding: 0 16px 24px !important; }
            .shared-sidebar { display: block !important; }
            .shared-content { 
                margin-top: 75px !important; 
                gap: 0 !important; 
                width: 100%;
            }
            .page-title { margin-bottom: 10px !important; }
            .table-card { padding: 20px 15px; border-radius: 20px; }
            .table-wrap { overflow-x: auto; width: 100%; -webkit-overflow-scrolling: touch; }
            table { min-width: 600px; } /* Ensure table doesn't get too squished */
            footer { flex-direction: column !important; padding: 40px 24px !important; }
        }

        @media (max-width: 768px) {
            .tabs-wrap { overflow-x: auto; white-space: nowrap; padding-bottom: 2px; }
            .tab-btn { flex: 0 0 auto; padding: 10px 20px; }
            tbody td { padding: 15px; }
        }
        /* Footer removed */
    </style>
</head>
<body>
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'transaction', 'type' => 'dashboard'])

        <!-- Main Content -->
        <main class="shared-content">
            <h1 class="page-title">{{ __('transactions_page.heading') }}</h1>

            <div class="table-card">
                <!-- Tabs -->
                <div class="tabs-wrap">
                    <button type="button" class="tab-btn active" onclick="switchTab(this, 'transactions')">{{ __('transactions_page.tab_transactions') }}</button>
                    <a href="{{ route('refund') }}" class="tab-btn" style="text-decoration:none; text-align:center;">{{ __('transactions_page.tab_refunds') }}</a>
                </div>

                <!-- Table Content -->
                <div id="transactions">
                    <div class="table-wrap">
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
                </div>

                <!-- Refunds tab content (hidden by default) -->
                <div id="refunds" style="display:none; padding: 60px; text-align: center; color: #94a3b8; font-size: 15px; font-weight: 600;">
                    {{ __('transactions_page.no_refunds') }}
                </div>
            </div>
        </main>
        @include('partials.footer-dashboard')
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
