<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | IL2 RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <style>
        :root {
            --primary: #003a70;
            --primary-light: #004d95;
            --bg: #f3f6f9;
            --sidebar-bg: #ffffff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --radius-md: 12px;
            --radius-pill: 50px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* --- CONTENT AREA --- */
        .content { display: flex; flex-direction: column; gap: 20px; }
        
        .flex-container { display: flex; gap: 20px; }

        .section-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        .section-header {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 25px;
        }

        .empty-row {
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .empty-icon {
            width: 48px;
            height: 48px;
            background: #f1f5f9;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .empty-body h4 { font-size: 14px; font-weight: 700; color: #1e293b; margin-bottom: 4px; }
        .empty-body p { font-size: 12px; color: #64748b; }

        .btn-enrol {
            margin-left: auto;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        /* NOTES */
        .btn-add {
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .notes-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .note-column {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
        }

        .note-col-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 13px;
            font-weight: 700;
            color: #475569;
        }

        .add-task-form {
            background: #fff;
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #e2e8f0;
            margin-bottom: 15px;
        }

        .add-task-form input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .prio-row {
            display: flex;
            gap: 8px;
            margin-bottom: 15px;
        }

        .prio-tag {
            font-size: 10px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
            opacity: 0.6;
        }

        .prio-tag.low { background: #dcfce7; color: #16a34a; }
        .prio-tag.med { background: #fef9c3; color: #ca8a04; }
        .prio-tag.high { background: #fee2e2; color: #dc2626; }

        .form-btns { display: flex; gap: 8px; }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 6px;
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        /* --- FOOTER --- */
        footer { margin-top: 60px; background: #fff; padding: 60px 40px; border-top: 1px solid #f1f5f9; display: flex; justify-content: flex-start; gap: 100px; flex-wrap: wrap; }
        .footer-brand .f-logo-circle { width: 70px; height: 70px; border-radius: 50%; background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 30px; }
        .footer-brand p { font-size: 13px; color: #64748b; line-height: 1.6; max-width: 250px; }
        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 12px; padding: 0; }
        .footer-col ul li a { text-decoration: none; color: #4b5563; font-size: 14px; }
        .footer-right { display: flex; flex-direction: column; align-items: flex-end; gap: 20px; margin-left: auto; }
        .footer-lang { padding: 8px 15px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; min-width: 120px; }
        .social-row { display: flex; gap: 15px; }
        .social-row img { width: 20px; height: 20px; }
        .app-row { display: flex; gap: 10px; }
        .app-row img { height: 35px; }

        @media (max-width: 1024px) {
            .flex-container { flex-direction: column; }
            .notes-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .shared-shell {
                padding: 80px 15px 30px;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
            .content {
                width: 100%;
            }
            .section-card { padding: 25px 15px; }
            .empty-row { flex-direction: column; text-align: center; gap: 15px; }
            .empty-icon { margin: 0 auto; }
            .btn-enrol { width: 100%; margin: 0; }
            
            footer { 
                padding: 40px 20px;
                margin-top: 30px;
                border-radius: 20px;
                flex-direction: column;
                gap: 30px;
            }
            .footer-right { 
                align-items: flex-start; 
                margin-left: 0; 
                padding-top: 20px;
                border-top: 1px solid #eee;
                width: 100%; 
            }
            .footer-col {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'dashboard'])

        <main class="content">
            <div class="flex-container">
                <!-- Enrolled Classes Empty -->
                <div style="flex: 2;">
                    <div class="section-card">
                        <div class="section-header">Enrolled Classes</div>
                        <div class="empty-row">
                            <div class="empty-icon"></div>
                            <div class="empty-body">
                                <h4>No classes enrolled yet</h4>
                                <p>Get started with us today</p>
                            </div>
                            <button class="btn-enrol" onclick="window.location.href='{{ route('courses') }}'">+ Enrol Now</button>
                        </div>
                    </div>
                </div>

                <!-- Courses Empty -->
                <div style="flex: 1;">
                    <div class="section-card">
                        <div class="section-header">Courses</div>
                        <div class="empty-row" style="flex-direction: column; align-items: flex-start; gap: 10px; border:none;">
                            <div style="display:flex; align-items:center; gap:15px;">
                                <div class="empty-icon"></div>
                                <div class="empty-body">
                                    <h4 style="font-size:13px;">Watch your progress as you enrol classes</h4>
                                </div>
                                <span style="font-size:11px; font-weight:700;">0%</span>
                            </div>
                            <div style="width:100%; height:6px; background:#f1f5f9; border-radius:3px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes Section -->
            <div class="section-card">
                <div class="section-header" style="display:flex; justify-content:space-between;">
                    Notes
                    <button class="btn-add">+ Add List</button>
                </div>
                <div class="notes-grid">
                    <div class="note-column">
                        <div class="note-col-head">
                            <span>Notes</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                        </div>
                        <div class="add-task-form">
                            <input type="text" placeholder="Enter task">
                            <div class="prio-row">
                                <span class="prio-tag low">Low</span>
                                <span class="prio-tag med">Medium</span>
                                <span class="prio-tag high">High</span>
                            </div>
                            <div class="form-btns">
                                <button class="btn-add">+ Add Task</button>
                                <button class="btn-cancel">Cancel</button>
                            </div>
                        </div>
                        <div style="background:#fff; border-radius:10px; height:40px; border:1px dashed #e2e8f0; display:flex; align-items:center; justify-content:center; color:#cbd5e0; font-size:20px;">+</div>
                    </div>
                    
                    <div class="note-column" style="background:transparent; border:1px dashed #e2e8f0;">
                         <div class="add-task-form" style="border:none;">
                            <input type="text" placeholder="Create list title..." style="font-weight:600; font-size:14px;">
                            <div class="form-btns">
                                <button class="btn-add">+ Add Task</button>
                                <button class="btn-cancel" style="background:#fff; border:1px solid #e2e8f0;">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <div class="footer-brand">
            <div class="f-logo-circle"><img src="{{ asset('images/icons/logo.svg') }}" alt="Logo"></div>
            <p>Learn anytime and anywhere<br>from IL2 career skills</p>
        </div>
        <div class="footer-col">
            <ul><li><a href="#">Teach on IL2</a></li><li><a href="#">About Us</a></li><li><a href="#">Contact Us</a></li><li><a href="#">Help and Support</a></li></ul>
        </div>
        <div class="footer-col">
            <ul><li><a href="#">Terms</a></li><li><a href="#">Privacy Policy</a></li><li><a href="#">Cookies Policy</a></li><li><a href="#">Career</a></li></ul>
        </div>
        <div class="footer-right">
            <select class="footer-lang"><option>English</option><option>Thai</option></select>
            <div class="social-row">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/X_logo_2023.svg">
            </div>
            <div class="app-row">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg">
            </div>
        </div>
    </footer>

</body>
</html>
