// function recarregar()
// {
//     location.reload();
// }

// setInterval(recarregar,700);

document.addEventListener("DOMContentLoaded", function() {
    const toggleCheckbox = document.getElementById('toggle-public-private');
    const toggleText = document.getElementById('toggle-text');
    const codigoInput = document.getElementById('codigo');

    toggleCheckbox.addEventListener('change', function() {
        if (toggleCheckbox.checked) {
            toggleText.textContent = 'Pública';
            codigoInput.disabled = true;
            codigoInput.value = '';
        } else {
            toggleText.textContent = 'Privada';
            codigoInput.disabled = false;
        }
    });
});

