document.addEventListener('DOMContentLoaded', function () {
    function refreshPosts() {
        const sortBySelect = document.getElementById('sortBy');
        const sortBy = sortBySelect ? sortBySelect.value : 'posted_at';

        // 現在のURLのクエリパラメータを取得
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page') || 1;

        fetch(`/AllPost/refresh?sort_by=${sortBy}&page=${page}`)
            .then(response => response.text())
            .then(html => {
                document.querySelector('.all-post-list').innerHTML = html;
            });
    }

    refreshPosts(); // 初回実行
    setInterval(refreshPosts, 10000); // 10秒ごとに実行
});
