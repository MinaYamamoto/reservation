document.getElementById('reserve__date').addEventListener('input', function () {
    var inputValue = this.value;
    document.getElementById('input__date').innerText = inputValue;
});

document.getElementById('time__id').addEventListener('change', function () {
    var selectedTimeId = this.options[this.selectedIndex];
    var selectedTime = selectedTimeId.getAttribute('data-related-value');
    localStorage.setItem('selectedTime', selectedTime);
    document.getElementById('selected__time').innerText = selectedTime;
});

document.getElementById('num__id').addEventListener('change', function() {
    var selectedNumId = this.options[this.selectedIndex];
    var selectedNum = selectedNumId.getAttribute('data-related-value');
    localStorage.setItem('selectedNum', selectedNum);
    document.getElementById('selected__num').innerText = selectedNum;
});

document.addEventListener('DOMContentLoaded', function () {
    var dateInput = document.getElementById('reserve__date');
    var selectedNum = localStorage.getItem('selectedNum');
    var selectedTime = localStorage.getItem('selectedTime');
    if (dateInput.getAttribute('data-old-date')) {
        dateInput.value = dateInput.getAttribute('data-old-date');
        document.getElementById('input__date').innerText = dateInput.value;
    }
    if (selectedNum) {
        document.getElementById('selected__num').innerText = selectedNum;
    }
    if (selectedTime) {
        document.getElementById('selected__time').innerText = selectedTime;
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var backBtn = document.getElementById('back-button');
    backBtn.addEventListener('click', function() {
        localStorage.clear();
    });
});