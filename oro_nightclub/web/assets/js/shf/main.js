$(document).ready(function () {
    // $('#mvcIcon').hide();
    $('#mvcIcon .mvcPointer').click(function () {
        $('#mvcMain').toggle(150);
        $('#mvcIcon').toggle(150);
    });
    $('#mvcMain .mvcPointer').click(function () {
        $('#mvcMain').toggle(150);
        $('#mvcIcon').toggle(150);
    });

// Find the right method, call on correct element
    function launchIntoFullscreen(element) {
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }
    }
    var exit_full_screen = $("#exit_full_screen");

    exit_full_screen.hide();

    var full_screen = $("#full_screen");
    $(full_screen).on('click', function (e) {
        // Launch fullscreen for browsers that support it!
        launchIntoFullscreen(document.documentElement); // the whole page
        full_screen.hide();
        exit_full_screen.show();
    });

    // Whack fullscreen
    function exitFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }

    $(exit_full_screen).on('click', function (e) {
        // Launch fullscreen for browsers that support it!
        exitFullscreen();
        full_screen.show();
        exit_full_screen.hide();
    });


    /**
     * switch developments eviroments
     * @type String
     */
    var $enviroment = 'testing';

//    function routing($module, $action, $enviroment) {

    if ($enviroment == 'dev') {
        url = 'http://localhost/oro_nightclub/web/index.php/';
        path_absolute = 'http://localhost/oro_nightclub/web/';
    } else if ($enviroment == 'testing') {
        url = 'https://dev.mptechnosuite.com/web/index.php/';
        path_absolute = 'https://dev.mptechnosuite.com/web/';
    } else if ($enviroment == 'production') {
        url = 'https://www.bohemiarealtygroup.com/web/index.php/';
        path_absolute = 'http://localhost/bohemiarealtygroup.com/web/';
    }

//        var $getUrlWeb = url + $module + '/' + $action; 
//        
//        
//        return $getUrlWeb;
//    }
    /*--------------------------------------------------
     [fix sub-menu close issue]
     ----------------------------------------------------*/

});

