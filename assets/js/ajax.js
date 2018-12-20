
	var request = false;

	// Send Request
	function setRequest(value) {
		// Create request
		if (window.XMLHttpRequest) {
			request = new XMLHttpRequest(); // Mozilla, Safari, Opera
		} else if (window.ActiveXObject) {
			try {
				request = new ActiveXObject('Msxml2.XMLHTTP'); // IE 5
			} catch (e) {
				try {
					request = new ActiveXObject('Microsoft.XMLHTTP'); // IE 6
				} catch (e) {}
			}
		}

		// Check if request has been generated
		if (!request) {
			alert("Can not create an XMLHTTP instance");
			return false;
		} else {
			var url = "http://localhost/Chess/assets/bot.php";
			// Open request
			request.open('post', url, true);
			// Send requestheader 
			request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			// Send request
			request.send('fen='+value);
			// Evaluate request
			request.onreadystatechange = interpretRequest;
		}
	}

	// Evaluate request
	function interpretRequest() {
		switch (request.readyState) {
			// if the readyState 4 and the request.status is 200, then everything went correctly
			case 4:
				if (request.status != 200) {
					alert("The request has been completed, but it is not OK \ nError:"+request.status);
				} else {
					 content = request.responseText;
					// write the content of the request into the <div>
					//document.getElementById('content').innerHTML = content;
				}
				break;
			default:
				break;
		}
	}