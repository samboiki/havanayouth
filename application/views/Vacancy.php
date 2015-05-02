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
                <li class="">
                    <a href="<?php echo base_url('rprofile');?>"><i class="fa fa-user"></i> <span class="name">Profile</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url('vacancy');?>"><i class="fa fa-briefcase"></i> <span class="name">Vacancy</span></a>
                </li>
                <li class="">
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
                            <li><a href="#information" data-toggle="tab">Posted Jobs</a></li>
                            <li><a href="#rate" data-toggle="tab">Rating</a></li>
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
                                <legend class="section">Viewing Posted Jobs</legend>
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
                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Updating Vacancy</strong></h4>
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
                                                                           <div class="col-md-3"><label for="rating">Type</label></div>
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
                            
                            <div class="tab-pane fade " id="rate">
                                      <div class="row">
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-8">
                                  
                                </div>
                            </div>
                                <div>
                                <legend class="section">Rate youth that worked for you</legend>
                                 <table class="table table-striped table-bordered " id="expandabledatatable">
                                    <thead>
                                        <tr>
                                           
                                            <th >Name</th>
                                            <th>Surname</th>
                                            <th>Comment</th>
                                            <th> Rate</th>
                                             <th></th>
                                        </tr>
                                        <?php if(isset($rating)) :  foreach ($rating as $row) : ?>                       
                                        <tr>
                                          
                                            <td ><?php echo $row->firstname;?></td>
                                            <td><?php echo $row->lastname;?></td>
                                            <td style=""><?php echo $row->comment;?></td>
                                            <td> 
                                <div class="col-sm-11">
                                    <?php $rating = $row->rate; if ($rating == 1):?>
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
                                               <td>
                                                <a href="#edit_rating"   onclick="fill_rate_edit('<?php echo $row->rateid ?>', '<?php echo $row->comment ?>', '<?php echo $row->rate ?>');" data-toggle="modal"><span class="btn btn-primary"><i class="fa fa-pencil" style="color:white"></i>edit</span></a>
                                       
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
                                
                                 
                                 
                                   <div id="edit_rating" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                               <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Add skill</strong></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                            <form action="<?php echo site_url('edit_rating')?>"  id="validation-form" class="form-horizontal form-label-left" method="post"
                                                    data-parsley-priority-enabled="false" accept-charset="utf-8" class="no-margin"
                                                    novalidate="novalidate">
                                              
                                                          <div class="footer-col-inner">
                                                                        <div class="form-group">  
                                                                          
                                                                           <input type="hidden" name="id" id="r_id" value="" />
                                                                           
                                                                           <div class="col-md-3"><label for="name">Comment</label></div>
                                                                           <div class="col-md-8"><input name="comment" type="text" id="r_comment" class="form-control" value="" /></div>
                                                                           <br><br>
                                                                           <div class="col-md-3"><label for="rating">Rating</label></div>
                                                                           <div class="col-md-8">
                                                                               <select name="rate" type="text" id="r_rate"  class="form-control">
                                                                                 
                                                                                   
                                                                                   <option >1</option>
                                                                                   <option >2</option>
                                                                                   <option >3</option>
                                                                                   <option >4</option>
                                                                                   <option >5</option>
                                                                                   
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
               
                            
                            
                            
                            </section>
            </div>
            <div class="col-md-3">
           <section class="widget large">
                            <header>
                                <h4>
                                    Jobs Alert &nbsp;
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
          function fill_rate_edit(id, comment, rate){
               $("#r_id").val(id);
               $("#r_comment").val(comment);
               $("#r_rate").val(rate);
              
             
               
            }
            
        </script>
</body>
</html>
