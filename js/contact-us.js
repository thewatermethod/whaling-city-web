window.onload = function(){

	var contactFormSubmitButton = document.getElementById('input-submit')
	contactFormSubmitButton.addEventListener( 'click', contactFormSubmit, false );

}

function contactFormSubmit(){

	// let's get all the values from the form
	var inputName = document.getElementById( 'input-name' ).value; 	
	var inputEmail = document.getElementById( 'input-email' ).value;
	var inputSubject = document.getElementById( 'input-subject' ).value; 
	var inputMessage = document.getElementById( 'input-message' ).value;

	// here is a honeypot trap
	if( document.getElementById('thisField').value != '' ){
		var inputSubmit = document.getElementById('input-submit');
		inputSubmit.parentNode.removeChild(inputSubmit);
		return;
	}

	// we need at least an email address, the rest is irrelevant
	if( inputEmail != '' && isEmailAddress(inputEmail) ){ 

		// here is where we make the urlString and espcape input for safety
		inputName = '&inputName=' +  encodeURIComponent(inputName);
		inputEmail = '&inputEmail=' +  encodeURIComponent(inputEmail);
		inputSubject = '&inputSubject=' +  encodeURIComponent(inputSubject);
		inputMessage = '&inputMessage=' +  encodeURIComponent(inputMessage);
		wpNonce = '&wpNonce=' +  encodeURIComponent(document.getElementById('whaling_city_web_contact_us_email_nonce').value);

		var urlString = ajax.url + '?action=whaling_city_web_contact_us_email';
		urlString += inputName + inputEmail + inputSubject + inputMessage + wpNonce;

		//lets send off a request and see what happens
		var xhr = new XMLHttpRequest();
		xhr.addEventListener('load', handleResponse )	
		xhr.open( 'POST', urlString , true );
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.send( null );

	} else {		
		// here is where we warn the user to enter a valid email address
		displayFormErrors();

	}

}

function handleResponse(){

	console.log( "The server responded with " +  this.response );

}

// some regex that returns true or false given a string is an email address
function isEmailAddress( email ){

	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);

}


// here is where we warn the user to enter a valid email address
function displayFormErrors(){
	var emailInput = document.getElementById( 'input-email' );
	emailInput.classList.add( '_input-error' );
	emailInput.setAttribute( 'placeholder', 'Please enter a valid email address' );

}




