<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Event | EVENTO Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --dark-bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.85);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Header */
        .evento-header {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px 0;
            border-bottom: 2px solid rgba(102, 126, 234, 0.3);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .evento-logo {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 2px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 18px;
        }

        .admin-details {
            color: white;
            line-height: 1.4;
        }

        .admin-name {
            font-weight: 600;
            font-size: 14px;
        }

        .admin-role {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
        }

        .logout-btn {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: translateY(-2px);
            color: #ef4444;
        }

        /* Main Content */
        .main-container {
            padding: 50px 0;
        }

        .page-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .page-title h1 {
            font-size: 42px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 10px;
        }

        .page-title p {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Add Event Card */
        .add-event-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            border: 2px dashed rgba(102, 126, 234, 0.5);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            text-align: center;
            margin-bottom: 30px;
            cursor: pointer;
        }

        .add-event-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.4);
        }

        .add-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 36px;
            color: white;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .add-event-card h3 {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .add-event-card p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }

        /* Event Cards */
        .event-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(102, 126, 234, 0.2);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.4);
            border-color: var(--primary);
        }

        .event-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .event-card h3 {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .event-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .meta-item i {
            color: var(--primary);
        }

        .event-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .event-actions {
            display: flex;
            gap: 10px;
        }

        .btn-select {
            flex: 1;
            padding: 12px 25px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-select:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
            color: white;
        }

        .btn-edit {
            padding: 12px 20px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            color: #3b82f6;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit:hover {
            background: rgba(59, 130, 246, 0.2);
            transform: translateY(-2px);
            color: #3b82f6;
        }

        .btn-delete {
            padding: 12px 20px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 12px;
            color: #ef4444;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: translateY(-2px);
            color: #ef4444;
        }

        .section-title {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: var(--primary);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: rgba(255, 255, 255, 0.5);
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-state p {
            font-size: 18px;
        }

        /* Alerts */
        .alert {
            border-radius: 15px;
            padding: 15px 20px;
            margin-bottom: 30px;
            border: none;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22c55e;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
        }

        .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.7;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 32px;
            }

            .event-card h3 {
                font-size: 20px;
            }

            .event-actions {
                flex-direction: column;
            }

            .admin-info {
                flex-direction: column;
                text-align: center;
            }

            .logout-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="evento-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="evento-logo">
                        <i class="fas fa-calendar-star"></i> EVENTO
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-end align-items-center gap-3">
                        <div class="admin-info">
                            <div class="admin-avatar">
                                {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}
                            </div>
                            <div class="admin-details">
                                <div class="admin-name">{{ Auth::guard('admin')->user()->name }}</div>
                                <div class="admin-role">Administrator</div>
                            </div>
                        </div>
                        <a href="{{ route('admin_logout') }}" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        <div class="container">
            <!-- Success/Error Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Page Title -->
            <div class="page-title">
                <h1><i class="fas fa-calendar-check"></i> Select Your Event</h1>
                <p>Choose an event to manage or create a new one</p>
            </div>

            <!-- Add New Event Card -->
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin_upcoming_event_create') }}" class="text-decoration-none">
                        <div class="add-event-card">
                            <div class="add-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <h3>Create New Event</h3>
                            <p>Start planning your next amazing event</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Upcoming Events Section -->
            @if($upcoming_events->count() > 0)
            <div class="section-title">
                <i class="fas fa-calendar-alt"></i>
                Upcoming Events ({{ $upcoming_events->count() }})
            </div>

            <div class="row">
                @foreach($upcoming_events as $event)
                <div class="col-lg-6 col-md-12">
                    <div class="event-card">
                        @if($event->image)
                        <div class="event-image mb-3">
                            <img src="{{ asset('uploads/' . $event->image) }}"
                                 alt="{{ $event->title }}"
                                 style="width: 100%; height: 200px; object-fit: cover; border-radius: 15px;">
                        </div>
                        @else
                        <div class="event-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        @endif
                        <h3>{{ $event->title }}</h3>
                        <div class="event-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-sort-numeric-down"></i>
                                <span>Order: {{ $event->order }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-circle"></i>
                                <span class="text-capitalize">{{ $event->status }}</span>
                            </div>
                        </div>
                        @if($event->description)
                        <div class="event-description">
                            {{ $event->description }}
                        </div>
                        @endif
                        <div class="event-actions">
                            <a href="{{ route('admin_event_dashboard', $event->id) }}" class="btn-select">
                                <i class="fas fa-arrow-right"></i>
                                Manage Event
                            </a>
                            <a href="{{ route('admin_upcoming_event_edit', $event->id) }}" class="btn-edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin_upcoming_event_delete', $event->id) }}" class="btn-delete" onclick="return confirm('Are you sure you want to delete this event?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <p>No upcoming events yet. Create your first event to get started!</p>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
