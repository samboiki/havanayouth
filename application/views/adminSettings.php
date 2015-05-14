<!-- light-blue - v3.1.0 - 2014-12-06 -->
<!DOCTYPE html>
<html>
    <head>
        <title>Havana Youth</title>

        <link href="css/application.css" rel="stylesheet">
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
        <style type="text/css">
            .modal{
                color: black;
            }
        </style>
    </head>
    <body class="background-dark">
        <?php // var_dump($user_profile) ?>
        <div class="logo">
            <h4><a href="index.html">Havana <strong>Youth</strong></a></h4>
        </div>
        <nav  class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                  <li class="">
                    <a href="<?php echo base_url('aprofile');?>"><i class="fa fa-home"></i> <span class="name">Dashboard</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('manageusers');?>"><i class="fa fa-users"></i> <span class="name">Management</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('notifications');?>"><i class="fa fa-th"></i> <span class="name">Notifications</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url('adminSettings');?>"><i class="fa fa-user"></i> <span class="name">Profile</span></a>
                </li>
                <li class="visible-xs">
                    <a href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out"></i> <span class="name">Sign Out</span></a>
                    <p><?php echo anchor("$", '<span class="name"><i class="fa fa-sign-out" style="color:white"></i>Sign Out</span>') ?></p>
                </li>
            </ul><br><br><br><br>

            <h5 class="sidebar-nav-title">Sponsors</h5>
            <!-- A place for sidebar notifications & alerts -->
            <div class="sidebar-alerts">
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">POLY</span> <br>
                     <a href="http://www.polytechnic.edu.na" >   <img src="assets/img/jpeg/POLY.jpg" alt="Second slide"  style="height: 100px;width: 120px"></a>
                    <small>call us 0612079111</small>
                </div>
                <div class="alert fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">NCRST</span> <br>
                      <a href="http://www.ncrst.na/" >   <img src="assets/img/jpeg/NCRST.jpeg" alt="Second slide" style="height: 100px;width: 120px"></a>
                    <small>call us 0614317000 </small>
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
                        
                      <li class="hidden-xs"><a href="<?= site_url('logout'); ?>"> <i class="fa fa-sign-out">logout</i></a></li>
                    </ul>
                    <form id="search-form" class="navbar-form pull-right" role="search">
                        <input type="search" class="form-control search-query" placeholder="Search...">
                    </form>
                </div>
            </header>  
            <?php
              $tittle = "";
              if($user->gender == "Male"){
                  $tittle = "Mr. ";
                          
              }else if($user->gender == "Female"){
                  $tittle = "Ms. ";
              }
            ?>
            <div class="content container">
                <h4 class="mt-sm mb-xs"><small> Welcome</small> <?php echo $tittle?><?= $user->firstname; ?> <?php echo " ". $user->lastname?> </h4>
                <div class="row">
                    <div class="col-md-8">
                        <section class="widget">
                            <header>
                                
                            </header>
                            <div class="body">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#information" data-toggle="tab">Account info</a></li> 
                                    <li class="dropdown">
                                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
            <!--                                    <li><a href="#dropdown3" data-toggle="tab">Personal Information</a></li>-->
                                             <li><a href="#changepassword" data-toggle="modal">Change password</a></li>
                                             <li><a href="#changepicture" data-toggle="modal">Change profile picture</a></li>
                                            </ul>
                                    </li>                            

                                </ul>
                                <div id="myTabContent" class="tab-content" >
                                  
                                    <div class="tab-pane fade in active" id="information">
                                        <legend class="section">Profile picture</legend>
                                        <div class="row">
                                            <div class="col-sm-4">

                                                <div class="text-align-center">
                                                    <?php if (isset($img)) : foreach ($img as $rows) : ?>    
                                                            <p><img class="img-circle" src="<?= $rows->path; ?>" width="100" height="100" alt="" /></p>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <h6>No profile picture</h6>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            <legend class="section">Personal Info</legend>
                                            <h5><label class="col-sm-4" for="prefix">Name:</label></h4>
                                                <div class="col-sm-4"><strong><?= $user->firstname; ?></strong></div><div class="col-sm-2"></div><div class="col-sm-2"><a  class="btn btn-primary" href="#personalInfo" data-toggle="modal"><i class="fa fa-pencil" style="color:white"></i> edit</a></div></br></br>
                                                <h5><label class="col-sm-4" for="prefix">Surname:</label></h5>
                                                <div class="col-sm-4"><strong><?= $user->lastname; ?></strong></div></br></br>
                                                </div>
                                        <div>
                                            <legend class="section">Contact Info</legend>
                                            <h5><label class="col-sm-4" for="prefix">Mobile:</label></h5>
                                            <div class="col-sm-4"><strong><?= $contact->mobile_phone ?></strong></div><div class="col-sm-2"></div><div class="col-sm-2"><a  class="btn btn-primary" href="#contacts" data-toggle="modal"><i class="fa fa-pencil" style="color:white"></i> edit</a></div></br></br>
                                            <h5><label class="col-sm-4" for="prefix">Tel:</label></h5>
                                            <div class="col-sm-4"><strong><?= $contact->telephone ?></strong></div></br></br>                                           
                                        </div>                                  
                                    </div>
                                 
                                    
                                   
                                    </section>
                       
                                      
                                        <div id="personalInfo" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Update Personal Info</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/createperson" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
                                                                            <?php if (isset($user)) : ?>  
                                                                            <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                            <input type="hidden" name="page"  value="rprofile" />
                                                                            <div class="col-md-3"><label for="firstname">First name</label></div>
                                                                            <div class="col-md-8"><input name="firstname" type="text" class="form-control" value="<?php echo $user->firstname ?>" /></div>
                                                                            <br><br>
                                                                            <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                            <div class="col-md-3"><label for="lastname">Lastname</label></div>
                                                                            <div class="col-md-8"><input name="lastname" type="text" class="form-control" value="<?php echo $user->lastname ?>" /></div>

                                                                          <br><br>

                                                                            <?php else : ?>
                                                                            <h6>No records </h6>
                                                                            <?php endif; ?>
                                                                        <br>

                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <div id="contacts" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Update Contact Info</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/createcontacts" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
