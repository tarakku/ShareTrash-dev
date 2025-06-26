@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    <div class="edit_container">
        <div class="back"> 
            <a href="{{ session('return_to', route('posts.my')) }}" class="back-btn">
                    前のページに戻る
            </a>
        </div>

        <h1>投稿編集</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST" id="updatePost">
            @csrf
            @method('PUT')

            <div class="title">
                <label for="title">タイトル</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <p class="error-message>{{ $message }}</p>
                @enderror
            </div>

            <div class="content">
                <label for="content">本文</label>
                <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="category-section">
                <label for="category_id">カテゴリー</label>
                <select name="category_id" class="category-dropdown" id="category_id" value="{{ $post->category_id }}">
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}"
                            @if (old('category_id', $post->category_id) == $category->category_id) selected @endif>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
</main>
@endsection