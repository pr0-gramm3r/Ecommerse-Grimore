const meth = document.querySelector('#image-option');
let url = document.querySelector('#url-input');
let upload = document.querySelector('#upload-input');

meth.addEventListener("change", function () {
    if (this.value === 'url') {
        url.style.display = 'table-row';
        upload.style.display = 'none';
    } else {
        url.style.display = 'none';
        upload.style.display = 'table-row';
    }
});