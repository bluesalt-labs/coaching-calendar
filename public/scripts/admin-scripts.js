// Thank you <http://blog.garstasio.com/you-dont-need-jquery/ajax/>

/*
function scheduleAppointment(apptId, customerId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/v1/appointment/schedule');
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
*/


function onNavBtnClick() {
    var pgDiv = document.getElementById('page-container');
    pgDiv.className = (pgDiv.className == 'sidebar-active') ? '' : 'sidebar-active';
}

function checkCloseSidebar() {
    var width = ( (document.body.clientWidth || window.innerWidth) + 15 ) || 0;

    if(width >  0 && width < 768) {
        document.getElementById('page-container').className = '';
    }
}

addEvent(window, "resize", checkCloseSidebar);

document.addEventListener("DOMContentLoaded", function(event) {
    checkCloseSidebar();
});
