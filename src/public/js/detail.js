document.getElementById('reserve__date').addEventListener('input', function () {
    var inputValue = this.value;
    document.getElementById('input__date').innerText = inputValue;
});

document.getElementById('time__id').addEventListener('change', function () {
    var selectedTime = this.options[this.selectedIndex];
    var relatedValue = selectedTime.getAttribute('data-related-value');
    document.getElementById('selected__time').innerText = relatedValue;
});

document.getElementById('num__id').addEventListener('change', function() {
    var selectedNum = this.options[this.selectedIndex];
    var relatedValue = selectedNum.getAttribute('data-related-value');
    document.getElementById('selected__num').innerText = relatedValue;
});
