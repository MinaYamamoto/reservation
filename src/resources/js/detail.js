document.addEventListener('DOMContentLoaded', function () {
    var dateInput = document.getElementById('reserve__date');
    var selectedNum = localStorage.getItem('selectedNum');
    var selectedTime = localStorage.getItem('selectedTime');

    if (dateInput) {
        if (dateInput.getAttribute('data-old-date')) {
            dateInput.value = dateInput.getAttribute('data-old-date');
            document.getElementById('input__date').innerText = dateInput.value;
        }
        dateInput.addEventListener('input', function () {
            var inputValue = this.value;
            document.getElementById('input__date').innerText = inputValue;
        });
    }

    if (selectedNum) {
        document.getElementById('selected__num').innerText = selectedNum;
    }

    if (selectedTime) {
        document.getElementById('selected__time').innerText = selectedTime;
    }

    var timeInput = document.getElementById('time__id');
    if (timeInput) {
        timeInput.addEventListener('change', function () {
            var selectedTimeId = this.options[this.selectedIndex];
            var selectedTime = selectedTimeId.getAttribute('data-related-value');
            localStorage.setItem('selectedTime', selectedTime);
            document.getElementById('selected__time').innerText = selectedTime;
        });
    }

    var numInput = document.getElementById('num__id');
    if (numInput) {
        numInput.addEventListener('change', function() {
            var selectedNumId = this.options[this.selectedIndex];
            var selectedNum = selectedNumId.getAttribute('data-related-value');
            localStorage.setItem('selectedNum', selectedNum);
            document.getElementById('selected__num').innerText = selectedNum;
        });
    }

    var backBtn = document.getElementById('back-button');
    if (backBtn) {
        backBtn.addEventListener('click', function() {
            localStorage.clear();
        });
    }

});