<?php if (isset($contact)) : ?>  
                                                                            <input type="hidden" name="id"  value="<?php echo $contact->id ?>" />
                                                                            <input type="hidden" name="page"  value="<?php echo "adminSettings" ?>" />
                                                                            <div class="col-md-3"><label for="mobile">Cellpnone</label></div>
                                                                            <div class="col-md-8"><input name="mobile" type="text" id="mobile" class="form-control" value="<?php echo $contact->mobile_phone ?>" /></div>
                                                                            <br><br>
                                                                            <div class="col-md-3"><label for="lastname">Telephone</label></div>
                                                                            <div class="col-md-8"><input name="tel" type="text" id="tel" class="form-control" value="<?php echo $contact->telephone ?>" /></div>
                                                                             <br>   

                                                                        <?php else : ?>
                                                                            <h6>No records </h6>
<?php endif; ?>
                                                                        <br>

                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                                               
                                       <div id="changepassword" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Change password</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="id"  id="user_idd" value="<?php echo $user->id?>" />
                                                                        <input type="hidden" name=""  id="r_currentpass" value="<?php echo $user->password?>" />
                                                                        <input type="hidden" name="page"  value="adminSettings" />
                                                                        <div class="col-md-3"><label for="name">Current password</label></div>
                                                                        <div class="col-md-8"><input name="currentpass" type="password" id="currentpass" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="name">New password</label></div>
                                                                        <div class="col-md-8"><input name="newpass" type="password" id="newpass" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="name">Confirm password</label></div>
                                                                        <div class="col-md-8"><input name="currentpass" type="password" id="copass" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="name"></label></div>
                                                                        <div class="col-md-8"> <label id="msg" style="color:red"></label></div>
                                                                        <br><br>
                                                                       
                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" onclick="validatePassword()">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                       
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <div id="changepicture" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Change profile picture</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                                <form action="uploadimg" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="page"  value="adminSettings" />
                                                                        <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                        <input name="userfile" type="file" size="100"   /><br>
                                                                        
                                                                    </div><!--//footer-col-inner-->
                                                            

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                       
                                                    </div>
                                                   </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div> 
                                     
                                        <div class="tab-pane fade" id="dropdown6">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-6 col-xs-12">
                                                    <div class="well with-header">
                                                        <div class="header bordered-blue">Add / Update Contacts</div>
                                                        <div>
                                                            <form action="/havanayouth/createcontacts" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
