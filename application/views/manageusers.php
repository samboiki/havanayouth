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
                    <a href="<?php echo site_url('manageusers');?>"><i class="fa fa-area-chart"></i> <span class="name">Management</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('notifications');?>"><i class="fa fa-th"></i> <span class="name">Notifications</span></a>
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
            <div class="col-lg-8">
               
                 <div class="col-xs-12 col-md-12">
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
                                                    Technical Skills
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
                                                <?php echo $row->gender;?>
                                                </td> 
                                                <td>
                                                <?php echo $row->role;?>
                                                </td> 
                                                <td> 
                                                      <?php
                                                    
                                                    if($row->role == "employer" ||$row->role == "youth" ){
                                                        echo anchor("/jobrequest/$row->id/$user->id",'<span><a class="btn btn-danger btn-xs" href="#references" data-toggle="modal"> Deactivate User</a> </span>' );

                                                    }else {
                                                        echo anchor("/jobrequest/$row->id/$user->id",'<span><a class="btn btn-warning btn-xs" href="#references" data-toggle="modal"> Activate User</a> </span>' );
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
                
            </div>
            <div class="col-lg-4">
                <section class="widget large">
                    <header>
                        <h4>
                            Feed
                            <span class="label label-success">412</span>
                        </h4>
                        <div class="actions">
                            <button class="btn btn-transparent btn-xs">Show All <i class="fa fa-arrow-down"></i></button>
                        </div>
                    </header>
                    <div class="body">
                        <div id="feed" class="feed">
                            <div class="wrapper">
                                <div class="vertical-line"></div>
                                <section class="feed-item">
                                    <div class="icon pull-left">
                                        <i class="fa fa-comment"></i>
                                    </div>
                                    <div class="feed-item-body">
                                        <div class="text">
                                            <a href="#">John Doe</a> commented on <a href="#">What Makes Good Code Good</a>.
                                        </div>
                                        <div class="time pull-left">
                                            3 h
                                        </div>
                                    </div>
                                </section>
                                <section class="feed-item">
                                    <div class="icon pull-left">
                                        <i class="fa fa-check color-green"></i>
                                    </div>
                                    <div class="feed-item-body">
                                        <div class="text">
                                            <a href="#">Merge request #42</a> has been approved by <a href="#">Jessica Lori</a>.
                                        </div>
                                        <div class="time pull-left">
                                            10 h
                                        </div>
                                    </div>
                                </section>
                                <section class="feed-item">
                                    <div class="icon pull-left">
                                        <img src="img/14.jpg" class="img-circle" alt="">
                                    </div>
                                    <div class="feed-item-body">
                                        <div class="text">
                                            New user <a href="#">Greg Wilson</a> registered.
                                        </div>
                                        <div class="time pull-left">
                                            Today
                                        </div>
                                    </div>
                                </section>
                                <section class="feed-item">
                                    <div class="icon pull-left">
                                        <i class="fa fa-bolt color-orange"></i>
                                    </div>
                                    <div class="feed-item-body">
                                        <div class="text">
                                            Server fail level raises above normal. <a href="#">See logs</a> for details.
                                        </div>
                                        <div class="time pull-left">
                                            Yesterday
                                        </div>
                                    </div>
                                </section>
                                <section class="feed-item">
                                    <div class="icon pull-left">
                                        <i class="fa fa-database"></i>
                                    </div>
                                    <div class="feed-item-body">
                                        <div class="text">
                                            <a href="#">Database usage report</a> is ready.
                                        </div>
                                        <div class="time pull-left">
                                            Yesterday
                                        </div>
                                    </div>
                                </section>
                                <section class="feed-item">
                                    <div class="icon pull-left">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="feed-item-body">
                                        <div class="text">
                                            <a href="#">Order #233985</a> needs additional processing.
                                        </div>
                                        <div class="time pull-left">
                                            Wednesday
                                        </div>
                                    </div>
                                </section>
                                <section class="feed-item">
                                    <div class="icon pull-left">
                                        <i class="fa fa-arrow-down"></i>
                                    </div>
                                    <div class="feed-item-body">
                                        <div class="text">
                                            <a href="#">Load more...</a>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="widget widget-tabs">
                    <header>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#stats" data-toggle="tab">Users</a>
                            </li>
                            <li>
                                <a href="#report" data-toggle="tab">Favorites</a>
                            </li>
                            <li>
                                <a href="#dropdown1" data-toggle="tab">Commenters</a>
                            </li>
                        </ul>
                    </header>
                    <div class="body tab-content">
                        <div id="stats" class="tab-pane active clearfix">
                            <h5 class="tab-header"><span class="label label-primary"><i class="fa fa-facebook"></i></span> Last logged-in users</h5>
                            <ul class="news-list">
                                <li>
                                    <img src="img/1.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Finees Lund</a></div>
                                        <div class="position">Product Designer</div>
                                        <div class="time">Last logged-in: Mar 20, 18:46</div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/3.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Erebus Novak</a></div>
                                        <div class="position">Software Engineer</div>
                                        <div class="time">Last logged-in: Mar 23, 9:02</div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/2.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Leopoldo Reier</a></div>
                                        <div class="position">Chief Officer</div>
                                        <div class="time">Last logged-in: Jun 6, 15:34</div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/13.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Frans Garey</a></div>
                                        <div class="position">Financial Assistant</div>
                                        <div class="time">Last logged-in: Jun 8, 17:20</div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/14.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Jessica Johnsson</a></div>
                                        <div class="position">Sales Manager</div>
                                        <div class="time">Last logged-in: Jun 8, 9:13</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="report" class="tab-pane">
                            <h5 class="tab-header"><i class="fa fa-star"></i> Popular contacts</h5>
                            <ul class="news-list news-list-no-hover">
                                <li>
                                    <img src="img/14.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Jessica Johnsson</a></div>
                                        <div class="options">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-phone"></i>
                                                Call
                                            </button>
                                            <button class="btn btn-xs btn-warning">
                                                <i class="fa fa-envelope-o"></i>
                                                Message
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/13.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Frans Garey</a></div>
                                        <div class="options">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-phone"></i>
                                                Call
                                            </button>
                                            <button class="btn btn-xs btn-warning">
                                                <i class="fa fa-envelope-o"></i>
                                                Message
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/3.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Erebus Novak</a></div>
                                        <div class="options">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-phone"></i>
                                                Call
                                            </button>
                                            <button class="btn btn-xs btn-warning">
                                                <i class="fa fa-envelope-o"></i>
                                                Message
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/2.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Leopoldo Reier</a></div>
                                        <div class="options">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-phone"></i>
                                                Call
                                            </button>
                                            <button class="btn btn-xs btn-warning">
                                                <i class="fa fa-envelope-o"></i>
                                                Message
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/1.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Finees Lund</a></div>
                                        <div class="options">
                                            <button class="btn btn-xs btn-success">
                                                <i class="fa fa-phone"></i>
                                                Call
                                            </button>
                                            <button class="btn btn-xs btn-warning">
                                                <i class="fa fa-envelope-o"></i>
                                                Message
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="dropdown1" class="tab-pane">
                            <h5 class="tab-header"><i class="fa fa-comments"></i> Top Commenters</h5>
                            <ul class="news-list">
                                <li>
                                    <img src="img/13.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Frans Garey</a></div>
                                        <div class="comment">
                                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                            sed quia
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/1.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Finees Lund</a></div>
                                        <div class="comment">
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                            eu fugiat.
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/14.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Jessica Johnsson</a></div>
                                        <div class="comment">
                                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                            deserunt.
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/3.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Erebus Novak</a></div>
                                        <div class="comment">
                                            Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                            doloremque.
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="img/2.jpg" alt="" class="pull-left img-circle"/>
                                    <div class="news-item-info">
                                        <div class="name"><a href="#">Leopoldo Reier</a></div>
                                        <div class="comment">
                                            Laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis
                                            et quasi.
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="widget">
                    <header>
                        <h4>
                            Server Overview
                        </h4>
                        <div class="actions">
                            <small class="text-muted pull-right">2 days ago</small>
                        </div>
                    </header>
                    <div class="body">
                        <ul class="server-stats">
                            <li>
                                <div class="key pull-right">CPU</div>
                                <div class="stat">
                                    <div class="info">60% / 37&deg;C / 3.3 Ghz</div>
                                    <div class="progress progress-small">
                                        <div class="progress-bar progress-bar-danger" style="width: 90%;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="key pull-right">Mem</div>
                                <div class="stat">
                                    <div class="info">29% / 4GB (16 GB)</div>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" style="width: 29%;"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="key pull-right">LAN</div>
                                <div class="stat">
                                    <div class="info">6 Mb/s <i class="fa fa-caret-down"></i> &nbsp; 3 Mb/s <i class="fa fa-caret-up"></i></div>
                                    <div class="progress progress-small">
                                        <div class="progress-bar progress-bar-inverse" style="width: 48%;"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
