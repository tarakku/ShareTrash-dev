@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    <div class="create_container">
        <div class="back"> 
            <a href="{{ route('allpost') }}" class="back-btn">
                    トップへ戻る
            </a>
        </div>

        <h2>CreatePost</h2>
        <form action="{{ route('store') }}" method="POST" id="createPost">
            @csrf

            <div class="title">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="投稿のタイトルを入力してください">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="content">
                <label for="content">本文</label>
                <textarea name="content" id="content" rows="5" placeholder="投稿の内容を入力してください">{{ old('content') }}</textarea>
                @error('content')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="category-section">
                <label for="sortBy">カテゴリー</label>
                <select id="category_id" class="category-dropdown" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}" @selected(old('category_id') == $category->category_id)>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">投稿する</button>
        </form>
    </div>
</main>
@endsection