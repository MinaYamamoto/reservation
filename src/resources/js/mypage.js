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

document.querySelectorAll('.review__submit').forEach(function(button) {
    button.addEventListener('click', function() {
        var hiddenElement = this.parentElement.nextElementSibling;
        hiddenElement.style.display = 'block';
    });
});

document.querySelectorAll('.review__submit-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.closest('form');
        form.submit();
    });
});

document.querySelectorAll('.review__cancel-button').forEach(function (button) {
    button.addEventListener('click', function() {
        var hiddenReviewCorrection = this.closest('.review__hidden');
        hiddenReviewCorrection.style.display = 'none';
    });
});

document.querySelectorAll('.review-detail__submit').forEach(function(button) {
    button.addEventListener('click', function() {
        var hiddenElement = this.parentElement.nextElementSibling;
        hiddenElement.style.display = 'block';
    });
});

document.querySelectorAll('.review-correction__submit-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.closest('form');
        form.submit();
    });
});

document.querySelectorAll('.review-correction__cancel-button').forEach(function (button) {
    button.addEventListener('click', function() {
        var hiddenReviewCorrection = this.closest('.review-correction__hidden');
        hiddenReviewCorrection.style.display = 'none';
    });
});

document.querySelectorAll('.review-correction__delete-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var form = this.closest('form');
        form.submit();
    });
});
