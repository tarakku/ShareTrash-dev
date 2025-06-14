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
        <form action="{{ route('create') }}" method="POST" id="createPost">
            @csrf

            <div class="title">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
            </div>

            <div class="content">
                <label for="content">本文</label>
                <textarea class="form-control" name="content" id="content" rows="5">{{ old('content') }}</textarea>
            </div>

            <div class="category-section">
                <label for="category">カテゴリー</label>
                <select id="sortBy" class="category-dropdown" name="sort_by">
                        <option value="views_count">燃えるゴミ</option>
                        <option value="likes_count">燃えないゴミ</option>
                        <option value="posted_at">プラスチック</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">投稿する</button>
        </form>
    </div>
</main>
@endsection