
function preview(elem) {
    const file = elem.files[0];
    const isOK = file?.type?.startsWith('image/');
    const image = (file && isOK) ? `<img src="${URL.createObjectURL(file)}">` : '';

    const parent = elem.closest('.deco-file');
    if (parent) {
        parent.style.display = 'none';
        const previewArea = parent.parentNode.querySelector('.image-preview');
        if (previewArea) {
            previewArea.innerHTML = image;
        }
    }
}

var clickCount = {};

document.querySelectorAll(".category_name").forEach(function(button) {
    clickCount[button.dataset.inputId] = 0;

    button.addEventListener("click", function() {
        var inputId = button.dataset.inputId;
        var inputElement = document.getElementById(inputId);

        clickCount[inputId]++;

        if (clickCount[inputId] % 2 === 0) {
            button.style.backgroundColor = "";
            button.style.color = "";
            inputElement.value = "";
        } else {
            button.style.backgroundColor = "rgb(247, 104, 104)";
            button.style.color = "white";
            inputElement.value = button.textContent;
        }
    });
});