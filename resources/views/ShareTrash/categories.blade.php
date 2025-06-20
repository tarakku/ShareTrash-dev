@extends('layouts.app')

@section('title', $name . 'の分別情報')

@section('content')
    <h2>{{ $name }} の分別情報</h2>

    @forelse ($posts as $post)
        <div class="post-item">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>
        </div>
    @empty
        <p>このカテゴリには投稿がありません。</p>
    @endforelse

    <a href="{{ route('posts.allpost') }}">← トップへ戻る</a>
@endsection
