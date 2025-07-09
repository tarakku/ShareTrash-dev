document.addEventListener('DOMContentLoaded', function () {
    function refreshPosts() {
        const sortBySelect = document.getElementById('sortBy');
        const sortBy = sortBySelect ? sortBySelect.value : 'posted_at';

        fetch(`/AllPost/refresh?sort_by=${sortBy}`)
            .then(response => response.text())
            .then(html => {
                document.querySelector('.all-post-list').innerHTML = html;
            });
    }

    refreshPosts(); // 初回実行
    setInterval(refreshPosts, 10000); // 10秒ごとに実行
});
