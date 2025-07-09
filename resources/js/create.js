document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image-input');
    const preview = document.getElementById('preview');
    const dropArea = document.getElementById('drop-area');
    let filesArray = [];

    // ドロップエリアのイベント
    if (dropArea) {
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropArea.classList.add('dragover');
            });
        });
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropArea.classList.remove('dragover');
            });
        });
        dropArea.addEventListener('drop', function(e) {
            const droppedFiles = Array.from(e.dataTransfer.files).filter(f => f.type.startsWith('image/'));
            if (filesArray.length + droppedFiles.length > 3) {
                alert('画像は3枚まで選択できます。');
                return;
            }
            filesArray = filesArray.concat(droppedFiles);
            updatePreview();
            updateInputFiles();
        });
        // ドロップエリアクリックでinputを開く
        dropArea.addEventListener('click', (e) => {
            if (e.target === imageInput) return; // input自身なら何もしない
            if (imageInput) imageInput.click();
        });
    }

    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const newFiles = Array.from(this.files);
            if (filesArray.length + newFiles.length > 3) {
                alert('画像は3枚まで選択できます。');
                this.value = '';
                return;
            }
            filesArray = filesArray.concat(newFiles);
            updatePreview();
            updateInputFiles();
            this.value = '';
        });
    }

    function updatePreview() {
        preview.innerHTML = '';
        filesArray.forEach((file, idx) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                const img = document.createElement('img');
                img.src = e.target.result;
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = '×';
                btn.title = '削除';
                btn.onclick = function(ev) {
                    ev.stopPropagation();
                    filesArray.splice(idx, 1);
                    updatePreview();
                    updateInputFiles();
                };
                div.appendChild(img);
                div.appendChild(btn);
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
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