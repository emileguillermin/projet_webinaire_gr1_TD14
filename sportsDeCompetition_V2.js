
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



    
    // Ajout de l'écouteur d'événement pour les boutons "Communiquer avec le coach"
    document.querySelectorAll('.communiquer').forEach(button => {
        button.addEventListener('click', (event) => {
            event.stopPropagation(); // Empêche la propagation de l'événement pour éviter de fermer la carte
            const options = button.nextElementSibling;
            options.style.display = options.style.display === 'block' ? 'none' : 'block';
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

function ouvrirchat(ID_personnel) {
}

function visioconf(appelTeams){
        window.open(appelTeams,'_bank');
    }
