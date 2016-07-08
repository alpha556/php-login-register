$(document).ready(function () {
    usercheck();
    $("form").submit(function (event) {
        var password = $("#password").val();
        var c_password = $("#confirm-password").val();
        var email = $("#email").val();
        var username = $("#username").val();
        if (password != c_password) {
            $("#error_message").text("Confirm password again");
            event.preventDefault();
        }
        if (!isEmail(email)) {
            $("#error_message").text("Enter a valid email");
            event.preventDefault();
        }
        if (!isValidName(username)) {
            $("#error_message").text("Enter a valid username");
            event.preventDefault();
        }
        usercheck();
    });
});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isValidName(str) {
    return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\@?]/g.test(str);
}
function usercheck(){
    $("#username").blur(function(){
        var string=$(this).val();
        $.post("utility.php",{input:string},function(data){
         if(data==true){
             event.preventDefault();
             $("#error_message").text("Username already taken");
         }
     });    
    });
}