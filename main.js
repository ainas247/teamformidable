// The Error Message that will dsiplay under the form
document.getElementById("username_error_message").style.display = "none";
document.getElementById("password_error_message").style.display = "none";

// Getting the button
let btn = document.getElementById("btn");
btn.addEventListener("click", validateLogin);
function validateLogin(e) {
  e.preventDefault();

  // Getting All Input values
  let checkUserLogin = document.getElementById("username_or_email").value;
  let checkPassword = document.getElementById("password").value;
  //checking if username or email is empty
  if (checkUserLogin == "" || checkUserLogin == null) {
    document.getElementById("username_error_message").style.display = "block";
    document.getElementById("password_error_message").style.display = "none";
  }

  //checking if user password is empty
  else if (checkPassword == "" || checkPassword == null) {
    document.getElementById("username_error_message").style.display = "none";
    document.getElementById("password_error_message").style.display = "block";
  } else {
    alert("login");
  }
}
