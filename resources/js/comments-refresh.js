document.addEventListener('DOMContentLoaded', function() {
    const commentsSection = document.querySelector('.comments-section');
    const postId = commentsSection?.dataset?.postId;

    if (!postId || !commentsSection) {
        console.error('postId または comments-section が見つかりません');
        return;
    }

    function refreshComments() {
        fetch(`/posts/${postId}/comments/refresh`)
            .then(res => res.text())
            .then(html => {
                const container = commentsSection.querySelector('.comments-container');
                if (!container) {
                    console.warn('comments-container が見つかりません');
                    return;
                }
                container.innerHTML = html;
            })
            .catch(err => console.error('コメント更新失敗:', err));
    }

    refreshComments();
    setInterval(refreshComments, 5000);
});
