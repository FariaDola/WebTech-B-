function validateSignupForm()
{
  var allowedExtensionsforimage = /(\.jpg|\.jpeg|\.png)$/i;

  var firstname = document.forms["signupform"]["firstname"].value;
    var lastname = document.forms["signupform"]["lastname"].value;
    var username = document.forms["signupform"]["username"].value;
    var image = document.forms["signupform"]["image"].value;
    var email = document.forms["signupform"]["email"].value;
    var password = document.forms["signupform"]["password"].value;
    var repeatpassword = document.forms["signupform"]["repeatpassword"].value;


  if( firstname == "" || lastname == "" || username == "" || image == "" || email == "" || password == "" || repeatpassword == ""  )
  {
    if(!allowedExtensionsforimage.exec(image) )
    {
      document.getElementById("imageE").innerHTML="Image format must be JPG,JPEG OR PNG!";
    }
    if (firstname == "")  
    {
      document.getElementById("firstnameE").innerHTML="First name Can not be empty!";
    }
    else
    {
      document.getElementById("firstnameE").innerHTML="";
    } 
    if (lastname == "")
    {
      document.getElementById("lastnameE").innerHTML="Last name Can not be empty!";
    }
    else
    {
      document.getElementById("lastnameE").innerHTML="";
    }
    if (username == "")
    {
      document.getElementById("usernameE").innerHTML="Username Can not be empty!";
    }
    else
    {
      document.getElementById("usernameE").innerHTML="";
    }
    if (image == "")
    {
      document.getElementById("imageE").innerHTML="Must upload Image";
    }
    else
    {
      document.getElementById("imageE").innerHTML="";
    }
    if (email == "")
    {
      document.getElementById("emailE").innerHTML="Email Can not be empty!";
    }
    else
    {
      document.getElementById("emailE").innerHTML="";
    }
    if (password == "")
    {
      document.getElementById("passwordE").innerHTML="password Can not be empty!";
    }
    else
    {
      document.getElementById("passwordE").innerHTML="";
    }
    if (repeatpassword == "")
    {
      document.getElementById("repeatpasswordE").innerHTML="Repeat password Can not be empty!";
    }
    else
    {
      if( repeatpassword != password )
      {
        document.getElementById("repeatpasswordE").innerHTML="Repeat password must match!";
      }
      else
      {
        document.getElementById("repeatpasswordE").innerHTML="";
      }
    }
    return false
  }
  else
  {
    return true;
  }
  if(!allowedExtensionsforimage.exec(image) )
  {
    document.getElementById("imageE").innerHTML="Image format must be JPG,JPEG OR PNG!";
    return false;
  }
  
}