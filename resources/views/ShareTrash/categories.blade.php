@extends('layouts.app')

@section('title', $name . 'の分別情報')

@section('content')
<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>
    <div class="categories_container">
        <h2>{{ $name }}の分別情報</h2>
            <div class="post-list">
            @forelse ($posts as $post)
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
            @empty
                <p class="no-posts">まだ投稿がありません。</p>
            @endforelse
        </div>
        <button class="back-button" onclick="location.href='{{ route('category') }}'">
            トップページへ戻る
        </button>
    </div>
@endsection
