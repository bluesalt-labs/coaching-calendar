function openSidebar() {
    var pgDiv = document.getElementById('page-container');
    pgDiv.className = (pgDiv.className == 'sidebar-active') ? '' : 'sidebar-active';
}


function outputDataTo() {
    var block = document.getElementById(arguments[0])
    block.innerHTML = JSON.stringify(arguments[1], undefined, 4);
    hljs.highlightBlock(block);
}

function highlightExisting() {
    var elements = document.querySelectorAll('pre.test-start > code');
    for(var i = 0; i < elements.length; i++) {
        hljs.highlightBlock(elements[i]);
    }
}

document.addEventListener("DOMContentLoaded", function() {
    sidebarLinks('sidebar-links', 'sidebar-link');
    highlightExisting();

    updateAllUserLists();
    updateAllAppointmentLists();
    updateUserTypeDD();
    hideEmailMsg();
});

function updateAllUserLists() {
    apiGet('user', 'all', [], outputDataTo.bind(this, 'user-getAll-output'));
    apiGet('user', 'get/1', [], outputDataTo.bind(this, 'user-get-output'));
    updateUserDropDowns('user-delete-dd');
}

function updateAllAppointmentLists() {
    apiGet('appointment', 'all', [], outputDataTo.bind(this, 'appointment-getAll-output'));
    apiGet('appointment', 'get/1', [], outputDataTo.bind(this, 'appointment-get-output'));
}

function updateUserDropDowns(targetElement) {
    var userDeleteDD = document.getElementById(targetElement);
    userDeleteDD.innerHTML = "";

    var option = document.createElement('option');
    option.text = "Select User...";
    option.value = '';

    userDeleteDD.add(option);

    apiGet('user', 'all', [], function(data) {

        for(var i in data) {
            var option = document.createElement('option');

            option.text =
                '[' + data[i]['id'] + '] ' +
                data[i]['first_name'] + ' ' + data[i]['last_name'] +
                ' (' + data[i]['email'] + ')';
            option.value = data[i]['id'];

            userDeleteDD.add(option);
        }
    });
}

function createAppointment() {
    var apptData = {};
    var formElements = document.getElementById('appointment-create-form').elements;

    var y = formElements['appt-year-start'];
    var m = formElements['appt-month-start'];
    var d = formElements['appt-day-start'];
    var length = formElements['appt-length'];

    //apptData['']
}

function createUser() {
    var userData = {};
    var formElements = document.getElementById('user-create-form').elements;

    userData['email']       = formElements['email-address'].value;
    userData['first_name']  = formElements['first-name'].value;
    userData['last_name']   = formElements['last-name'].value;
    userData['phone']       = formElements['phone-number'].value;
    userData['type']        = parseInt(formElements['user-type-dd'].value);

    apiGet('user', 'create', userData, outputDataTo.bind(this, 'user-create-output'));
    updateAllUserLists();
}

function checkCreateEmail() {
    var emailAddr = document.getElementById('email-address').value;

    if( validateEmail(emailAddr) ) {
        apiGet('user', 'validateEmail', {email: emailAddr}, function(data){
            if(!data){ hideEmailMsg(); }
            else { showEmailMsg("Email Address Exists"); }
        });
    } else {
        showEmailMsg("Invalid email address");
    }
}

function showEmailMsg(msg) {
    document.getElementById('email-address').parentNode.parentNode.className = "form-group has-error";
    var emailMsg = document.getElementById('create-email-msg');
    emailMsg.style.display = '';
    emailMsg.innerHTML = msg;
}

function hideEmailMsg() {
    var emailInput = document.getElementById('email-address');
    if( emailInput.value != "" ) {
        emailInput.parentNode.parentNode.className = "form-group has-success";
    }
    var emailMsg = document.getElementById('create-email-msg');
    emailMsg.style.display = 'none';
    emailMsg.innerHTML = "";
}

function validateEmail(emailAddr) {
    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddr));
}

function updateUserTypeDD() {
    var userTypeDD = document.getElementById('user-type-dd');

    userTypeDD.innerHTML = "";

    var option = document.createElement('option');
    option.text = "Select Type...";
    option.value = '';

    userTypeDD.add(option);

    apiGet('user', 'getTypes', [], function(data){

        for(var i in data) {
            var option = document.createElement('option');

            option.text = '[' + i + '] ' + data[i];
            option.value = i;

            userTypeDD.add(option);
        }
    });
}

function deleteUser(userID) {
    apiDelete('user', userID, outputDataTo.bind(this, 'user-delete-output'));
    updateAllUserLists();
}