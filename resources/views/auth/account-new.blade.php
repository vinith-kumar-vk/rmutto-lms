<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | IL2 RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <style>
        :root {
            --primary-blue: #003a70;
            --bg-gray: #f1f4f9;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --border-light: #e5e7eb;
            --white: #ffffff;
            --success-green: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-gray);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        /* â”€â”€â”€ CONTENT AREA â”€â”€â”€ */
        .content-header {
            margin-bottom: 24px;
        }

        .content-header h1 {
            font-size: 22px;
            font-weight: 800;
            color: #1a202c;
        }

        .account-card {
            background: var(--white);
            border-radius: 24px;
            padding: 50px 60px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02);
            min-height: 700px;
        }

        /* â”€â”€â”€ AVATAR â”€â”€â”€ */
        .avatar-section {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 45px;
        }

        .avatar-lg {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #94a3b8;
        }

        .edit-btn {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* â”€â”€â”€ FORM â”€â”€â”€ */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px 40px;
            align-items: flex-end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 700;
            color: #1a202c;
        }

        .form-group label span {
            color: #ef4444;
            margin-left: 2px;
        }

        .form-group input, 
        .form-group select {
            height: 52px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 0 18px;
            font-size: 14px;
            color: #4a5568;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            border-color: #3b82f6;
        }

        .btn-navy {
            height: 44px;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0 30px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .btn-update {
            margin-top: 50px;
            height: 52px;
            width: 220px;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-update:hover {
            opacity: 0.9;
        }

        @media (max-width: 1024px) {
            .account-card {
                padding: 40px 30px;
            }
        }

        @media (max-width: 768px) {
            .account-card {
                padding: 30px 20px;
                border-radius: 20px;
                min-height: auto;
            }
            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .avatar-section {
                width: 80px;
                height: 80px;
                margin-bottom: 30px;
            }
            .avatar-lg {
                width: 80px;
                height: 80px;
            }
            .btn-update {
                width: 100%;
                margin-top: 30px;
            }
            .btn-navy {
                width: 100%;
            }
            .content-header h1 {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .account-card {
                padding: 25px 15px;
            }
            .form-group input, 
            .form-group select {
                height: 48px;
                font-size: 13.5px;
            }
            .form-group label {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'account'])

        <!-- Main Content -->
        <main class="shared-content">
            <div class="content-header">
                <h1>My Account</h1>
            </div>

            <div class="account-card">
                <!-- Avatar -->
                <div class="avatar-section">
                    <div class="avatar-lg"></div>
                    <button class="edit-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('account.update') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Full Name<span>*</span></label>
                            <input type="text" name="name" value="{{ $user->name ?? 'Student' }}">
                        </div>
                        <div class="form-group">
                            <label>Username<span>*</span></label>
                            <input type="text" name="username" value="{{ $user->username ?? '@Student2' }}">
                        </div>

                        <div class="form-group">
                            <label>Current Password<span>*</span></label>
                            <input type="password" name="current_password" value="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('password.change') }}" class="btn-navy">Change</a>
                        </div>

                        <div class="form-group">
                            <label>Old Password<span>*</span></label>
                            <input type="password" name="old_password" placeholder="Enter old password">
                        </div>
                        <div class="form-group">
                            <label>New Password<span>*</span></label>
                            <input type="password" name="new_password" placeholder="Enter new password">
                        </div>

                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="email" name="email" value="{{ $user->email ?? '123@gmail.com' }}">
                        </div>
                        <div class="form-group">
                            <label>Date of birth<span>*</span></label>
                            <input type="text" name="dob" value="{{ $user->dob ?? 'Teacher' }}">
                        </div>

                        <div class="form-group">
                            <label>Phone No<span>*</span></label>
                            <input type="tel" name="phone" value="{{ $user->phone ?? '000-0000 0000' }}">
                        </div>
                        <div class="form-group">
                            <label>Country<span>*</span></label>
                            <select name="country">
                                <option @if(($user->country ?? 'Malaysia') == 'Malaysia') selected @endif>Malaysia</option>
                                <option @if(($user->country ?? '') == 'Thailand') selected @endif>Thailand</option>
                                <option @if(($user->country ?? '') == 'Singapore') selected @endif>Singapore</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-update">Update</button>
                </form>

                <form id="password-form" action="{{ route('account.password') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </main>
        @include('partials.footer-dashboard')
    </div>
</body>
</html>
