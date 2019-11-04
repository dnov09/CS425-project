(function(){
    var flag=0;

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
const db = firebase.firestore();

document.getElementById("sign").onclick= function (){
    const email=document.getElementById("email").value;
    const password=document.getElementById("pswd").value;
    const fullname=document.getElementById("fname").value;
    const username=document.getElementById("username").value;
    const dob=document.getElementById("DOB").value;
    const address=document.getElementById("address").value;
    const country=document.getElementById("country").value;
    const State=document.getElementById("State").value;
    const postal=document.getElementById("postal_code").value;
    db.collection("users").add({
        name: fullname,
        email: email,
        dob: dob,
        username: username,
        country:country,
        address:address,
        postal:postal,
        State:State
    })
    .then(function(docRef) {
        console.log("Document written with ID: ", docRef.id);
    })
    .catch(function(error) {
        console.error("Error adding document: ", error);
    });
    const auth = firebase.auth();
    const promise = auth.createUserWithEmailAndPassword(email,password);
    promise.catch(e=> console.log(e.message));
    setTimeout(function(){
        location.replace("loginpage.html")
    }, 2000)
  
}

  


}());