<!-- これは部分ビューです。 -->

@if ($posts->isEmpty())
    <p class="no-posts">まだ投稿がありません。</p>
@else
    @foreach ($posts as $post)
    <a href="{{ route('posts.detail', $post) }}" class="post-item">
        <div class="post-details">
            <h2 class="post-title">{{ $post->title }}</h2>
            <p>カテゴリー: {{ $post->category->category_name ?? '未分類' }}</p>
        </div>
        <div class="post-stats">
            <i class="fas fa-eye"></i>
            <span class="stat-item">{{ $post->views_count }}</span>
            <i class="far fa-thumbs-up"></i>
            <span class="stat-item">{{ $post->likes_count }}</span>
            <i class="fas fa-comment-dots"></i>
            <span class="stat-item">{{ $post->comments_count }}</span>
        </div>
        <div class="post-meta">
            <span class="post-date">{{ $post->posted_at->format('Y年m月d日') }}</span>
        </div>
    </a>
    @endforeach
@endif
