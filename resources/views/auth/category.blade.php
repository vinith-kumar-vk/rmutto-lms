<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'th' ? 'th' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('category.page_title') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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

        /* ─── HEADER ─── */
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
            text-decoration: none;
        }
        .search-wrap { position: relative; width: 260px; }
        .search-wrap input {
            width: 100%; height: 42px; background: #f1f5f9; border: none; border-radius: 25px;
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
        .language-selector select {
            padding: 6px 10px; border: 1px solid #e2e8f0; border-radius: 20px; cursor: pointer;
            font-size: 12px; font-weight: 600; background: #f8fafc; color: #475569;
        }

        /* ─── LAYOUT ─── */
        .shell {
            max-width: 1450px;
            margin: 0 auto;
            padding: 90px 30px 50px;
            flex: 1;
            width: 100%;
        }

        /* ─── MAIN CONTENT ─── */
        .main-card {
            background: #fff;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .main-header {
            display: flex; align-items: center; justify-content: space-between;
        }
        .main-header h2 { font-size: 18px; font-weight: 700; color: #1e293b; }
        
        .sort-wrap { display: flex; align-items: center; gap: 12px; }
        .sort-label { font-size: 13.5px; color: #64748b; font-weight: 500; }
        .sort-select {
            padding: 8px 16px; border-radius: 20px; border: 1px solid #e2e8f0;
            background: #fff; color: #1e293b; font-size: 13px; font-weight: 600; outline: none; cursor: pointer;
        }

        .cat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .cat-card {
            position: relative;
            aspect-ratio: 16/10;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
            background: #f8fafc;
            border: 1px solid #f1f5f9;
        }
        a.cat-card { cursor: pointer; }
        div.cat-card { cursor: default; }

        a.cat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .cat-card img { width: 100%; height: 100%; object-fit: cover; }
        
        .cat-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, transparent 30%, rgba(0,0,0,0.5));
            display: flex; flex-direction: column; justify-content: flex-end;
        }
        .cat-blur {
            backdrop-filter: blur(4px);
            background: rgba(255,255,255,0.15);
            border-top: 1px solid rgba(255,255,255,0.2);
            padding: 12px 15px;
            min-height: 60px;
            display: flex;
            align-items: center;
        }
        .cat-name { 
            font-size: 11px; 
            font-weight: 700; 
            color: #fff; 
            letter-spacing: 0.2px; 
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 1024px) {
            .cat-grid { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 768px) {
            header { padding: 15px; height: auto; }
            .header-pill { flex-direction: column; gap: 15px; }
            .header-left { width: 100%; flex-wrap: wrap; justify-content: space-between; }
            .search-wrap { width: 100%; order: 3; margin-top: 5px; }
            .logo img { height: 32px; }
            
            .cat-grid { grid-template-columns: repeat(2, 1fr); }
            .shell { padding: 160px 15px 30px; }
            .main-card { padding: 20px 15px;         margin-top: 50px;}
        }
        @media (max-width: 480px) {
            .cat-grid { grid-template-columns: 1fr; }
            .header-right { flex-wrap: wrap; justify-content: center; }
        }

    </style>
</head>
<body>

    <!-- ── HEADER ─────────────────────── -->
    <header>
        <div class="header-pill">
            <div class="header-left">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
                <a href="{{ route('category') }}" class="cat-dropdown" style="text-decoration:none; display: flex; align-items: center; gap: 8px;">
                    {{ __('category.nav_courses') }}
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
                <div class="search-wrap">
                    <a href="{{ route('search') }}">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </a>
                    <input type="text" placeholder="{{ __('category.search_placeholder') }}">
                </div>
            </div>
            <div class="header-right">
                <a href="#" class="h-icon-btn">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </a>
                <a href="{{ route('shopping.cart') }}" class="h-icon-btn">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                </a>
                <div class="h-icon-btn">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    <span class="notif-badge">2</span>
                </div>
                <form method="POST" class="language-selector" style="display: inline;">
                    @csrf
                    <select name="locale" onchange="
                        const form = this.closest('form');
                        form.action = '{{ url('/set-language') }}/' + this.value;
                        form.submit();
                    ">
                        @foreach(config('languages.languages', []) as $loc => $lang)
                            @if(($lang['enabled'] ?? true))
                                <option value="{{ $loc }}" @selected(app()->getLocale() === $loc)>
                                    {{ $lang['native_name'] ?? $loc }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </form>
                <a href="{{ route('account.new') }}" class="profile-pill">
                    <div class="avatar-head"></div>
                    <span>{{ Auth::check() ? Auth::user()->name : __('category.student_default') }}</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg>
                </a>
            </div>
        </div>
    </header>

    @php
        $courseImages = [
            '9. Animal care.jpg',
            '10. Create a startup.jpg',
            '1. Identity.png',
            '2. Relationship building digital business base.png',
            '3. drinks.jpg',
            '4. Business.jpg',
            '5. Customer management and satisfaction.jpg',
            '6. Camping tourism education and camping business.png',
            '7. Pet business.jpg',
            '8. Building a business from knowledge to added value.jpg',
            '18. Dare to dream of becoming a business startup.png',
            '19. Craft Tech is money.png',
            '20. People walk.png',
            '21. Proactive business plan.png',
            '22. Research to please customers.png',
            '23. Smart investment for digital entrepreneurs.png',
            '24. Security tips for professional entrepreneurs.png',
            '25. The secret recipe of live streaming in the world.png',
            '11. Analysis and presentation.jpg',
            '12. Finance must not be stupid.jpg',
            '13. Make thousands of business friends.jpg',
            '14. skills in using artificial intelligence.png',
            '15. Learn how to create powerful media.png',
            '16. Digital business developer.jpg',
            '17. Start investing first step in the financial world.png',
        ];
        $courseTitles = __('category.courses');
    @endphp

    <!-- ── SHELL ─────────────────────── -->
    <div class="shell">
        <!-- Main Courses Card -->
        <main class="main-card">
            <div class="main-header">
                <h2>{{ __('category.heading_courses') }}</h2>
                <div class="sort-wrap">
                    <span class="sort-label">{{ __('category.sort_by') }}</span>
                    <select class="sort-select">
                        <option>{{ __('category.sort_default') }}</option>
                        <option>{{ __('category.sort_popular') }}</option>
                        <option>{{ __('category.sort_rated') }}</option>
                        <option>{{ __('category.sort_date') }}</option>
                    </select>
                </div>
            </div>

            <div class="cat-grid">
                @foreach ($courseImages as $index => $img)
                @php $title = $courseTitles[$index] ?? ''; @endphp
                @if($index == 0)
                <a href="{{ route('courses') }}" class="cat-card" style="text-decoration:none;">
                @else
                <div class="cat-card">
                @endif
                    <img src="{{ asset('images/' . $img) }}" alt="{{ $title }}">
                    <div class="cat-overlay">
                        <div class="cat-blur">
                            <span class="cat-name">{{ $title }}</span>
                        </div>
                    </div>
                @if($index == 0)
                </a>
                @else
                </div>
                @endif
                @endforeach
            </div>
        </main>
    </div>

</body>
</html>
