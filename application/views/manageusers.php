<!-- light-blue - v3.1.0 - 2014-12-06 -->
<!DOCTYPE html>
<html>
<head>
    <title>Havana Youth</title>

        <link href="css/application.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
           chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
                      https://code.google.com/p/chromium/issues/detail?id=332189
        */
    </script>
</head>
<body class="background-dark">
   
 <?php // var_dump($user_profile) ?>
        <div class="logo">
        <h4><a >Havana <strong>Youth</strong></a></h4>
        </div>
        <nav id="sidebar" class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li class="">
                    <a href="<?php echo base_url('aprofile');?>"><i class="fa fa-home"></i> <span class="name">Dashboard</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url('manageusers');?>"><i  class="fa fa-users"></i> <span class="name">Management</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('notifications');?>"><i class="fa fa-th"></i> <span class="name">Notifications</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('adminSettings');?>"><i class="fa fa-user"></i> <span class="name">Profile</span></a>
                </li>
                <li class="visible-xs">
                    <a href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out"></i> <span class="name">Sign Out</span></a>
                    <p><?php echo anchor("$logout_url",'<span class="name"><i class="fa fa-sign-out" style="color:white"></i>Sign Out</span>' ) ?></p>
                </li>
            </ul>
        
            <h5 class="sidebar-nav-title">Projects</h5>
            <!-- A place for sidebar notifications & alerts -->
            <div class="sidebar-alerts">
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">Sales Report</span> <br>
                    <div class="progress progress-xs mt-xs mb-0">
                        <div class="progress-bar progress-bar-gray-light" style="width: 16%"></div>
                    </div>
                    <small>Calculating x-axis bias... 65%</small>
                </div>
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">Personal Responsibility</span> <br>
                    <div class="progress progress-xs mt-xs mb-0">
                        <div class="progress-bar progress-bar-danger" style="width: 23%"></div>
                    </div>
                    <small>Provide required notes</small>
                </div>
            </div>
            
            <h5 class="sidebar-nav-title">Sponsors</h5>
            <!-- A place for sidebar notifications & alerts -->
            <div class="sidebar-alerts">
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">MTC</span> <br>
                        <img src="assets/img/jpeg/mtc.jpg" alt="Second slide">
                    <small>call us 06123456</small>
                </div>
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">Fnb</span> <br>
                        <img src="assets/img/jpeg/fnb.jpg" alt="Second slide">
                    <small>call us 06123456</small>
                </div>
            </div>
        
        </nav>     
    <div class="wrap">
        <header class="page-header">
            <div class="navbar">
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="visible-phone-landscape">
                        <a href="#" id="search-toggle">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                   
                   
                    <li class="divider"></li>
                    <li class="hidden-xs">
                        <a href="#" id="settings"
                           title="Settings"
                           data-toggle="popover"
                           data-placement="bottom">
                            <i class="fa fa-cog"></i>
                        </a>
                    </li>
                   
                    <li class="hidden-xs"><a href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out"></i></a></li>
                </ul>
                <form id="search-form" class="navbar-form pull-right" role="search">
                    <input type="search" class="form-control search-query" placeholder="Search...">
                </form>
            </div>
        </header>       
        <div class="content container">
       <h4 class="mt-sm mb-xs"><small> Welcom Admin</small></h4>
        <div class="row">
            <div class="col-lg-12">
               
                 <div class="col-xs-12 col-md-19">
                            <div class="widget">
                                <div class="well youth-border" style=" border-bottom: 3px; border-bottom-color: aquamarine; alignment-baseline: middle">
                                    <strong>Activate OR Deactivate Users</strong>
                                </div>
                                <div class="widget-body" style="max-height:500px; overflow:auto">
                                    <table class="table table-striped table-bordered table-hover" id="expandabledatatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Surname
                                                </th>
                                                <th>
                                                    Cellphone
                                                </th>
                                                <th>
                                                    Gender 
                                                </th>
                                                <th>
                                                    Username
                                                </th>
                                                <th>
                                                    User Type 
                                                </th>
                                                
                                               
                                            </tr>
                                        </thead>

                                        <tbody>
                                             <?php if(isset($users)) : foreach($users as $row) :  ?>
                                            <tr>
                                                <td>
                                                <?php echo $row->firstname; ?>
                                                </td>
                                                <td>
                                                <?php echo $row->lastname; ?>
                                                </td>
                                                <td>
                                                <?php echo $row->cellphone;?>
                                                </td>
                                                <td>
                                                <?php echo $row->gender;?>
                                                </td> 
                                                 <td>
                                                <?php echo $row->username;?>
                                                </td> 
                                                <td>
                                                <?php echo $row->role;?>
                                                </td> 
                                                <td> 
                                                    
                                                      <?php
                                                    
                                                    if($row->role == "employer" ||$row->role == "youth" ){
                                                    
                                                     echo anchor("/activation/$row->id/$user->id/$row->role/Deactivated",'<span class="btn btn-danger btn-xs">  Deactivate User</span>' ); 
                                                    }else {
                                                        echo anchor("/activation1/$row->id/$user->id/$row->role/Activated",'<span class="btn btn-warning btn-xs">  Activate User</span>' ); 
                                                    }
                                                    ?>                             
                                                </td>
                                               
                                            </tr>
                                                <?php  endforeach;?>
                                                <?php else : ?><h6>No records </h6>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div> 
              <div id="deactivate" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Deactivating a User</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                          	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">

                                                                            <input type="text" name="id" id="userid" value="" />
                                                                            <input type="hidden" name="page"  value="aprofile" />
                                                                            <label for="comment">Please provide a comment for Deactivating the User</label>
                                                                            <input name="comment" type="text" id="comm" class="form-control" value="" />
                                                                             <br><br>
                                                                        <div class="col-md-3"><label for="name"></label></div>
                                                                        <div class="col-md-8"> <label id="msg1" style="color:red"></label></div>
                                                                        <br><br>
               

                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" onclick="ValidateComm()">Deactivate</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                
