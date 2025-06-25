<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理者ダッシュボード</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f5f6f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 2rem;
        }

        h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .container {
            padding: 2rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 1.5rem;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .card h2 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .card p {
            color: #666;
        }

        footer {
            text-align: center;
            color: #999;
            font-size: 0.9rem;
            padding: 1rem;
            margin-top: 3rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>管理者ダッシュボード</h1>
    </header>

    <div class="container">
        <p>ようこそ、管理者ページへ。</p>

        <div class="grid">
            <div class="card">
                <h2>投稿管理</h2>
                <p>投稿の一覧・編集・削除を行います</p>
            </div>

            <div class="card">
                <h2>ユーザー管理</h2>
                <p>登録ユーザーの確認や制限の管理</p>
            </div>

            <div class="card">
                <h2>お問い合わせ</h2>
                <p>ユーザーからの問い合わせを見る</p>
            </div>

            <div class="card">
                <h2>サイト統計</h2>
                <p>投稿数やアクティビティ状況</p>
            </div>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} GreenCycle 管理システム
    </footer>
</body>
</html>
