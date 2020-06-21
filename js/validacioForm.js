window.onload = function () {
  document.getElementById("enviarRegistre").addEventListener("click", function (e) {
      var email = document.getElementById("email").value,
        password = document.getElementById("pass").value,
        confirmPass = document.getElementById("confirmPass").value;

      if (email == "" || password == "" || confirmPass == "") {
        alert("No es poden deixar camps en blanc !!");
        e.preventDefault(); // Al donar error no s´envia el formulari
      } else if (password.length > 10) {
        alert("Password massa llarg !");
        e.preventDefault(); // Al donar error no s´envia el formulari
      } else if (password.length < 5) {
        alert("Password massa curt !");
        e.preventDefault(); // Al donar error no s´envia el formulari
      }else if(password != confirmPass){
        alert("Password i confirmar password no coincideixen");
        e.preventDefault();//Al donar error no s´envia el formulari
      }

    });
};



