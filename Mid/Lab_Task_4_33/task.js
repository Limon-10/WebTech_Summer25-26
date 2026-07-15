
themeBtn.onclick = function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        document.getElementById("themeBtn").innerHTML = "☀️ Light Mode";
    }
    else{
        document.getElementById("themeBtn").innerHTML = "🌙 Dark Mode";
    }

};


var hour = new Date().getHours();

if(hour < 12){
    document.getElementById("greeting").innerHTML = "Good Morning";
}
else if(hour < 18){
    document.getElementById("greeting").innerHTML = "Good Afternoon";
}
else{
    document.getElementById("greeting").innerHTML = "Good Evening";
}





document.getElementById("contactForm").addEventListener("submit",function(e){

    e.preventDefault();

    var valid = true;

    document.getElementById("nameError").innerHTML="";
    document.getElementById("emailError").innerHTML="";
    document.getElementById("messageError").innerHTML="";

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    if(name===""){
        document.getElementById("nameError").innerHTML="Name is required.";
        valid=false;
    }

    if(email=="" || email.indexOf("@")==-1 ||  email.indexOf(".")==-1){
        document.getElementById("emailError").innerHTML="email is required";
        valid =false;
    }

    if(message.length<10){
        document.getElementById("messageError").innerHTML="Message must be at least 10 characters.";
        valid=false;
    }

    if(valid){
        alert("Form Submitted Successfully!");
    }

});