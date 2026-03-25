<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method | IL2 RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* Sidebar & Header are handled by layout.css */

        /* --- CARDS & TYPOGRAPHY --- */
        .page-title {
            font-size: 20px; font-weight: 800; color: #1a202c; 
            margin: 10px 0 24px 10px;
        }

        .section-title {
            font-size: 16px; font-weight: 800; color: #1e293b; margin-bottom: 15px;
        }

        .content-row {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .pm-card, .bs-card {
            background: #ffffff; border-radius: 24px; padding: 40px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.02);
            display: flex; flex-direction: column; gap: 20px;
        }

        .pm-option {
            display: flex; align-items: center; gap: 16px; padding: 18px 24px;
            border: 2px solid #f1f5f9; border-radius: 16px; cursor: pointer; transition: 0.2s;
        }
        .pm-option:hover { border-color: #cbd5e1; background: #f8fafc; }
        .pm-option.active { border-color: #003a70; background: #f8fafc; }
        .pm-option img { height: 32px; width: 60px; object-fit: contain; }
        .pm-option span { font-size: 15px; font-weight: 700; color: #1e293b; }

        .btn-group { display: flex; gap: 15px; margin-top: 10px; }
        .btn-back {
            padding: 12px 30px; border-radius: 12px; border: none; background: #f1f5f9;
            color: #64748b; font-weight: 700; cursor: pointer; transition: 0.2s;
        }
        .btn-confirm {
            padding: 12px 30px; border-radius: 12px; border: none; background: #003a70;
            color: #ffffff; font-weight: 700; cursor: pointer; transition: 0.2s;
            box-shadow: 0 4px 12px rgba(0,58,112,0.2);
        }
        .btn-confirm:hover { background: #002a55; transform: translateY(-2px); }
        .btn-back:hover { background: #e2e8f0; }

        /* â”€â”€â”€ BASKET SUMMARY â”€â”€â”€ */
        .bs-items {
            border: 1px solid #f1f5f9; border-radius: 16px; padding: 0; overflow: hidden;
        }
        .bs-item {
            display: flex; align-items: center; justify-content: space-between;
            padding: 24px; border-bottom: 1px solid #f1f5f9;
        }
        .bs-item:last-child { border-bottom: none; }
        .bs-item-left { display: flex; align-items: center; gap: 16px; }
        .bs-thumb { width: 50px; height: 50px; background: #f1f5f9; border-radius: 12px; }
        .bs-name { font-size: 15px; font-weight: 700; color: #1e293b; }
        .bs-price { font-size: 15px; font-weight: 800; color: #003a70; }

        .bs-total {
            background: #f8fafc; padding: 24px; display: flex; align-items: center; justify-content: space-between;
            border-top: 1px solid #f1f5f9; border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;
        }
        .bs-total span:first-child { font-size: 16px; font-weight: 800; color: #1e293b; }
        .bs-total span:last-child { font-size: 18px; font-weight: 900; color: #003a70; }

        .btn-metamask {
            align-self: flex-end; margin-top: 20px;
            padding: 10px 20px; border-radius: 8px; border: none; background: #003a70;
            color: #fff; font-weight: 700; font-size: 13px; cursor: pointer;
        }

        /* --- MODAL --- */
        .modal-overlay {
            position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000;
            display: none; align-items: center; justify-content: center;
        }
        .modal-card {
            background: #e5e7eb; border-radius: 20px; width: 440px; padding: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1); position: relative;
        }
        .modal-close {
            position: absolute; right: 20px; top: 20px; cursor: pointer; color: #64748b;
        }
        .modal-title { text-align: center; font-size: 16px; font-weight: 700; color: #1e293b; }
        .modal-sub { text-align: center; font-size: 13px; color: #64748b; margin: 5px 0 20px; }
        
        .m-form { display: flex; flex-direction: column; gap: 12px; }
        .m-input-wrap { background: #fff; border-radius: 10px; display: flex; align-items: center; padding: 0 14px; height: 46px; border: 1px solid transparent; }
        .m-input-wrap:focus-within { border-color: #003a70; }
        .m-input-wrap svg { color: #94a3b8; flex-shrink: 0; }
        .m-input-wrap input { border: none; background: transparent; width: 100%; height: 100%; padding-left: 10px; outline: none; font-size: 14px; }
        
        .m-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

        .m-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 20px; }
        .btn-m-pay {
            background: #003a70; color: #fff; border: none; border-radius: 25px; height: 44px;
            font-weight: 700; cursor: pointer;
        }
        .btn-m-cancel {
            background: #d1d5db; color: #475569; border: none; border-radius: 25px; height: 44px;
            font-weight: 700; cursor: pointer;
        }

        @media (max-width: 1024px) {
            .content-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .shared-shell {
                padding: 80px 15px 30px;
            }
            .pm-card, .bs-card {
                padding: 20px 15px;
                border-radius: 16px;
            }
            .pm-option {
                padding: 12px;
                font-size: 14px;
            }
            .btn-group {
                flex-direction: column;
            }
            .btn-back, .btn-confirm {
                width: 100%;
                text-align: center;
            }
            .modal-card {
                width: 90%;
                padding: 20px 15px;
            }
            .m-btns, .m-grid {
                grid-template-columns: 1fr;
            }
            .bs-thumb {
                width: 40px; height: 40px;
            }
            .bs-name, .bs-price {
                font-size: 13px;
            }
        }
        /* Footer Card Styling */
        .footer {
            background: #ffffff;
            padding: 40px 50px;
            border-radius: 40px;
            margin: 20px 0 20px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.03);
            border: none;
            grid-column: 1 / span 2;
        }

        .footer-inner {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
        }
        
        .footer-logo-section { flex: 1.2; }
        .logo-circle {
            width: 60px; height: 60px; background: #f8fafc; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        }
        .logo-circle img { height: 35px; }
        .footer-tagline { font-size: 13.5px; color: #64748b; line-height: 1.5; font-weight: 500; }

        .footer-links-container { flex: 2; display: flex; justify-content: center; gap: 80px; }
        .footer-col { display: flex; flex-direction: column; gap: 15px; }
        .footer-col a { font-size: 14px; color: #475569; text-decoration: none; font-weight: 500; transition: 0.2s; }
        .footer-col a:hover { color: #003a70; }

        .footer-right { flex: 1.2; display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
        .footer-lang {
            padding: 8px 16px; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 13px;
            color: #475569; min-width: 140px; appearance: none; background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='3'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 15px center; cursor: pointer;
        }

        .social-icons { display: flex; gap: 12px; }
        .social-icons a { width: 34px; height: 34px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: 0.2s; }
        .social-icons a:hover { background: #e2e8f0; transform: translateY(-2px); }
        .social-icons a img { width: 16px; height: 16px; }

        .app-badges { display: flex; gap: 10px; margin-top: 5px; }
        .app-badges img { height: 36px; border-radius: 6px; }

        @media (max-width: 1024px) {
            .footer { grid-column: 1; }
            .footer-inner { flex-direction: column; text-align: center; align-items: center; }
            .footer-links-container { justify-content: center; width: 100%; gap: 40px; }
            .footer-right { align-items: center; }
            .logo-circle { margin: 0 auto 20px; }
        }

        @media (max-width: 768px) {
            .footer { padding: 30px 20px; border-radius: 24px; }
            .footer-links-container { flex-direction: column; gap: 20px; }
            .footer-col { gap: 10px; }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'payment', 'type' => 'dashboard'])

        <!-- Main Content -->
        <main class="shared-content">
            <h1 class="page-title">Payment Detail</h1>
            <div class="content-row">
                <!-- Left: Payment Methods -->
                <div>
                    <h3 class="section-title">Payment Methods</h3>
                    <div class="pm-card">
                        <div class="pm-option active" onclick="selectPM(this)">
                            <img src="{{ asset('images/icons/logos_stripe.png') }}" alt="Stripe">
                            <span>Stripe</span>
                        </div>
                        <div class="pm-option" onclick="selectPM(this)">
                            <img src="{{ asset('images/icons/logos_paypal (1).png') }}" alt="Paypal">
                            <span>Paypal</span>
                        </div>

                        <div class="btn-group">
                            <button class="btn-back">Back</button>
                            <button class="btn-confirm" onclick="openModal()">Confirm Payment</button>
                        </div>
                    </div>
                </div>

                <!-- Right: Basket Summary -->
                <div>
                    <h3 class="section-title">Basket Summary</h3>
                    <div class="bs-card">
                        <div class="bs-items">
                            <div class="bs-item">
                                <div class="bs-item-left">
                                    <div class="bs-thumb"></div>
                                    <span class="bs-name">Veterinary Nursing Assistant Course</span>
                                </div>
                                <span class="bs-price">Free</span>
                            </div>
                            <div class="bs-item">
                                <div class="bs-item-left">
                                    <div class="bs-thumb"></div>
                                    <span class="bs-name">Rajamangala Identity Course</span>
                                </div>
                                <span class="bs-price">Free</span>
                            </div>
                            <div class="bs-total">
                                <span>Total</span>
                                <span>$0</span>
                            </div>
                        </div>

                        <button class="btn-metamask">Add Metamask</button>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            @include('partials.footer-dashboard')
        </main>
    </div>

    <!-- MODAL -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-card">
            <div class="modal-close" onclick="closeModal()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </div>
            <h4 class="modal-title">TutorX</h4>
            <p class="modal-sub">Make payment with Stripe</p>

            <div class="m-form">
                <div class="m-input-wrap">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <input type="email" placeholder="Email">
                </div>
                <div class="m-input-wrap">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    <input type="text" placeholder="Card Number">
                </div>
                <div class="m-grid">
                    <div class="m-input-wrap">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <input type="text" placeholder="MM/YY">
                    </div>
                    <div class="m-input-wrap">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <input type="text" placeholder="CVC">
                    </div>
                </div>

                <div class="m-btns">
                    <button class="btn-m-pay" onclick="window.location.href='{{ route('transaction') }}'">Pay $11.98</button>
                    <button class="btn-m-cancel" onclick="closeModal()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectPM(el) {
            document.querySelectorAll('.pm-option').forEach(opt => opt.classList.remove('active'));
            el.classList.add('active');
        }

        function openModal() {
            document.getElementById('modalOverlay').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modalOverlay').style.display = 'none';
        }
    </script>
</body>
</html>
