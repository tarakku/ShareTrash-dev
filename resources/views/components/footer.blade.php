<footer>
     <!-- ここから問い合わせフォーム -->
        <div id="toggleElement" class="modal" style="display: none;">
            <div class="forum">
                <form class="form-table" action="{{ route('inquiry.form') }}" method="POST">
                    @csrf
                    <button class="close-button" aria-label="閉じる">×</button>
                    <h2 class="form-header">お問い合わせフォーム</h2>
                    <div class="form-row">
                        <label>メールアドレス</label>
                        <input type="email" name="email" placeholder="email@example.com">
                    </div>
                    <div class="form-row">
                        <label>お問い合わせ内容</label>
                        <textarea class="auto-grow" name="content" placeholder="お問い合わせ内容を入力してください" rows="2"></textarea>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="forum-button" name="button">送信</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- ここまで問い合わせフォーム -->
    <div class="footer-container">
        <div class="footer-left">
            <img class="sharetrash-logo" src="{{ asset('footer_image/logo.png') }}">
        </div>
        <div class="footer-centor">
            <a href=" " class="contact-button">
                <span>お問い合わせ<br>こちら</br></span>
            </a>
        </div>
        <div class="footer-right">
            <div class="community-info">
                <p class="greencycle-text">GreenCycle</p>
                <p class="community-text">Comminity</p>
                <p class="connected-text">Connected Trash Can</p>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-links">
            <a href=" ">プライバシーポリシー</a>
            <a href=" ">利用規約</a>
        </div>
        <p>&copy; 2095 ShareTrash lnc. All rights No reservations</p>
    </div>
</footer>
