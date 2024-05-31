const bouton = document.querySelector('#bouton');
const bouton2 = document.querySelector('#bouton2');
const bouton3 = document.querySelector('#bouton3');
const bouton4 = document.querySelector('#bouton4');

const cvMusculation = document.querySelector('#cvMusculation');
const cvFitness = document.querySelector('#cvFitness');
const cvBiking = document.querySelector('#cvBiking');
const cvCardioTraining = document.querySelector('#cvCardioTraining');


const carteCoach = document.querySelector('#musculation');
const carteCoach2 = document.querySelector('#fitness');
const carteCoach3 = document.querySelector('#biking');
const carteCoach4 = document.querySelector('#cardioTraining');

    bouton.addEventListener('click', ()=>{
        if(carteCoach.style.display=='block'){
            carteCoach.style.display='none';
        }else{
            carteCoach.style.display='block';
            carteCoach2.style.display='none';
            carteCoach3.style.display='none';
            carteCoach4.style.display='none';
            }
        });
    bouton2.addEventListener('click', ()=>{
        if(carteCoach2.style.display=='block'){
            carteCoach2.style.display='none';
        }else{
            carteCoach2.style.display='block';
            carteCoach.style.display='none';
            carteCoach3.style.display='none';
            carteCoach4.style.display='none';
        }
    });
    bouton3.addEventListener('click', ()=>{
        if(carteCoach3.style.display=='block'){
            carteCoach3.style.display='none';
        }else{
            carteCoach3.style.display='block';
            carteCoach.style.display='none';
            carteCoach2.style.display='none';
            carteCoach4.style.display='none';
        }
    });
    bouton4.addEventListener('click', ()=>{
        if(carteCoach4.style.display=='block'){
            carteCoach4.style.display='none';
        }else{
            carteCoach4.style.display='block';
            carteCoach.style.display='none';
            carteCoach2.style.display='none';
            carteCoach3.style.display='none';
        }
    });
    function ouvrirchat() {
        window.open('chat.php', '_blank', 'width=600,height=400');
    }
    function showCommunicationOptions(button) {
        var optionsDiv = button.nextElementSibling.nextElementSibling;
        if (optionsDiv.style.display == "block" ) {
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
    function visioconf(appelTeams){
        window.open(appelTeams,'_bank');
    }
   