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

        
        bouton.addEventListener('click', ()=>{
            if(carteCoach.style.display=='block'){
                carteCoach.style.display='none';
            }else{
                carteCoach.style.display='block';
                carteCoach2.style.display='none';
                carteCoach3.style.display='none';
                carteCoach4.style.display='none';
                carteCoach5.style.display='none';
                carteCoach6.style.display='none';
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
                carteCoach6.style.display='none';
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
                carteCoach6.style.display='none';
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
                carteCoach6.style.display='none';
            }
        });
        bouton5.addEventListener('click', ()=>{
            if(carteCoach5.style.display=='block'){
                carteCoach5.style.display='none';
            }else{
                carteCoach5.style.display='block';
                carteCoach.style.display='none';
                carteCoach2.style.display='none';
                carteCoach3.style.display='none';
                carteCoach4.style.display='none';
                carteCoach6.style.display='none';
            }
        });
        bouton6.addEventListener('click', ()=>{
            if(carteCoach6.style.display=='block'){
                carteCoach6.style.display='none';
            }else{
                carteCoach6.style.display='block';
                carteCoach.style.display='none';
                carteCoach2.style.display='none';
                carteCoach3.style.display='none';
                carteCoach5.style.display='none';
                carteCoach4.style.display='none';
            }
        });
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