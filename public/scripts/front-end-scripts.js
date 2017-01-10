
function getCalendarView() {
    var today = new Date();
    var data = today.getFullYear() + '/' + (today.getMonth() + 1) + '/' + today.getDate();

    apiGet('calendar', 'get/' + data, [], function(data) {
        document.getElementById("calendar-container").innerHTML = data;
    });
}

function refreshDevDisplay() {
    updateUsersDisp();
    updateAppointmentsDisp();
}

function updateUsersDisp() {
    apiGet('user', 'all', [], function(data) {
        var obj = JSON.parse(data);
        var str = JSON.stringify(obj, undefined, 4);
        document.getElementById("users").innerHTML = syntaxHighlight(str);
    });
}

function updateAppointmentsDisp() {
    apiGet('appointment', 'all', [], function(data) {
        var obj = JSON.parse(data);
        var str = JSON.stringify(obj, undefined, 4);
        document.getElementById("appointments").innerHTML = syntaxHighlight(str);
    });
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

$(window).bind("load", function() {
    refreshDevDisplay();
    getCalendarView();
});

