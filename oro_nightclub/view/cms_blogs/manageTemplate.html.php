<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/**
 * LANDLORD
 */
$landlordID = landlordTableClass::ID;
$landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
$phone_number = landlordTableClass::PHONE_NUMBER;
$fax_number = landlordTableClass::FAX_NUMBER;
$address = landlordTableClass::ADDRESS;
$city = landlordTableClass::CITY;
$state_id = landlordTableClass::STATE_ID;
$zipcode = landlordTableClass::ZIPCODE;
$email_address = landlordTableClass::EMAIL_ADDRESS;
$private_email_address = landlordTableClass::PRIVATE_EMAIL_ADDRESS;
$listing_manager_id = landlordTableClass::LISTING_MANAGER_ID;
$landlord_hash = landlordTableClass::LANDLORD_HASH;
$status = landlordTableClass::STATUS;
$notes = landlordTableClass::NOTES_LANDLORD;
$pets_policy = landlordTableClass::PETS_CASE_ID;
$listing_policy = landlordTableClass::LISTING_TYPE_ID;
$notification = landlordTableClass::EMAIL_NOTIFICATION_STATUS;
/**
 * BUILDINGS
 */
$building_id = buildingTableClass::ID;
$building_name = buildingTableClass::DESCRIPTION_BUILDING;
$building_address = buildingTableClass::ADDRESS;
$building_city = buildingTableClass::CITY;
$building_state_id = buildingTableClass::STATE_ID;
$building_zipcode = buildingTableClass::ZIPCODE;
$building_addon_codes_zipcode = buildingTableClass::ADDON_CODES_ZIPCODE;
$building_cross_address = buildingTableClass::CROSS_ADDRESS;
$building_status = buildingTableClass::STATUS;
$id_building_features = buildingTableClass::ID_BUILDING_FEATURES;
$id_landlord = buildingTableClass::ID_LANDLORD;
$id_neighborhood = buildingTableClass::ID_NEIGHBORHOOD;
$notes_building = buildingTableClass::NOTES_BUILDING;
$building_hash = buildingTableClass::BUILDING_HASH;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage Landlord (<?php echo strtoupper(landlordTableClass::getLandlordName(mvc\request\requestClass::getInstance()->getGet("hash"))); ?>)</h2>
                                <ul class=" nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4><i class="fa fa-server" aria-hidden="true"></i> Manage Landlord (<?php echo strtoupper(landlordTableClass::getLandlordName(mvc\request\requestClass::getInstance()->getGet("hash"))); ?>)</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "index"); ?>" class="btn btn-default" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alertbrg alert-dismissible" role="alert">
                                    <p>
                                        <small><i class="fa fa-info-circle" aria-hidden="true"></i> Information: Click on each panel to display more information.</small><br>
                                    </p>
                                </div>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    <b> Basic Info</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?php
                                                foreach ($objLandlord as $landlord):
                                                  ?>
                                                  <div class="panel panel-success">
                                                      <div class="panel-body">
                                                          <div class="row">
                                                              <div class="btn-group  btn-group-sm pull-right">
                                                                  <div class="col-md-12 col-sm-12 col-xs-12">

                                                                      <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "edit", array('hash' => $landlord->$landlord_hash)) ?>" class="btn btn-default" type="button"><i class="fa fa-edit" aria-hidden="true"></i> <b>Edit Landlord</b></a>

                                                                      <?php if ($landlord->$status == "1") { ?>
                                                                        <button  class="btn btn-success" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> ACTIVE</button>
                                                                      <?php } elseif ($landlord->$status == "0") { ?>
                                                                        <button  class="btn btn-danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> INACTIVE</button>
                                                                      <?php } else { ?>
                                                                        <button  class="btn btn-dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                                                      <?php } ?>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div><br>
                                                  <table id="landlord" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                      <tbody>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-university"></i> Landlord Information </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NAME</b></td>
                                                              <td><?php echo strtoupper($landlord->$landlord_name); ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PHONE</b></td>
                                                              <td><?php echo $landlord->$phone_number; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>FAX</b></td>
                                                              <td><?php echo $landlord->$fax_number; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>TEAM EMAIL ADDRESS</b></td>
                                                              <td><?php echo $landlord->$email_address; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PRIVATE EMAIL ADDRESS</b></td>
                                                              <td><?php echo $landlord->$private_email_address; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ADDRESS</b></td>
                                                              <td><?php echo $landlord->$address; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CITY</b></td>
                                                              <td><?php echo $landlord->$city; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>STATE</b></td>
                                                              <td><?php echo statesTableClass::getStateName($landlord->$state_id); ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ZIPCODE</b></td>
                                                              <td><?php echo $landlord->$zipcode; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NOTES</b></td>
                                                              <td><?php echo $landlord->$notes; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-user-o"></i> Landlord Manager(s) </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LISTING MANAGER</b></td>
                                                              <td>
                                                                  <?php if (empty($landlord->$listing_manager_id)) { ?>

                                                                    <button type="button" class="btn btn-dark btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i> Not Assigned</button>
                                                                  <?php } else { ?>
                                                                    <?php echo profileTableClass::getProfileByUserId(listingManagerTableClass::getListingManagerUserId($landlord->$listing_manager_id)); ?>
                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CO-LISTING MANAGER</b></td>
                                                              <td>
                                                                  <?php
                                                                  $co_listing_manager = listingManagerTableClass::getCoListingManagerUserId($landlord->$listing_manager_id);
                                                                  if (empty($co_listing_manager)) {
                                                                    ?>

                                                                    <button type="button" class="btn btn-dark btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i> Not Assigned </button>
                                                                  <?php } else { ?>
                                                                    <?php echo profileTableClass::getProfileByUserId($co_listing_manager); ?>
                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-file-text-o" aria-hidden="true"></i> Landlord Policies </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PETS POLICY</b></td>
                                                              <td><button type="button" class="btn btn-success btn-xs"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo petsPolicyTableClass::getPetsPolicyName($landlord->$pets_policy); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LISTING POLICY</b></td>
                                                              <td><button type="button" class="btn btn-success btn-xs"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo listingTypeTableClass::getListingTypeName($landlord->$listing_policy); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-bell-o" aria-hidden="true"></i> Notifications </td>
                                                          </tr>

                                                          <tr>
                                                              <td><b>EMAIL NOTIFICATIONS</b></td>
                                                              <td>
                                                                  <?php if ($landlord->$notification == '1') { ?>
                                                                    <button type="button" class="btn btn-success btn-xs">   <i class="fa fa-bell-o" aria-hidden="true"></i> Allowed</button>
                                                                  <?php } elseif ($landlord->$notification == '0') {
                                                                    ?>
                                                                    <button type="button" class="btn btn-danger btn-xs">  <i class="fa fa-bell-slash-o" aria-hidden="true"></i> Not Allowed</button>
                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    <b> Buildings</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse ">
                                            <div class="panel-body">

                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <div class="btn-group  btn-group-sm pull-right">
                                                            <button data-hash="<?php echo \mvc\request\requestClass::getInstance()->getGet("hash"); ?>" class="btn btn-default btnAdd_building" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Building</b></button>
                                                        </div>
                                                        <div id="addBuilding_panel"></div>
                                                    </div>
                                                </div><br>
                                                <?php if (empty($objBuildings)) { ?>

                                                  <div class="alert alert-info alert-dismissible" role="alert">
                                                      <p class="text-center">
                                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no buildings found. </b><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                } else {
                                                  ?>
                                                  <div class="alert alertbrg alert-dismissible" role="alert">
                                                      <p>
                                                          <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Buildings with background color <span class="label label-info">Blue</span>   are syncing from Nestio.<br>
                                                      </p>
                                                  </div>
                                                  <table id="buildingTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                      <thead>
                                                          <tr>
                                                              <th>Address</th>
                                                              <th>City</th>
                                                              <th>State</th>
                                                              <th>Zip Code</th>
                                                              <th>Neighborhood</th>
                                                              <th>Actions</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                          foreach ($objBuildings as $building):
                                                            ?>
                                                            <tr> 
                                                                <td><?php echo $building->$building_address; ?></td>
                                                                <td><?php echo $building->$building_city; ?></td>
                                                                <td><?php echo statesTableClass::getStateName($building->$building_state_id); ?></td>
                                                                <td><?php echo $building->$building_zipcode; ?></td>
                                                                <td><?php echo neighborhoodTableClass::getNeighborhoodName($building->$id_neighborhood); ?></td>
                                                                <td>

                                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage") ?>" class="btn btn-default " type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                                    <button data-id="<?php echo $building->$building_id; ?>" class="btn btn-danger btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="delete Building"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                                                                </td>
                                                            </tr>
                                                            <?php
                                                          endforeach;
                                                          ?>
                                                      </tbody>
                                                      <tfoot>
                                                          <tr>
                                                              <th>Address</th>
                                                              <th>City</th>
                                                              <th>State</th>
                                                              <th>Zip Code</th>
                                                              <th>Neighborhood</th>
                                                              <th>Actions</th>
                                                          </tr>
                                                      </tfoot>
                                                  </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    <b>Apartments</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <div class="btn-group  btn-group-sm pull-right">
                                                            <button data-hash="<?php echo \mvc\request\requestClass::getInstance()->getGet("hash"); ?>" class="btn btn-default btnAdd_apartment" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Apartment</b></button>
                                                        </div>
                                                        <div id="addApartment_panel"></div>
                                                    </div>
                                                </div><br>
                                                <?php if (empty($objApartments)) { ?>

                                                  <div class="alert alert-info alert-dismissible" role="alert">
                                                      <p class="text-center">
                                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Apartments found. </b><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                } else {
                                                  ?>

                                                  <table id="apartments" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                      <thead>
                                                          <tr>
                                                              <th>Neighborhood</th>
                                                              <th>Address</th>
                                                              <th>Rent</th>
                                                              <th># Beds</th>
                                                              <th># Baths</th>
                                                              <th>Status</th>
                                                              <th>Actions</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                          foreach ($objBuildings as $building):
                                                            ?>
                                                            <tr> 
                                                                <td><?php echo $building->$building_address; ?></td>
                                                                <td><?php echo $building->$building_city; ?></td>
                                                                <td><?php echo statesTableClass::getStateName($building->$building_state_id); ?></td>
                                                                <td><?php echo $building->$building_zipcode; ?></td>
                                                                <td><?php echo neighborhoodTableClass::getNeighborhoodName($building->$id_neighborhood); ?></td>
                                                                <td>

                                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage") ?>" class="btn btn-default " type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage</a>
                                                                    <button data-id="<?php echo $building->$building_id; ?>" class="btn btn-danger btnDelete_building" type="button" data-toggle="tooltip" data-placement="top" title="delete Building"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                                                                </td>
                                                            </tr>
                                                            <?php
                                                          endforeach;
                                                          ?>
                                                      </tbody>
                                                      <tfoot>
                                                          <tr>
                                                              <th>Neighborhood</th>
                                                              <th>Address</th>
                                                              <th>Rent</th>
                                                              <th># Beds</th>
                                                              <th># Baths</th>
                                                              <th>Status</th>
                                                              <th>Actions</th>
                                                          </tr>
                                                      </tfoot>
                                                  </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    Procedures</a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                                    Documents</a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse">
                                            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat.</div>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-muted font-13 m-b-30">
                                    Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                </p>


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

