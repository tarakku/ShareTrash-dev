import './bootstrap';
import Alpine from 'alpinejs';

import '../css/header.css';
import '../css/footer.css';
import '../css/category.css';
import '../css/post.css';
import '../css/create.css';
import '../css/detail.css';
import '../css/profile.css';
import '../css/my.css';
import '../css/edit.css';
import '../css/categories.css';
import '../css/nav.css';
import '../css/app.css';
import '../css/login.css';
import '../css/register.css';
import '../css/login_register_wrapper.css';

import '../js/post-refresh.js';
import '../js/create.js';
import '../js/detail.js';
import '../js/nav_underline_animation.js';

window.Alpine = Alpine;
Alpine.start();

// ここからお問い合わせ表示スクリプト
document.addEventListener('DOMContentLoaded', () => {
<<<<<<< HEAD
    const toggleButton = document.getElementById('toggleButton');
    const toggleElement = document.getElementById('toggleElement');

    toggleButton.addEventListener('click', () => {
        if (toggleElement.style.display === 'none' || toggleElement.style.display === '') {
            toggleElement.style.display = 'flex';
        } else {
            toggleElement.style.display = 'none';
=======
    const toggleButtons = document.querySelectorAll('.toggle-button');
    const toggleElement = document.getElementById('toggleElement');
    if (toggleButtons.length > 0 && toggleElement) {
        toggleButtons.forEach((button) => {
            button.addEventListener('click', () => {
                if (toggleElement.style.display === 'none' || toggleElement.style.display === '') {
                    toggleElement.style.display = 'flex';
                } else {
                    toggleElement.style.display = 'none';
                }
            });
        });
    }
    const closeBtn = document.querySelector('.close-button');
    if (closeBtn && toggleElement) {
        closeBtn.addEventListener('click', () => {
            toggleElement.style.display = 'none';
        });
    }
});

// ページ読み込み時にフェードイン効果を追加
document.addEventListener('DOMContentLoaded', () => {
    document.body.classList.add('fade-in');
});

// 閉じるボタンのイベントリスナー（要素が存在する場合のみ登録）
document.addEventListener('DOMContentLoaded', () => {
    const closeBtn = document.querySelector('.close-button');
    const toggleElement = document.getElementById('toggleElement');
    if (closeBtn && toggleElement) {
        closeBtn.addEventListener('click', () => {
            toggleElement.style.display = 'none';
        });
    }
});

// テキストエリアの自動高さ調整
document.addEventListener('DOMContentLoaded', () => {
    const textareas = document.querySelectorAll('textarea.auto-grow');
    textareas.forEach(textarea => {
        const lineHeight = parseFloat(getComputedStyle(textarea).lineHeight);
        const baseRows = 3.5;
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
    if (!form) return;
    form.addEventListener('submit', (e) => {
        const newPassword = form.querySelector('input[name="new_password"]').value;
        const confirmPassword = form.querySelector('input[name="new_password_confirmation"]').value;
        if (newPassword !== confirmPassword) {
            alert('新しいパスワードと確認用パスワードが一致しません。');
            e.preventDefault(); // 送信キャンセル
>>>>>>> e9c70a370bc79b359380ec4c5a83aec569e35c26
        }
    });
});

<<<<<<< HEAD
document.querySelector('.close-button').addEventListener('click', () => {
  document.getElementById('toggleElement').style.display = 'none';
});
// ここまでお問い合わせ表示スクリプト
=======
// トースト表示用の共通関数
function showToast(message, type = 'success', duration = 3000) {
    const toast = document.getElementById('toast');
    if (!toast) return;
    toast.textContent = message;
    toast.style.backgroundColor = type === 'success' ? '#4caf50' : '#f44336';
    toast.style.display = 'block';
    setTimeout(() => {
        toast.style.display = 'none';
        toast.style.backgroundColor = '#4caf50';
    }, duration);
}

// セッションメッセージ用トースト
document.addEventListener('DOMContentLoaded', function () {
    const toast = document.getElementById('toast');
    if (toast && toast.textContent.trim() !== '') {
        toast.style.display = 'block';
        setTimeout(() => {
            toast.style.display = 'none';
        }, 3000);
    }
});

// プロフィールフォーム用トースト
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('profileForm');
    if (!form) return;
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
            showToast(data.message, 'success');
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
        })
        .catch(error => {
            showToast('変更に失敗しました', 'error', 4000);
        });
    });
});

// フッターの表示制御
document.addEventListener('DOMContentLoaded', () => {
    const footer = document.querySelector('.footer');
    if (footer) {
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;
            if (scrollTop + windowHeight >= documentHeight - 1) {
                footer.classList.add('visible');
            } else {
                footer.classList.remove('visible');
            }
        });
    }
});

function formClose() {
    const modal = document.getElementById('toggleElement');
    if (modal) {
        modal.style.display = 'none';
    }
}
>>>>>>> e9c70a370bc79b359380ec4c5a83aec569e35c26
