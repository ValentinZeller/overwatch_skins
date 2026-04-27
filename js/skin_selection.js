let imgDisplay = document.getElementById('img-display')
let form = document.getElementById('skin-selection')

if (form != null) {
    form.addEventListener('change', function () {
        let value = document.querySelector('input[name=skin]:checked').value
        imgDisplay.src = value;
    });

    document.querySelector('label').click()
}