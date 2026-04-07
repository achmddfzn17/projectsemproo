<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Leaderboard | Karang Taruna</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --gold: #fbbf24;
            --silver: #94a3b8;
            --bronze: #b45309;
            --primary: #3b82f6;
            --text-main: #f8fafc;
            --text-muted: #cbd5e1;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            background-image: radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
            color: var(--text-main);
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
            box-sizing: border-box;
            background-attachment: fixed;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            margin: 0;
            background: linear-gradient(to right, #60a5fa, #c084fc);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .header p {
            color: var(--text-muted);
            margin-top: 10px;
            font-size: 1.1rem;
        }

        .leaderboard-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .member-row {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .member-row:hover {
            transform: translateX(10px);
            background: rgba(45, 60, 85, 0.8);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .rank {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            width: 40px;
            color: #64748b;
        }

        .rank-1 .rank { color: var(--gold); font-size: 2rem; }
        .rank-2 .rank { color: var(--silver); font-size: 1.8rem; }
        .rank-3 .rank { color: var(--bronze); font-size: 1.6rem; }

        .profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: 0 20px;
            border: 2px solid rgba(255,255,255,0.1);
            object-fit: cover;
        }

        .rank-1 .profile-pic { border-color: var(--gold); box-shadow: 0 0 15px rgba(251, 191, 36, 0.5); }
        .rank-2 .profile-pic { border-color: var(--silver); box-shadow: 0 0 15px rgba(148, 163, 184, 0.5); }
        .rank-3 .profile-pic { border-color: var(--bronze); box-shadow: 0 0 15px rgba(180, 83, 9, 0.5); }

        .member-details {
            flex-grow: 1;
        }

        .member-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0 0 4px;
        }

        .member-badge {
            font-size: 0.85rem;
            color: var(--primary);
            background: rgba(59, 130, 246, 0.1);
            padding: 3px 8px;
            border-radius: 6px;
            display: inline-block;
        }

        .points-pill {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 800;
            font-size: 1.1rem;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
            text-align: center;
            min-width: 80px;
        }
        
        .rank-1 .points-pill { background: linear-gradient(135deg, #fbbf24, #d97706); box-shadow: 0 4px 10px rgba(251, 191, 36, 0.3); }
        .rank-2 .points-pill { background: linear-gradient(135deg, #94a3b8, #64748b); box-shadow: 0 4px 10px rgba(148, 163, 184, 0.3); }
        .rank-3 .points-pill { background: linear-gradient(135deg, #d97706, #b45309); box-shadow: 0 4px 10px rgba(217, 119, 6, 0.3); }

        .nav-back {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.3s;
        }
        .nav-back:hover {
            color: white;
        }

        @media (max-width: 600px) {
            .member-row {
                padding: 15px;
            }
            .profile-pic {
                margin: 0 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ url('/') }}" class="nav-back">← Back to Home</a>
        
        <div class="header">
            <h1>Hall of Fame</h1>
            <p>Top 10 Most Active Karang Taruna Members</p>
        </div>

        <div class="leaderboard-list">
            @forelse($topMembers as $index => $member)
                <div class="member-row rank-{{ $index + 1 }}">
                    <div class="rank">#{{ $index + 1 }}</div>
                    <img src="{{ $member->foto ? asset('storage/'.$member->foto) : 'https://ui-avatars.com/api/?name='.urlencode($member->nama).'&background=random&color=fff' }}" alt="{{ $member->nama }}" class="profile-pic">
                    <div class="member-details">
                        <h3 class="member-name">{{ $member->nama }}</h3>
                        <span class="member-badge">{{ $member->badge }}</span>
                    </div>
                    <div class="points-pill">
                        {{ $member->points }} <span style="font-size: 0.7rem; font-weight: normal;">PTS</span>
                    </div>
                </div>
            @empty
                <div style="text-align: center; color: var(--text-muted); padding: 40px; background: rgba(255,255,255,0.05); border-radius: 12px;">
                    Belum ada data member.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
