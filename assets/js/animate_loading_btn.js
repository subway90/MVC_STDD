document.getElementById('button-loader').addEventListener('click', function() {
    document.getElementById('button-loader').classList.add('disabled');
    document.getElementById('key-loader').classList.remove('d-none');
    document.getElementById('text-loader').classList.add('d-none');
});