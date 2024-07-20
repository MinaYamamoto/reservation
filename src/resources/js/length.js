document.addEventListener('DOMContentLoaded', function () {
    const editLinks = document.querySelectorAll('.edit-review-link');
    editLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const reviewContainer = this.closest('.review__show');
            const reviewId = reviewContainer.getAttribute('data-review-id');
            const editForm = document.querySelector(`.review-edit__form[data-review-id="${reviewId}"]`);
            const displayContainer = document.querySelector(`.review-display[data-review-id="${reviewId}"]`);

            displayContainer.style.display = 'none';
            editForm.style.display = 'block';

            const textArea = editForm.querySelector('textarea.review__comment');
            const lengthDisplay = editForm.querySelector('.length');
            textArea.addEventListener('input', function () {
                lengthDisplay.textContent = textArea.value.length;
            }, false);
        });
    });

    const errorEditForms = document.querySelectorAll('.review-edit__form[style*="block"]');
    errorEditForms.forEach(errorEditForm => {
        const reviewContainer = errorEditForm.closest('.review__show');
        const reviewId = reviewContainer.getAttribute('data-review-id');
        const displayContainer = document.querySelector(`.review-display[data-review-id="${reviewId}"]`);
        displayContainer.style.display = 'none';
        errorEditForm.style.display = 'block';

        const textArea = errorEditForm.querySelector('textarea.review__comment');
        const lengthDisplay = errorEditForm.querySelector('.length');
        textArea.addEventListener('input', function () {
            lengthDisplay.textContent = textArea.value.length;
        }, false);
    });

    const textArea = document.querySelector('#textarea');
    const length = document.querySelector('.length');
    textArea.addEventListener('input', () => {
        length.textContent = textArea.value.length;
    }, false);
});

