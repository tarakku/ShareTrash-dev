@foreach ($users as $user)
    <li>
        <span class="label">ニックネーム:</span><span class="value">{{ $user->nickname }}</span>
        <span class="label">メール:</span><span class="value">{{ $user->email }}</span>
        <span class="label">都道府県:</span><span class="value">{{ $user->address_prefecture ?? '未設定' }}</span>
        <span class="label">市区町村:</span><span class="value">{{ $user->address_city ?? '未設定' }}</span>
        <span class="label">登録日:</span><span class="value">{{ $user->created_at ? $user->created_at->format('Y年m月d日 H:i') : '日付なし' }}</span>
    </li>
@endforeach