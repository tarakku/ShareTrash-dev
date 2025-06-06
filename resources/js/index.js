window.addEventListener('load', function() {
    const bodyElement = this.document.body;

    this.setTimeout(()=> {bodyElement.classList.add('fade-in');}, 100);
});