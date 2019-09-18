// The Error Message that will dsiplay under the form
document.getElementById("username_error_message").style.display = "none";
document.getElementById("password_error_message").style.display = "none";
document.querySelector('.register__form').style.display = 'none';
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



//Function to Togl Between Register and Login Forms
//Toggle to show the Register form
toggleSignup = function(e){
  const loginBtn  = document.querySelector('.register__link');
  const loginForm = document.querySelector('.login__form');
  const signUpForm = document.querySelector('.register__form');
  loginBtn.addEventListener('click', ()=>{
    loginForm.style.display = 'none';
    signUpForm.style.display = 'block';
  })
  e.preventDefault();
}

//Toggle to show the Login Form
toggleLogin = function(e){
  const loginBtn  = document.querySelector('.register__link');
  const loginForm = document.querySelector('.login__form');
  const signUpForm = document.querySelector('.register__form');
  loginBtn.addEventListener('click', ()=>{
    loginForm.style.display = 'block';
    signUpForm.style.display = 'none';
  })
  e.preventDefault();
}