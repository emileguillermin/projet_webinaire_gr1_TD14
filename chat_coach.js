let msgdiv = document.getElementById("msg");
//appel fonction lire
setInterval(() => {
  fetch("chatLire.php").then(
    r => {
      if (r.ok) {
        return r.text();
      }
    }
  ).then(
    d => {
      msgdiv.innerHTML = d;
    }
  )
}, 500);

window.onkeydown = (e) => {
  if (e.key == "Enter") {
    sendMessage();
  }
}
//transmet les messages 
function sendMessage() {
  let msg = document.getElementById('input_msg').value;
  if (msg.trim() === "") return; // Ne pas envoyer de message vide
  document.getElementById('input_msg').value = "";
  fetch(`chatPost.php?msg=${encodeURIComponent(msg)}`).then(
    r => {
      if (r.ok) {
        return r.text();
      }
    }
  ).then(
    d => {
      console.log(d); // Affiche la réponse du serveur pour le débogage
      msgdiv.scrollTop = (msgdiv.scrollHeight - msgdiv.clientHeight);
    }
  )
}