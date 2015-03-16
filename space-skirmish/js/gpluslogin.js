var access_token;
function signinCallback(authResult) {
  if (authResult['status']['signed_in']) {
    // Update the app to reflect a signed in user
    // Hide the sign-in button now that the user is authorized, for example:
    document.getElementById('signinButton').setAttribute('style', 'display: none');
    document.getElementById('revokeButton').setAttribute('style', 'display: block');
    access_token = authResult[access_token];
    access_token = gapi.auth.getToken().access_token;
    console.log(access_token);
    ConnectToServer('ws://silver:9000');
  } else {
    // Update the app to reflect a signed out user
    // Possible error values:
    //   "user_signed_out" - User is signed-out
    //   "access_denied" - User denied access to your app
    //   "immediate_failed" - Could not automatically log in the user
    console.log('Sign-in state: ' + authResult['error']);
  }
}

function disconnectUser(access_token) {
  var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + access_token;
  console.log("disconnectUser function called");
  // Perform an asynchronous GET request.
  $.ajax({
    type: 'GET',
    url: revokeUrl,
    async: false,
    contentType: "application/json",
    dataType: 'jsonp',
    success: function(nullResponse) {
      // Do something now that user is disconnected
	document.getElementById('signinButton').setAttribute('style', 'display: block');
	document.getElementById('revokeButton').setAttribute('style','display: none');
      // Start account clean up
    },
    error: function(e) {
      // Handle the error
      // console.log(e);
      // You could point users to manually disconnect if unsuccessful
      // https://plus.google.com/apps
    }
  });
}


console.log("Can I haz click?");

$('#revokeButton').click(function(){
	websocket.close();
	console.log("Wibble");
	var con = $("#outputconsole");
        var text = con.text();
        text += '\n' + "Successfully Disconnected from the Client Side";
        con.text(text);

	disconnectUser(access_token);
});
