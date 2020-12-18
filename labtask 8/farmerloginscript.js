function validateForm() {
  var username = document.forms["loginform"]["loginUserName"].value;
  var password = document.forms["loginform"]["loginPassword"].value;

  if (username == "" && password == "") 
  {
    document.getElementById("loginUserNameError").innerHTML="Can not be empty!";
    document.getElementById("loginPasswordError").innerHTML="Can not be empty!";
    return false;
  }
  else
  {
  	return true;
  }
}
