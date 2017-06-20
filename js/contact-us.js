window.onload = function(){

	var contactFormSubmitButton = document.getElementById('input-submit')
	contactFormSubmitButton.addEventListener( 'click', contactFormSubmit, false );

}

function contactFormSubmit(){

	var inputName = document.getElementById( 'input-name' ).value; 	
	var inputEmail = document.getElementById( 'input-email' ).value;
	var inputSubject = document.getElementById( 'input-subject' ).value; 
	var inputMessage = document.getElementById( 'input-message' ).value;

	var sendData = 'inputName=' + encodeURIComponent(inputName);
	sendData += '&inputEmail=' + encodeURIComponent(inputEmail);
	sendData += '&inputSubject=' + encodeURIComponent(inputSubject);
	sendData += '&inputMessage=' +encodeURIComponent(inputMessage);

	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() { //Call a function when the state changes.
    if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {    		
        	alert('The server responded: ' + xhr.response);
    	}
	}

	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.open( 'POST', ajax.url, true );
	

	xhr.send( sendData );

}