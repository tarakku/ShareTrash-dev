@foreach ($posts as $post)
    <li>
        <span class="label">タイトル:</span><span class="value">{{ $post->title }}</span>
        <span class="label">カテゴリー:</span><span class="value">{{ $post->category->category_name ?? '未分類' }}</span>
        <span class="label">ビュー数:</span><span class="value">{{ $post->views_count }}</span>
        <span class="label">いいね数:</span><span class="value">{{ $post->likes_count }}</span>
        <span class="label">コメント数:</span><span class="value">{{ $post->comments->count() }}</span>
        <span class="label">投稿日:</span><span class="value">{{ $post->posted_at ? $post->posted_at->format('Y年m月d日') : '日付なし' }}</span>
    </li>
@endforeach