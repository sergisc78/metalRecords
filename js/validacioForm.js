window.onload = function () {
  document
    .getElementById("enviarRegistre")
    .addEventListener("click", function (e) {
      var email = document.getElementById("email").value,
        password = document.getElementById("pass").value,
        confirmPass = document.getElementById("confirmPass").value;

      if (email == "" || password == "" || confirmPass == "") {
        alert("No es poden deixar camps en blanc !!");
        e.preventDefault(); // Al donar error no s´envia el formulari
      } else if (password.length > 10) {
        alert("Password too long !");
        e.preventDefault(); // Al donar error no s´envia el formulari
      } else if (password.length < 5) {
        alert("Password too short !");
        e.preventDefault(); // Al donar error no s´envia el formulari
      }
    });
};
