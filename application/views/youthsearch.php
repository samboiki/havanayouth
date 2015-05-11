<!-- light-blue - v3.1.0 - 2014-12-06 -->

<!DOCTYPE html>
<html>
<head>
    <title>havana Youth</title>

      <link href="css/application.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/bootstrap-datetimepicker.min.css" rel="stylesheet">
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
   
    <div class="logo">
        <h4><a href="index.html">Havana <strong>Youth</strong></a></h4>
    </div>
    <nav  class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li class="">
                    <a href="<?php echo base_url('rprofile');?>"><i class="fa fa-user"></i> <span class="name">Profile</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('vacancy');?>"><i class="fa fa-briefcase"></i> <span class="name">Vacancy</span></a>
                </li>
                <li class="active">
                   <a href="<?php echo site_url('youthsearch');?>"><i class="fa fa-users"></i> <span class="name">Recruitment</span></a>
                </li>
                
               
              
                <li class="visible-xs">
                    <a href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out"></i> <span class="name">Sign Out</span></a>
                    <p><?php echo anchor("$logout_url",'<span class="name"><i class="fa fa-sign-out" style="color:white"></i>Sign Out</span>' ) ?></p>
                </li>
            </ul>
            
            <?php $this->load->view('sponsors');?>
        
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
        <div class="content container">
    
        <section>
         <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="well youth-border" style=" border-bottom: 3px; border-bottom-color: aquamarine;">
                                    <strong>Search Unemployed Youth</strong>
                                </div>
                                <div class="widget-body">
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
                                                    Age
                                                </th>
                                                <th>
                                                    Gender 
                                                </th>
                                                <th>
                                                    Technical Skills
                                                </th>
                                                <th>
                                                    Request 
                                                </th>
                                                
                                                <th>Picture</th>
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
                                                <?php echo $row->age;?>
                                                </td>
                                                <td>
                                                <?php echo $row->gender;?>
                                                </td>
                                                <td>
                                                <?php echo $row->skills;?>
                                                </td>
                                                 
                                                <td>
                                                    <a href="#references"   onclick="fill_references('<?php echo $row->id?>');" data-toggle="modal"><span class="btn btn-warning btn-xs">View references</span></a>
                                                    <?php
                                                    $this->load->model('crud');
                                      
                                         $data1['references'] = $this->crud->get_references( 147);
                                     
                                         $geting=$data1['references'];
                                         
                                                       
                                                    echo anchor("/jobrequest/$row->id/$user->id",'<span class="btn btn-primary btn-xs">sent '."$row->firstname".' a job notification <i class="fa fa-comments" style="color:white"></i></span>' ) ?> 
                                                 

                                               
                                                </td>
                                                <td>
                                                <img class="" src="<?=$row->path;?>" width="100" height="100" alt="" />
                                                </td>
                                            </tr>
                                                <?php  endforeach;?>
                                                <?php else :  ?><h6>No records </h6>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>         
            <div id="references" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

                                            <div class="modal-dialog">
                                                     
                                                 <section class="widget">
                                                   
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>References</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <div class="wellr youth-border" style=" border-bottom: 3px; border-bottom-color: aquamarine;">
                       <table class="table table-striped table-bordered " >
                                    <thead>
                                        <tr>
                                           
                                            <th >Name</th>
                                            <th>Surname</th>
                                            <th>Job Title</th>
                                            <th> Rated</th>
                                          
                                        </tr>
                                        <?php
                                      
                                         
                                     
                                    
                                    
                                       
                                        if(isset($geting)) :  foreach ($geting as $reow) :?>                       
                                        <tr>
                                            <td ><?php echo $reow->firstname;?></td>
                                            <td><?php echo $reow->lastname;?></td>
                                            <td ><?php echo $reow->title;?></td>
                                            <td> 
                                <div class="col-sm-11">
                                    <?php $rating = $reow->rate; if ($rating == 1):?>
                                     <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star"></i></span><span class="starred"><i class="fa fa-star"></i></span><span class="starred"><i class="fa fa-star"></i></span><span class="starred"><i class="fa fa-star"></i></span>
                                        <?php elseif ($rating == 2): ?>
                                        <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star"></i></span><span class="starred"><i class="fa fa-star"></i></span><span class="starred"><i class="fa fa-star"></i></span>
                                        <?php elseif ($rating == 3): ?>
                                        <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star"></i></span><span class="starred"><i class="fa fa-star"></i></span>
                                        <?php elseif ($rating == 4): ?>
                                        <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star"></i></span>
                                        <?php elseif ($rating == 5): ?>
                                        <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span><span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>
                                        <?php else : ?>
                                        <?php endif; ?>
                                </div></td>
                                                
                                        </tr> 
                                        
                                         <?php endforeach;?>
                                                                
                                                                
                                        <?php else : ?>
                                                                <h6>No records </h6>
                                        <?php endif; ?>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table> 
                                                         </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                                       
                                                    </div>
                                                   
                                                </div><!-- /.modal-content -->
                                                </section>
                                            </div><!-- /.modal-dialog -->
                                            
                                        </div>
                    </div> 
            
           
        </section>
            
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
<script type="text/javascript">
          function fill_references(id){
           
         }
         function getUserID(){
             
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

        <!-- page application js -->
        <script src="assets/js/tables-dynamic.js"></script>
        <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
        <script src="assets/js/datatable/ZeroClipboard.js"></script>
        <script src="assets/js/datatable/dataTables.tableTools.min.js"></script>
        <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/datatable/datatables-init.js"></script>
        <script>
            InitiateSimpleDataTable.init();
            InitiateEditableDataTable.init();
            InitiateExpandableDataTable.init();
        </script>
</body>
</html>