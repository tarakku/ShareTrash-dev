@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
<main>
  <h2>Profile</h2>
  <div class="field">
    <div class="tab-switch">
      <input type="radio" name="TAB" id="tab1" checked />
      <input type="radio" name="TAB" id="tab2" />

      <div class="tab-labels">
        <label for="tab1">プロフィール</label>
        <label for="tab2">パスワード変更</label>
      </div>

      <div class="content content1">
        <form class="profile-items">
          <p>
            ニックネーム<br />
            <input type="text" value="ニックネーム" readonly />
          </p>
          <p>
            メールアドレス<br />
            <input type="text" value="mail@example.com" readonly />
          </p>
          <p>
            電話番号<br />
            <input type="text" value="000-0000-0000" readonly />
          </p>
          <p>
            住所（都道府県）<br />
            <input type="text" value="東京都" readonly />
          </p>
          <p>
            住所（市区町村）<br />
            <input type="text" value="渋谷区" readonly />
          </p>
          <p>
            <button type="button" onclick="location.href='../profile_edit/profile_edit.html'">
              編集
            </button>
          </p>
        </form>

        <div class="profile-icon">
          <img src="../images/kkrn_icon_user_3.png" alt="プロフィール画像" id="profile-img" />
          <label for="input-img" class="custom-file-button">画像を選択</label>
          <input type="file" id="input-img" accept="image/*" hidden />
        </div>
      </div>

      <div class="content content2" id="password">
        <form class="password-items" onsubmit="clickSave(); return false;">
          <p>
            現在のパスワード<br />
            <input type="password" size="20" />
          </p>
          <p>
            新しいパスワード<br />
            <input type="password" size="20" />
          </p>
          <p>
            新しいパスワード（確認）<br />
            <input type="password" size="20" />
          </p>
          <div class="button-field">
            <p>
              <button type="button" onclick="location.href='../profile_top/profile.html'">
                キャンセル
              </button>
            </p>
            <p>
              <button type="submit">保存</button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection