window.onload = function () {
    
    //-------------------------------------------------------------------------
    // define an event listener for the '#createCustomerForm'
    //-------------------------------------------------------------------------
    var createCustomerForm = document.getElementById('createCustomerForm');
    if (createCustomerForm !== null) {
        createCustomerForm.addEventListener('submit', validateCustomerForm);
    }

    function validateCustomerForm(event) {

        //Creating the variables to store the input information
        var form = event.target;
        var fName = form["fName"].value;
        var lName = form["lName"].value;
        var email = form["email"].value;
        var mobile = form["mobile"].value;
        var address = form["address"].value;
        var branchID = form["branchID"].value;

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        //Displays errors if the text fields are empty.
        var errors = new Object();

        if (fName === ""){
            errors['fName'] = " Name cannot be blank";
        }
        if (lName === ""){
            errors['lName'] = " Name cannot be blank";
        }
        if (email === ""){
            errors['email']= " Email cannot be blank";
        }
        if (mobile === ""){
            errors['mobile']= " Mobile cannot be blank";
        }
        if (address === ""){
            errors['address']= " Address cannot be blank";
        }
        if (branchID === ""){
            errors['branchID']= " branchID cannot be blank";
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
        else if (!confirm("Is this correct?")) {
            event.preventDefault();
        }

    }
    
    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteCustomer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteCustomer');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this customer?")) {
            event.preventDefault();
        }
    }
    
    //-------------------------------------------------------------------------
    // define an event listener for the '#editCustomerForm'
    //-------------------------------------------------------------------------
    var editCustomerForm = document.getElementById('editCustomerForm');
    if (editCustomerForm !== null) {
        editCustomerForm.addEventListener('submit', validateCustomerForm);
    }
 
};