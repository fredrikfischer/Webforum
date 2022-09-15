

const commentForm = document.getElementById('commentForm');
const comment = document.getElementById('comment');


commentForm.addEventListener('submit', e => {

	
	if(checkCommentInputs() == false) {
		e.preventDefault();
		checkInputs();
		
	} else {
		
	}
});

function checkCommentInputs() {
	// trim to remove the whitespaces
	const commentValue = comment.value.trim();
	var commentSuccessBool = false;
	
	
	if(commentValue === '') {
		setErrorFor(comment, 'Comment cannot be blank');
	} else {
		setSuccessFor(comment);
		commentSuccessBool = true;
	}

	if (commentSuccessBool == true) {
		return true;
	} else {
		return false;
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

	

