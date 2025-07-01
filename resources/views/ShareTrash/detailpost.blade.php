@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>
<main>
    <div class="show_container">
      <div class="back"> 
        <a href="{{ session('return_to', route('posts.my')) }}" class="back-btn">
                前のページに戻る
        </a>
      </div>
        <div class="post-header">
            <div class="user-info">
                <img src="{{ asset('header_images/login_icon.png') }}" alt="ユーザーアイコン" class="user-icon">
                <div>
                    <p class="username">Admin</p>
                    <p class="post-date">{{ $post->posted_at->format('m月d日') }}</p>
                </div>
            </div>
        </div>

        <div class="post-title-and-footer">
            <h2 class="post-title">{{ $post->title }}</h2>
            <p class="post-category">カテゴリー: {{ $post->category->category_name ?? '未分類' }}</p>
            <div class="post-content">{!! nl2br(e($post->content)) !!}</div>

            @if($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="投稿画像" class="post-image">
            @endif

            <div class="actions">
                <div class="stat-group">
                    <form method="POST" action="{{ route('posts.like', ['post' => $post->post_id]) }}">
                        @csrf
                        <button type="submit" class="like-button">
                            <i class="far fa-thumbs-up"></i> {{ $post->likes_count }}
                        </button>
                    </form>
                </div>
                <div class="stat-group">
                    <i class="fas fa-eye"></i>
                    <span>{{ $post->views_count }}</span>
                </div>
                <div class="stat-group">
                    <i class="fas fa-comment-dots"></i>
                    <span>{{ $post->comments->count() }}</span>
                </div>

                <div class="nav-arrows">
                    <a href="#"><i class="fa fa-chevron-left"></i></a>
                    <a href="#"><i class="fa fa-chevron-right"></i></a>
                </div>

                <p class="posted-at">投稿日: {{ $post->posted_at->format('Y年m月d日') }}</p>
            </div>
        </div>

        <!-- コメント機能　-->
        @auth
            <form class="comment-box" action="{{ route('posts.comments.store', ['post' => $post->post_id]) }}" method="POST">
                @csrf
                <input type="text" name="content" placeholder="コメントを書いてみよう！！" required>
                <button type="submit" class="comment-btn">コメント</button>
            </form>
        @endauth

    
        <div class="comments-section">
            <h3>コメント一覧</h3>
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <p class="comment-content">{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>

        <!-- コメント機能ここまで　-->
    </div>
</main>
@endsection