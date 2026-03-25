<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist | IL² RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        /* --- PAGE-SPECIFIC COMPONENTS --- */
        .plans-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }

        .plan-card-item {
            width: 100%;
            border-radius: 20px;
            padding: 24px;
            box-sizing: border-box;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            gap: 24px;
            font-family: 'Inter', sans-serif;
            color: #1e293b;
        }

        .other-plans-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        @media (max-width: 1024px) {
            .plans-grid, .other-plans-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .plans-grid, .other-plans-grid {
                grid-template-columns: 1fr;
            }
            .tab-pane {
                padding: 15px !important;
            }
        }

        /* --- MAIN CARD & TABS --- */
        .main-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px 15px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.02);
            min-height: 800px;
        }

        .page-title {
            font-size: 18px;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 5px;
            padding-left: 10px;
        }

        .tabs-container {
            background: #f1f5f9;
            border-radius: 14px;
            padding: 6px;
            display: flex;
            gap: 5px;
            margin-bottom: 30px;
        }

        .tab-btn {
            flex: 1;
            padding: 12px;
            text-align: center;
            font-size: 13.5px;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            border-radius: 10px;
            transition: 0.2s;
        }

        .tab-btn.active {
            background: #ffffff;
            color: #1e293b;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* --- TRANSACTION TABLE --- */
        .txn-table {
            width: 100%;
            border-collapse: collapse;
        }

        .txn-table thead tr {
            background: #cbd5e1;
        }

        .txn-table th {
            padding: 12px 20px;
            text-align: left;
            font-size: 13px;
            font-weight: 700;
            color: #475569;
        }

        .txn-table td {
            padding: 18px 20px;
            font-size: 13.5px;
            color: #1e293b;
            font-weight: 700;
            border-bottom: 1px solid #f1f5f9;
        }

        .btn-download {
            padding: 8px 18px;
            border-radius: 20px;
            background: #003a70;
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            text-transform: capitalize;
        }

        .btn-download.disabled {
            background: #e2e8f0;
            color: #94a3b8;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .main-card { padding: 25px 15px; border-radius: 20px; }
            .tabs-container { overflow-x: auto; white-space: nowrap; padding-bottom: 2px; }
            .tab-btn { flex: 0 0 auto; padding: 10px 20px; }
            .responsive-table { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; margin-bottom: 20px; }
            .txn-table { min-width: 600px; }
        }

        @media (max-width: 480px) {
            .other-plan-card { flex-direction: column; align-items: stretch !important; text-align: center; gap: 15px !important; }
            .other-plan-card > div:first-child { margin: 0 auto; }
            .other-plan-card .buy-btn { width: 100%; justify-content: center; padding: 12px 20px !important; }
            .plans-grid { margin-bottom: 30px; }
            .plan-price-wrapper { justify-content: center; }
        }
        /* Make footer act as a boxed section matching main content */
        .shared-footer-old {
            background: #ffffff !important;
            border-radius: 24px !important;
            box-shadow: 0 4px 25px rgba(0,0,0,0.02) !important;
            padding: 20px 40px !important; /* Shorter vertically */
            margin-top: 20px !important;
            border-top: none !important;
            max-width: 100% !important; /* Shorter width constraint */
            box-sizing: border-box !important;
        }
    </style>
</head>
<body>

    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'wishlist', 'type' => 'billing'])

        <!-- Main Content -->
        <main class="shared-content">
            <h1 class="page-title">Billing</h1>

            <div class="main-card">
                <div class="tabs-container">
                    <div class="tab-btn active" onclick="switchTab(this, 'earnings')">Earnings</div>
                    <div class="tab-btn" onclick="switchTab(this, 'plans')">Plans</div>
                    <div class="tab-btn" onclick="switchTab(this, 'transactions')">Transaction History</div>
                    <div class="tab-btn" onclick="switchTab(this, 'account')">My Account</div>
                </div>

                <!-- Earnings Pane -->
                <div id="earnings-pane" class="tab-pane active">
                    <div class="responsive-table">
                        <table class="txn-table">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course Price</th>
                                    <th>Total Course Earnings</th>
                                    <th>Subscriber Counts</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maths</td>
                                    <td>$9.99</td>
                                    <td>$9.99</td>
                                    <td>0</td>
                                    <td align="left">
                                        <div style="display: flex; gap: 4px; color: #facc15; align-items: center;">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="6" height="6" style="color: #94a3b8; margin: 0 2px;" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                            <svg width="6" height="6" style="color: #94a3b8; margin: 0 2px;" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creative</td>
                                    <td>$10.00</td>
                                    <td>$10.00</td>
                                    <td>0</td>
                                    <td align="left">
                                        <div style="display: flex; gap: 4px; color: #facc15; align-items: center;">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="6" height="6" style="color: #94a3b8; margin: 0 2px;" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                            <svg width="6" height="6" style="color: #94a3b8; margin: 0 2px;" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                            <svg width="6" height="6" style="color: #94a3b8; margin: 0 2px;" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Arts</td>
                                    <td>$9.99</td>
                                    <td>$9.99</td>
                                    <td>1</td>
                                    <td align="left">
                                        <div style="display: flex; gap: 4px; color: #facc15; align-items: center;">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                            <svg width="6" height="6" style="color: #94a3b8; margin: 0 2px;" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                            <svg width="6" height="6" style="color: #94a3b8; margin: 0 2px;" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Transaction History Pane -->
                <div id="transactions-pane" class="tab-pane" style="display:none;">
                    <div class="responsive-table">
                        <table class="txn-table">
                            <thead>
                                <tr>
                                    <th>Billing Date</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>June 22, 2023</td>
                                    <td>Received</td>
                                    <td>$9.99</td>
                                    <td>Johny</td>
                                    <td align="right"><button class="btn-download">Download</button></td>
                                </tr>
                                <tr>
                                    <td>July 22, 2023</td>
                                    <td>Paid</td>
                                    <td>$10.00</td>
                                    <td>Bigger Class</td>
                                    <td align="right"><button class="btn-download disabled">Download</button></td>
                                </tr>
                                <tr>
                                    <td>August 22, 2023</td>
                                    <td>Paid</td>
                                    <td>$9.99</td>
                                    <td>Breakout Room</td>
                                    <td align="right"><button class="btn-download">Download</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- My Account Pane -->
                <div id="account-pane" class="tab-pane" style="display:none;">
                    <div class="account-detail-header" style="display: flex; align-items: center; gap: 15px; margin-bottom: 40px; padding-left: 10px;">
                        <h3 style="font-size: 16px; font-weight: 800; margin: 0;">Account Detail</h3>
                        <img src="{{ asset('images/icons/Group 147.png') }}" alt="Edit" style="width: 20px; height: 20px; cursor: pointer;" onclick="switchTab(null, 'payment')">
                    </div>

                    <div class="detail-rows" style="display: flex; flex-direction: column; gap: 20px; padding-left: 10px;">
                        <!-- ... rows ... -->
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">Name</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">Jhonny</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">Email</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">jhon@gmail.com</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">Recovery Email</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">Jhon34@gmail.com</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">Phone Number</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">012 3456 7890</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">Address</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">21, Jalan Old Klang Road</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">City</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">Cheras</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">State</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">Kuala Lumpur</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">Zip Code</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">55100</span>
                        </div>
                        <div class="detail-row" style="display: flex; width: 100%; max-width: 500px;">
                            <span style="width: 180px; font-size: 13px; color: #64748b; font-weight: 500;">Country</span>
                            <span style="font-size: 13.5px; font-weight: 800; color: #1e293b;">Malaysia</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Method Pane -->
                <div id="payment-pane" class="tab-pane" style="display:none; padding-left: 10px;">
                    <h3 style="font-size: 16px; font-weight: 800; margin-bottom: 25px;">Payment Method</h3>
                    
                    <div style="display: flex; gap: 20px; margin-bottom: 50px;">
                        <div style="width: 110px; height: 110px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                            <img src="{{ asset('images/icons/paypal.png') }}" alt="PayPal" style="width: 60px; object-fit: contain;">
                        </div>
                        <div style="width: 110px; height: 110px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                            <img src="{{ asset('images/icons/visa.png') }}" alt="Visa" style="width: 50px; object-fit: contain;">
                        </div>
                        <div style="width: 110px; height: 110px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                            <img src="{{ asset('images/icons/apple-pay.png') }}" alt="Apple Pay" style="width: 55px; object-fit: contain;">
                        </div>
                    </div>

                    <h3 style="font-size: 16px; font-weight: 800; margin-bottom: 15px;">Currency</h3>
                    <div style="width: 100%; max-width: 450px; position: relative;">
                        <select style="width: 100%; height: 44px; background: #f1f5f9; border: none; border-radius: 10px; padding: 0 15px; font-size: 13px; color: #64748b; font-weight: 500; appearance: none;">
                            <option>Select Currency</option>
                        </select>
                        <div style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #64748b;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m7 10 5 5 5-5"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Plans Pane -->
                <div id="plans-pane" class="tab-pane" style="display:none;">
                    <h3 style="font-size: 16px; font-weight: 800; margin-bottom: 25px;">Current Plans</h3>
                    
                    <div class="plans-grid">
                        <!-- Bigger Class Card -->
                        <div class="plan-card-item" style="background: linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);">
                            <!-- Top Section -->
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h4 style="font-size: 16px; font-weight: 800; margin: 0; color: #000; display: inline-block;">Bigger Class</h4>
                                    <span style="font-size: 11px; font-weight: 600; opacity: 0.7; color: #000; margin-left: 4px;">Yearly</span>
                                </div>
                                <div style="font-size: 11px; font-weight: 700; color: #000; text-align: right;">June 22, 2023</div>
                            </div>

                            <!-- Middle Section -->
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: baseline;">
                                    <span style="font-size: 32px; font-weight: 900; line-height: 1; color: #1e293b;">$199</span>
                                    <span style="font-size: 16px; font-weight: 800; line-height: 1; color: #1e293b;">.99</span>
                                </div>
                                <div style="display: flex; gap: 8px; align-items: center;">
                                    <div style="background: #fff; color: #22c55e; padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 800; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">Paid</div>
                                    <button style="background: rgba(255,255,255,0.4); border: 1px solid rgba(0,0,0,0.1); padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 700; color: #64748b; display: flex; align-items: center; gap: 4px; cursor: not-allowed;">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                        Pay
                                    </button>
                                </div>
                            </div>

                            <!-- Features Section -->
                            <div>
                                <div style="font-size: 12px; font-weight: 700; margin-bottom: 12px; color: #000;">Bigger Class includes:</div>
                                <div style="display: flex; gap: 10px;">
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                </div>
                            </div>

                            <div style="flex-grow: 1;"></div>

                            <!-- Bottom Section -->
                            <div style="display: flex; gap: 12px; margin-top: auto;">
                                <button style="flex: 1; height: 40px; background: #003049; border: none; border-radius: 12px; color: #fff; font-size: 12px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(0,48,73,0.3);">Change Plan</button>
                                <button style="flex: 1; height: 40px; background: rgba(255,255,255,0.45); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; color: #475569; font-size: 12px; font-weight: 700; cursor: pointer;">Cancel Plan</button>
                            </div>
                        </div>

                        <!-- TutorX Pro Card -->
                        <div class="plan-card-item" style="background: linear-gradient(135deg, #d8b4fe 0%, #8b5cf6 100%);">
                            <!-- Top Section -->
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h4 style="font-size: 16px; font-weight: 800; margin: 0; color: #000; display: inline-block;">TutorX Pro</h4>
                                    <span style="font-size: 11px; font-weight: 600; opacity: 0.7; color: #000; margin-left: 4px;">Monthly</span>
                                </div>
                                <div style="font-size: 11px; font-weight: 700; color: #000; text-align: right;">June 22, 2023</div>
                            </div>

                            <!-- Middle Section -->
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: baseline;">
                                    <span style="font-size: 32px; font-weight: 900; line-height: 1; color: #1e293b;">$99</span>
                                    <span style="font-size: 16px; font-weight: 800; line-height: 1; color: #1e293b;">.99</span>
                                </div>
                                <div style="display: flex; gap: 8px; align-items: center;">
                                    <div style="background: #fff; color: #22c55e; padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 800; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">Paid</div>
                                    <button style="background: rgba(255,255,255,0.4); border: 1px solid rgba(0,0,0,0.1); padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 700; color: #64748b; display: flex; align-items: center; gap: 4px; cursor: not-allowed;">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                        Pay
                                    </button>
                                </div>
                            </div>

                            <!-- Features Section -->
                            <div>
                                <div style="font-size: 12px; font-weight: 700; margin-bottom: 12px; color: #000;">TutorX Pro includes:</div>
                                <div style="display: flex; gap: 10px;">
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                </div>
                            </div>

                            <div style="flex-grow: 1;"></div>

                            <!-- Bottom Section -->
                            <div style="display: flex; gap: 12px; margin-top: auto;">
                                <button style="flex: 1; height: 40px; background: #003049; border: none; border-radius: 12px; color: #fff; font-size: 12px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(0,48,73,0.3);">Change Plan</button>
                                <button style="flex: 1; height: 40px; background: rgba(255,255,255,0.45); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; color: #475569; font-size: 12px; font-weight: 700; cursor: pointer;">Cancel Plan</button>
                            </div>
                        </div>

                        <!-- Exam Module Card -->
                        <div class="plan-card-item" style="background: linear-gradient(135deg, #fef08a 0%, #fbcfe8 50%, #e879f9 100%);">
                            <!-- Top Section -->
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div>
                                    <h4 style="font-size: 16px; font-weight: 800; margin: 0; color: #000; display: inline-block;">Exam Module</h4>
                                    <span style="font-size: 11px; font-weight: 600; opacity: 0.7; color: #000; margin-left: 4px;">Monthly</span>
                                </div>
                                <div style="font-size: 11px; font-weight: 700; color: #000; text-align: right;">June 22, 2023</div>
                            </div>

                            <!-- Middle Section -->
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div style="display: flex; align-items: baseline;">
                                    <span style="font-size: 32px; font-weight: 900; line-height: 1; color: #1e293b;">$19</span>
                                    <span style="font-size: 16px; font-weight: 800; line-height: 1; color: #1e293b;">.99</span>
                                </div>
                                <div style="display: flex; gap: 8px; align-items: center;">
                                    <div style="background: #fff; color: #ef4444; padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 800; box-shadow: 0 2px 5px rgba(239,68,68,0.15);">Unpaid</div>
                                    <button style="background: #003049; border: none; padding: 4px 14px; border-radius: 20px; font-size: 11px; font-weight: 700; color: #fff; display: flex; align-items: center; gap: 4px; cursor: pointer; box-shadow: 0 4px 10px rgba(0,48,73,0.3);">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                        Pay
                                    </button>
                                </div>
                            </div>

                            <!-- Features Section -->
                            <div>
                                <div style="font-size: 12px; font-weight: 700; margin-bottom: 12px; color: #000;">Exam Module includes:</div>
                                <div style="display: flex; gap: 10px;">
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                    <div style="width: 22px; height: 22px; background: #fff; border-radius: 50%; opacity: 0.95; box-shadow: 0 2px 6px rgba(0,0,0,0.1);"></div>
                                </div>
                            </div>

                            <div style="flex-grow: 1;"></div>

                            <!-- Bottom Section -->
                            <div style="display: flex; gap: 12px; margin-top: auto;">
                                <button style="flex: 1; height: 40px; background: #003049; border: none; border-radius: 12px; color: #fff; font-size: 12px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(0,48,73,0.3);">Change Plan</button>
                                <button style="flex: 1; height: 40px; background: rgba(255,255,255,0.45); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; color: #475569; font-size: 12px; font-weight: 700; cursor: pointer;">Cancel Plan</button>
                            </div>
                        </div>
                    </div>

                    <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 40px 0;">

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                        <h3 style="font-size: 16px; font-weight: 800; margin: 0;">Other Plans</h3>
                        <div style="min-width: 120px; position: relative;">
                            <select style="width: 100%; height: 32px; background: #fff; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0 10px; font-size: 12px; appearance: none; cursor: pointer;">
                                <option>Monthly</option>
                            </select>
                            <div style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #64748b;">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m7 10 5 5 5-5"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="other-plans-grid">
                        <!-- Gray Other Plan Cards -->
                        <div class="other-plan-card" style="background: #d1d5db; border-radius: 16px; padding: 24px 20px; display: flex; align-items: center; gap: 15px;">
                            <div style="min-width: 48px; width: 48px; height: 48px; border-radius: 50%; background: #fff;"></div>
                            <div style="flex: 1;">
                                <h5 style="font-size: 14px; font-weight: 800; margin-bottom: 6px; color: #1e293b;">Attendance</h5>
                                <div class="plan-price-wrapper" style="display: flex; align-items: baseline;">
                                    <span style="font-size: 24px; font-weight: 900; line-height: 1; color: #003049;">$99</span>
                                    <span style="font-size: 14px; font-weight: 800; line-height: 1; color: #003049;">.99</span>
                                    <span style="font-size: 10px; font-weight: 700; color: #003049; margin-left: 2px;">/Monthly</span>
                                </div>
                            </div>
                            <button class="buy-btn" style="background: #f97316; color: #fff; border: none; border-radius: 20px; padding: 8px 18px; font-size: 12px; font-weight: 800; display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                                Buy
                            </button>
                        </div>
                        <div class="other-plan-card" style="background: #d1d5db; border-radius: 16px; padding: 24px 20px; display: flex; align-items: center; gap: 15px;">
                            <div style="min-width: 48px; width: 48px; height: 48px; border-radius: 50%; background: #fff;"></div>
                            <div style="flex: 1;">
                                <h5 style="font-size: 14px; font-weight: 800; margin-bottom: 6px; color: #1e293b;">Whiteboard Templates</h5>
                                <div class="plan-price-wrapper" style="display: flex; align-items: baseline;">
                                    <span style="font-size: 24px; font-weight: 900; line-height: 1; color: #003049;">$99</span>
                                    <span style="font-size: 14px; font-weight: 800; line-height: 1; color: #003049;">.99</span>
                                    <span style="font-size: 10px; font-weight: 700; color: #003049; margin-left: 2px;">/Monthly</span>
                                </div>
                            </div>
                            <button class="buy-btn" style="background: #f97316; color: #fff; border: none; border-radius: 20px; padding: 8px 18px; font-size: 12px; font-weight: 800; display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                                Buy
                            </button>
                        </div>
                        <div class="other-plan-card" style="background: #d1d5db; border-radius: 16px; padding: 24px 20px; display: flex; align-items: center; gap: 15px;">
                            <div style="min-width: 48px; width: 48px; height: 48px; border-radius: 50%; background: #fff;"></div>
                            <div style="flex: 1;">
                                <h5 style="font-size: 14px; font-weight: 800; margin-bottom: 6px; color: #1e293b;">Breakout Room</h5>
                                <div class="plan-price-wrapper" style="display: flex; align-items: baseline;">
                                    <span style="font-size: 24px; font-weight: 900; line-height: 1; color: #003049;">$99</span>
                                    <span style="font-size: 14px; font-weight: 800; line-height: 1; color: #003049;">.99</span>
                                    <span style="font-size: 10px; font-weight: 700; color: #003049; margin-left: 2px;">/Monthly</span>
                                </div>
                            </div>
                            <button class="buy-btn" style="background: #f97316; color: #fff; border: none; border-radius: 20px; padding: 8px 18px; font-size: 12px; font-weight: 800; display: flex; align-items: center; gap: 5px; cursor: pointer;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 18V6"/></svg>
                                Buy
                            </button>
                        </div>
                        </div>
                    </div>
            </div>
        </main>
        @include('partials.footer-dashboard')
    </div>

    <script>
        function switchTab(btn, tabId) {
            // Update Tab Buttons
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            
            if (btn) {
                btn.classList.add('active');
            } else {
                // If triggered internally (like from edit icon), keep "My Account" active
                const accountTab = document.querySelectorAll('.tab-btn')[3]; // 4th tab is My Account
                if (accountTab) accountTab.classList.add('active');
            }

            // Hide all Panes
            document.querySelectorAll('.tab-pane').forEach(p => p.style.display = 'none');

            // Show target Pane
            const targetPane = document.getElementById(tabId + '-pane');
            if (targetPane) {
                targetPane.style.display = 'block';
            }
        }
    </script>
</body>
</html>
