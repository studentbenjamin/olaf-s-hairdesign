$(document).ready(function () {

    $.ajax({
    type: "POST",
    url: "infolijst.php",
    // AddString => script Func
    data: { ShowData : "" },
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