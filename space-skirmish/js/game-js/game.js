var state = new Object();

function generateUUID() {
	var d = new Date().getTime();
	var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
		var r = (d + Math.random()*16)%16 | 0;
		d = Math.floor(d/16);
		return (c=='x' ? r : (r&0x3|0x8)).toString(16);
	});
	return uuid;
};


function ConnectToServer(wsuri){
	websocket = new WebSocket(wsuri);
	websocket.onopen = function(evt) { onOpen(evt) }; 
	websocket.onclose = function(evt) { onClose(evt) }; 
	websocket.onmessage = function(evt) { onMessage(evt) }; 
	websocket.onclose = function(evt) { onClose(evt) };
	websocket.onerror = function(evt) { onError(evt) };
}

function onOpen(evt) { 
	// All of this stuff can and will be objects already created as part of the renderer/game so it doesn't really matter what they are at the moment
	writeToScreen("Connected...");
	
	state.key = access_token;
	state.who_am_i = 1; // Which of the n_playerents are you? 0,n_playerent-1
	state.n_entities = 1;
	state.n_playerent = 1;
	state.n_aient = 0;
	state.n_other = 0;
	var playership = new Object();
	playership.core = 1; //Need to do object checks for this on server side
	playership.n_components = 1; 
	playership.corecoord = new Array(0,0);
	state.ship = playership;
	doSend(JSON.stringify(state));
}

function onClose(evt) { 
	writeToScreen("Connection Closed");
	disconnectUser(access_token);
}

function onMessage(evt) { 
	//console.log(evt.data);
	var serverstate = JSON.parse(evt.data);
	//Now to update this side of the game with what the server says is going on :p
	state.n_entities = serverstate.n_entities;
	state.n_playerent = serverstate.n_playerent;
	state.aient = serverstate.aient;
	state.n_other = serverstate.n_other;
	//For loops to update all of the coordinates of enemies your coordinates stay local and are given to the server (exploitable but sanity checking server side will be performed)
	writeToScreen(JSON.stringify(serverstate));
}

function onError(evt) { 
	writeToScreen("An Error Occured:");
	writeToScreen(evt.data);
}

function doSend(message) { 
	websocket.send(message); 
	console.log("I've sent: " + message);
}

function writeToScreen(message) { 
	var con = $("#outputconsole");
	var text = con.text();
	text += '\n' + message;
	con.text(text);
}
