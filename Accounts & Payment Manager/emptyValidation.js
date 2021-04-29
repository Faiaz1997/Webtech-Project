function emptyValidation() {
  var username = document.getElementById("username").value;
  var pass = document.getElementById("password").value;
  if (username == "" || pass == "") {
    alert("Username or password cannot be empty!")
    return false;
  }
}
