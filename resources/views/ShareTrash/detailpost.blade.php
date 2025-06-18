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
        <a href="{{ route('posts.allpost') }}" class="back-btn">
                トップへ戻る
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

            <div class="actions">
                <div class="stat-group">
                    <i class="far fa-thumbs-up"></i>
                    <span>{{ $post->likes_count }}</span>
                </div>
                <div class="stat-group">
                    <i class="fas fa-eye"></i>
                    <span>{{ $post->views_count }}</span>
                </div>
                <div class="stat-group">
                    <i class="fas fa-comment-dots"></i>
                    <span>0</span>
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
            <form class="comment-box" action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST">
                @csrf
                <input type="text" name="body" placeholder="コメントを書いてみよう！！" required>
                <button type="submit" class="comment-btn">コメント</button>
            </form>
        @endauth

        @if ($post->comments->count())
        <div class="comments-section">
            <h3>コメント一覧</h3>
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <p class="comment-body">{{ $comment->body }}</p>
                    <p class="comment-meta">{{ $comment->user->name ?? '匿名' }} - {{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
        @endif
        <!-- コメント機能ここまで　-->
    </div>
</main>
@endsection