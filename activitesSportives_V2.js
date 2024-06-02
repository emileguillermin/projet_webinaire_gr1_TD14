
document.addEventListener('DOMContentLoaded', (event) => {
    const buttons = document.querySelectorAll('.bouton');
    const cards = document.querySelectorAll('.carteCoach');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const specialite = button.id.replace('bouton-', '');
            cards.forEach(card => {
                if (card.id === specialite) {
                    card.style.display = card.style.display === 'block' ? 'none' : 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});


function showCommunicationOptions(button) {
    const options = button.nextElementSibling;
    options.style.display = options.style.display === 'block' ? 'none' : 'block';
}

function envoyerEmail(email) {
    window.location.href = `mailto:${email}`;
}

function ouvrirchat(ID_coach) {
    window.location.href = "chat.php?coach_id=" + ID_coach;
}

function visioconf(videoLink) {
    window.open(videoLink, '_blank');
}
