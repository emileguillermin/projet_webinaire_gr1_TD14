//gerer les evenements avec les cartes coachs
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

    document.querySelectorAll('.bouton_2').forEach(button => {
        button.addEventListener('click', () => {
            const productUrl = button.getAttribute('data-cvurl');
            window.location.href = productUrl;
        });
    });

});

//fonction pour ontrer les boutons de communication
function showCommunicationOptions(button) {
        var optionsDiv = button.nextElementSibling.nextElementSibling;
        if (optionsDiv.style.display == "block" ) {
            optionsDiv.style.display = "none";
        } else {
            optionsDiv.style.display = "block";
        }
    }

//fonction pour envoyer un mail au coach qu'on souhaite
function envoyerEmail(email) {
    console.log(`Send email to: ${email}`);
    window.location.href = `mailto:${email}`;
}
//fonction qui appelle le chat
function ouvrirchat(ID_coach) {
    console.log(`Open chat with coach ID: ${ID_coach}`);
    window.location.href = "chat.php?coach_id=" + ID_coach;
}
//possibilité de faire des teams
function visioconf(videoLink) {
    console.log(`Open video conference with link: ${videoLink}`);
    window.open(videoLink, '_blank');
}
