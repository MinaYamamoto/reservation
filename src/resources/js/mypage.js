document.querySelectorAll('.change-reserve__submit').forEach(function(button) {
    button.addEventListener('click', function() {
        var hiddenElement = this.parentElement.nextElementSibling;
        hiddenElement.style.display = 'block';
    });
});

document.querySelectorAll('.cancel-change__submit').forEach(function (button) {
    button.addEventListener('click', function() {
        var hiddenElement = this.parentElement.nextElementSibling;
        hiddenElement.style.display = 'none';
    });
});
