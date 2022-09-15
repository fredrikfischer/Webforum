
const myProfileForm = document.getElementById('myProfileForm');

const usernameUpdateSubmit = document.getElementById('usernameUpdateSubmit');
const currentUsername = document.getElementById('currentUsername');
const updateUsername = document.getElementById('updateUsername');

const emailUpdateSubmit = document.getElementById('emailUpdateSubmit');
const currentEmail = document.getElementById('currentEmail');
const updatedEmail = document.getElementById('updatedEmail');

const updatedPasswordSubmit = document.getElementById('updatedPasswordSubmit');
const updatedPassword = document.getElementById('updatedPassword');
const updatedPasswordMatch = document.getElementById('updatedPasswordMatch');


usernameUpdateSubmit.addEventListener('click', e => {


    if (!checkUsernameInput()){
       e.preventDefault();
    }else{
      
    }

});

emailUpdateSubmit.addEventListener('click', e => {


    if (!checkEmailInput()){
        e.preventDefault();
    }else{
        
    }
});

updatedPasswordSubmit.addEventListener('click', e => {

    var passwordValidationBool = false;
    var passwordMatchValidationBool = false;

    if (!checkPasswordInput()){
        passwordValidationBool = false;
    }else{
        passwordValidationBool = true;
    }

    if (!checkPasswordMatchInput()){
        passwordMatchValidationBool = false;
    }else{
        passwordMatchValidationBool = true;
    }

    if(passwordValidationBool == true && passwordMatchValidationBool == true){

    }else{
        e.preventDefault();
    }
});



function checkPasswordInput(){
    if(updatedPassword.value === '' || updatedPassword.value === null) {
		setErrorFor(updatedPassword, 'Password cannot be blank');
        return false;
	} else if (updatedPassword.value.length < 8){
        setErrorFor(updatedPassword, 'Password length can not be shorter than 8 charachters');
        return false;
    }else {
		setSuccessFor(updatedPassword);
		return true;
	}

  

}

function checkPasswordMatchInput(){
    if(updatedPassword.value != updatedPasswordMatch.value) {
		setErrorFor(updatedPasswordMatch, 'Passwords does not match');
        return false;
	} else {
		setSuccessFor(updatedPasswordMatch);
		return true;
	}

}

function checkEmailInput(){
    if(updatedEmail.value === '' || updatedEmail.value === null) {
		setErrorFor(emailUpdateSubmit, 'Email cannot be blank');
        return false;
	} else if (updatedEmail.value == currentEmail.value) {
		setErrorFor(updatedEmail, 'Same email');
        return false;
	}else if (!isEmail(updatedEmail.value)) {
		setErrorFor(updatedEmail, 'Not a valid email');
        return false;
	} else {
		setSuccessFor(updatedEmail);
		return true;
	}
	
}

function checkUsernameInput(){
    if(currentUsername.value === updateUsername.value){
        setErrorFor(updateUsername, "Same Username");
        return false;
    }else if (updateUsername.value == '' || updateUsername == null){
        setErrorFor(updateUsername, "Username can not be blank");
        return false;
    } else {
        setSuccessFor(updateUsername)
        return true;
    }
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}





/*$(document).ready(function(){

    //For updating username
    $("#usernameUpdateSubmit").on("click", function(e){
        
        const updateUsername = $('#updateUsername').val();
        const currentUsername = $('#currentUsername').val();

        if(updateUsername == currentUsername){
            e.preventDefault();
            alert("same username");
           // window.location.href = 'my profile.php'

            
        } else if (updateUsername == '' || updatedUsername == null) {
            e.preventDefault();
            alert("Username can not be blank");
            //window.location.href = 'my profile.php'
        }else{

        }
        
    });

    $("#emailUpdateSubmit").on("click", function(e){


        const updateEmail = $('#updatedEmail').val();
        const currentEmail = $('#currentEmail').val();

        if(updateEmail == currentEmail){
            e.preventDefault();
            alert("Same Email");
           // window.location.href = 'my profile.php'

            
        } else if (updateEmail == '' || updatedEmail == null) {
            e.preventDefault();
            alert("Email can not be blank");
            //window.location.href = 'my profile.php'
        }else{

        }

    });

    $("#updatedPasswordSubmit").on("click", function(e){


      
        const updatedPassword = $('#updatedPassword').val();
        const updatedPasswordMatch = $('#updatedPasswordMatch').val();

        if(updatedPassword == '' || updatedPassword== null){
            e.preventDefault();
            alert("Password can not be blank");
           // window.location.href = 'my profile.php'    
        }else if (updatedPassword.length < 8){
            alert("Password length can not be shorter than 8 charachters");
        }
        
        if (!(updatedPassword == updatedPasswordMatch)) {
            e.preventDefault();
            alert("Passwords does not match");
            //window.location.href = 'my profile.php'
        }else{

        }

    });





});*/