<?php if (isset($contact)) : ?>  
                                                                            <input type="hidden" name="id"  value="<?php echo $contact->id ?>" />
                                                                            <input type="hidden" name="page"  value="<?php echo "adminSettings" ?>" />
                                                                            <input name="mobile" type="text" id="mobile" class="form-control" value="<?php echo $contact->mobile_phone ?>" /><br>
                                                                            <input name="tel" type="text" id="tel" class="form-control" value="<?php echo $contact->telephone ?>" /><br>
                                                                            <input name="fax" type="text" id="fax" class="form-control" value="<?php echo $contact->fax ?>" /><br>
                                                                            <input name="email" type="text" id="email" class="form-control" value="<?php echo $contact->email ?>" />
                                                                        <?php else : ?>
                                                                            <h6>No records </h6>
<?php endif; ?>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary">Validate &amp; Submit</button>
                                                                    </div>
                                                                </div><!--//footer-col-inner-->
                                                            </form>

                                                        </div> <!-- /content -->
                                                    </div><!--//row-->
                                                </div>

                                            </div>
                                        </div>
                                     
                                    </div>
                                      
                    </div>
                   <div class="col-md-4">
                        <section class="widget large">
                            <header>
                                <h4>
                                    Latest vacancies &nbsp;
                                    <span class="label label-success">3</span>
                                </h4>
                                <div class="actions">
                                    <a class="btn btn-transparent btn-xs" href="<?php echo site_url('jobsearch'); ?>" >Show All <i class="fa fa-arrow-down"></i></a>
                                </div>
                            </header>
                            <div class="body">
                                <div id="feed" class="feed">
                                    <div class="wrapper">
                                        <div class="vertical-line"></div>
                                        <br><br>
                                        <section class="feed-item">
                                            <div class="icon pull-left">
                                                <i class="fa fa-comment"></i>
                                            </div>
                                            <div class="feed-item-body">
                                                <div class="text">
                                                    <a href="#">A plumber needed</a>.
                                                </div>
                                                <div class="time pull-left">
                                                    3 h ago
                                                </div>
                                            </div>
                                        </section>
                                        <section class="feed-item">
                                            <div class="icon pull-left">
                                                <i class="fa fa-comment"></i>
                                            </div>
                                            <div class="feed-item-body">
                                                <div class="text">
                                                    <a href="#">A hair dresser needed</a>.
                                                </div>
                                                <div class="time pull-left">
                                                    3 h ago
                                                </div>
                                            </div>
                                        </section>
                                        <section class="feed-item">
                                            <div class="icon pull-left">
                                                <i class="fa fa-comment"></i>
                                            </div>
                                            <div class="feed-item-body">
                                                <div class="text">
                                                    <a href="#">A gardener needed</a>.
                                                </div>
                                                <div class="time pull-left">
                                                    5 h
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>

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
        <!-- page specific scripts -->
        <!-- page libs -->
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
        <script type="text/javascript">   
    function validatePassword(){
        var current_pass = $("#currentpass").val();
        var new_pass = $("#newpass").val();
        var co_pass = $("#copass").val();
        
        
        if(new_pass == "" || co_pass == "" || current_pass == ""){
            $("#msg").text("Please enter values in all fields.");
        }else{
            if(co_pass == new_pass){
                if(co_pass == new_pass){

                var r_currentpass = $("#r_currentpass").val();
                if(r_currentpass == current_pass){
                   var id = $("#user_idd").val();
                   location.href = "/havanayouth/changepassword/" + id + "/rprofile/"+new_pass;
                   alert("Password succesfully changed!"); 
                }else{
                    $("#msg").text("Wrong current password! Try again.");
                }
                
              }
            }else{
                $("#msg").text("Passwords do not match! Try again.");
            }
        }
       
      
        
      
        
    }
   
        </script>


    </body>
</html>