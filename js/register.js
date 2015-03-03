//This is a js function that checks that the text fields are not empty or incorrect.
function validateRegistration(event) {
    
    //Creating the variables to store the input information
    var form = event.target;
    var username = form["username"].value;
    var password = form["password"].value;
    var password2 = form["password2"].value;
    
    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }
    
    //Displays errors if the text fields are empty.
    var errors = new Object();
    
    if (username === ""){
        errors[ 'username' ] = " Username cannot be blank";
    }
    if (password === ""){
        errors['password']= " Password cannot be blank";
    }
    if (password2 === ""){
        errors['password2']= " Confirm Password cannot be blank";
    }
    
    if(password !== password2){
        errors['password2'] = " Passwords must match";
    }
    
    //Checks that if there are no errors it will let you continue.
    var valid = true;
    for (var index in errors){
        valid = false;
        var errorMessage = errors[index];
        var spanElement = document.getElementById(index + "Error");
        
        spanElement.innerHTML = errorMessage;
    }
    //If there are errors it will not let you continue.
    if (!valid) {
        event.preventDefault();
    }
}

var form = document.getElementById("registerForm");
form.addEventListener("submit", validateRegistration);//Listens for the button to be clicked then brings you back to the homepage.

