// import * as config from "./.config.js";

function validate(){
        var username = document.getElementById("name").value;
        var password = document.getElementById("pswd").value;
        if ( username == "test" && password == "test"){
        //alert ("Login successfully");
        window.location = "home.html"; // Redirecting to other page.
        return false;
        }else{
            alert ("Wrong credentials Please try again");
            window.location = "loginpage.html"; 
            return false; 
        }
    
    }