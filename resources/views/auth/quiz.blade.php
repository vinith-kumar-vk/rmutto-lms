<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'th' ? 'th' : 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('quiz.page_title') }}</title>
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

        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        .shared-shell {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 30px;
            max-width: 1450px;
            margin: 0 auto;
            padding: 100px 30px 40px;
            width: 100%;
        }

        .sidebar {
            background: #fff;
            border-radius: 24px;
            padding: 25px 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .nav-item {
            display: flex; align-items: center; gap: 14px; padding: 12px 18px; border-radius: 14px;
            text-decoration: none; color: #64748b; font-size: 14px; font-weight: 500; margin-bottom: 4px; transition: 0.2s;
        }

        .nav-item:hover { background: #f1f5f9; color: #0f172a; }
        .nav-item.active { background: #f1f5f9; color: #003a70; font-weight: 700; }
        .nav-item img { width: 22px; height: 22px; opacity: 0.7; }
        .nav-item.active img { opacity: 1; }

        .content { display: flex; flex-direction: column; gap: 20px; }
        .page-title { font-size: 24px; font-weight: 800; color: #1e293b; }

        .quiz-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 24px;
        }

        .card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 18px rgba(0,0,0,0.03);
            padding: 24px;
        }

        .card h3 { font-size: 18px; font-weight: 800; color: #1e293b; margin-bottom: 12px; }
        .card p { color: #64748b; font-size: 14px; line-height: 1.6; }

        .quiz-list { margin-top: 16px; display: flex; flex-direction: column; gap: 12px; }

        .quiz-item {
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .quiz-item .meta h4 { font-size: 15px; color: #1e293b; margin-bottom: 4px; }
        .quiz-item .meta span { font-size: 12px; color: #94a3b8; }

        .badge {
            font-size: 12px;
            font-weight: 700;
            padding: 6px 10px;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }

        .btn-primary {
            border: none;
            background: #003a70;
            color: #fff;
            border-radius: 10px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-primary:hover { background: #002a55; }

        @media (max-width: 1024px) {
            .shared-shell { 
                grid-template-columns: 1fr; 
                padding: 0 16px 24px !important; 
            }
            .sidebar { display: block !important; }
            .content { 
                margin-top: 75px !important; 
                gap: 0 !important; 
                width: 100%;
            }
            .quiz-grid { grid-template-columns: 1fr; gap: 0 !important; }
            .card { margin-bottom: 0 !important; }
            footer { flex-direction: column !important; padding: 40px 20px !important; }
        }

        @media (max-width: 768px) {
            .page-title { font-size: 20px; }
            .card { padding: 20px 15px; }
            .quiz-item { flex-direction: column; align-items: flex-start; gap: 10px; }
            .quiz-item .badge, .quiz-item .btn-primary { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'quiz'])

        <main class="content">
            <h1 class="page-title">{{ __('quiz.heading') }}</h1>

            <div class="quiz-grid">
                <section class="card">
                    <h3>{{ __('quiz.upcoming_title') }}</h3>
                    <p>{{ __('quiz.upcoming_desc') }}</p>

                    <div class="quiz-list">
                        <div class="quiz-item">
                            <div class="meta">
                                <h4>{{ __('quiz.quiz1_title') }}</h4>
                                <span>{{ __('quiz.quiz1_meta') }}</span>
                            </div>
                            <span class="badge">{{ __('quiz.due_today') }}</span>
                        </div>
                        <div class="quiz-item">
                            <div class="meta">
                                <h4>{{ __('quiz.quiz2_title') }}</h4>
                                <span>{{ __('quiz.quiz2_meta') }}</span>
                            </div>
                            <span class="badge">{{ __('quiz.tomorrow') }}</span>
                        </div>
                        <div class="quiz-item">
                            <div class="meta">
                                <h4>{{ __('quiz.quiz3_title') }}</h4>
                                <span>{{ __('quiz.quiz3_meta') }}</span>
                            </div>
                            <span class="badge">{{ __('quiz.two_days_left') }}</span>
                        </div>
                    </div>
                </section>

                <section class="card">
                    <h3>{{ __('quiz.quick_title') }}</h3>
                    <p>{{ __('quiz.quick_desc') }}</p>

                    <div class="quiz-list">
                        <div class="quiz-item">
                            <div class="meta">
                                <h4>{{ __('quiz.resume_title') }}</h4>
                                <span>{{ __('quiz.resume_sub') }}</span>
                            </div>
                            <button type="button" class="btn-primary">{{ __('quiz.continue') }}</button>
                        </div>
                        <div class="quiz-item">
                            <div class="meta">
                                <h4>{{ __('quiz.practice_title') }}</h4>
                                <span>{{ __('quiz.practice_sub') }}</span>
                            </div>
                            <button type="button" class="btn-primary">{{ __('quiz.start') }}</button>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        @include('partials.footer-dashboard')
    </div>
</body>
</html>
