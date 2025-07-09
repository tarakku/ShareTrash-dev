@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

<div class="message">
    <h2>GreenCycle Community</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    <div class="create_container">
        <div class="back"> 
            <a href="{{ session('return_to', route('posts.allpost')) }}" class="back-btn">
                    前のページに戻る
            </a>
        </div>

        <h2>投稿作成</h2>
        <form action="{{ route('posts.store') }}" method="POST" id="createPost" enctype="multipart/form-data">
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
                <label for="category_id">カテゴリー</label>
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

            <div class="image-upload">
                <label for="image-input">画像（最大3枚）</label>
                <div id="drop-area" class="drop-area">
                    <p>ここに画像をドロップするか、クリックして選択</p>
                    <input type="file" id="image-input" name="images[]" accept="image/*" multiple>
                </div>
                <div id="preview" class="image-preview"></div>
                <small style="color: #888;">3枚まで選択できます</small>
                @error('images')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                @error('images.*')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">投稿する</button>
        </form>
    </div>
</main>
@endsection
