/**
 * Created by luke on 1/16/17.
 */

function onNavBtnClick() {
    //var btn = document.getElementById('btn-nav-toggle');
    var pgDiv = document.getElementById('page-container');

    pgDiv.className =
        (pgDiv.className == 'sidebar-active') ? '' : 'sidebar-active';
}

