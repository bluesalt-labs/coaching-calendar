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

    apiGet('appointment', 'all', [], outputDataTo.bind(this, 'appointment-getAll-output'));
    apiGet('appointment', 'get/1', [], outputDataTo.bind(this, 'appointment-get-output'));
    apiGet('user', 'all', [], outputDataTo.bind(this, 'user-getAll-output'));
    apiGet('user', 'get/1', [], outputDataTo.bind(this, 'user-get-output'));

    updateUserDropDowns();
});

function updateUserDropDowns() {
    var userDeleteDD = document.getElementById('user-delete');
    userDeleteDD.innerHTML = "";

    var option = document.createElement('option');
    option.text = "Select...";
    option.value = '';

    userDeleteDD.add(option);

    apiGet('user', 'all', [], function(data) {
        for(var item in data) {
            var option = document.createElement('option');

            option.text = item['first_name'] + ' ' + item['last_name'];
            option.value = item['id'];

            userDeleteDD.add(option);
        }
    });
}

function deleteUser(userID) {
   console.log(userID);

    updateUserDropDowns();
}