const neonText = document.querySelectorAll('.hero-content h1');

setInterval(() => {
    neonText.forEach(item => {
        item.style.opacity = Math.random() > 0.95 ? 0.8 : 1;
    });
}, 100);