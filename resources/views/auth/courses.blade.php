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

        /* Sidebar & Header are handled by layout.css */

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

        /* --- FOOTER --- */
        footer { grid-column: 2; border-radius: 26px; box-sizing: border-box; background: #fff; padding: 60px 40px; border-top: 1px solid #f1f5f9; display: flex; justify-content: center; width: 100%; margin-top: 10px; }
        .footer-inner { max-width: 1400px; width: 100%; display: grid; grid-template-columns: 1.5fr repeat(2, 1fr) 1.2fr; gap: 40px; }
        .f-logo-wrap { width: 60px; height: 60px; border-radius: 50%; background: #f8fafc; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 1px solid #e2e8f0; }
        .f-logo-wrap img { height: 35px; }
        .f-brand p { font-size: 14px; color: #64748b; line-height: 1.6; }
        .f-col h4 { font-size: 15px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark); }
        .f-col ul { list-style: none; padding: 0; }
        .f-col li { margin-bottom: 15px; }
        .f-col a { font-size: 14px; color: #64748b; text-decoration: none; transition: 0.2s; }
        .f-col a:hover { color: var(--primary); }
        .f-right-col { text-align: right; }
        .lang-select { padding: 10px 20px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 13px; color: #475569; margin-bottom: 25px; outline: none; }
        .socials { display: flex; gap: 15px; justify-content: flex-end; margin-bottom: 30px; }
        .social-link { width: 36px; height: 36px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; transition: 0.2s; }
        .social-link img { width: 18px; height: 18px; }
        .apps { display: flex; gap: 10px; justify-content: flex-end; }
        .apps img { height: 32px; }

        @media (max-width: 1024px) {
            .course-hero { grid-template-columns: 1fr; gap: 30px; }
            .hero-right { order: -1; } /* Video first on mobile */
        }

        @media (max-width: 768px) {
            .shared-shell {
                padding: 80px 15px 30px;
                grid-template-columns: 1fr;
                display: flex;
                flex-direction: column;
            }
            .main-card { padding: 20px 15px; border-radius: 20px; width: 100%; box-sizing: border-box; }
            .title-price-row { flex-direction: column; align-items: flex-start; gap: 10px; }
            .title-price-row h1 { font-size: 24px; }
            .price-text { font-size: 22px; }
            
            .teacher-row { flex-direction: column; gap: 15px; }
            .hero-left-actions { width: 100%; justify-content: space-between; }
            
            .tab-strip { 
                gap: 20px; 
                overflow-x: auto; 
                justify-content: flex-start; 
                padding-bottom: 5px;
                margin-bottom: 30px;
            }
            .tab-item { white-space: nowrap; font-size: 12px; }
            .hero-btns .btn-dark-blue { width: 100%; text-align: center; }
            
            footer { 
                padding: 40px 20px;
                margin-top: 20px;
                border-radius: 20px;
            }
            .footer-inner { 
                grid-template-columns: 1fr; 
                gap: 30px; 
            }
            .f-col {
                text-align: left;
            }
            .f-right-col { 
                text-align: left; 
                padding-top: 20px;
                border-top: 1px solid #eee;
            }
            .socials, .apps { justify-content: flex-start; }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'courses'])

        <main class="main-card">
            <div class="course-hero">
                <div class="hero-left">
                    <div class="teacher-row">
                        <div class="t-info">
                            <div class="t-avatar"></div>
                            <div class="t-content">
                                <p>Created by : <span>Teacher</span></p>
                                <div class="t-meta" style="display: flex; gap: 15px; align-items: center; margin-top: 4px;">
                                    <span style="display: inline-flex; align-items: center; font-size: 11px; color: #94a3b8;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#f59e0b" style="margin-right: 4px;"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg> 0 Ratings
                                    </span>
                                    <span style="display: inline-flex; align-items: center; font-size: 11px; color: #94a3b8;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" style="margin-right: 4px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> 0 Students
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="hero-left-actions">
                            <a href="#" class="btn-outline-sm">{{ __('course_flow.save') }}</a>
                            <a href="#" class="btn-outline-sm">{{ __('course_flow.share') }}</a>
                        </div>
                    </div>

                    <div class="title-price-row">
                        <h1>Veterinary Nursing Assistant Course</h1>
                        <span class="price-text">Free</span>
                    </div>
                    <div class="update-date" style="display: flex; align-items: center; gap: 8px; font-size: 11px; color: #94a3b8; margin-bottom: 20px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        Updated date : 26 march 2026
                    </div>
                    <p class="course-short-desc">To ensure the content is up-to-date with technology or aligns with learning outcomes.</p>
                    
                    <div class="date-range" style="font-size: 13px; color: #64748b; margin-bottom: 30px;">
                        {{ __('course_flow.course_start') }} <span style="color: #2563eb; font-weight: 700; margin-right: 25px;">{{ __('course_flow.date_march_26') }}</span>
                        {{ __('course_flow.course_end') }} <span style="color: #2563eb; font-weight: 700;">{{ __('course_flow.date_june_26') }}</span>
                    </div>

                    <div class="hero-btns" style="margin-top:20px;">
                        <a href="{{ route('shopping.cart') }}" class="btn-dark-blue" style="background: #002b55; text-decoration:none;">Add to Cart</a>
                    </div>
                </div>

                <div class="hero-right">
                    <div class="video-preview">
                        <div class="play-btn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-strip">
                <a href="{{ route('course.detail') }}" class="tab-item">{{ __('course_flow.tab_about') }}</a>
                <div class="tab-item active">{{ __('course_flow.tab_outcomes') }}</div>
                <a href="{{ route('modules') }}" class="tab-item">{{ __('course_flow.tab_modules') }}</a>
                <a href="{{ route('recommendations') }}" class="tab-item">{{ __('course_flow.tab_recommendations') }}</a>
                <a href="{{ route('testimonials') }}" class="tab-item">{{ __('course_flow.tab_testimonials') }}</a>
                <a href="{{ route('reviews') }}" class="tab-item">{{ __('course_flow.tab_reviews') }}</a>
            </div>

            <div class="tab-panels">
                <div class="pane active" id="pane-outcomes">
                    <div class="outcomes-content">
                        <h2>{{ __('course_outcomes.heading') }}</h2>
                        <div style="font-size: 14px; color: #475569; line-height: 1.8;">
                            <p><strong>{{ __('course_outcomes.clo1_title') }}</strong> {{ __('course_outcomes.clo1_body') }}</p>
                            <p><strong>{{ __('course_outcomes.clo2_title') }}</strong> {{ __('course_outcomes.clo2_body') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer-inner">
                <div class="f-brand">
                    <div class="f-logo-wrap"><img src="{{ asset('images/icons/logo.svg') }}" alt="Logo"></div>
                    <p>{{ __('home.footer_tagline') }}</p>
                </div>
                <div class="f-col">
                    <ul>
                        <li><a href="#">{{ __('home.footer_teach') }}</a></li>
                        <li><a href="#">{{ __('home.footer_about') }}</a></li>
                        <li><a href="#">{{ __('home.footer_contact') }}</a></li>
                        <li><a href="#">{{ __('home.footer_help') }}</a></li>
                    </ul>
                </div>
                <div class="f-col">
                    <ul>
                        <li><a href="#">{{ __('home.footer_terms') }}</a></li>
                        <li><a href="#">{{ __('home.footer_privacy') }}</a></li>
                        <li><a href="#">{{ __('home.footer_cookies') }}</a></li>
                        <li><a href="#">{{ __('home.footer_career') }}</a></li>
                    </ul>
                </div>
                <div class="f-right-col">
                    <form method="POST" id="courses-footer-lang" action="{{ route('locale.set', ['locale' => app()->getLocale()]) }}" style="display:inline;">
                        @csrf
                        <select class="lang-select" onchange="document.getElementById('courses-footer-lang').action='{{ url('/set-language') }}/'+this.value; document.getElementById('courses-footer-lang').submit();">
                            <option value="en" @selected(app()->getLocale() === 'en')>{{ __('home.lang_english') }}</option>
                            <option value="th" @selected(app()->getLocale() === 'th')>{{ __('home.lang_thai') }}</option>
                        </select>
                    </form>
                    <div class="socials">
                        <a href="#" class="social-link"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></a>
                        <a href="#" class="social-link"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg"></a>
                        <a href="#" class="social-link"><img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Twitter_Logo.png"></a>
                    </div>
                    <div class="apps">
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"></a>
                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
