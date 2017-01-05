// Thank you <http://blog.garstasio.com/you-dont-need-jquery/ajax/>

function scheduleAppointment(apptId, customerId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/v1/appointment/create');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('test-data').innerHTML = (xhr.responseText.length > 0 ? xhr.responseText : "No Data");
            //alert('User\'s name is ' + xhr.responseText);
        } else {
            document.getElementById('test-data').innerHTML = 'Request failed.  Returned status of ' + xhr.status;
            //alert('Request failed.  Returned status of ' + xhr.status);
        }
    };
    xhr.send(encodeURI('name=' + 'Luke'));
}

scheduleAppointment(1, 7);