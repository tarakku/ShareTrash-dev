import Chart from 'chart.js/auto';

function showPostSection() {
  document.getElementById('postSection').style.display = 'block';
}

window.renderStatsChart = function(stats) {
  const ctx = document.getElementById('statsChart').getContext('2d');
  if (window.statsChartInstance) {
    window.statsChartInstance.destroy();
  }
  window.statsChartInstance = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['投稿数', 'ユーザー数', 'コメント数'],
      datasets: [{
        label: 'サイト統計',
        data: [stats.post_count, stats.user_count, stats.comment_count],
        backgroundColor: [
          'rgba(33, 150, 243, 0.7)',
          'rgba(76, 175, 80, 0.7)',
          'rgba(156, 39, 176, 0.7)'
        ],
        borderColor: [
          'rgba(33, 150, 243, 1)',
          'rgba(76, 175, 80, 1)',
          'rgba(156, 39, 176, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        title: { display: false }
      },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
}

//秒数だけを1秒ごとにカウントして表示する
let seconds = 10;
const elapsedEl = document.getElementById('elapsedSeconds'); // 表示用のspanなど

setInterval(() => {
  seconds--;
  if (elapsedEl) {
    elapsedEl.textContent = seconds;
  }
}, 1000);

// 10秒ごとに指定セクションのデータを更新
setInterval(() => {
    // 投稿リスト更新
    let section = document.getElementById('postSection');
    if (section && section.style.display === 'block') {
        fetch(window.refreshRoutes.posts)
            .then(res => res.text())
            .then(html => {
                const postList = document.getElementById('postList');
                if(postList) postList.innerHTML = html;
            });
        seconds = 10;
    }

    // ユーザーリスト更新
    section = document.getElementById('userSection');
    if (section && section.style.display === 'block') {
        fetch(window.refreshRoutes.users)
            .then(res => res.text())
            .then(html => {
                const userList = document.getElementById('userList');
                if(userList) userList.innerHTML = html;
            });
        seconds = 10;
    }

    // お問い合わせリスト更新
    section = document.getElementById('contactSection');
    if (section && section.style.display === 'block') {
        fetch(window.refreshRoutes.inquiries)
            .then(res => res.text())
            .then(html => {
                const inquiryList = document.getElementById('inquiryList');
                if(inquiryList) inquiryList.innerHTML = html;
            });
        seconds = 10;
    }

    // 統計データ更新
    section = document.getElementById('statsSection');
    if (section && section.style.display === 'block') {
        fetch(window.refreshRoutes.stats)
            .then(res => res.json())
            .then(data => {
                const postCountEl = document.querySelector('#statsSection .value.post-count');
                const userCountEl = document.querySelector('#statsSection .value.user-count');
                const commentCountEl = document.querySelector('#statsSection .value.comment-count');

                if(postCountEl) postCountEl.textContent = data.post_count;
                if(userCountEl) userCountEl.textContent = data.user_count;
                if(commentCountEl) commentCountEl.textContent = data.comment_count;

                if(typeof window.renderStatsChart === 'function') {
                    window.renderStatsChart(data);
                }
            });
        seconds = 10;
    }
}, 10000);


