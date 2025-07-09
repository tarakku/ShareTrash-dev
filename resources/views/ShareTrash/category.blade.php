@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
<div class="message">
    <h2>GreenCycle Community</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    <div class="category_container">
        <x-nav />
        <div class="main_category">
            <a href="{{ route('category.show', ['name' => '燃えるごみ']) }}">
                <img src="{{ asset('category_icon/燃えるごみ.png') }}" alt="燃えるごみ">
            </a>
            <a href="{{ route('category.show', ['name' => '不燃ごみ']) }}">
                <img src="{{ asset('category_icon/不燃ごみ.png') }}" alt="不燃ごみ">
            </a>
            <a href="{{ route('category.show', ['name' => 'インクカートリッジ']) }}">
                <img src="{{ asset('category_icon/インクカートリッジ.png') }}" alt="インクカートリッジ">
            </a>
            <a href="{{ route('category.show', ['name' => 'カン']) }}">
                <img src="{{ asset('category_icon/カン.png') }}" alt="カン">
            </a>
            <a href="{{ route('category.show', ['name' => 'キャップ']) }}">
                <img src="{{ asset('category_icon/キャップ.png') }}" alt="キャップ">
            </a>
            <a href="{{ route('category.show', ['name' => 'ケーブル類']) }}">
                <img src="{{ asset('category_icon/ケーブル類.png') }}" alt="ケーブル類">
            </a>
            <a href="{{ route('category.show', ['name' => 'トレー']) }}">
                <img src="{{ asset('category_icon/トレー.png') }}" alt="トレー">
            </a>
            <a href="{{ route('category.show', ['name' => 'ビン']) }}">
                <img src="{{ asset('category_icon/ビン.png') }}" alt="ビン">
            </a>
            <a href="{{ route('category.show', ['name' => 'ペットボトル']) }}">
                <img src="{{ asset('category_icon/ペットボトル.png') }}" alt="ペットボトル">
            </a>
            <a href="{{ route('category.show', ['name' => '牛乳パック']) }}">
                <img src="{{ asset('category_icon/牛乳パック.png') }}" alt="牛乳パック">
            </a>
            <a href="{{ route('category.show', ['name' => '衣類']) }}">
                <img src="{{ asset('category_icon/衣類.png') }}" alt="衣類">
            </a>
            <a href="{{ route('category.show', ['name' => '金属製品']) }}">
                <img src="{{ asset('category_icon/金属製品.png') }}" alt="金属製品">
            </a>
            <a href="{{ route('category.show', ['name' => '小型製品']) }}">
                <img src="{{ asset('category_icon/小型製品.png') }}" alt="小型製品">
            </a>
            <a href="{{ route('category.show', ['name' => '新聞紙']) }}">
                <img src="{{ asset('category_icon/新聞紙.png') }}" alt="新聞紙">
            </a>
            <a href="{{ route('category.show', ['name' => '電池']) }}">
                <img src="{{ asset('category_icon/電池.png') }}" alt="電池">
            </a>
        </div>

    </div>
</main>
@endsection