function validateForm() {
  const nameInput = document.getElementById("name");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const confirmpasswordInput = document.getElementById("confirmpassword");
  const phoneInput = document.getElementById("phone");
  const addressInput = document.getElementById("address");
  
  const name = nameInput.value.trim();
  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();
  const confirmpassword = confirmpasswordInput.value.trim();
  const phone = phoneInput.value.trim();
  const address = addressInput.value.trim();
  
  const nameRegex = /^[a-zA-Z]+$/;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
  const phoneRegex = /^[0-9]{10}$/;
  
  let valid = true;
  
  if (!nameRegex.test(name)) {
    nameInput.classList.add("error");
    document.getElementById("name-error").textContent = "Name must contain only letters";
    valid = false;
  } else {
    nameInput.classList.remove("error");
    document.getElementById("name-error").textContent = "";
}
if (!emailRegex.test(email)) {
    emailInput.classList.add("error");
    document.getElementById("email-error").textContent = "Invalid email address";
    valid = false;
  } else {
    emailInput.classList.remove("error");
    document.getElementById("email-error").textContent = "";
  }
  
  if (!passwordRegex.test(password)) {
    passwordInput.classList.add("error");
    document.getElementById("password-error").textContent = "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter,one special character and one number";
    valid = false;
  } else {
    passwordInput.classList.remove("error");
    document.getElementById("password-error").textContent = "";
  }
  
  if (password !== confirmpassword) {
    confirmpasswordInput.classList.add("error");
    document.getElementById("confirmpassword-error").textContent = "Passwords do not match";
    valid = false;
  } else {
    confirmpasswordInput.classList.remove("error");
    document.getElementById("confirmpassword-error").textContent = "";
  }
  
  if (!phoneRegex.test(phone)) {
    phoneInput.classList.add("error");
    document.getElementById("phone-error").textContent = "Invalid phone number";
    valid = false;
  } else {
    phoneInput.classList.remove("error");
    document.getElementById("phone-error").textContent = "";
  }
  
  if (address === "") {
    addressInput.classList.add("error");
    document.getElementById("address-error").textContent = "Address cannot be empty";
    valid = false;
  } else {
    addressInput.classList.remove("error");
    document.getElementById("address-error").textContent = "";
  }
  
  return valid;
}
