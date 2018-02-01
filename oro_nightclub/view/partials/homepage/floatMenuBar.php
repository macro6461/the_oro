<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<nav class="navbar navbar-default navbar-fixed-bottom visible-xs floatMenu">
<!--    <div class="container">-->
        <div class="row text-center">
            <div class="col-xs-6 floatMenu_calendar">
                <a href="#"  role="button"> <b>CALENDAR</b> <i class="fa fa-calendar-o" aria-hidden="true"></i></a>
            </div>
            <div class="col-xs-6 floatMenu_tickets">
                <a href="#"  class="" role="button"> <b>BUY TICKETS NOW</b> </a>
            </div>
        </div>

<!--    </div>-->
</nav>

<div class="calendarLeftBar hidden-xs" style="display: block;">
    <a href="<?php echo routing::getInstance()->getUrlWeb("events", "index"); ?>"> CALENDAR <i class="fa fa-calendar-o" aria-hidden="true"></i> </a>
</div>

