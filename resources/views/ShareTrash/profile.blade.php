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
        </form>
      </div>

      <div class="content content2" id="password">
        <form class="edit-items" onsubmit="clickSave(); return false;">
          <div class="edit-content">
            <div class="left-content">
              <p>
                ニックネーム<br />
                <input type="text" value="ニックネーム">
              </p>
              <p>
                メールアドレス<br />
                <input type="text" value="mail@example.com">
              </p>
              <p>
                電話番号<br />
                <input type="text" value="000-0000-0000">
              </p>
              <p>
                住所（都道府県）<br />
                <input type="text" value="東京都">
              </p>
              <p>
                住所（市区町村）<br />
                <input type="text" value="渋谷区">
              </p>
            </div>
            <div class="right-content">
              <p>
                <span class="required">※</span>パスワードを変更する場合は、現在のパスワードを入力してください。
              </p>
              <p>
                現在のパスワード
              </p>
              <input type="password" name="current_password"/><br />
              
              <p>
                新しいパスワード
              </p>
                <input type="password" name="new_password"/><br />
              
              <p>
                新しいパスワード（確認）
              </p>
                <input type="password" name="check_new_password"/><br />
            </div>
          </div>
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