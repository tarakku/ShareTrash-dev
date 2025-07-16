@foreach ($inquiries as $inquiry)
    <li>
        <span class="label">名前:</span><span class="value">{{ $inquiry->display_name }}</span>
        <span class="label">メール:</span><span class="value">{{ $inquiry->email }}</span>
        <span class="label">内容:</span><span class="value">{{ $inquiry->content }}</span>
        <span class="label">送信日時:</span><span class="value">{{ $inquiry->inquired_at ? $inquiry->inquired_at->format('Y年m月d日 H:i') : '日付なし' }}</span>
        <span class="label">ステータス:</span>
        <span class="value">{{ $inquiry->status === "未対応" ? '未対応' : ($inquiry->status === "対応中" ? '対応中' : '対応済み') }}</span>
    </li>
@endforeach