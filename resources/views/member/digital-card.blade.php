<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Member ID | Karang Taruna</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #3730A3;
            --accent: #10B981;
            --bg-grad: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-grad);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .card-container {
            perspective: 1000px;
        }

        .id-card {
            width: 350px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s ease;
        }

        .id-card:hover {
            transform: translateY(-5px) rotateX(2deg) rotateY(2deg);
            box-shadow: 0 35px 60px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 25px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            right: 0;
            height: 30px;
            background: inherit;
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0);
        }

        .card-title {
            font-weight: 800;
            font-size: 1.2rem;
            letter-spacing: 1px;
            margin: 0;
            text-transform: uppercase;
        }

        .card-subtitle {
            font-size: 0.8rem;
            opacity: 0.8;
            margin-top: 5px;
        }

        .card-body {
            padding: 40px 20px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin-top: -80px;
            z-index: 2;
            background-color: #fff;
            object-fit: cover;
        }

        .member-info {
            text-align: center;
            margin-top: 15px;
            width: 100%;
        }

        .member-name {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1f2937;
            margin: 0 0 5px;
        }

        .member-role {
            display: inline-block;
            background: var(--accent);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
        }

        .badge-info {
            background: #fdf2f8;
            color: #db2777;
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            width: max-content;
            margin: 0 auto 20px;
            border: 1px solid #fbcfe8;
        }

        .qr-wrapper {
            background: white;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            /* Important for simple-qrcode */
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .qr-wrapper svg {
            width: 100%;
            height: auto;
            max-width: 150px;
        }

        .card-footer {
            text-align: center;
            padding: 15px;
            font-size: 0.75rem;
            color: #6b7280;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            background: rgba(255, 255, 255, 0.3);
        }

        .uuid-text {
            font-family: monospace;
            display: block;
            margin-top: 5px;
            font-size: 0.7rem;
            color: #9ca3af;
        }

        /* Decorative circles for glassmorphism background effect */
        .decoration {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.6;
        }
        .dec-1 {
            width: 300px;
            height: 300px;
            background: #4F46E5;
            top: -100px;
            left: -100px;
        }
        .dec-2 {
            width: 400px;
            height: 400px;
            background: #10B981;
            bottom: -150px;
            right: -100px;
        }

        /* Responsive */
        @media (max-width: 400px) {
            .id-card {
                width: 100%;
                max-width: 320px;
            }
        }
    </style>
</head>
<body>
    <div class="decoration dec-1"></div>
    <div class="decoration dec-2"></div>

    <div class="card-container">
        <div class="id-card">
            <div class="card-header">
                <h1 class="card-title">Digital Member ID</h1>
                <div class="card-subtitle">Karang Taruna Management System</div>
            </div>
            
            <div class="card-body">
                <img src="{{ $anggota->foto ? asset('storage/'.$anggota->foto) : 'https://ui-avatars.com/api/?name='.urlencode($anggota->nama).'&background=4F46E5&color=fff' }}" alt="Profile" class="profile-img">
                
                <div class="member-info">
                    <h2 class="member-name">{{ $anggota->nama }}</h2>
                    <span class="member-role">{{ strtoupper($anggota->status) }}</span>
                    
                    <div class="badge-info">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                        Badge: {{ $anggota->badge }} ({{ $anggota->points }} Pts)
                    </div>

                    <div class="qr-wrapper">
                        {!! $qrCode !!}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                SCAN FOR ATTENDANCE
                <span class="uuid-text">{{ $anggota->uuid }}</span>
            </div>
        </div>
    </div>
</body>
</html>
