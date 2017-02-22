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
    updateUserDDs('user-delete-dd');
    //updateUserDDs('appointment-create-member-dd', 'member');
    updateUserDDs('appointment-create-member-dd');
    //updateUserDDs('appointment-create-coach-dd', ['coach', 'manager', 'admin']);
    updateUserDDs('appointment-create-coach-dd');
}

function updateAllAppointmentLists() {
    apiGet('appointment', 'all', [], outputDataTo.bind(this, 'appointment-getAll-output'));
    apiGet('appointment', 'get/1', [], outputDataTo.bind(this, 'appointment-get-output'));
    updateApptStatusDD();
}

function updateUserDDs(targetElement, types) {
    var userDD = document.getElementById(targetElement);
    userDD.innerHTML = "";

    var option = document.createElement('option');
    option.text = "Select User...";
    option.value = '';

    userDD.add(option);

    var by = 'all';

    if(types) {
        by = 'getBy/type';
        var typesObj = [];
        for(var i in types) {
            typesObj.push( memberTypeNameToInt(types[i]) );
        }
        typesObj = { 'types': typesObj };
    }

    apiGet('user', by, typesObj, function(data) {
        for(var i in data) {
            var option = document.createElement('option');

            option.text =
                '[' + data[i]['id'] + '] ' +
                data[i]['first_name'] + ' ' + data[i]['last_name'] +
                ' (' + data[i]['email'] + ')';
            option.value = data[i]['id'];

            userDD.add(option);
        }
    });
}

function memberTypeNameToInt(type) {
    switch( type.toLowerCase() ){
        case 'member':  return 0; break;
        case 'coach':   return 1; break;
        case 'manager': return 2; break;
        case 'admin':   return 3; break;
    }
}

function createAppointment() {
    var apptData = {};
    var formElements = document.getElementById('appointment-create-form').elements;

    var startDate = new moment({
        year:   parseInt(formElements['appointment-year-start'])    || 0,
        month:  parseInt(formElements['appointment-month-start'])   || 0,
        day:    parseInt(formElements['appointment-day-start'])     || 0,
        hour:   parseInt(formElements['appointment-hour-start'])    || 0,
        minute: parseInt(formElements['appointment-minute-start'])  || 0
    });

    apptData['start_date'] = startDate.format('YYYY-MM-dd hh:mm');
    apptData['length'] = parseInt( formElements['appointment-length'] );
    apptData['status'] = parseInt( formElements['appointment-status-dd'] );

    apptData['coach_id'] = parseInt( formElements['appointment-coach-dd'] );
    apptData['member_id'] = parseInt( formElements['appointment-member-dd'] );

    apiGet('appointment', 'create', apptData, outputDataTo.bind(this, 'appointment-create-output'));
    updateAllAppointmentLists();
}

function updateApptStatusDD() {
    var apptTypeDD = document.getElementById('appointment-status-dd');

    apptTypeDD.innerHTML = "";

    var option = document.createElement('option');
    option.text = "Select Status...";
    option.value = '';

    apptTypeDD.add(option);

    apiGet('appointment', 'getStatuses', [], function(data){

        for(var i in data) {
            var option = document.createElement('option');

            option.text = '[' + i + '] ' + data[i];
            option.value = i;

            apptTypeDD.add(option);
        }
    });
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