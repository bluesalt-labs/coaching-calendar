function openSidebar() {
    var pgDiv = document.getElementById('page-container');
    pgDiv.className = (pgDiv.className == 'sidebar-active') ? '' : 'sidebar-active';
}

function getSidebarLinks() {
    var linksUl = document.getElementById('sidebar-links');
    var headers = document.getElementsByClassName('header-link');


    for(var i = 0; i < headers.length; i++) {
        testFunction(headers[i], i, headers);
        // see if there are any sub-headers
        // recursively iterate through the sub-headers
    }
}

function testFunction(cv, i, arr){
    console.log("current value: ");
    console.log(cv);
    console.log("index: ");
    console.log(i);
    console.log("array: ");
    console.log(arr);
}

document.addEventListener("DOMContentLoaded", function(event) {
    getSidebarLinks();
});