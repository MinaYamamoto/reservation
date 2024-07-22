document.addEventListener('DOMContentLoaded', function () {
    const editLinks = document.querySelectorAll('.review-correction__edit-button');
    editLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const reviewContainer = this.closest('.review__show');
            const reviewId = reviewContainer.getAttribute('data-review-id');
            const editForm = document.querySelector(`.review-edit__form[data-review-id="${reviewId}"]`);
            const displayContainer = document.querySelector(`.review-display[data-review-id="${reviewId}"]`);
            const commentElement = editForm.querySelector('textarea.review__comment');
            const starElements = editForm.querySelectorAll('.review__star label');
            const length = editForm.querySelector('.length');

            displayContainer.style.display = 'none';
            editForm.style.display = 'block';
            length.textContent = commentElement.value.length;

            if (commentElement) {
                commentElement.focus();
            }

            starElements.forEach(star => {
                star.addEventListener('click', function () {
                    const rating = [...starElements].indexOf(star) + 1;
                    editForm.querySelector('.star-input').value = rating;
                    starElements.forEach((s, i) => {
                        if (i < rating) {
                            s.classList.add('star-rating');
                            s.classList.remove('star-no-rating');
                        } else {
                            s.classList.add('star-no-rating');
                            s.classList.remove('star-rating');
                        }
                    });
                });
            });

            const currentRating = parseInt(editForm.querySelector('.star-input').value);
            starElements.forEach((s, i) => {
                if (i < currentRating) {
                    s.classList.add('star-rating');
                    s.classList.remove('star-no-rating');
                } else {
                    s.classList.add('star-no-rating');
                    s.classList.remove('star-rating');
                }
            });

            const saveButton = editForm.querySelector('.review-save__button');
            saveButton.addEventListener('click', function () {
                editForm.submit();
            });
        });
    });

    const errorEditForms = document.querySelectorAll('.review-edit__form[style*="block"]');
    errorEditForms.forEach(errorEditForm => {
        const reviewContainer = errorEditForm.closest('.review__show');
        const reviewId = reviewContainer.getAttribute('data-review-id');
        const displayContainer = document.querySelector(`.review-display[data-review-id="${reviewId}"]`);
        const commentElement = errorEditForm.querySelector('textarea.review__comment');
        const starElements = errorEditForm.querySelectorAll('.review__star label');

        displayContainer.style.display = 'none';
        errorEditForm.style.display = 'block';

        if (commentElement) {
            commentElement.focus();
        }

        starElements.forEach(star => {
            star.addEventListener('click', function () {
                const rating = [...starElements].indexOf(star) + 1;
                errorEditForm.querySelector('.star-input').value = rating;
                starElements.forEach((s, i) => {
                    if (i < rating) {
                        s.classList.add('star-rating');
                        s.classList.remove('star-no-rating');
                    } else {
                        s.classList.add('star-no-rating');
                        s.classList.remove('star-rating');
                    }
                });
            });
        });

        const currentRating = parseInt(errorEditForm.querySelector('.star-input').value);
        starElements.forEach((s, i) => {
            if (i < currentRating) {
                s.classList.add('star-rating');
                s.classList.remove('star-no-rating');
            } else {
                s.classList.add('star-no-rating');
                s.classList.remove('star-rating');
            }
        });
    });
});
