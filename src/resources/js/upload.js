document.addEventListener('DOMContentLoaded', function () {
    const reviewImageDiv = document.getElementById('review__image');
    const fileInput = document.getElementById('file-input');
    const imagePreview = document.getElementById('imagePreview');
    const reviewImage = document.getElementById('reviewImage');

    function previewImage(event) {
        const files = event.target.files || event.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                reviewImage.src = e.target.result;
                imagePreview.removeAttribute('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    reviewImageDiv.addEventListener('dragover', function (event) {
        event.preventDefault();
        reviewImageDiv.classList.add('dragging');
    });

    reviewImageDiv.addEventListener('dragleave', function (event) {
        event.preventDefault();
        reviewImageDiv.classList.remove('dragging');
    });

    reviewImageDiv.addEventListener('drop', function (event) {
        event.preventDefault();
        reviewImageDiv.classList.remove('dragging');
        const files = event.dataTransfer.files;
        fileInput.files = files;
        previewImage(event);
    });

    fileInput.addEventListener('change', previewImage);

    var postButton = document.getElementById('post-button');
    if (postButton) {
        postButton.addEventListener('click', function () {
            localStorage.clear();
        });
    }
    var detailButton = document.getElementById('detail-button');
    if (detailButton) {
        detailButton.addEventListener('click', function () {
            localStorage.clear();
        });
    }
});