<div id="activate" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Activating a User</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                       	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">

                                                                            <input type="hidden" name="id"  value="" />
                                                                            <input type="hidden" name="page"  value="" />
                                                                            <label for="com">Please provide a comment for Activating the User</label>
                                                                            <input name="com" type="text" id="comm2" class="form-control" value="" />
                                                                             <br><br>
                                                                        <div class="col-md-3"><label for="name"></label></div>
                                                                        <div class="col-md-8"> <label id="msg" style="color:red"></label></div>
                                                                        <br><br>
               

                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" onclick="ValidateComm2()">Activate</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
            </div>
          
          
        </div>
        </div>
        <div class="loader-wrap hiding hide">
            <i class="fa fa-circle-o-notch fa-spin"></i>
        </div>
    </div>
<!-- common libraries. required for every page-->
<script src="assets/lib/jquery/dist/jquery.min.js"></script>
<script src="assets/lib/jquery-pjax/jquery.pjax.js"></script>
<script src="assets/lib/bootstrap-sass-official/assets/javascripts/bootstrap.js"></script>
<script src="assets/lib/widgster/widgster.js"></script>
<script src="assets/lib/underscore/underscore.js"></script>

<!-- common application js -->
<script src="assets/js/app.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/lib/slimScroll/jquery.slimscroll.min.js"></script>
<script src="assets/lib/jquery.sparkline/index.js"></script>

<script src="assets/lib/d3/d3.min.js"></script>
        <script src="assets/lib/nvd3/nv.d3.min.js"></script>

        <!-- page application js -->
        <script src="assets/js/index.js"></script>
<!-- common templates -->
<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Background</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-sm btn-default <%= dark? 'active' : '' %>">Dark</button>
            <button type="button" data-value="light" class="btn btn-sm btn-default <%= light? 'active' : '' %>">Light</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-default <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-default <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>White Version</div>
        <div>
            <a href="../white/index.html" class="btn btn-sm btn-default">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>

<script type="text/javascript">
    function ValidateComm2(){
        var comme = $("#comm2").val();       
        var comme = $("#page").val();
        var comme = $("#userid").val();
        if(comme == ""){
            $("#msg").text("Please enter values.");
        }
        else{
            
             location.href = "/havanayouth/activation/" + comme + "/aprofile/"+new_pass;
        }
}
 function fill_references(id){
    
    var la = $("#userid").val(id); 
    
}

function ValidateComm(){
        var commV = $("#comm").val();       
        
        if(commV == ""){
            $("#msg1").text("Please enter value.");
        }
}

</script>
  <script src="assets/lib/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="assets/lib/select2/select2.min.js"></script>
        <script src="assets/lib/moment/moment.js"></script>
        <script src="assets/lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/lib/parsleyjs/dist/parsley.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="assets/lib/gmaps/gmaps.js"></script>   
        <script type="text/javascript" src="assets/js/map.js"></script>
        <!-- page application js -->
        <script src="assets/js/forms-account.js"></script>
    <!-- page specific scripts -->
        <!-- page specific libs -->
        <script src="assets/lib/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="assets/lib/underscore/underscore.js"></script>
        <script src="assets/lib/backbone/backbone.js"></script>
        <script src="assets/lib/backbone.paginator/lib/backbone.paginator.min.js"></script>
        <script src="assets/lib/backgrid/lib/backgrid.min.js"></script>
        <script src="assets/lib/backgrid-paginator/backgrid-paginator.js"></script>

        <script src="assets/js/forms-account.js"></script>
        
         <script src="assets/js/tables-dynamic.js"></script>
        <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
        <script src="assets/js/datatable/ZeroClipboard.js"></script>
        <script src="assets/js/datatable/dataTables.tableTools.min.js"></script>
        <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/datatable/datatables-init.js"></script>
        <script>
            InitiateSimpleDataTable.init();
            InitiateEditableDataTable.init();
            InitiateExpandableDataTable1.init();
        </script>
</body>
</html>
