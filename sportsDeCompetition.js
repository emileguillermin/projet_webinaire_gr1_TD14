document.addEventListener("DOMContentLoaded", function() {
    const bouton = document.querySelector('#bouton');
    const bouton2 = document.querySelector('#bouton2');
    const bouton3 = document.querySelector('#bouton3');
    const bouton4 = document.querySelector('#bouton4');
    const bouton5 = document.querySelector('#bouton5');
    const bouton6 = document.querySelector('#bouton6');

    const carteCoach = document.querySelector('#Basketball');
    const carteCoach2 = document.querySelector('#Football');
    const carteCoach3 = document.querySelector('#Rugby');
    const carteCoach4 = document.querySelector('#Tennis');
    const carteCoach5 = document.querySelector('#Natation');
    const carteCoach6 = document.querySelector('#Plongeon');

    // Set initial display style to 'none'
    carteCoach.style.display = 'none';
    carteCoach2.style.display = 'none';
    carteCoach3.style.display = 'none';
    carteCoach4.style.display = 'none';
    carteCoach5.style.display = 'none';
    carteCoach6.style.display = 'none';

    bouton.addEventListener('click', () => {
        toggleCardDisplay(carteCoach, [carteCoach2, carteCoach3, carteCoach4, carteCoach5, carteCoach6]);
    });

    bouton2.addEventListener('click', () => {
        toggleCardDisplay(carteCoach2, [carteCoach, carteCoach3, carteCoach4, carteCoach5, carteCoach6]);
    });

    bouton3.addEventListener('click', () => {
        toggleCardDisplay(carteCoach3, [carteCoach, carteCoach2, carteCoach4, carteCoach5, carteCoach6]);
    });

    bouton4.addEventListener('click', () => {
        toggleCardDisplay(carteCoach4, [carteCoach, carteCoach2, carteCoach3, carteCoach5, carteCoach6]);
    });

    bouton5.addEventListener('click', () => {
        toggleCardDisplay(carteCoach5, [carteCoach, carteCoach2, carteCoach3, carteCoach4, carteCoach6]);
    });

    bouton6.addEventListener('click', () => {
        toggleCardDisplay(carteCoach6, [carteCoach, carteCoach2, carteCoach3, carteCoach4, carteCoach5]);
    });
});

function toggleCardDisplay(showCard, hideCards) {
    if (showCard.style.display == 'block') {
        showCard.style.display = 'none';
    } else {
        showCard.style.display = 'block';
        hideCards.forEach(card => card.style.display = 'none');
    }
}

function showCommunicationOptions(button) {
    var optionsDiv = button.nextElementSibling.nextElementSibling;
    if (optionsDiv.style.display == "block") {
        optionsDiv.style.display = "none";
    } else {
        optionsDiv.style.display = "block";
    }
}

function envoyerEmail(emailAddress) {
    var lienMail = 'mailto:' + emailAddress;
    window.location.href = lienMail;
}

function envoyerSMS(phoneNumber) {
    var lienSMS = 'sms:' + phoneNumber;
    window.location.href = lienSMS;
}

function visioconf(appelTeams) {
    window.open(appelTeams, '_blank');
}