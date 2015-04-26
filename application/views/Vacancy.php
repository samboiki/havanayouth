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
</head>
<body class="background-dark">
        <div class="logo">
        <h4><a href="index.html">Havana <strong>Youth</strong></a></h4>
        </div>
        <nav  class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
               
                <li class="active">
                    <a href="<?php echo site_url('vacancy');?>"><i class="fa fa-th"></i> <span class="name">Vacancy</span></a>
                </li>
                <li class="">
                   <a href="<?php echo site_url('youthsearch');?>"><i class="fa fa-th"></i> <span class="name">Recruitment</span></a>
                </li>
                <li class="">
                    <a href="<?php echo base_url('rprofile');?>"><i class="fa fa-gear"></i> <span class="name">Profile</span></a>
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
                 
                    <li class="hidden-xs"><a href="<?= site_url('logout'); ?>"> <i class="fa fa-sign-out">logout</i></a></li>
                </ul>
                <form id="search-form" class="navbar-form pull-right" role="search">
                    <input type="search" class="form-control search-query" placeholder="Search...">
                </form>
            </div>
        </header>       
        <div class="content container">
       <h4 class="mt-sm mb-xs">
<!--<?=$user->firstname?> -->
        <?php echo $user->firstname?>  <small> Welcome</small></h4>
        <div class="row">
            <div class="col-md-9">
                <section class="widget">
                    <header>
                        <h5>
                            <i class="fa fa-user"></i>
                            Jobs
                        </h5>
                    </header>
                    <div class="body">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#profile1" data-toggle="tab">Post Vacancy</a></li>
                            <li><a href="#information" data-toggle="tab">History</a></li>
                            <li><a href="#profile" data-toggle="tab">Rate</a></li>
                        </ul>
                        
                        
                        
                        
                        <div id="myTabContent" class="tab-content" >
                                <div class="tab-pane fade in active "  id="profile1">
                           
                         
                                          <div class="col-md-8 col-sm-4 col-xs-12" id="profile1">
                                                <div class="well with-header">
                                                <div class="header bordered-blue">Fill in </div>
                                                <div>
                                                           <form action="<?php echo site_url('post_vacancy')?>"  id="validation-form" class="form-horizontal form-label-left" method="post"
                                                    data-parsley-priority-enabled="false" accept-charset="utf-8" class="no-margin"
                                                    novalidate="novalidate">
                                                                <input name="id" type="hidden" value=" <?php echo $user->id?>">
                                                                 <div class="footer-col-inner">
                                                                        <div class="form-group">
                                                                          
                                                                         
                                                                           <label for="type">Type</label>
                                                                            <select class="form-control" name="type">
                                                                             <option selected="selected" value="Full-Time">Full-Time</option>
                                                                             <option value="Part-Time">Part-Time</option>
                                                                            
                                                                             </select> <br>                                                                 
                                                                           <label for="location">Location</label>
                                                                           <input name="location" type="text" class="form-control" data-parsley-trigger="change"
                                                                     data-parsley-validation-threshold="1"
                                                                     required="required" /><br>
                                                                           <label for="description">Description</label>
                                                                           <textarea class="form-control" name="description"  id="term" cols="40" rows="4"  data-parsley-trigger="change"
                                                                     data-parsley-validation-threshold="1"
                                                                     required="required"></textarea><br>
                                                                           <label for="date">Closing date</label>
                                                                          
                                                                           
                                                                           <input name="date" type="date" data-date-format="YYYY-MM-DD" placeholder="2015-01-01"  class="form-control"  data-parsley-trigger="change"
                                                                     data-parsley-validation-threshold="1"
                                                                     required="required" /><br>
                                                                           
                                                                         
                                                                           <br>
                                                                              <button type="submit" class="btn btn-primary">Post vacancy</button><br>
                                                                        </div>
                                                                   </div><!--//footer-col-inner-->
                                                            </form>
                                                            
                                                   </div> <!-- /content -->
                                               </div><!--//row-->
                                            </div>
                                                                               
                  
                                
                     
                        </div>
                            <div class="tab-pane fade " id="information">
                                      <div class="row">
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-8">
                                  
                                </div>
                            </div>
                                <div>
                                <legend class="section">Jobs Posted</legend>
                                 <table class="table table-striped table-bordered " id="expandabledatatable">
                                    <thead>
                                        <tr>
                                           
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th> Due Date</th>
                                             <th></th>
                                        </tr>
                                        <?php if(isset($vacancy)) :  foreach ($vacancy as $row) : ?>                       
                                        <tr>
                                          
                                            <td><?php echo $row->Type;?></td>
                                            <td><?php echo $row->Location;?></td>
                                            <td><?php echo $row->Description;?></td>
                                            <td><?php echo $row->Date;?></td>
                                               <td>
                                                <a href="#edit_qualification"   onclick="fill_vacancy_edit('<?php echo $row->ID ?>', '<?php echo $row->Type ?>', '<?php echo $row->Location ?>', '<?php echo $row->Description ?>', '<?php echo $row->Date ?>');" data-toggle="modal"><span class="btn btn-primary"><i class="fa fa-pencil" style="color:white"></i>edit</span></a>
                                       
                                            </td> 
                                        </tr> 
                                        
                                         <?php endforeach;?>
                                                                
                                                                
                                        <?php else : ?>
                                                                <h6>No records </h6>
                                        <?php endif; ?>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <div class="col-sm-3"><label></div>
                                <div class="col-sm-3"><label></div>
                                 <div class="col-sm-3"><label></div>
                                
                                 
                                 
                                   <div id="edit_qualification" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                               <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Add skill</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                            <form action="<?php echo site_url('edit_vacancy')?>"  id="validation-form" class="form-horizontal form-label-left" method="post"
                                                    data-parsley-priority-enabled="false" accept-charset="utf-8" class="no-margin"
                                                    novalidate="novalidate">
                                              
                                                          <div class="footer-col-inner">
                                                                        <div class="form-group">  
                                                                          
                                                                           <input type="hidden" name="id" id="V_id" value="" />
                                                                           <div class="col-md-3"><label for="name">Location</label></div>
                                                                           <div class="col-md-8"><input name="location" type="text" id="v_location" class="form-control" value="" /></div>
                                                                           <br><br>
                                                                           <div class="col-md-3"><label for="name">Description</label></div>
                                                                           <div class="col-md-8"><input name="description" type="text" id="v_description" class="form-control" value="" data-parsley-trigger="change"
                                                                                   data-parsley-validation-threshold="1"
                                                                                     required="required" /></div>
                                                                           <br><br>
                                                                           <div class="col-md-3"><label for="name">Date</label></div>
                                                                           <div class="col-md-8"><input name="date" type="date" id="v_date" class="form-control" value="" /></div>
                                                                           <br><br>
                                                                           <div class="col-md-3"><label for="rating">Rating</label></div>
                                                                           <div class="col-md-8">
                                                                               <select name="type" type="text" id="type"  class="form-control">
                                                                                 
                                                                                   <option >Part-Time</option>
                                                                                   <option >Full-Time</option>
                                                                                   
                                                                               </select>
                                                                           </div>
                                                                           
                                                                           <br><br>  
                                                                          
                                                                            
                                                                        </div>
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
                                </div>
                                
                            
                            <div class="tab-pane fade " id="profile">
                             <div class="row">
                                <div class="col-sm-4">
                                   
                                </div>
                             
                            </div>
                             
                            </div>
                        
   </div>
                </section>
            </div>
            <div class="col-md-3">
             
                <section class="widget large">
                    <header>
                        <h4>
                            Alerts Feed &nbsp;
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
                <section class="widget" id="news-widget" data-widgster-load="server/php/widgets/news.php">
                    <header>
                        <h5>
                            News & Events <span class="badge badge-success">17</span>
                        </h5>
                        <span class="text-muted">spinning refresh button & close prompt</span>
                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-plus"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-minus"></i></a>
                            <a data-widgster="load" title="I am spinning!" href="#"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="body">
                        <ul class="news-list stretchable">
                            <li>
                                <span class="icon background-warning">
                                    <i class="fa fa-star"></i>
                                </span>
                                <div class="news-item-info">
                                    <h5 class="name"><a href="#">First Human Colony on Mars</a></h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit............
                                    </p>
                                    <div class="time"><i class="fa fa-clock-o"></i> Mar 20, 18:46</div>
                                    <div class="location"><i class="fa fa-map-marker"></i> Windhoek</div>
                                </div>
                            </li>
                            <li>
                                <span class="icon background-info">
                                    <i class="fa fa-microphone"></i>
                                </span>
                                <div class="news-item-info">
                                    <h5 class="name"><a href="#">Light Blue reached $300</a></h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    </p>
                                    <div class="time"><i class="fa fa-clock-o"></i> Sep 25, 11:59</div>
                                </div>
                            </li>
                            <li>
                                <span class="icon background-lime">
                                    <i class="fa fa-eye"></i>
                                </span>
                                <div class="news-item-info">
                                    <h5 class="name"><a href="#">No more spying</a></h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    </p>
                                    <div class="time"><i class="fa fa-clock-o"></i>Mar 20, 18:46</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="news-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="news-close-modal-label" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="news-close-modal-label">Sure?</h4>
                                </div>
                                <div class="modal-body">
                                    Do you really want to unrevertably remove this super news widget?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-danger" id="news-widget-remove">Yes, remove widget</button>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                </section>
            </div>
        </div>
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

    <!-- page specific scripts -->
        <!-- page libs -->
        <script src="assets/lib/parsleyjs/dist/parsley.min.js"></script>

        <!-- page application js -->
        <script src="assets/js/forms-validation.js"></script>

    <script type="text/javascript">
            function fill_vacancy_edit(id, type, location,description, date){
               $("#V_id").val(id);
               $("#type").val(type);
               $("#v_location").val(location);
               $("#v_description").val(description);
               $("#v_date").val(date);
               
            }
          
            
        </script>
</body>
</html>
