const bouton = document.querySelector('#bouton');
const bouton2 = document.querySelector('#bouton2');
const bouton3 = document.querySelector('#bouton3');
const bouton4 = document.querySelector('#bouton4');
const bouton5 = document.querySelector('#bouton5');

const cvMusculation = document.querySelector('#cvMusculation');
const cvFitness = document.querySelector('#cvFitness');
const cvBiking = document.querySelector('#cvBiking');
const cvCardioTraining = document.querySelector('#cvCardioTraining');
const cvCourCollectif = document.querySelector('#cvCourCollectif');


const carteCoach = document.querySelector('#musculation');
const carteCoach2 = document.querySelector('#fitness');
const carteCoach3 = document.querySelector('#biking');
const carteCoach4 = document.querySelector('#cardioTraining');
const carteCoach5 = document.querySelector('#cour_collectif');

    bouton.addEventListener('click', ()=>{
        if(carteCoach.style.display=='block'){
            carteCoach.style.display='none';
        }else{
            carteCoach.style.display='block';
            carteCoach2.style.display='none';
            carteCoach3.style.display='none';
            carteCoach4.style.display='none';
            carteCoach5.style.display='none';
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
            carteCoach5.style.display='none';
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
            carteCoach5.style.display='none';
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
            carteCoach5.style.display='none';
        }
    });

    bouton5.addEventListener('click', ()=>{
        if(carteCoach5.style.display=='block'){
            carteCoach5.style.display='none';
        }else{
            carteCoach4.style.display='none';
            carteCoach.style.display='none';
            carteCoach2.style.display='none';
            carteCoach3.style.display='none';
            carteCoach5.style.display='block';
        }
    });

    cvMusculation.addEventListener('click', () => {
        const cheminFichier = 'http://localhost/projet_piscine/projet_webinaire_gr1_TD14/photo_de_coach/cv/cv_xml/cv_coach_musculation_xml.xml';
        window.location.href = cheminFichier;
    });
    
    cvFitness.addEventListener('click', () => {
        const cheminFichier2 = 'http://localhost/projet_piscine/projet_webinaire_gr1_TD14/photo_de_coach/cv/cv_xml/cv_coach_fitness_xml.xml';
        window.location.href = cheminFichier2;
    });
    
    cvBiking.addEventListener('click', () => {
        const cheminFichier3 = 'http://localhost/projet_piscine/projet_webinaire_gr1_TD14/photo_de_coach/cv/cv_xml/cv_coach_biking_xml.xml';
        window.location.href = cheminFichier3;
    });
    
    cvCardioTraining.addEventListener('click', () => {
        const cheminFichier4 = 'http://localhost/projet_piscine/projet_webinaire_gr1_TD14/photo_de_coach/cv/cv_xml/cv_coach_cardio_trainning_xml.xml';
        window.location.href = cheminFichier4;
    });

    cvCourCollectif.addEventListener('click', () => {
        const cheminFichier5 = 'http://localhost/projet_piscine/projet_webinaire_gr1_TD14/photo_de_coach/cv/cv_xml/cv_coach_cour_collectif_xml.xml';
        window.location.href = cheminFichier5;
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
    function envoyerEmail(emailAddress){
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
   