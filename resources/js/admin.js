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
