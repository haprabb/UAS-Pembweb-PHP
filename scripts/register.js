document.getElementById('registerForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Animasi saat submit
    const button = document.querySelector('button[type="submit"]');
    button.classList.add('animate__animated', 'animate__pulse');

    // Validasi password match
    const password = document.getElementById('password').value;
    const konfirmasi = document.getElementById('konfirmasi_password').value;

    if (password !== konfirmasi) {
        alert('Password tidak cocok!');
        return;
    }

    // Proses form submission bisa ditambahkan disini
});

// Animasi hover pada input
const inputs = document.querySelectorAll('.form-control');
inputs.forEach(input => {
    input.addEventListener('focus', function () {
        this.parentElement.classList.add('animate__animated', 'animate__pulse');
    });

    input.addEventListener('blur', function () {
        this.parentElement.classList.remove('animate__animated', 'animate__pulse');
    });
});