<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'th' ? 'th' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('course_flow.title_courses') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        :root {
            --primary: #003a70;
            --orange: #f97316;
            --bg-gray: #f1f4f6;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --border: #e2e8f0;
        }

        body {
            background-color: var(--bg-gray);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }


        .header-pill { 
            width: 100%; 
            max-width: 1400px; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
        }
        .header-left { display: flex; align-items: center; gap: 20px; }
        .logo img { height: 38px; }
        .search-wrap { position: relative; width: 280px; }
        .search-wrap input { width: 100%; height: 42px; background: #f1f5f9; border: none; border-radius: 25px; padding: 0 15px 0 50px; font-size: 13.5px; outline: none; }
        .search-wrap svg { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .header-right { display: flex; align-items: center; gap: 15px; }
        .h-icon-btn { width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; position: relative; }
        .profile-pill { display: flex; align-items: center; gap: 10px; padding: 5px 15px 5px 5px; border-radius: 35px; background: #f8fafc; border: 1px solid #e2e8f0; color: #1e293b; font-weight: 600; font-size: 13.5px; text-decoration: none; }
        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        /* --- SHELL --- */
        .wrapper { display: grid; grid-template-columns: 240px 1fr; gap: 30px; max-width: 1450px; margin: 0 auto; padding: 100px 30px 40px; }
        
        .sidebar { background: #fff; border-radius: 24px; padding: 25px 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); position: sticky; top: 100px; height: fit-content; grid-row: 1 / span 2; }
        .nav-link { display: flex; align-items: center; gap: 14px; padding: 12px 18px; border-radius: 14px; text-decoration: none; color: #64748b; font-size: 14px; font-weight: 500; margin-bottom: 4px; transition: 0.2s; }
        .nav-link:hover { background: #f8fafc; color: #0f172a; }
        .nav-link.active { background: #f8fafc; color: var(--primary); font-weight: 700; }
        .nav-link img { width: 22px; height: 22px; opacity: 0.7; }
        .nav-link.active img { opacity: 1; }

        /* --- MAIN CONTENT --- */
        .main-card { background: #fff; border-radius: 30px; padding: 40px; box-shadow: 0 4px 25px rgba(0,0,0,0.02); }

        /* HERO SECTION */
        .course-hero { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; margin-bottom: 40px; }
        
        .hero-left .teacher-row { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
        .t-info { display: flex; align-items: center; gap: 12px; }
        .t-avatar { width: 44px; height: 44px; border-radius: 50%; background: #f1f5f9 url('{{ asset('images/logo.png') }}') no-repeat center; background-size: contain; border: 1.5px solid #e2e8f0; }
        .t-content p { font-size: 11px; color: #94a3b8; margin: 0; }
        .t-content span { color: #2563eb; font-weight: 700; cursor: pointer; }
        .t-meta { display: flex; gap: 15px; margin-top: 4px; font-size: 11px; color: #94a3b8; }
        .t-meta span { display: flex; align-items: center; gap: 4px; }
        .t-meta svg { width: 12px; height: 12px; }

        .hero-left-actions { display: flex; gap: 10px; }
        .btn-outline-sm { padding: 6px 20px; border: 1px solid #e2e8f0; border-radius: 20px; font-size: 11px; font-weight: 700; color: #64748b; text-decoration: none; }

        .title-price-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .title-price-row h1 { font-size: 32px; font-weight: 900; margin: 0; color: #0f172a; letter-spacing: -0.5px; }
        .price-text { font-size: 28px; font-weight: 900; color: #f97316; }

        .update-date { font-size: 11px; color: #94a3b8; margin-bottom: 20px; }
        .course-short-desc { font-size: 14px; color: #64748b; line-height: 1.6; margin-bottom: 25px; }
        
        .date-range { font-size: 12px; color: #64748b; margin-bottom: 30px; }
        .date-range span { color: #2563eb; font-weight: 700; font-size: 13px; margin: 0 15px 0 5px; }

        .hero-btns { display: flex; gap: 12px; }
        .btn-dark-blue { padding: 12px 30px; border-radius: 10px; font-size: 14px; font-weight: 700; color: #fff; background: #003a70; text-decoration: none; border: none; cursor: pointer; }
        .btn-fill-blue { padding: 12px 30px; border-radius: 10px; font-size: 14px; font-weight: 700; color: #fff; background: #004d95; text-decoration: none; }

        .hero-right .video-preview {    border: 1px solid #94a3b8; width: 100%; aspect-ratio: 1.6; background: url('{{ asset('images/9. Animal care.jpg') }}') center/cover no-repeat; border-radius: 20px; position: relative; display: flex; align-items: center; justify-content: center; }
        .play-btn { background: #e11d1d; border-radius: 50px; width: 72px; height: 36px; display: flex; align-items: center; justify-content: center; gap: 6px; cursor: pointer; box-shadow: 0 4px 15px rgba(225,29,29,0.4); transition: transform 0.2s ease; }
        .play-btn:hover { transform: scale(1.08); }

        /* --- TAB NAVIGATION --- */
        .tab-strip { display: flex; justify-content: center; gap: 60px; border-bottom: 1px solid #f1f5f9; margin-bottom: 50px; }
        .tab-item { padding: 15px 0; font-size: 13px; font-weight: 500; color: #94a3b8; border-bottom: 3px solid transparent; cursor: pointer; transition: 0.2s; text-decoration: none; }
        .tab-item:hover { color: #1e293b; }
        .tab-item.active { color: #1e293b; border-bottom-color: var(--primary); font-weight: 600; background: #fff; border-radius: 10px 10px 0 0; box-shadow: 0 -4px 10px rgba(0,0,0,0.02); padding-left: 30px; padding-right: 30px; position: relative; bottom: -1px; }

        /* TAB CONTENT */
        .tab-panels { min-height: 400px; }
        .pane { display: none; }
        .pane.active { display: block; }

        /* OUTCOMES DESIGN */
        .outcomes-content { max-width: 900px; }
        .outcomes-content h2 { font-size: 16px; font-weight: 800; color: #1e293b; margin-bottom: 25px; }
        .outcomes-content p { font-size: 13.5px; color: #475569; line-height: 1.6; margin-bottom: 20px; }
        .outcomes-content ul { list-style: none; padding: 0; }
        .outcomes-content li { font-size: 13.5px; color: #475569; margin-bottom: 12px; display: flex; gap: 10px; align-items: flex-start; }
        .outcomes-content li::before { content: '\2022'; color: #000; font-weight: 900; font-size: 18px; line-height: 1; }



        @media (max-width: 1024px) {
            .shared-shell { grid-template-columns: 1fr; padding: 100px 20px 40px; }
            .shared-sidebar { display: block !important; }
            .course-hero { grid-template-columns: 1fr; gap: 30px; }
        }

        @media (max-width: 768px) {
            header { padding: 0 15px; }
            .header-pill { justify-content: space-between; }
            .search-wrap { display: none; } /* Hide search on small header to avoid clutter */
            .main-card { padding: 30px 15px; border-radius: 20px; }
            .title-price-row { flex-direction: column; align-items: flex-start; gap: 10px; }
            .title-price-row h1 { font-size: 24px; }
            .price-text { font-size: 22px; }
            .tab-strip { gap: 15px; overflow-x: auto; justify-content: flex-start; padding-bottom: 5px; -webkit-overflow-scrolling: touch; }
            .tab-item { white-space: nowrap; padding: 10px 0; }
            .tab-item.active { padding-left: 15px; padding-right: 15px; }
            .hero-btns { flex-direction: column; width: 100%; }
            .btn-dark-blue { width: 100%; text-align: center; }
            footer { padding: 40px 20px; }
        }
    </style>
</head>
<body>
@include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'courses'])
        
        <main class="shared-content">
            <div class="main-card">
                <div class="course-hero">
                    <div class="hero-left">
                        <div class="teacher-row">
                            <div class="t-info">
                                <div class="t-avatar"></div>
                                <div class="t-content">
                                    <p>Teacher</p>
                                    <span>Vinith Kumar</span>
                                </div>
                            </div>
                            <div class="hero-left-actions">
                                <a href="#" class="btn-outline-sm">Save</a>
                                <a href="#" class="btn-outline-sm">Share</a>
                            </div>
                        </div>

                        <div class="title-price-row">
                            <h1>Veterinary Nursing Assistant Course</h1>
                            <div class="price-text">$599.99</div>
                        </div>
                        <div class="update-date">Last updated 24/03/2026</div>
                        
                        <p class="course-short-desc">Learn the essential skills to become a certified Veterinary Nursing Assistant. This comprehensive course covers animal care, clinical procedures, and emergency response in a professional setting.</p>
                        
                        <div class="date-range">
                            📅 Enroll by <span>Oct 15, 2026</span>
                            ⏰ Duration <span>12 Months</span>
                        </div>

                        <div class="hero-btns">
                            <a href="#" class="btn-dark-blue">Join Course</a>
                            <a href="#" class="btn-fill-blue">Buy Full Course</a>
                        </div>
                    </div>

                    <div class="hero-right">
                        <div class="video-preview">
                            <div class="play-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-strip">
                    <a href="#" class="tab-item active">Outcomes</a>
                    <a href="#" class="tab-item">Curriculum</a>
                    <a href="#" class="tab-item">Description</a>
                    <a href="#" class="tab-item">Reviews</a>
                </div>

                <div class="tab-panels">
                    <div class="pane active">
                        <div class="outcomes-content">
                            <h2>What you will learn</h2>
                            <p>This course is designed to provide you with the foundational knowledge and practical skills required to support veterinarians in their daily operations.</p>
                            <ul>
                                <li>Animal handling and restraint techniques for various species.</li>
                                <li>Assisting in diagnostic procedures and laboratory work.</li>
                                <li>Understanding pharmaceutical basics and dosage calculations.</li>
                                <li>Maintaining sterile environments and surgical assistance.</li>
                                <li>Emergency first aid for pets and clinical care.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('partials.footer-dashboard')
    </div>
</body>
</html>
