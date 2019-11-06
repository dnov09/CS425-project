import * as config from "./.config.js";

(function(){

    document.getElementById("sign").onclick= function (){
        const email=document.getElementById("name").value;
        const password=document.getElementById("pswd").value;
        
    
        const auth = firebase.auth();
        const promise = auth.signInWithEmailAndPassword(email,password);
        promise.catch(e=> console.log(e.message));
       // location.replace("profile.html");
       firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          alert("oshey you entered");
        } else {
          alert("wrong username and password");
        }
      });
    }
    
    
    }());