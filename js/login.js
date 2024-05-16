const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");


sign_up_btn.addEventListener('click', () =>{
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener('click', () =>{
    container.classList.remove("sign-up-mode");
});
  document.addEventListener("DOMContentLoaded", function() {
    // Get the login button
    var loginButton = document.getElementById('LoginButton');

    // Add click event listener
    loginButton.addEventListener('click', function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();

      // Redirect to the desired page
      window.location.href = '../index2.php'; // Replace 'your-page-url' with the URL of the page you want to redirect to
    });
  });
