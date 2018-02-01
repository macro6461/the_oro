<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$profileFistName = profileTableClass::FIRST_NAME;
$profileLastName = profileTableClass::LAST_NAME;
?>
<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                <div class="text-center" > <h3><b><?php echo $objProfile[0]->$profileFistName; ?> <?php echo $objProfile[0]->$profileLastName; ?></b></h3> Do you want to Log Out?</div>
            </div>
            <div class=" modal-footer">
                <div class="text-center">
                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                    <a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Log Out </a>
                </div>
            </div>
        </div>
    </div>
</div>
