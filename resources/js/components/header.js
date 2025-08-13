export const Header = () => {
    console.info('header.js loaded');
    const header = document.getElementById('header');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 200) header.classList.add('shadow');
        else header.classList.remove('shadow');
    });
};