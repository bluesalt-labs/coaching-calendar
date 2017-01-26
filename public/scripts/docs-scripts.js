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

