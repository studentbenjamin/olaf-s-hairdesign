$(document).ready(function () {
    $('.inloggen').click(function(event)
    {

    var obj = {
        Username : $("#username").val(),
        Password : $("#password").val()
    }
    
    var json = JSON.stringify(obj);
    console.log(json);

    $.ajax({
        type: "POST",
        url: "registratieLogin.php",
        // AddString => script Func
        data: { GetData: json },
        cache: false,
        crossDomain: true,
        success: function (msg) 
        {
         console.log(msg);
           if(msg == "1")
           {
              //sessionStorage.setItem("Username", $("#gebruiker").val());
              window.location.href='boekingssysteem.html';
            }
           else
           {
              alert("Uw gebruikersnaam of wachtwoord is fout.");
           }
        }
     });
     $('.volgende').click(function(event)
    {
      alert("seks met jonathans zusje vind ik lekker");
    });
   });
  });