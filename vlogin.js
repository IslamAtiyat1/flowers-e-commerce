function validateForm() {
    var usernameemail = document.forms["loginForm"]["usernameemail"].value;
    var password = document.forms["loginForm"]["password"].value;
    if (usernameemail == "" || password == "") {
      alert("Please fill in all fields");
      return false;
    }
  }