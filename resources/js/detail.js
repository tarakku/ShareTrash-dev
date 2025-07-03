window.openModal = function(src) {
    const modal = document.getElementById('image-modal');
    const modalImg = document.getElementById('modal-img');
    modalImg.src = src;
    modal.style.display = 'flex';
}
window.closeModal = function(e) {
    if (e) e.stopPropagation();
    document.getElementById('image-modal').style.display = 'none';
}