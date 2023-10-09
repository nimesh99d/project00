// validation.js

function validateForm() {
  var fullName = document.forms["registrationForm"]["fullname"].value;
  var studentID = document.forms["registrationForm"]["studentid"].value;
  var email = document.forms["registrationForm"]["email"].value;
  var phoneNumber = document.forms["registrationForm"]["phone"].value;

  if (fullName == "" || studentID == "" || email == "" || phoneNumber == "") {
    alert("All fields must be filled out");
    return false;
  }

  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email.match(emailPattern)) {
    alert("Invalid email address");
    return false;
  }

  return true;
}
