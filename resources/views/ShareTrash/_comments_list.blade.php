@foreach ($comments as $comment)
    <div class="comment-user">
        <span class="comment-username">{{ $comment->user->nickname }} </span>
        <span class="comment-date">{{ $comment->posted_at->format('Y年m月d日') }}</span>
    </div>
    <div class="comment">
        <p class="comment-content">{{ $comment->content }}</p>
    </div>
@endforeach