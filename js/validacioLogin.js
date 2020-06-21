
window.onload = function () {
    document.getElementById("enviar").addEventListener("click", function (e) {
        var email = document.getElementById("email").value,
          password = document.getElementById("pass").value;
          
  
        if (email == "" || password == "") {
          alert("Si us plau, introdueix l´email i/o el password");
          e.preventDefault(); // Al donar error no s´envia el formulari
        } 
  
      });
  };