

/*****************************************************************************/
/* Dev
/*****************************************************************************/

function refreshDevDisplay() {
    getAllUsers();
    getAllAppointments();
}

function getAllUsers() {
    apiGet('user', 'all', [], function(data) {
        var obj = JSON.parse(data);
        var str = JSON.stringify(obj, undefined, 4);
        document.getElementById("users").innerHTML = syntaxHighlight(str);
    });
}

function getAllAppointments() {
    apiGet('appointment', 'all', [], function(data) {
        var obj = JSON.parse(data);
        var str = JSON.stringify(obj, undefined, 4);
        document.getElementById("appointments").innerHTML = syntaxHighlight(str);
    });
}

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
    }

    if(!(action.length > 0)) {
        console.log("Request failed: Must specify action!");
        callback('');
    }

    var xhr = new XMLHttpRequest();
    xhr.open(method, '/api/v1/' + model + '/' + (action == 'all' ? '' : action), true);
    //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                //console.log("success!: " + xhr.responseText);
                callback(xhr.responseText);
            } else {
                console.log('Request failed.  Returned status of ' + xhr.status);
                callback('');
            }
        }
    };

    var toSend = '';
    if(Array.isArray(args) && args.length > 0) {


        for(var i = 0; i < args.length; i++) {
            toSend += args.key(i) + '=' + args[i]; // todo: make sure this works
        }
    }
    if(toSend !== '') { xhr.send(encodeURI(toSend)); }
    else { xhr.send(); }
}

/* Thanks to: http://stackoverflow.com/a/18278346/5121100 */
function syntaxHighlight(json) {
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}