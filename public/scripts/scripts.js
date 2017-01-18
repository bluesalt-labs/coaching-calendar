/**
 * Created by luke on 1/11/17.
 */

var apiUrl = '/api/v1/';

function apiGet(model, action, args, callback) {
    apiRequest('GET', model, action, args, callback);
}

function apiPost(model, action, args, callback) {
    apiRequest('POST', model, action, args, callback);
}

function apiRequest(method, model, action, args, callback) {
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

    var url = apiUrl + model + '/' + (action == 'all' ? '' : action + '/');

    if(method === 'GET' && args != null) {
        var urlAdd = '?';
        for(var key in args) {
            urlAdd += key + '=' + encodeURIComponent(args[key]) + '&';
        }
        url += urlAdd.slice(0, -1);
    }

    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.responseType = 'json';
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                callback(xhr.response);
            } else {
                console.log('Request failed.  Returned status of ' + xhr.status);
                callback('');
            }
        }
    };

    if(method === 'POST' && args != null) { xhr.send(JSON.stringify(args)); }
    else { xhr.send(); }
}

var addEvent = function(object, type, callback) {
    if (object == null || typeof(object) == 'undefined') return;
    if (object.addEventListener) {
        object.addEventListener(type, callback, false);
    } else if (object.attachEvent) {
        object.attachEvent("on" + type, callback);
    } else {
        object["on"+type] = callback;
    }
};
