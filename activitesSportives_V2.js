
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
    var optionsDiv = button.nextElementSibling.nextElementSibling;
        if (optionsDiv.style.display == "block" ) {
            optionsDiv.style.display = "none";
        } else {
            optionsDiv.style.display = "block";
        }
}

function envoyerEmail(email) {
    window.location.href = `mailto:${email}`;
}

function ouvrirchat(ID_personnel) {
    window.location.href = "chat.php?coach_id=" + ID_personnel;
}

function visioconf(videoLink) {
    window.open(videoLink, '_blank');
}
