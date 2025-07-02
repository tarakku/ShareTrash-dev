document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image-input');
    const preview = document.getElementById('preview');
    let filesArray = [];

    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const newFiles = Array.from(this.files);

            // 追加後の合計が3枚を超える場合はアラート
            if (filesArray.length + newFiles.length > 3) {
                alert('画像は3枚まで選択できます。');
                this.value = '';
                return;
            }

            // 追加
            filesArray = filesArray.concat(newFiles);

            updatePreview();

            // inputのvalueをリセット
            this.value = '';
        });
    }

    function updatePreview() {
        preview.innerHTML = '';
        filesArray.forEach((file) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100px';
                img.style.margin = '5px';
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = '削除';
                btn.onclick = function() {
                    filesArray = filesArray.filter(f => f !== file);
                    updateInputFiles();
                    updatePreview();
                };
                const div = document.createElement('div');
                div.style.display = 'inline-block';
                div.appendChild(img);
                div.appendChild(btn);
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
        updateInputFiles();
    }

    function updateInputFiles() {
        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => dataTransfer.items.add(file));
        if (imageInput) {
            imageInput.files = dataTransfer.files;
        }
    }

    // フォーム送信直前にも必ずinputのfilesを最新化
    const form = document.getElementById('createPost');
    if (form) {
        form.addEventListener('submit', function() {
            updateInputFiles();
        });
    }
});