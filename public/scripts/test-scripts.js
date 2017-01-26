function openSidebar() {
    var pgDiv = document.getElementById('page-container');
    pgDiv.className = (pgDiv.className == 'sidebar-active') ? '' : 'sidebar-active';
}

document.addEventListener("DOMContentLoaded", function() {
    //var sbLinks = new sidebarLinks('sidebar-links', 'sidebar-link');
    sidebarLinks('sidebar-links', 'sidebar-link');
});