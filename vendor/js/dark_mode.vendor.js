const darkModeSwitch = document.getElementById('toggle');
const body = document.body;

darkModeSwitch.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
});
