/**
 * Created by luke on 1/11/17.
 */

function apiGet(model, action, args, callback) {
    apiRequest('GET', model, action, args, callback);
}

function apiPost(model, action, args, callback) {
    apiRequest('POST', model, action, args, callback);
}

function apiRequest(method, model, action, args = [], callback) {
    if(!(model.length > 0)) {
        console.log("Request failed: Must specify model!");
        callback('');
        return;
    }

    if(!(action.length > 0)) {
        console.log("Request failed: Must specify action!");
        callback('');
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open(method, '/api/v1/' + model + '/' + (action == 'all' ? '' : action), true);
    //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                callback(xhr.responseText);
            } else {
                console.log('Request failed.  Returned status of ' + xhr.status);
                callback('');
            }
        }
    };

    var toSend = '';
    if(Array.isArray(args)) {
        for(var key in args) {
            toSend += key + '=' + args[key]; // todo: make sure this works
        }
    }
    if(toSend !== '') { xhr.send(encodeURI(toSend)); }
    else { xhr.send(); }
}
