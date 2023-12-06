$(document).ready(function () {
    $('.opslaan').click(function(event)
    {
var obj = {
    Name : sessionStorage.getItem("Name"),
    Phone : sessionStorage.getItem("Phone"),
    Gender : sessionStorage.getItem("Gender"),

    Time : $(".datum").val(),
    Note : $(".notitie").val()
}

var json = JSON.stringify(obj);
console.log(json);

    $.ajax({
        type: "POST",
        url: "boekinginformatie.php",
        // AddString => script Func
        data: { SendData: json },
        cache: false,
        crossDomain: true,
        success: function (msg) 
        {
        console.log(msg);
        }
    });
    alert('Je gegevens zijn opgeslagen!');
    $.ajax({
        type: "POST",
        url: "infolijst.php",
        // AddString => script Func
        data: { ShowData : json },
        cache: false,
        crossDomain: true,
        success: function (msg) 
        {
        $("#Table").html(msg);
        //console.log(msg);
        //console.log("succes");
        }
     });

    });
});