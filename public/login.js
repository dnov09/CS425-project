(function(){

    const firebaseConfig = {
        apiKey: "AIzaSyCwEjL5VKMwbK_Zz5X4AYTZPYoOgkZP1k8",
        authDomain: "database-20325.firebaseapp.com",
        databaseURL: "https://database-20325.firebaseio.com",
        projectId: "database-20325",
        storageBucket: "database-20325.appspot.com",
        messagingSenderId: "698450547042",
        appId: "1:698450547042:web:04867510b1a497c6689c3b",
        measurementId: "G-E4M8SMQP0V"
      };
    firebase.initializeApp(firebaseConfig);

    
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