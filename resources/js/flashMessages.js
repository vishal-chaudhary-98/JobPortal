document.addEventListener('DOMContentLoaded', function () {
    const flashMessages = document.querySelectorAll('.flash-message');
    flashMessages.forEach((msg) => {
        msg.classList.add('fade-in');
        setTimeout(() => {
            msg.classList.remove('fade-in');
            msg.classList.add('fade-out');
            setTimeout(() => {
                msg.remove();
            }, 1000); // Duration of fade-out
        }, 3000); // Show for 3 seconds
    });
});



// Theme toggle functionality 

const toggleSwitch = document.getElementById('themeSwitch');
const body = document.body;

toggleSwitch.addEventListener('change', () => {
    if (toggleSwitch.checked) {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
    } else {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
    }
});

