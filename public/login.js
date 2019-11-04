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
    firebase.initializeApp(config);
   // const db = firebase.firestore();
    
    document.getElementById("sign").onclick= function (){
        const email=document.getElementById("name").value;
        const password=document.getElementById("pswd").value;
        
        // db.collection("users").add({
        //     name: fullname,
        //     email: email,
        //     dob: dob,
        //     username: username,
        //     country:country,
        //     address:address,
        //     postal:postal,
        //     State:State
        // })
        // .then(function(docRef) {
        //     console.log("Document written with ID: ", docRef.id);
        // })
        // .catch(function(error) {
        //     console.error("Error adding document: ", error);
        // });
        const auth = firebase.auth();
        const promise = auth.signInWithEmailAndPassword(email,password);
        promise.catch(e=> console.log(e.message));
        location.replace("profile.html");
    }
    
    }());