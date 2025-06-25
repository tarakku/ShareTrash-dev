import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ここからお問い合わせ表示スクリプト
document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggleButton');
    const toggleElement = document.getElementById('toggleElement');

    toggleButton.addEventListener('click', () => {
        if (toggleElement.style.display === 'none' || toggleElement.style.display === '') {
            toggleElement.style.display = 'flex';
        } else {
            toggleElement.style.display = 'none';
        }
    });
});

document.querySelector('.close-button').addEventListener('click', () => {
    document.getElementById('toggleElement').style.display = 'none';
});
// ここまでお問い合わせ表示スクリプト

// テキストエリアの自動高さ調整
document.addEventListener('DOMContentLoaded', () => {
  const textareas = document.querySelectorAll('textarea.auto-grow');

  textareas.forEach(textarea => {
    const lineHeight = parseFloat(getComputedStyle(textarea).lineHeight);
    const baseRows = 2;
    const baseHeight = lineHeight * baseRows;

    const resize = () => {
      textarea.style.height = 'auto';
      const newHeight = textarea.scrollHeight;
      textarea.style.height = Math.max(newHeight, baseHeight) + 'px';
    };

    textarea.addEventListener('input', resize);
    resize(); // 初期化
  });
});

// パスワード確認
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.edit-form-grid');
    form.addEventListener('submit', (e) => {
        const newPassword = form.querySelector('input[name="new_password"]').value;
        const confirmPassword = form.querySelector('input[name="new_password_confirmation"]').value;

        if (newPassword !== confirmPassword) {
            alert('新しいパスワードと確認用パスワードが一致しません。');
            e.preventDefault(); // 送信キャンセル
        }
    });
});


// トースト
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('profileForm');
    const toast = document.getElementById('toast');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const url = form.action;
        const csrfToken = form.dataset.csrf;

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: formData,
        })

        .then(async response => {
            const data = await response.json();

            if (!response.ok) {
                let messages = [];
                if (data.errors) {
                    for (const key in data.errors) {
                        messages.push(...data.errors[key]);
                    }
                } else if (data.message) {
                    messages.push(data.message);
                } else {
                    messages.push('保存に失敗しました。');
                }
                throw new Error(messages.join('\n'));
            }

            return data;
        })

        .then(data => {
            toast.textContent = data.message;
            toast.style.backgroundColor = '#4caf50';
            toast.style.display = 'block';

            if (data.updated) {
                document.querySelector('input[name="nickname"][readonly]').value = data.updated.nickname;
                document.querySelector('input[name="email"][readonly]').value = data.updated.email;
                document.querySelector('input[name="address_prefecture"][readonly]').value = data.updated.address_prefecture;
                document.querySelector('input[name="address_city"][readonly]').value = data.updated.address_city;

                document.getElementById('tab1').checked = true;
            }

            form.querySelector('input[name="current_password"]').value = '';
            form.querySelector('input[name="new_password"]').value = '';
            form.querySelector('input[name="new_password_confirmation"]').value = '';
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        })
        .catch(error => {
            toast.textContent = "変更に失敗しました";
            toast.style.backgroundColor = '#f44336';
            toast.style.display = 'block';

            setTimeout(() => {
                toast.style.display = 'none';
                toast.style.backgroundColor = '#4caf50';
            }, 4000);
        });
    });
});