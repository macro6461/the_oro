<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$blog_hash = blogTableClass::BLOG_HASH;
$title_blog = blogTableClass::TITLE_BLOG;
$created_at = blogTableClass::CREATED_AT;
$blog_status = blogTableClass::BLOG_STATUS;
$usuario_id = blogTableClass::USUARIO_ID;
?>  

<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar", array('objProfile' => $objProfile)); ?>
        <?php echo view::includePartial("partials/topBar", array('objProfile' => $objProfile)) ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                          <?php view::includeHandlerMessage() ?>
                        <?php endif ?>
                        </br>
                        <div class="x_panel">
                            <div class=" hidden-xs x_title">
                                <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Blog Posts </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-file-text-o" aria-hidden="true"></i> Blog Posts</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "insert") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"><i class="fa fa-list-alt" aria-hidden="true"></i> <b> Drafts</b></a>
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "insert") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>Add Blog Post</b></a>
                                        </div>
                                    </div>
                                </div>

                                <div id="deleteBlog_panel"></div>

                                <table id="blog_posts" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Post Title</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($objBlogs as $blogs): ?>
                                          <tr>
                                              <td><?php if (empty($blogs->$created_at)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $blogs->$created_at; ?>
                                                  <?php } ?>
                                              </td>
                                              <td ><?php if (empty($blogs->$title_blog)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo substr($blogs->$title_blog, 0, -1); ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($blogs->$usuario_id)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                                                        <img class="mdl-chip__contact" src="<?php echo routing::getInstance()->getUrlImg('profile/user.png') ?>"></img>
                                                        <span class="mdl-chip__text"><?php echo profileTableClass::getProfileByUserId($blogs->$usuario_id); ?></span>
                                                    </span>
                                                  <?php } ?>
                                              </td>

                                              <td>
                                                  <?php if ($blogs->$blog_status == "1") { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button--primary" type="button">PUBLISHED</button>
                                                  <?php } elseif ($blogs->$blog_status == "0") { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button" type="button">ARCHIVED</button>
                                                  <?php } elseif ($blogs->$blog_status == "2") { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button--dark" type="button">DRAFTED</button>
                                                  <?php } elseif ($blogs->$blog_status == "3") { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button--info" type="button">IN REVIEW</button>
                                                  <?php } else { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button">NO STATUS</button>
                                                  <?php } ?>
                                              </td>
                                              <td>
                                                  <a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "edit", array('hash' => $blogs->$blog_hash)) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                  <button data-id="<?php echo $blogs->$blog_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnDelete_blog" type="button" data-toggle="tooltip" data-placement="top" title="delete Post"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                              </td>
                                          </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Post Title</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="ln_solid"></div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>