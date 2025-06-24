  @extends('layouts.app')

  @section('title', 'プロフィール')

  @section('content')
  <main>
    <div class="field">
      <h2>Profile</h2>
      <div class="tab-switch">
        <input type="radio" name="TAB" id="tab1" checked />
        <input type="radio" name="TAB" id="tab2" />

        <div class="tab-labels">
          <label for="tab1">プロフィール</label>
          <label for="tab2">編集</label>
        </div>

        <div class="content content1">
          <form class="profile-items">
            <p>
              ニックネーム<br />
              <input type="text" name="nickname" value="{{old('nickname',auth()->user()->nickname) }}" readonly />
            </p>
            <p>
              メールアドレス<br />
              <input type="text" name="email" value="{{ old('email', auth()->user()->email) }}" readonly />
            </p>
            <p>
              住所（都道府県）<br />
              <input type="text" name="address_prefecture" value="{{ old('address_prefecture', auth()->user()->address_prefecture) }}" readonly />
            </p>
            <p>
              住所（市区町村）<br />
              <input type="text" name="address_city" value="{{ old('address_city', auth()->user()->address_city) }}" readonly />
            </p>
          </form>
        </div>

        <div class="content content2" id="password">
          <form id="profileForm" class="edit-form-grid" action="{{ route('myprofile.update') }}" method="POST" onsubmit="return validateForm();">
            @csrf
            @method('PATCH')
            <label>ニックネーム</label>
            <label>現在のパスワード</label>

            <input type="text" name="nickname" value="{{ old('nickname', auth()->user()->nickname) }}">
            <input type="password" name="current_password" placeholder="現在のパスワードを入力">

            <label>メールアドレス</label>
            <label>新しいパスワード</label>

            <input type="text" name="email" value="{{ old('email', auth()->user()->email) }}">
            <input type="password" name="new_password" placeholder="新しいパスワードを入力">

            <label>住所（都道府県）</label>
            <label>新しいパスワード（確認）</label>

            <input type="text" name="address_prefecture" value="{{ old('address_prefecture', auth()->user()->address_prefecture) }}">
            <input type="password" name="new_password_confirmation" placeholder="新しいパスワードを再入力">

            <label>住所（市区町村）</label>
            <span></span>

            <input type="text" name="address_city" value="{{ old('address_city', auth()->user()->address_city) }}">
            <span></span>
            <span></span>
            <div class="button-field">
              <p><button type="submit">保存</button></p>
            </div>
          </form>
      </div>
    </div>
    <div id="toast" class="toast-message" style="display:none;"></div>
  </main>
  @endsection