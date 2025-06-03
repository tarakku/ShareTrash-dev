<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Validation Errors --}}
    {{-- Laravelから返されるバリデーションエラーを表示する部分 --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="register_main">
        <form method="POST" action="{{ route('register') }}" name="rergister_form">
            @csrf
            <div class="rergister_form_top">
                <h1>Register</h1>
                <p>下記の情報をご入力の上、「REGISTER」ボタンをクリックしてください。</p>
            </div>

            <div class="rergister_form_btm">
                <form method="POST" action="{{ route('register') }}" name="register_form">
                    <div class="rergister_form_left">
                        <label>
                            ニックネーム
                            <input type="text" name="nickname" placeholder="ニックネーム" value="{{ old('nickname') }}">
                        </label>
                        <label>
                            パスワード
                            <input type="password" name="password" placeholder="パスワード" value="{{ old('password') }}">
                        </label>
                        <label>
                            パスワード再入力
                            <input type="password" name="password_confirmation" placeholder="パスワード再入力">
                        </label>
                    </div>
                    <div class="rergister_form_right">
                        <label>
                            メールアドレス
                            <input type="email" name="email" placeholder="example@gmail.com" value="{{ old('email') }}">
                        </label>
                        <label>
                            都道府県
                            <select name="address_prefecture">
                                <option value="" selected>選択してください</option>
                                @foreach(['北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'] as $pref)
                                    <option value="{{ $pref }}" {{ old('address_prefecture') == $pref ? 'selected' : '' }}>{{ $pref }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            市/区
                            <input type="text" name="address_city" placeholder="市区町村" value="{{ old('address_city') }}">
                        </label>
                    </div>
                </div>
                <div class="register_button">
                    <button type="submit" name="button">Register</button>
                </div> 
            </form>
        </form>
    </div>
</x-guest-layout>