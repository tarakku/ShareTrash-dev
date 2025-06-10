@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    <div class="allpost">
        <x-nav />
        @if ($posts->isEmpty())
            <p class="no-posts">まだ投稿がありません。</p>
        @else
            @foreach ($posts as $post)
                <div class="post-container">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    @if ($post->category)
                        <p class="post-category">category: {{ $post->category->category_name }}</p>
                    @else
                        <p class="post-category">category: なし</p>
                    @endif
                    <p class="post-content">view: {{ $post->views_count }}</p>
                    <p class="post-content">{{ $post->likes_count }}</p>
                    <p class="post-date">投稿日: {{ $post->posted_at->format('Y/m/d H:i') }}</p>
                    @if ($post->edited_at)
                        <p class="post-date">編集日: {{ $post->edited_at->format('Y/m/d H:i') }}</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</main>
@endsection