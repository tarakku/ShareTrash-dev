// public/js/nav_underline_animation.js (変更なしでOK)

document.addEventListener('DOMContentLoaded', function() {
    // .nav-link:not(.active) セレクタは、ul/li 構造がなくても a タグを直接見つける
    const navLinks = document.querySelectorAll('.nav-link:not(.active)');

    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.setProperty('--underline-width', '100%');
            this.style.setProperty('--underline-left', '0%');
        });

        link.addEventListener('mouseleave', function() {
            this.style.setProperty('--underline-width', '0%');
            this.style.setProperty('--underline-left', '0%');
        });
    });
});