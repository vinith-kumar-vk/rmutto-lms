<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'th' ? 'th' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('home.page_title') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ time() }}">
    <style>
        /* Hover Interaction for Cards */
        .vertical-course-card, .free-session-card, .category-card-custom {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease !important;
        }

        .vertical-course-card:hover, .free-session-card:hover, .category-card-custom:hover {
            transform: translateY(-4px) scale(1.01) !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
            z-index: 10;
        }

        /* Top Bar glass interaction */
        .glass-header {
            transition: all 0.3s ease;
        }
        .glass-header.scrolled {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 8px 30px;
        }
        .home-lang-switch {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }
        .home-lang-switch form { margin: 0; display: inline; }
        .home-lang-btn {
            padding: 6px 14px;
            border-radius: 22px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            font-size: 12px;
            font-weight: 800;
            color: #475569;
            cursor: pointer;
            font-family: inherit;
            transition: 0.2s;
        }
        .home-lang-btn:hover {
            border-color: #0f3c6e;
            color: #0f3c6e;
        }
        .home-lang-btn.active {
            background: #0f3c6e;
            color: #fff;
            border-color: #0f3c6e;
        }
        @media (max-width: 768px) {
            .home-lang-switch { order: -1; width: 100%; justify-content: center; margin-bottom: 8px; }
            .header-right { flex-wrap: wrap; justify-content: center; }
        }
    </style>
