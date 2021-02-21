
var createAccountChecks = () => {
    var username = document.getElementById('username').value
    var password = document.getElementById('password').value
    var password2 = document.getElementById('password2').value
 
        if(password != password2)
        {
            
        }
        else{
         xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function () {
              if(this.readyState == 4 && this.status == 200){
                  var response = this.response;
                  if (response.includes("true"))
                  {
                      //redirect to the login page
                      window.location.href = "signIn.php";
                  }
                  else if (response.includes("Username already exists"))
                  {
                      
                  }
                  else
                  {
                      alert(response)
                  }
          }
         }
         var query = ('username=' + username + '&password=' + password)
         xhttp.open('POST', '.createAccount.php', true);
         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xhttp.send(query);
 
     }
   
 }