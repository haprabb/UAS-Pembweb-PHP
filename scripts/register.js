// 3D Tilt Effect
const container = document.querySelector('.register-container');

container.addEventListener('mousemove', (e) => {
    const rect = container.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    const rotateX = (y - centerY) / 30;
    const rotateY = -(x - centerX) / 30;

    container.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
});

container.addEventListener('mouseleave', () => {
    container.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
});

// Form Submit Animation
const form = document.getElementById('registerForm');
const spinner = document.querySelector('.loading-spinner');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const button = form.querySelector('button[type="submit"]');
    button.disabled = true;
    spinner.style.display = 'inline-block';

    // Simulate form submission
    setTimeout(() => {
        button.disabled = false;
        spinner.style.display = 'none';
        // Add your form submission logic here
    }, 2000);
});