
const commentForm = document.getElementById("commentForm");
const topic = document.getElementById("topic");
const threadText = document.getElementById("threadText");
const fileinput = document.getElementById("fileinput");

const allowedFileFormats = /(\.png|\.gif|\.jpeg|\.jpg)$/i;
//"png", "gif", "jpeg", "jpg"


commentForm.addEventListener("submit", e => {
    
    // For Topic
    if (topic.value == '' || topic.value == null){
        e.preventDefault();
        setErrorFor(topic, "Topic can not be blank")
    }else{
        setSuccessFor(topic)
    }

    //For Text

    if (threadText.value == '' || threadText.value == null){
        e.preventDefault();
        setErrorFor(threadText, "Text can not be blank")
    }else{
        setSuccessFor(threadText)
    }

    //For File

    if(fileinput.value == '' || fileinput == null){

    }else{
        if (!allowedFileFormats.exec(fileinput.value)){
            e.preventDefault();
            setErrorFor(fileinput, "Wrong file format")
        }else{
            setSuccessFor(fileinput)
        }
    }

});


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




/*$(document).ready(function(){

    //For updating username
    $("#threadSubmit").on("click", function(e){
    
    
        const topic = $('#topic').val();
        const threadText = $('#threadText').val();

        if(topic == '' || topic == null){
            e.preventDefault();
            alert("Topic can not be blank");
           // window.location.href = 'my profile.php'

            
        }
        
        if (threadText == '' || threadText == null) {
            e.preventDefault();
            alert("Text can not be blank");
            //window.location.href = 'my profile.php'
        }else{

        }
 
    });


});*/