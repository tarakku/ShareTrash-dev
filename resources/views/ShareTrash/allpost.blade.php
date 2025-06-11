@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    <div class="allpost_container">
        
        <x-nav />

        <div class="controls-section">
            <div class="sort-section">
                <label for="sortBy">SortBy</label>
                <select id="sortBy" class="sort-dropdown">
                    <option value="value">Value</option>
                    <option value="date">日付</option>
                    <option value="views">閲覧数</option>
                </select>
            </div>
            @auth
            <button class="create-post-btn">CreatePost</button>
            @endauth
        </div>

        <div class="nav-icons-section">
            <div class="nav-icons">
                <a href="#" class="icon-btn"><i class="fas fa-arrow-left"></i></a>
                <a href="#" class="icon-btn"><i class="fas fa-arrow-right"></i></a>
                <a href="#" class="icon-btn"><i class="fas fa-comment-dots"></i></a>
                <a href="#" class="icon-btn"><i class="fas fa-frown"></i></a>
                <a href="#" class="icon-btn"><i class="fas fa-eye"></i></a>
            </div>
            <div class="recent-activity">Recent Activity</div>
        </div>

        <div class="post-list">
            @if ($posts->isEmpty())
                <p class="no-posts">まだ投稿がありません。</p>
            @else
                @foreach ($posts as $post)
                    <div class="post-item">
                        <div class="post-details">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <p class="post-category">カテゴリー: {{ $post->category->name ?? '未分類' }}</p> {{-- category->name を表示 --}}
                        </div>
                        <div class="post-stats">
                            <span class="stat-item">{{ $post->views_count }}</span>
                            <span class="stat-item">{{ $post->likes_count }}</span>
                            <span class="stat-item">0</span> {{-- コメント数を想定 --}}
                            <span class="stat-item">0</span> {{-- 不満数を想定 --}}
                        </div>
                        <div class="post-meta">
                            <i class="fas fa-user-circle user-icon"></i>
                            <span class="post-date">{{ $post->posted_at->format('Y年m月d日') }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</main>
@endsection