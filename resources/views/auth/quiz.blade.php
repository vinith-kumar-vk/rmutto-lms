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

        /* Sidebar & Header are handled by layout.css */

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

        @media (max-width: 1100px) {
            .quiz-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .shared-shell {
                padding: 80px 15px 30px;
            }
            .page-title {
                font-size: 24px;
                margin-bottom: 20px;
            }
            .card {
                padding: 20px 15px;
                border-radius: 16px;
            }
            .quiz-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .quiz-item .meta h4 {
                font-size: 14px;
            }
            .btn-primary {
                width: 100%;
                text-align: center;
            }
            .badge {
                align-self: flex-start;
            }
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
    </div>
</body>
</html>
