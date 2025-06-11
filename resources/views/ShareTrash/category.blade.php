@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
<div class="message">
    <h2>GreenCycle Comminity</h2>
    <h3>Connected Trash Can</h3>
</div>

<main>
    <div class="category_container">
        <x-nav />
        <div class="main_category">
            <img src="{{ asset('category_icon/燃えるごみ.png') }}" alt="燃えるごみ">
            <img src="{{ asset('category_icon/不燃ごみ.png') }}" alt="不燃ごみ">
            <img src="{{ asset('category_icon/インクカートリッジ.png') }}" alt="インクカートリッジ">
            <img src="{{ asset('category_icon/カン.png') }}" alt="カン">
            <img src="{{ asset('category_icon/カン2.png') }}" alt="カン2">
            <img src="{{ asset('category_icon/キャップ.png') }}" alt="キャップ">
            <img src="{{ asset('category_icon/ケーブル類.png') }}" alt="ケーブル類">
            <img src="{{ asset('category_icon/トレー.png') }}" alt="トレー">
            <img src="{{ asset('category_icon/ビン.png') }}" alt="ビン">
            <img src="{{ asset('category_icon/ペットボトル.png') }}" alt="ペットボトル">
            <img src="{{ asset('category_icon/新聞紙.png') }}" alt="新聞紙">
            <img src="{{ asset('category_icon/小型製品.png') }}" alt="小型製品">
            <img src="{{ asset('category_icon/新聞紙.png') }}" alt="新聞紙">
            <img src="{{ asset('category_icon/小型製品.png') }}" alt="小型製品">
            <img src="{{ asset('category_icon/新聞紙.png') }}" alt="新聞紙">
        </div>
    </div>
</main>
@endsection