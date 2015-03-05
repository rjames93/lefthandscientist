var request = {};
var params = {};
params.apiKey = '74ad94c5-d965-44c0-93d4-78b9bc455add';
params.n = 10;
params.length = 20;
params.characters = 'abcdefghijklmnopqrstuvwxyz';

request.jsonrpc = '2.0';
request.method = 'generateStrings';
request.params = params;
request.id = 1;

function displaySearchResult(response) {
	console.log(response);
	for(i = 0; i < response.result.random.data.length; i++){
		//alert(response.result.random.data[i]);
	}
};

$.post(' https://api.random.org/json-rpc/1/invoke', JSON.stringify(request), displaySearchResult, "json");
