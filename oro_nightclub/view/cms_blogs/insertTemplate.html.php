<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
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
                                <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> New Post </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-file-text-o" aria-hidden="true"></i> New Post</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group   pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
                                </div>

                                <!--                                <div class="panel panel-bohemia">
                                                                    <div class="panel-heading">
                                                                        <h3 class="panel-title"><i class="fa fa-upload" aria-hidden="true"></i> Blog Images </h3>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <table class="table">
                                                                                    <tr> 
                                                                                        <td class="section_upload"> <b>Upload File:</b> </td>       
                                <?php if (!empty($uploadinfo1->filepath_uploader)) { ?>
                                                                                                                                        <td> <b>File 1:</b> </td> 
                                                                                                                                        <td id="filename"><?php echo getFileNamePhotoId($_SESSION['onaf_uploader_id_module']) ?></td>
                                                                                                                                    <script>
                                                                                                                                      $(document).ready(function () {
                                                                                                                                          $('.section_upload').hide();
                                                                                                                                          $('#section_uploadbtn').hide();
                                                                              
                                                                                                                                          var deleteImage = $("#deleteImage");
                                                                                                                                          var filename = $("#filename");
                                                                              
                                                                                                                                          deleteImage.click(function (e) {
                                                                                                                                              var filenameval = filename.val();
                                                                                                                                              $.ajax({
                                                                                                                                                  async: false,
                                                                                                                                                  type: "POST",
                                                                                                                                                  dataType: "html",
                                                                                                                                                  contentType: "application/x-www-form-urlencoded",
                                                                                                                                                  url: urlajaxupload,
                                                                                                                                                  data: ('deleteImage=' + filenameval),
                                                                                                                                                  success: function (data) {
                                                                                                                                                      window.location.reload();
                                                                                                                                                  }
                                                                                                                                              });
                                                                                                                                          });
                                                                                                                                      });
                                                                                                                                    </script>
                                                                                                                                    <td>    
                                                                                                                                        <button type="button" class="btn btn-danger delete_btn" id="deleteImage"><?php echo $GLOBALS ['upload_message_7']; ?></button>
                                                                                                                                    </td>
                                <?php } else { ?>
                                                                                                                                    <p><small>Fields marked with (*) are mandatory.</small></p>
                                                                                                                                    <div class="form-group">
                                                                                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                                                                            <input type="text" class="form-control has-feedback-left" name="profileLastName" id="profileLastName" placeholder="Alternative Text">
                                                                                                                                            <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                                                                            <input type="text" class="form-control has-feedback-left" name="profileLastName" id="profileLastName" placeholder="Image Title Attribute">
                                                                                                                                            <span class="fa fa-file-image-o form-control-feedback left" aria-hidden="true"></span>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                                              
                                                                                                                                            <textarea type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" placeholder=" Caption " required></textarea>
                                                                                                                                            <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <td class="section_upload">
                                                                              
                                                                                                                                        <input name="upfile" class="form-control inputpmi input_upload" accept="image/jpg, image/jpeg, image/png, application/pdf" type="file" id="upfile"/>
                                                                                                                                    </td>
                                                                                                                                    <td id="section_uploadbtn">
                                                                                                                                        <input type="button" id="uploadfile" class="btn btn-success btn_upload" value="UPLOAD" />
                                                                                                                                    </td>
                                <?php } ?>  
                                                                                    </tr>
                                                                                    <tr><td colspan="3" class="messages"></td></tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                
                                                                    </div>
                                                                </div>-->

                                <form id="addBlogPost" class=" form-horizontal form-label-left" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "create"); ?>" >

                                    <div class="panel panel-bohemia">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-list" aria-hidden="true"></i> Blog Site Page Settings</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p><small>Fields marked with (*) are mandatory.</small></p>

                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                    <label for="<?php echo blogTableClass::getNameField(blogTableClass::PAGE_TITLE_BLOG, true); ?>"><i class="fa fa-external-link" aria-hidden="true"></i> Blog Page Title </label>
                                                    <div class=" form-group input-group ">

                                                        <input type="text" id="<?php echo blogTableClass::getNameField(blogTableClass::PAGE_TITLE_BLOG, true); ?>" name="<?php echo blogTableClass::getNameField(blogTableClass::PAGE_TITLE_BLOG, true); ?>" class="form-control" placeholder="Blog Page URL " maxlength="<?php echo blogTableClass::PAGE_TITLE_BLOG_LENTH; ?>" required autofocus>
                                                        <span class="input-group-btn">
                                                            <span  class="hidden-xs btn btn-dark">| Bohemia Realty</span>
                                                            <span  class="visible-xs btn btn-dark"> | Bohemia Realty</span>
                                                        </span>
                                                    </div>   
                                                </div>


                                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                    <label for="<?php echo blogTableClass::getNameField(blogTableClass::PAGE_URL_BLOG, true); ?>"><i class="fa fa-external-link" aria-hidden="true"></i> Blog Page URL </label>
                                                    <div class=" form-group input-group ">
                                                        <span class="input-group-btn">
                                                            <span  class="hidden-xs btn btn-dark"><?php echo \mvc\config\configClass::getUrlBase() . "index.php/blog/" ?></span>
                                                            <span  class="visible-xs btn btn-dark">blog/</span>
                                                        </span>
                                                        <input type="text" id="<?php echo blogTableClass::getNameField(blogTableClass::PAGE_URL_BLOG, true); ?>" name="<?php echo blogTableClass::getNameField(blogTableClass::PAGE_URL_BLOG, true); ?>" class="form-control" placeholder="Blog Page URL " required>
                                                    </div>   
                                                </div>

                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo blogTableClass::getNameField(blogTableClass::META_DESCRIPTION_BLOG, true); ?>"><i class="fa fa-text" aria-hidden="true"></i> Blog Meta Description </label>
                                                    <textarea type="text" class="form-control has-feedback-left" id="<?php echo blogTableClass::getNameField(blogTableClass::META_DESCRIPTION_BLOG, true); ?>" name="<?php echo blogTableClass::getNameField(blogTableClass::META_DESCRIPTION_BLOG, true); ?>" placeholder="Enter Meta Description" maxlength="<?php echo blogTableClass::META_DESCRIPTION_BLOG_LENTH; ?>" required></textarea>
                                                    <span class="fa fa- form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="page-title-bohemia">
                                        <h4><i class="fa fa-file-text-o" aria-hidden="true"></i> Blog Post </h4>
                                    </div>
                                    <p><small>Fields marked with (*) are mandatory.</small></p>

                                    <div class="form-group">

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" name="<?php echo blogTableClass::getNameField(blogTableClass::TITLE_BLOG, true); ?>" id="<?php echo blogTableClass::getNameField(blogTableClass::TITLE_BLOG, true); ?>" placeholder="Blog Post Title" required>
                                            <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12 selectContainer">
                                                <select id="<?php echo blogTableClass::getNameField(blogTableClass::BLOG_STATUS, true); ?>" name="<?php echo blogTableClass::getNameField(blogTableClass::BLOG_STATUS, true); ?>" class="form-control" required>
                                                    <option value="">Select Option</option>  
                                                    <option value="1">Publish</option> 
                                                    <option value="2">Draft</option>
                                                    <option value="0">Archive</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>  
                                    <div id="blog_p">
                                        
                                         <div class="form-group">
                                            <div class="col-md-4 col-sm-4 col-xs-12 form-group text-center">
                                                <div><b> Block Image</b></div>
                                                <img class="img-responsive blog_image"src="<?php echo routing::getInstance()->getUrlImg("CMS/cms_blogs/blog_thumbnail.jpg") ?>" alt="Thumbnail Blog Image">
                                                <button type="button" class="btn btn-default btn-block"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Upload  </button>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <label for="blog[0][<?php echo blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true); ?>]"> Blog Content</label>
                                                <textarea type="text" class="form-control "  id="blog[0][<?php echo blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true); ?>]" name="blog[0][<?php echo blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true); ?>]"  placeholder="Get Inspired" rows="5"  required ></textarea>
                                                
                                            </div>

                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-block add_blog_button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Block </button>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="<?php echo blogTableClass::getNameField(blogTableClass::BLOG_ADMIN_NOTES, true); ?>"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Admin Blog Notes </label>
                                            <textarea type="text" class="form-control has-feedback-left" id="<?php echo blogTableClass::getNameField(blogTableClass::BLOG_ADMIN_NOTES, true); ?>" name="<?php echo blogTableClass::getNameField(blogTableClass::BLOG_ADMIN_NOTES, true); ?>" placeholder="Enter Admin Blog Notes" ><?php echo $objBlog[0]->$blog_admin_notes; ?></textarea>
                                            <span class="fa fa-sticky-note-o form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="text-center">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "index"); ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger "><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save </button>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                </form>
                                <script>
                                  $(document).ready(function () {
                                    
                                    CKEDITOR.replace("blog[0][<?php echo blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true); ?>]", { 
                                        customConfig: path_absolute + "assets/vendors/ckeditor/config.js?time()"
                                        
                                     });                                      

                                      var max_fields = 20; //maximum input boxes allowed
                                      var wrapper = $("#blog_p"); //Fields wrapper
                                      var add_button = $(".add_blog_button"); //Add button ID

                                      var x = 0; //initlal text box count
                                      $(add_button).click(function (e) { //on add input button click
                                          e.preventDefault();
                                          if (x < max_fields) { //max input box allowed
                                              x++; //text box increment
                                              $(wrapper).append('\
                                                  <div class="form-group">' +
                                                      ' <div class="ln_solid"></div>' +
                                                      '<div class="col-md-4 col-sm-4 col-xs-12 form-group text-center">' +
                                                      ' <div><b> Block Image ' + x + '</b></div>' +
                                                      '<img class="img-responsive blog_image"src="<?php echo routing::getInstance()->getUrlImg("CMS/cms_blogs/blog_thumbnail.jpg") ?>" alt="Thumbnail Blog Image">' +
                                                      '<button type="button" class="btn btn-default btn-block"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Upload  </button>' +
                                                      '</div>' +
                                                      '<div style="margin-bottom: 15px;" class="col-md-8 col-sm-8 col-xs-12">' +
                                                      '<label for="editor"> Blog Content ' + x + ' </label>' +
                                                      '<textarea type="text" class="form-control "  id="blog[' + x + '][<?php echo blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true); ?>]" name="blog[' + x + '][<?php echo blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true); ?>]"  placeholder="Get Inspired" rows="5"  required ></textarea>' +
                                                      '</div>' +
                                                      '<button  type="button" class="btn btn-danger btn-block remove_blog_p"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete block</button>' +
                                                      '</div>' +
                                                      '<script>' +
                                                      ' $(document).ready(function () {' +
                                                      'CKEDITOR.replace("blog[' + x + '][<?php echo blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true); ?>]", { ' +
                                                      'customConfig: path_absolute + "assets/vendors/ckeditor/config.js?time()" ' +
                                                      '});' +
                                                      '});' +
                                                      '<\/script>');
                                              //add input box
                                          }
                                      });

                                      $(wrapper).on("click", ".remove_blog_p", function (e) { //user click on remove field
                                          e.preventDefault();
                                          $(this).parent('div').remove();
                                          x--;
                                      });


                                      $('#addBlogPost').formValidation({
                                          framework: 'bootstrap',
                                          err: {
                                              container: 'tooltip'
                                          },
                                          icon: {
                                              valid: 'glyphicon glyphicon-ok',
                                              invalid: 'glyphicon glyphicon-remove',
                                              validating: 'glyphicon glyphicon-refresh'
                                          },
                                          addOns: {
                                              mandatoryIcon: {
                                                  icon: 'glyphicon glyphicon-asterisk'
                                              }
                                          },
                                          fields: {
<?php echo blogTableClass::getNameField(blogTableClass::PAGE_TITLE_BLOG, true) ?>: {
                                                  validators: {
                                                      notEmpty: {
                                                          message: 'The  Page Title is required'
                                                      },
                                                      stringLength: {
                                                          max: <?php echo blogTableClass::PAGE_TITLE_BLOG_LENTH ?>,
                                                          message: 'The Page Title must be less than <?php echo blogTableClass::getNameField(blogTableClass::PAGE_TITLE_BLOG_LENTH, true); ?> characters long'
                                                      }
                                                  }
                                              },
<?php echo blogTableClass::getNameField(blogTableClass::PAGE_URL_BLOG, true) ?>: {
                                                  validators: {
                                                      notEmpty: {
                                                          message: 'The Page URL is required'
                                                      },
                                                      stringLength: {
                                                          max: <?php echo blogTableClass::PAGE_URL_BLOG_LENTH; ?>,
                                                          message: 'The  Page URL must be less than <?php echo blogTableClass::getNameField(blogTableClass::PAGE_URL_BLOG_LENTH, true); ?> characters long'
                                                      }
                                                  }
                                              }

                                          }
                                      });

                                  });
                                </script>

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

