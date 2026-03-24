<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'th' ? 'th' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('learning.page_title') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <style>
        :root {
            --primary: #004b87;
            --teal: #14a098;
            --bg-body: #f1f4f8;
            --white: #ffffff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --card-gray: #e2e8f0;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-dark);
        }

        /* HEADER */
        /* Sidebar & Header are handled by layout.css */
        /* MAIN LAYOUT */
        .wrapper {
            display: flex;
            max-width: 1500px;
            margin: 0 auto;
            padding: 0 30px;
            gap: 30px;
        }

        .shared-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }
        /* CONTENT */
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .page-title {
            font-size: 40px;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 25px 0;
            line-height: 1.2;
        }

        .main-card {
            background: var(--white);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tabs {
            display: flex;
            background: #f1f5f9;
            padding: 5px;
            border-radius: 20px;
            width: 100%;
            margin-bottom: 40px;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 14px;
            font-size: 13px;
            font-weight: 500;
            color: #64748b;
            border-radius: 16px;
            cursor: pointer;
        }

        .tab.active {
            background: var(--white);
            color: #1e293b;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 100%;
        }

        .course-wrap {
            background: #e2e8f0;
            border-radius: 24px;
            padding: 12px;
        }

        .course-card {
            background: var(--white);
            border-radius: 20px;
            padding: 18px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .cc-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .cc-date {
            font-size: 12px;
            font-weight: 600;
            color: #1e293b;
        }

        .cc-img {
            width: 100%;
            height: 120px;
            border-radius: 12px;
            background-size: cover;
            background-position: center;
            margin-bottom: 15px;
        }

        .cc-badge {
            font-size: 9px;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .cc-title {
            font-size: 16px;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 15px 0;
        }

        .progress-bar-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .progress-bg {
            flex: 1;
            height: 6px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--teal);
            border-radius: 10px;
        }

        .progress-text {
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
        }

        .cc-desc {
            font-size: 12px;
            line-height: 1.6;
            color: #475569;
            margin: 0;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
        }

        @media (max-width: 1024px) {
            .grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .shared-shell {
                padding: 80px 15px 30px;
                display: flex;
                flex-direction: column;
            }
            .page-title {
                font-size: 28px;
                margin-bottom: 20px;
            }
            .main-card {
                padding: 20px 15px;
                border-radius: 20px;
                width: 100%;
                box-sizing: border-box;
            }
            .tabs {
                margin-bottom: 25px;
            }
            .tab {
                padding: 10px;
                font-size: 12px;
            }
            .grid { 
                grid-template-columns: 1fr; 
                gap: 15px;
            }
            .course-wrap {
                padding: 8px;
            }
            .course-card {
                padding: 15px;
            }
            .cc-title {
                font-size: 15px;
            }
            .progress-bar-wrap {
                margin-bottom: 15px;
            }
            .cc-desc {
                padding-top: 15px;
            }
        }

        /* Footer styling for consistency */
        footer {
            grid-column: 1 / -1;
            border-radius: 26px;
            background: #fff; padding: 60px 40px; border-top: 1px solid #f1f5f9;
            display: flex; justify-content: space-between; gap: 40px; flex-wrap: wrap; margin-top: 20px;
        }
        .f-brand { flex: 1; min-width: 250px; }
        .f-logo-circle { width: 60px; height: 60px; border-radius: 50%; background: #f8fafc; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; }
        .f-logo-circle img { height: 35px; }
        .f-brand p { color: #64748b; font-size: 14.5px; line-height: 1.6; }
        .f-right { flex: 1; min-width: 250px; display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
        .f-socials { display: flex; gap: 12px; }
        .f-socials a { width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; }
        .f-socials a img { height: 18px; width: 18px; }

        @media (max-width: 768px) {
            footer {
                padding: 40px 20px;
                flex-direction: column;
                gap: 30px;
            }
            .f-right {
                align-items: flex-start;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'learning'])

        <main class="content">
            <h2 class="page-title">{{ __('learning.page_heading') }}</h2>
            
            <div class="main-card">
                <div class="tabs">
                    <div class="tab active">{{ __('learning.tab_ongoing') }}</div>
                    <div class="tab">{{ __('learning.tab_completed') }}</div>
                </div>

                <!-- <div class="grid">
                    @for($i = 0; $i < 4; $i++)
                    <a href="{{ route('learning.p2') }}" style="text-decoration: none; color: inherit;">
                        <div class="course-wrap">
                            <div class="course-card">
                                <div class="cc-header">
                                    <span class="cc-date">01 June 2026</span>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                </div>
                                <div class="cc-img" style="background-image: url('{{ asset('images/math_bg.png') }}');"></div>
                                <div class="cc-badge">(New Feature) Task</div>
                                <h3 class="cc-title">Mathematic</h3>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bg"><div class="progress-fill" style="width: 90%;"></div></div>
                                    <span class="progress-text">90%</span>
                                </div>
                                <p class="cc-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </a>
                    @endfor
                </div> -->

                @php
                    $learningCards = [
                        ['img' => '9. Animal care.jpg', 'progress' => 90, 'href' => '#'],
                        ['img' => '10. Create a startup.jpg', 'progress' => 90, 'href' => '#'],
                        ['img' => '1. Identity.png', 'progress' => 90, 'href' => '#'],
                        ['img' => '2. Relationship building digital business base.png', 'progress' => 90, 'href' => '#'],
                    ];
                    $learningItems = __('learning.items');
                @endphp
                <div class="grid">
                    @foreach ($learningCards as $index => $card)
                    @php $item = $learningItems[$index] ?? ['date' => '', 'title' => '', 'description' => '']; @endphp
                    <a href="{{ $card['href'] }}" style="text-decoration: none; color: inherit;">
                        <div class="course-wrap">
                            <div class="course-card">
                                <div class="cc-header">
                                    <span class="cc-date">{{ $item['date'] }}</span>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                </div>
                                <div class="cc-img" style="background-image: url('{{ asset('images/' . $card['img']) }}');"></div>
                                <div class="cc-badge">{{ __('learning.task_badge') }}</div>
                                <h3 class="cc-title">{{ $item['title'] }}</h3>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bg"><div class="progress-fill" style="width: {{ $card['progress'] }}%;"></div></div>
                                    <span class="progress-text">{{ $card['progress'] }}%</span>
                                </div>
                                <p class="cc-desc">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        <!-- Footer -->
        <footer>
            <div class="f-brand">
                <div class="f-logo-circle"><img src="{{ asset('images/icons/logo.svg') }}" alt="Logo"></div>
                <p>Learn anytime and anywhere from IL2 career skills</p>
            </div>
            <div class="f-right">
                <div class="f-socials">
                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></a>
                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg"></a>
                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Twitter_Logo.png"></a>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
