@extends('layouts.app')

@section('title', $name . 'の分別情報')

@section('content')
<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>
    <div class="categories_container">
    <h2>{{ $name }} の分別情報</h2>

        @forelse ($posts as $post)
            <div class="post-item">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
            </div>
        @empty
            <p>このカテゴリには投稿がありません。</p>
        @endforelse

        <button class="back-button" onclick="location.href='{{ route('category') }}'">
            ← トップへ戻る
        </button>
    </div>
@endsection
