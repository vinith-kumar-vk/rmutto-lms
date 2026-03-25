<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | IL2 RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}?v={{ time() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Responsive Enhancements -->
    <link rel="stylesheet" href="{{ asset('css/dashboard-1-responsive.css') }}?v={{ time() }}">
    <style>/* Dashboard-1: all styles handled by dashboard-1-responsive.css */</style>
</head>
<body>

    @include('partials.header')

    <div class="shared-shell">
        @include('partials.sidebar', ['activePage' => 'dashboard'])

        <main class="shared-content">
            <h1 class="page-title" style="font-size: 24px; font-weight: 800; color: #003049; margin-bottom: 8px;">Dashboard</h1>
            <div class="flex-container">
                <div class="main-col">
                    <div class="section-card">
                        <p style="font-size:13px; font-weight:700; margin-bottom:10px;">This Week</p>
                        
                        <div class="chart-box">
                            <div class="y-labels">
                                <span>5h</span><span>4h</span><span>3h</span><span>2h</span><span>1h</span><span>0</span>
                            </div>
                            <!-- Grid lines -->
                            <div class="grid-line" style="top:0%"></div>
                            <div class="grid-line" style="top:20%"></div>
                            <div class="grid-line" style="top:40%"></div>
                            <div class="grid-line" style="top:60%"></div>
                            <div class="grid-line" style="top:80%"></div>

                            <div class="bars-wrapper">
                                @php
                                    $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                    $vals = [80, 25, 80, 60, 40, 55, 15]; // Adjusted to match image exactly
                                @endphp
                                @foreach($days as $i => $day)
                                <div class="bar-container">
                                    <div class="bar-actual" style="height: {{ $vals[$i] }}%;"></div>
                                    <span class="x-label">{{ $day }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-header">Enrolled Courses</div>
                        <div class="enrolled-list">
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#003a70;"></div>
                                <div class="enrolled-info">
                                    <h4>Veterinary Nursing Assistant Course</h4>
                                    <p>09:00 AM - 10:00 AM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#22c55e;"></div>
                                <div class="enrolled-info">
                                    <h4>Building a Sustainable Startup</h4>
                                    <p>11:00 AM - 01:00 PM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#8b5cf6;"></div>
                                <div class="enrolled-info">
                                    <h4>Rajamangala Identity Course</h4>
                                    <p>01:00 PM - 01:30 PM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#f97316;"></div>
                                <div class="enrolled-info">
                                    <h4>Building Relationships</h4>
                                    <p>03:30 PM - 04:30 PM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="side-col">
                    <div class="section-card">
                        <div class="section-header">Courses</div>
                        <a href="{{ route('course.detail') }}" class="course-card" style="text-decoration:none; color:inherit;">
                            <div class="course-circ"></div>
                            <div class="course-body">
                                <h4>Veterinary Nursing Assistant Course</h4>
                                <p>12 hours</p>
                                <div class="progress-row">
                                    <div class="prog-bg"><div class="prog-fill" style="width: 50%;"></div></div>
                                    <span class="prog-val">50%</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('course.detail') }}" class="course-card" style="text-decoration:none; color:inherit;">
                            <div class="course-circ"></div>
                            <div class="course-body">
                                <h4>Building a Sustainable Startup</h4>
                                <p>32 hours</p>
                                <div class="progress-row">
                                    <div class="prog-bg"><div class="prog-fill" style="width: 90%;"></div></div>
                                    <span class="prog-val">90%</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('course.detail') }}" class="course-card" style="text-decoration:none; color:inherit;">
                            <div class="course-circ"></div>
                            <div class="course-body">
                                <h4>Rajamangala Identity Course</h4>
                                <p>32 hours</p>
                                <div class="progress-row">
                                    <div class="prog-bg"><div class="prog-fill" style="width: 100%;"></div></div>
                                    <span class="prog-val">100%</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>

            <!-- Notes Section -->
            <div class="section-card">
                <div class="section-header">
                    <span style="display:flex; align-items:center; gap:8px;">
                        Notes
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity:0.5;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </span>
                    <div class="notes-header-actions" style="display:flex; gap:15px; align-items:center;">
                        <button class="btn-add" style="height:32px; padding:0 15px;">+ Add List</button>
                    </div>
                </div>

                <div class="notes-grid">
                    <div class="note-column">
                        <div class="note-col-head">
                            <span>Reminder <span class="count-badge">3</span></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                        </div>
                        <a href="#" class="show-pinned-task">Show Pinned Task</a>
                        <div class="note-card">
                            <span class="note-tag tag-med">Medium</span>
                            <p class="note-text">(New Feature) Task</p>
                        </div>
                        <div class="plus-btn-card"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
                        
                        <!-- Inline Add Form as shown in image -->
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
                    </div>

                    <div class="note-column">
                        <div class="note-col-head">
                            <span>To Do <span class="count-badge">3</span></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                        </div>
                        <a href="#" class="show-pinned-task">Show Pinned Task</a>
                        <div class="note-card">
                            <span class="note-tag tag-high">High</span>
                            <p class="note-text">(New Feature) Task</p>
                        </div>
                        <div class="plus-btn-card"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
                    </div>

                    <div class="note-column" style="background:transparent; border:1px dashed #e2e8f0;">
                         <div class="add-task-form" style="border:none;">
                            <input type="text" placeholder="Edit list title..." style="font-weight:600; font-size:14px;">
                            <div class="form-btns">
                                <button class="btn-add">+ Add List</button>
                                <button class="btn-cancel" style="background:#fff; border:1px solid #e2e8f0;">Cancel</button>
                            </div>
                        </div>
                    </div>
            </div>
        </main>
        @include('partials.footer-dashboard')
    </div>
</body>
</html>
