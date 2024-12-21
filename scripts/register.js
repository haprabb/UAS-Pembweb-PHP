function switchForm(type) {
    const formContainer = document.querySelector('.form-container');
    const slider = document.querySelector('.slider');
    const tabs = document.querySelectorAll('.nav-link');

    if (type === 'login') {
        formContainer.classList.add('show-login');
        slider.classList.add('login');
        tabs[1].classList.add('active');
        tabs[0].classList.remove('active');
    } else {
        formContainer.classList.remove('show-login');
        slider.classList.remove('login');
        tabs[0].classList.add('active');
        tabs[1].classList.remove('active');
    }
}

// Form validation
const forms = document.querySelectorAll('form');
forms.forEach(form => {
    form.addEventListener('submit', event => {
        event.preventDefault();
        if (!form.checkValidity()) {
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});

// Password confirmation validation
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm_password');
if (confirmPassword) {
    confirmPassword.addEventListener('input', function () {
        if (this.value !== password.value) {
            this.setCustomValidity('Passwords do not match');
        } else {
            this.setCustomValidity('');
        }
    });
    password.addEventListener('input', function () {
        if (confirmPassword.value !== this.value) {
            confirmPassword.setCustomValidity('Passwords do not match');
        } else {
            confirmPassword.setCustomValidity('');
        }
    });
}