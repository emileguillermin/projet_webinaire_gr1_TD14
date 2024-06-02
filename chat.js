document.addEventListener("DOMContentLoaded", () => {
    const msgdiv = document.getElementById("msg");
    const inputMsg = document.getElementById("input_msg");
  
    function update() {
      const msg = inputMsg.value;
      inputMsg.value = "";
      fetch(`chatPost.php?msg=${encodeURIComponent(msg)}`).then(
        r => r.text()
      ).then(
        d => {
          console.log(d);
          loadMessages();
        }
      );
    }
  
    function loadMessages() {
      fetch(`chatLire.php`).then(
        r => r.text()
      ).then(
        d => {
          msgdiv.innerHTML = d;
          msgdiv.scrollTop = msgdiv.scrollHeight;
        }
      );
    }
  
    document.querySelector(".input_msg button").addEventListener("click", update);
    inputMsg.addEventListener("keydown", e => {
      if (e.key === "Enter") {
        update();
      }
    });
  
    setInterval(loadMessages, 500);
  });
  