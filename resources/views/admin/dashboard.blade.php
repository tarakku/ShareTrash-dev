<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理者ダッシュボード</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>
<body>
    <header>
        <h1>管理者ダッシュボード</h1>
    </header>

    <div class="container">
        <p>ようこそ、管理者ページへ。</p>

        <div class="grid">
            <div class="card" onclick="showPostSection()" style="cursor:pointer;">
                <h2>投稿管理</h2>
                <p>投稿の一覧・編集・削除を行います</p>
            </div>

            <div class="card" onclick="showUserSection()" style="cursor:pointer;">
                <h2>ユーザー管理</h2>
                <p>登録ユーザーの確認や制限の管理</p>
            </div>

            <div class="card">
                <h2>お問い合わせ</h2>
                <p>ユーザーからの問い合わせを見る</p>
            </div>

            <div class="card" onclick="showStatsSection()" style="cursor:pointer;">
                <h2>サイト統計</h2>
                <p>投稿数やアクティビティ状況</p>
            </div>
        </div>

        {{-- 投稿管理エリア（最初は非表示） --}}
        <div id="postSection" class="content-area" style="display: none;">
            <h3>投稿管理</h3>
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <span class="label">タイトル:</span><span class="value">{{ $post->title }}</span>
                        <span class="label">カテゴリー:</span><span class="value">{{ $post->category->category_name ?? '未分類' }}</span>
                        <span class="label">ビュー数:</span><span class="value">{{ $post->views_count }}</span>
                        <span class="label">いいね数:</span><span class="value">{{ $post->likes_count }}</span>
                        <span class="label">コメント数:</span><span class="value">{{ $post->comments->count() }}</span>
                        <span class="label">投稿日:</span><span class="value">{{ $post->posted_at ? $post->posted_at->format('Y年m月d日') : '日付なし' }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- ユーザー管理エリア（最初は非表示） --}}
        <div id="userSection" class="content-area" style="display: none;">
            <h3>ユーザー管理</h3>
            <ul>
                @foreach ($users as $user)
                    <li>
                        <span class="label">ニックネーム:</span><span class="value">{{ $user->nickname }}</span>
                        <span class="label">メール:</span><span class="value">{{ $user->email }}</span>
                        <span class="label">都道府県:</span><span class="value">{{ $user->address_prefecture ?? '未設定' }}</span>
                        <span class="label">市区町村:</span><span class="value">{{ $user->address_city ?? '未設定' }}</span>
                        <span class="label">登録日:</span><span class="value">{{ $user->created_at ? $user->created_at->format('Y年m月d日') : '日付なし' }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- サイト統計エリア（最初は非表示） --}}
        <div id="statsSection" class="content-area" style="display: none;">
            <h3>サイト統計</h3>
            <canvas id="statsChart" width="400" height="220" style="max-width:100%;margin-bottom:2rem;"></canvas>
            <ul>
                <li><span class="label">投稿数:</span><span class="value">{{ $stats['post_count'] }}</span></li>
                <li><span class="label">ユーザー数:</span><span class="value">{{ $stats['user_count'] }}</span></li>
                <li><span class="label">コメント数:</span><span class="value">{{ $stats['comment_count'] }}</span></li>
            </ul>
        </div>

    </div>

    <footer>
        &copy; {{ date('Y') }} GreenCycle 管理システム
    </footer>

    <script>
        function showPostSection() {
            const postSection = document.getElementById('postSection');
            postSection.style.display = (postSection.style.display === 'none' || postSection.style.display === '') ? 'block' : 'none';
            document.getElementById('userSection').style.display = 'none';
            document.getElementById('statsSection').style.display = 'none';
        }
        function showUserSection() {
            const userSection = document.getElementById('userSection');
            userSection.style.display = (userSection.style.display === 'none' || userSection.style.display === '') ? 'block' : 'none';
            document.getElementById('postSection').style.display = 'none';
            document.getElementById('statsSection').style.display = 'none';
        }
        function showStatsSection() {
            const statsSection = document.getElementById('statsSection');
            statsSection.style.display = (statsSection.style.display === 'none' || statsSection.style.display === '') ? 'block' : 'none';
            document.getElementById('postSection').style.display = 'none';
            document.getElementById('userSection').style.display = 'none';
            if(statsSection.style.display === 'block') {
                window.renderStatsChart({
                    post_count: {{ $stats['post_count'] }},
                    user_count: {{ $stats['user_count'] }},
                    comment_count: {{ $stats['comment_count'] }}
                });
            }
        }
    </script>
</body>
</html>