</head>
<body class="home-page">
    <!-- Header / Navigation -->
        <header class="glass-header">
        <div class="header-left">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            </a>
            
            <a href="{{ route('category') }}" class="category-btn" style="display: flex; align-items: center; gap: 6px;">
                {{ __('home.nav_courses') }}
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
            
            <div class="search-box">
                <a href="{{ route('search') }}" style="position:absolute;left:15px;top:50%;transform:translateY(-50%);color:#a0aec0; display: flex; align-items: center;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </a>
                <input type="text" placeholder="{{ __('home.search_placeholder') }}">
            </div>
        </div>

        <div class="header-right">
            <button class="icon-btn" title="{{ __('home.title_wishlist') }}">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            </button>
            <a href="{{ route('shopping.cart') }}" class="icon-btn" title="{{ __('home.title_cart') }}">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            </a>
            <button class="icon-btn" title="{{ __('home.title_notifications') }}" style="position:relative;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                <span style="position:absolute;top:-5px;right:-5px;background:#f97316;color:white;font-size:10px;border-radius:50%;width:16px;height:16px;display:flex;align-items:center;justify-content:center;">2</span>
            </button>

            <div class="home-lang-switch" aria-label="Language">
                <form method="POST" action="{{ route('locale.set', ['locale' => 'en']) }}">
                    @csrf
                    <button type="submit" class="home-lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">{{ __('home.lang_english') }}</button>
                </form>
                <form method="POST" action="{{ route('locale.set', ['locale' => 'th']) }}">
                    @csrf
                    <button type="submit" class="home-lang-btn {{ app()->getLocale() === 'th' ? 'active' : '' }}">{{ __('home.lang_thai') }}</button>
                </form>
            </div>
            
            <a href="{{ route('account.new') }}" class="user-profile">
                <div class="avatar-circle"></div>
                <span>{{ Auth::check() ? Auth::user()->name : __('home.student') }}</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </div>
    </header>

    <!-- Mobile Sidebar Nav -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
    <div class="mobile-side-nav" id="mobileSideNav">
        <div class="mobile-nav-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <button class="close-mobile-nav" id="closeMobileNav">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <div class="mobile-nav-body">
            <div class="mobile-search-box">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" placeholder="{{ __('home.mobile_search_placeholder') }}" name="q">
                </form>
            </div>
            <div class="home-lang-switch" style="padding: 0 20px 16px; justify-content: center;">
                <form method="POST" action="{{ route('locale.set', ['locale' => 'en']) }}">
                    @csrf
                    <button type="submit" class="home-lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">{{ __('home.lang_english') }}</button>
                </form>
                <form method="POST" action="{{ route('locale.set', ['locale' => 'th']) }}">
                    @csrf
                    <button type="submit" class="home-lang-btn {{ app()->getLocale() === 'th' ? 'active' : '' }}">{{ __('home.lang_thai') }}</button>
                </form>
            </div>
            <ul class="mobile-nav-links">
                <li><a href="{{ route('home') }}">{{ __('home.mobile_home') }}</a></li>
                <li><a href="{{ route('category') }}">{{ __('home.mobile_courses') }}</a></li>
                <li><a href="{{ route('courses') }}">{{ __('home.mobile_all_courses') }}</a></li>
                <li><a href="{{ route('free.courses') }}">{{ __('home.mobile_free_courses') }}</a></li>
                <li><a href="{{ route('dashboard.1') }}">{{ __('home.mobile_dashboard') }}</a></li>
            </ul>
            <div class="mobile-nav-footer">
                @guest
                    <a href="{{ route('login') }}" class="btn-step-1">{{ __('home.login') }}</a>
                    <a href="{{ route('register') }}" class="btn-step-1" style="background: transparent; color: #0f3c6e; border: 1px solid #0f3c6e;">{{ __('home.signup') }}</a>
                @else
                    <a href="{{ route('account.new') }}" class="mobile-user-profile">
                        <div class="avatar-circle"></div>
                        <span>{{ __('home.student_profile') }}</span>
                    </a>
                @endguest
            </div>
        </div>
    </div>

    <!-- HERO SECTION - STEP 1: CLEARING AND RESTRUCTURING -->
    <section class="hero-section hero-step-1-wrapper">
        <div class="hero-step-1-container">
            
            <!-- LEFT SIDE: Image + Gradients -->
            <!-- LEFT SIDE: Image + Gradients -->
            <div class="hero-left-column">
                <img src="{{ asset('images/math_bg.png') }}" alt="Hero Image" class="hero-img-math">
            </div>
            
            <!-- RIGHT SIDE: Text Content -->
            <div class="hero-right-column">
                <h1 class="hero-title-main">{{ __('home.hero_title') }}</h1>
                <p class="hero-desc-main">{{ __('home.hero_desc') }}</p>
                <div class="hero-action-btns">
                    <a href="{{ route('login') }}" class="btn-step-1">{{ __('home.login') }}</a>
                    <a href="{{ route('register') }}" class="btn-step-1">{{ __('home.signup') }}</a>
                </div>
            </div>

            <!-- Removed marked decoration -->

        </div>
    </section>

    <!-- FEATURES ROW -->
    <section class="features-section">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon" style="background: #ff8000;">
                    <img src="{{ asset('images/icons/badge 1.svg') }}" alt="{{ __('home.feature_1_alt') }}">
                </div>
                <div>
                    <h4>{{ __('home.feature_1_title') }}</h4>
                    <p>{{ __('home.feature_1_desc') }}</p>
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background: #a2d2ff;">
                    <img src="{{ asset('images/icons/video streaming 1.svg') }}" alt="{{ __('home.feature_2_alt') }}">
                </div>
                <div>
                    <h4>{{ __('home.feature_2_title') }}</h4>
                    <p>{{ __('home.feature_2_desc') }}</p>
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background: #40ffff;">
                    <img src="{{ asset('images/icons/video call 1.svg') }}" alt="{{ __('home.feature_3_alt') }}">
                </div>
                <div>
                    <h4>{{ __('home.feature_3_title') }}</h4>
                    <p>{{ __('home.feature_3_desc') }}</p>
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background: #20a0a0;">
                    <img src="{{ asset('images/icons/study 1.svg') }}" alt="{{ __('home.feature_4_alt') }}">
                </div>
                <div>
                    <h4>{{ __('home.feature_4_title') }}</h4>
                    <p>{{ __('home.feature_4_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- WIDE RANGE SECTION -->
    <section class="wide-range-section">
        <div class="wide-range-inner">
            <!-- Left Side: Heading and Staggered Images -->
            <div class="wide-range-left">
                <h2 class="section-heading">{{ __('home.wide_range_l1') }}<br>{{ __('home.wide_range_l2') }}<br>{{ __('home.wide_range_l3') }}</h2>
                <div class="wide-range-images-custom">
                    <!-- Girl Image -->
                    <div class="wr-img-block wr-img-1">
                        <img src="{{ asset('images/learning.png') }}" alt="{{ __('home.alt_learning') }}">
                    </div>
                    <!-- Boy Image (Staggered) -->
                    <div class="wr-img-block wr-img-2">
                        <img src="{{ asset('images/testing1.png') }}" alt="{{ __('home.alt_deep_focus') }}">
                    </div>
                </div>
            </div>

            <!-- Right Side: Category Cards and CTA -->
            <div class="wide-range-right">
                <div class="category-cards-grid">
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/007-vectors 1.svg') }}" alt="{{ __('home.cat_1_alt') }}">
                        </div>
                        <div class="cat-text">
                            <h5>{{ __('home.cat_1_h5') }}</h5>
                            <p>{{ __('home.cat_1_p') }}</p>
                        </div>
                    </div>
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/Group.svg') }}" alt="{{ __('home.cat_2_alt') }}">
                        </div>
                        <div class="cat-text">
                            <h5>{{ __('home.cat_2_h5') }}</h5>
                            <p>{{ __('home.cat_2_p') }}</p>
                        </div>
                    </div>
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/science 1 (1).svg') }}" alt="{{ __('home.cat_3_alt') }}">
                        </div>
                        <div class="cat-text">
                            <h5>{{ __('home.cat_3_h5') }}</h5>
                            <p>{{ __('home.cat_3_p') }}</p>
                        </div>
                    </div>
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/Group (1).svg') }}" alt="{{ __('home.cat_4_alt') }}">
                        </div>
                        <div class="cat-text">
                            <h5>{{ __('home.cat_4_h5') }}</h5>
                            <p>{{ __('home.cat_4_p') }}</p>
                        </div>
                    </div>
                </div>

                <ul class="wr-points">
                    <li>{{ __('home.wr_point_1') }}</li>
                    <li>{{ __('home.wr_point_2') }}</li>
                </ul>

                <a href="{{ route('register') }}" class="btn-get-started">{{ __('home.get_started') }}</a>
            </div>
        </div>
    </section>

    <!-- CAREER PERSPECTIVE SECTION -->
    <section class="career-section">
        <div class="career-inner">
            <h2 class="section-heading-center">{{ __('home.career_heading') }}</h2>
            <p class="section-sub-center">{{ __('home.career_sub') }}</p>
            
            <div class="live-classes-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
                @php
                $live_course_imgs = ['9. Animal care.jpg', '10. Create a startup.jpg', '1. Identity.png'];
                $live_course_titles = __('home.live_course_titles');
                @endphp
                @foreach($live_course_imgs as $idx => $img)
                @php $course = ['img' => $img, 'title' => $live_course_titles[$idx] ?? '']; @endphp
                <div class="free-session-card">
                    <div class="free-session-thumb">
                        <img src="{{ asset('images/' . $course['img']) }}" alt="{{ __('home.alt_live_class') }}">
                    </div>
                    <div class="free-session-info">
                        <div class="free-card-meta">
                            <span class="teacher-tag">{{ __('home.teacher') }}</span>
                            <div class="live-badge-target">
                                <div class="target-icon"></div>
                                {{ __('home.live') }}
                            </div>
                        </div>
                        <h4>{{ \Illuminate\Support\Str::limit($course['title'], 35, '...') }}</h4>
                        <p class="topic-text">{{ __('home.topic_description') }}</p>
                        <div class="free-card-footer">
                            <div class="footer-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                {{ __('home.live_date') }}
                            </div>
                            <div class="footer-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                {{ __('home.live_time') }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FREE SESSION COURSES -->

    <section class="course-section">
        <div class="course-section-header">
            <div>
                <h2 class="section-heading">{{ __('home.free_session_l1') }}<br>{{ __('home.free_session_l2') }}</h2>
                <p class="section-sub">{{ __('home.free_session_sub') }}</p>
            </div>
            <div style="display: flex; align-items: center; gap: 20px;">
                <a href="{{ route('free.courses') }}" style="font-size: 14px; font-weight: 700; color: #003a70; text-decoration: none;">{{ __('home.view_all') }}</a>
                <div class="carousel-arrows" style="display: flex; gap: 12px;">
                    <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="course-cards-row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px">
            @php
            $free_course_imgs = ['9. Animal care.jpg', '10. Create a startup.jpg', '1. Identity.png', '2. Relationship building digital business base.png'];
            $free_course_titles = __('home.free_course_titles');
            @endphp
            @foreach($free_course_imgs as $index => $img)
            @php $course = ['img' => $img, 'title' => $free_course_titles[$index] ?? '']; @endphp
            @if($index == 0)
            <a href="{{ route('courses') }}" class="vertical-course-card" style="text-decoration:none; color:inherit; display:block;">
            @else
            <div class="vertical-course-card" style="color:inherit;">
            @endif
                <div class="card-image-wrap">
                    <img src="{{ asset('images/' . $course['img']) }}" alt="{{ __('home.alt_course') }}">
                    <span class="badge-orange-free">{{ __('home.badge_free') }}</span>
                </div>
                <div class="vertical-card-body">
                    <h4 class="vertical-card-title">{{ \Illuminate\Support\Str::limit($course['title'], 35, '...') }}</h4>
                    <p class="vertical-card-desc">{!! __('home.vertical_card_desc') !!}</p>
                    <div class="vertical-card-footer">
                        <div class="footer-stats-wrap">
                            <img src="{{ asset('images/logo.png') }}" class="instructor-avatar-circle" style="object-fit: contain; background: #f1f5f9; padding: 3px; border: 1px solid #e2e8f0;">
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                4k
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                200
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                4.5
                            </div>
                        </div>
                        <div class="heart-action-wrap" style="position: relative;">
                            @if($index == 2)
                            <div class="tooltip-added">{{ __('home.wishlist_added') }}</div>
                            <svg class="heart-action-btn active" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                            @else
                            <svg class="heart-action-btn" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                            @endif
                        </div>
                    </div>
                </div>
            @if($index == 0)
            </a>
            @else
            </div>
            @endif
            @endforeach

        </div>
    </section>

    {{-- 
    <!-- ONGOING COURSES -->
    <section class="course-section" style=" border-top: none;">
        <div class="course-section-header">
            <h2 class="section-heading" >Ongoing Courses</h2>
            <div class="carousel-arrows">
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">â€¹</button>
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">â€º</button>
            </div>
        </div>
        <div class="course-cards-row">
            @for($i = 0; $i < 6; $i++)
            <a href="{{ route('course.detail') }}" class="course-card-home-main" style="text-decoration:none; color:inherit; min-width: 300px;">
                <div class="course-card-home">
                    <div class="course-card-thumb">
                        <img src="{{ asset('images/learning.png') }}" alt="Course">
                        <span class="free-badge" style="background: #f97316;">Free</span>
                    </div>
                    <div class="course-card-body">
                        <h4>Sample Course {{ $i+1 }}</h4>
                        <p>Topic Description Lorem ipsum dolor sit amet, consectetur adip...</p>
                        <div class="course-card-footer">
                            <div class="course-card-avatar" style="background: #EDF2F7;"></div>
                            <div class="course-card-stats">
                                <span>ðŸ‘ 4k</span>
                                <span>â­ 4.5</span>
                            </div>
                            <button class="heart-btn">â™¡</button>
                        </div>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </section>
    --}}

    <!-- POPULAR COURSES -->
    <section class="course-section" style=" border-top: none;">
        <div class="course-section-header">
            <h2 class="section-heading">{{ __('home.popular_courses') }}</h2>
            <div class="carousel-arrows" style="display: flex; gap: 12px;">
                <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
        <div class="course-cards-row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px">
            @php
            $popular_imgs = ['3. drinks.jpg', '4. Business.jpg', '5. Customer management and satisfaction.jpg', '6. Camping tourism education and camping business.png'];
            $popular_titles = __('home.popular_course_titles');
            @endphp
            @foreach($popular_imgs as $pidx => $img)
            @php $course = ['img' => $img, 'title' => $popular_titles[$pidx] ?? '']; @endphp
            <div class="vertical-course-card" style="color:inherit;">
                <div class="card-image-wrap">
                    <img src="{{ asset('images/' . $course['img']) }}" alt="{{ __('home.alt_course') }}">
                    <span class="badge-orange-free">{{ __('home.badge_free') }}</span>
                </div>
                <div class="vertical-card-body">
                    <h4 class="vertical-card-title">{{ \Illuminate\Support\Str::limit($course['title'], 35, '...') }}</h4>
                    <p class="vertical-card-desc">{!! __('home.vertical_card_desc') !!}</p>
                    <div class="vertical-card-footer">
                        <div class="footer-stats-wrap">
                            <img src="{{ asset('images/logo.png') }}" class="instructor-avatar-circle" style="object-fit: contain; background: #f1f5f9; padding: 3px; border: 1px solid #e2e8f0;">
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                4k
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                200
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                4.5
                            </div>
                        </div>
                        <svg class="heart-action-btn" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- 
    <!-- COMPLETED COURSES -->
    <section class="course-section" style=" border-top: none; padding-bottom: 80px;">
        <div class="course-section-header">
            <h2 class="section-heading" >Completed Courses</h2>
            <div class="carousel-arrows">
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">â€¹</button>
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">â€º</button>
            </div>
        </div>
        <div class="course-cards-row">
            @for($i = 0; $i < 6; $i++)
            <a href="{{ route('course.detail') }}" class="course-card-home-main" style="text-decoration:none; color:inherit; min-width: 300px;">
                <div class="course-card-home">
                    <div class="course-card-thumb">
                        <img src="{{ asset('images/learning.png') }}" alt="Course">
                        <span class="free-badge" style="background: #f97316;">Free</span>
                    </div>
                    <div class="course-card-body">
                        <h4>Sample Course {{ $i+1 }}</h4>
                        <p>Topic Description Lorem ipsum dolor sit amet, consectetur adip...</p>
                        <div class="course-card-footer">
                            <div class="course-card-avatar" style="background: #EDF2F7;"></div>
                            <div class="course-card-stats">
                                <span>ðŸ‘ 4k</span>
                                <span>â­ 4.5</span>
                            </div>
                            <button class="heart-btn">â™¡</button>
                        </div>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </section>
    --}}

    <!-- FOOTER -->
    <footer class="home-footer">
        <div class="home-footer-inner">
            <div class="footer-brand-section">
                <div class="footer-logo-circle">
                    <img src="{{ asset('images/icons/logo.svg') }}" alt="IL2 Logo">
                </div>
                <p>{{ __('home.footer_tagline') }}</p>
            </div>
            
            <div class="footer-links-column">
                <ul>
                    <li><a href="#">{{ __('home.footer_teach') }}</a></li>
                    <li><a href="#">{{ __('home.footer_about') }}</a></li>
                    <li><a href="#">{{ __('home.footer_contact') }}</a></li>
                    <li><a href="#">{{ __('home.footer_help') }}</a></li>
                </ul>
            </div>

            <div class="footer-links-column">
                <ul>
                    <li><a href="#">{{ __('home.footer_terms') }}</a></li>
                    <li><a href="#">{{ __('home.footer_privacy') }}</a></li>
                    <li><a href="#">{{ __('home.footer_cookies') }}</a></li>
                    <li><a href="#">{{ __('home.footer_career') }}</a></li>
                </ul>
            </div>

            <div class="footer-right-section">
                <form method="POST" id="home-footer-lang-form" action="{{ route('locale.set', ['locale' => app()->getLocale()]) }}" class="footer-lang-form" style="display:inline;">
                    @csrf
                    <select class="footer-lang-select" onchange="document.getElementById('home-footer-lang-form').action='{{ url('/set-language') }}/'+this.value; document.getElementById('home-footer-lang-form').submit();">
                        <option value="en" @selected(app()->getLocale() === 'en')>{{ __('home.lang_english') }}</option>
                        <option value="th" @selected(app()->getLocale() === 'th')>{{ __('home.lang_thai') }}</option>
                    </select>
                </form>
                
                <div class="footer-socials">
                    <a href="#" class="social-icon facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="#" class="social-icon instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="#" class="social-icon twitter">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                </div>

                <div class="app-btns">
                    <a href="#" class="app-btn-img">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
                    </a>
                    <a href="#" class="app-btn-img">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const closeMobileNav = document.getElementById('closeMobileNav');
        const mobileSideNav = document.getElementById('mobileSideNav');
        const mobileNavOverlay = document.getElementById('mobileNavOverlay');

        function toggleMobileNav() {
            mobileSideNav.classList.toggle('active');
            mobileNavOverlay.classList.toggle('active');
            document.body.style.overflow = mobileSideNav.classList.contains('active') ? 'hidden' : '';
        }

        if(mobileMenuToggle) mobileMenuToggle.addEventListener('click', toggleMobileNav);
        if(closeMobileNav) closeMobileNav.addEventListener('click', toggleMobileNav);
        if(mobileNavOverlay) mobileNavOverlay.addEventListener('click', toggleMobileNav);

        // Search dropdown toggle
        const searchInput = document.getElementById('homeSearchInput');
        const searchDropdown = document.getElementById('searchDropdown');
        if(searchInput) {
            searchInput.addEventListener('focus', () => { if(searchDropdown) searchDropdown.style.display = 'block'; });
        }
        document.addEventListener('click', (e) => {
            if (searchInput && !e.target.closest('.search-bar')) {
                if(searchDropdown) searchDropdown.style.display = 'none';
            }
        });
        // Search tabs
        document.querySelectorAll('.search-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.search-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.glass-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>

