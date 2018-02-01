
<?php
use mvc\session\sessionClass as session;
use mvc\config\configClass as config;
?>
<?php if (\mvc\config\configClass::getScope() === 'dev' || \mvc\config\configClass::getScope() === 'testing'): ?>
  <div id="mvcMain" class="shfDevelopmentBar">
      <i class="fa fa-leaf mvcPointer"></i> <?php echo config::getSohoFrameworkAccronName() ?> <?php echo config::getSohoFrameworkVersion() ?> |
      <i class="fa fa-dashboard"></i> <?php echo number_format((memory_get_usage() / 1048576), '3', '.', '\'') ?> MB |
      <i class="fa fa-clock-o"></i> <?php echo number_format((microtime(true) - $GLOBALS['timeIni']), '4', '.', '\'') ?> seg.
      <?php if (!session::getInstance()->isUserAuthenticated()): ?>
        | <a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb("shfSecurity", "index") ?>" ><i class="fa fa-user-circle"></i> Login</a>
      <?php endif ?>
      <?php if (session::getInstance()->hasAttribute('mvcDbQuery')): ?>
        | <i class="fa fa-database"></i> <?php echo session::getInstance()->getAttribute('mvcDbQuery') ?>
        <?php session::getInstance()->deleteAttribute('mvcDbQuery') ?>
      <?php endif ?>
  </div>
<?php endif; ?>
<?php if (\mvc\config\configClass::getScope() === 'dev' || \mvc\config\configClass::getScope() === 'testing'): ?>
  <div id="mvcIcon" class="shfDevelopmentBar">
      <i class="fa fa-leaf mvcPointer"></i> <?php echo config::getSohoFrameworkAccronName(); ?> <?php echo config::getSohoFrameworkVersion(); ?>
  </div>
<?php endif; ?>

<?php echo \mvc\view\viewClass::genJavascript() ?>
</body>
</html>