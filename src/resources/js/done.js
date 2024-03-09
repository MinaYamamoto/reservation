document.addEventListener('DOMContentLoaded', function() {
    var backBtn = document.getElementById('return-button');
    backBtn.addEventListener('click', function() {
        localStorage.clear();
    });
});