@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
<div class="message">
    <h2>GreenCycle Community</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    
    <div class="allpost_container">
        <x-nav />

        <div class="controls-section">
            <div class="sort-section">
                <form action="{{ route('posts.allpost') }}" method="GET" id="sortForm">
                    <label for="sortBy">並び替え</label>
                    <select id="sortBy" class="sort-dropdown" name="sort_by" onchange="this.form.submit()">
                        <option value="views_count" @selected($sortBy == 'views_count')>閲覧数</option>
                        <option value="likes_count" @selected($sortBy == 'likes_count')>いいね数</option>
                        <option value="posted_at" @selected($sortBy == 'posted_at')>投稿日時</option>
                    </select>
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                </form>
            </div>
            <div class="page-up-down">
                @if($posts->previousPageUrl())
                    <a href="{{ $posts->previousPageUrl() }}" class="page-link left-arrow">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                @else
                    <i class="fa fa-chevron-left disabled-arrow"></i>
                @endif

                <span class="current-page-info">
                {{ $posts->currentPage() }} / {{ $posts->lastPage() }}
                </span>


                @if ($posts->nextPageUrl())
                    <a href="{{ $posts->nextPageUrl() }}" class="page-link right-arrow">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                @else
                    <i class="fa fa-chevron-right disabled-arrow"></i>
                @endif
            </div>
            @auth
            <a href="{{ route('posts.create') }}" class="create-post-btn">投稿作成</a>
            @endauth
        </div>

        <div class="post-list">
            @if ($posts->isEmpty())
                <p class="no-posts">まだ投稿がありません。</p>
            @else
                @foreach ($posts as $post)
                <a href="{{ route('posts.detail', $post) }}" class="post-item">
                    <div class="post-details">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <p>カテゴリー: {{ $post->category->category_name ?? '未分類' }}</p>
                    </div>
                    <div class="post-stats">
                        <i class="fas fa-eye"></i>
                        <span class="stat-item">{{ $post->views_count }}</span>
                        <i class="far fa-thumbs-up"></i>
                        <span class="stat-item">{{ $post->likes_count }}</span>
                        <i class="fas fa-comment-dots"></i>
                        <span class="stat-item">{{ $post->comments->count() }}</span>
                    </div>
                    <div class="post-meta">
                        <span class="post-date">{{ $post->posted_at->format('Y年m月d日') }}</span>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>
</main>
@endsection