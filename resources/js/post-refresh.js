
// 非同期処理です
//domの読み込みが完了したら実行
//ページの読み込み時と10秒ごとに投稿を更新する
// DOMとは、Document Object Model（ドキュメントオブジェクトモデル）の略で、HTMLやXML文書をプログラムで操作するためのインターフェースです。

// DOMの読み込みが完了したら実行
document.addEventListener('DOMContentLoaded', function () {
    function refreshPosts() {
        const sortBySelect = document.getElementById('sortBy');
        const sortBy = sortBySelect ? sortBySelect.value : 'posted_at';

        // 現在のURLのクエリパラメータを取得
        const urlParams = new URLSearchParams(window.location.search);
        const page = urlParams.get('page') || 1;

        // 非同期で投稿情報を取得
        fetch(`/AllPost/refresh?sort_by=${sortBy}&page=${page}`)
            .then(response => response.text())
            .then(html => {
                // 一時的にHTMLをパースするためのDOMを作成
                const tempDom = document.createElement('div');
                tempDom.innerHTML = html;

                // 投稿リストとページネーションをそれぞれ取得
                const newPostList = tempDom.querySelector('.all-post-list');
                const newPagination = tempDom.querySelector('.page-up-down');

                // 現在のDOMと差し替え
                if (newPostList) {
                    document.querySelector('.all-post-list').innerHTML = newPostList.innerHTML;
                }
                if (newPagination) {
                    document.querySelector('.page-up-down').innerHTML = newPagination.innerHTML;
                }
            })
            .catch(error => {
                console.error('投稿の更新に失敗しました:', error);
            });
    }

    refreshPosts(); // 初回実行
    setInterval(refreshPosts, 10000); // 10秒ごとに実行
});

