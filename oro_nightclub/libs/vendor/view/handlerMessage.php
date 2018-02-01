<?php

use mvc\session\sessionClass as session ?>
<?php if (session::getInstance()->hasError()): ?>
  <?php foreach (session::getInstance()->getError() as $key => $error): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <i class="glyphicon glyphicon-remove-sign"></i> <strong>Error!</strong><?php echo $error ?>
    </div>
  <?php endforeach ?>
  <?php session::getInstance()->deleteErrorStack() ?>
<?php endif ?>

<?php if (session::getInstance()->hasInformation()): ?>
  <?php foreach (session::getInstance()->getInformation() as $key => $info): ?>
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <i class="glyphicon glyphicon-info-sign"></i> <strong>Information!</strong> <?php echo $info ?>
    </div>
  <?php endforeach ?>
  <?php session::getInstance()->deleteInformationStack() ?>
<?php endif ?>

<?php if (session::getInstance()->hasWarning()): ?>
  <?php foreach (session::getInstance()->getWarning() as $key => $warning): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <i class="glyphicon glyphicon-warning-sign"></i> <strong>Warning!</strong> <?php echo $warning ?>
    </div>
  <?php endforeach ?>
  <?php session::getInstance()->deleteWarningStack() ?>
<?php endif ?>

<?php if (session::getInstance()->hasSuccess()): ?>
  <?php foreach (session::getInstance()->getSuccess() as $key => $success): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <i class="glyphicon glyphicon-ok-sign"></i> <?php echo $success ?>
    </div>
  <?php endforeach ?>
  <?php session::getInstance()->deleteSuccessStack() ?>
  <?php
 endif ?>
