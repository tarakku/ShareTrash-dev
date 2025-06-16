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