$(document).ready(function () {

    var obj = {
        Username : $("#gebruiker").val(),
        Password : $("#wachtwoord").val()
    
    }
    
    var json = JSON.stringify(obj);

    $.ajax({
        type: "POST",
        url: "loginregistratie.php",
        // AddString => script Func
        data: { GetData: json },
        cache: false,
        crossDomain: true,
        success: function (msg) 
        {
           if(msg == "1")
           {
              sessionStorage.setItem("Username", $("#gebruiker").val());
              //window.location.href='pagina van afspraken maken';
           }
           else
           {
              alert("Uw gebruikersnaam of wachtwoord is fout.");
           }
        }
     });
   event.preventDefault();
  });
