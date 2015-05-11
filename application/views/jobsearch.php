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
</head>
<body class="background-dark">
    <nav  class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li class="active">
                    <a href="<?php echo base_url('yprofile'); ?>"><i class="fa fa-user"></i> <span class="name">Profile</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('jobsearch'); ?>"><i class="fa fa-briefcase"></i> <span class="name">Vacancies</span></a>
                </li>
                <li class="">
                    <a href="<?php echo site_url('notifications'); ?>"><i class="fa fa-bell-o"></i> <span class="name">Notifications</span></a>
                </li>
                <li class="visible-xs">
                    <a href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out"></i> <span class="name">Sign Out</span></a>
                    <p><?php echo anchor("$", '<span class="name"><i class="fa fa-sign-out" style="color:white"></i>Sign Out</span>') ?></p>
                </li>
            </ul><br><br><br><br>

            <?php $this->load->view('sponsors'); ?>

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
                        
                        <li class="hidden-xs"><a href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out"></i>Log out</a></li>
                    </ul>
                    <form id="search-form" class="navbar-form pull-right" role="search">
                        <input type="search" class="form-control search-query" placeholder="Search...">
                    </form>
                </div>
            </header> 
        <div class="content container">
        <h2 class="page-title">Vacancies</h2>
        <div class="clearfix">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-default">
                        Popular <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">All</a></li>
                        <li><a href="#">Plumbing</a></li>
                        <li><a href="#">Gardening</a></li>
                        <li><a href="#">Others</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-default">
                        All Time <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Last 24h</a></li>
                        <li><a href="#">Last Month</a></li>
                        <li><a href="#">Last Year</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-lg-push-9">
               
            </div>
            <div class="col-lg-9 col-lg-pull-3">
                <p class="search-results-count">7000 jobs retrieved</p>
                
                
                <?php if (isset($vacancies)) : foreach ($vacancies as $rows) : ?>    
                            <section class="search-result-item">
                    <a class="image-link" href="#">
                        <img class="image" src="<?php echo $rows['img']?>" style="width: 200px; height: 150px">
                    </a>
                    <div class="search-result-item-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="search-result-item-heading">
                                    <p><strong>Job title :</strong>  <?php echo $rows['title']?></p>
                                    
                                </h4>
                                <p class="info">
                                    posted by <?php echo $rows['firstname'] . " ".  $rows['lastname']?>  on  <?php echo $rows['date']?>
                                </p>
                                <p class="description">
                                    <strong>Job description :</strong><br>
                                    <?php echo $rows['description']?>
                                </p>
                            </div>
                            <div class="col-sm-3 text-align-center">
                                <p class="fs-mini text-muted">
                                    WAGES
                                </p>
                                
                                <p class="value3 mt-sm">
                                    N$ <?php echo $rows['wage']?>
                                </p>
                                
                                <br>
                                <a class="btn btn-primary btn-info btn-sm" href="#applyconfirmaation" data-toggle="modal">Apply</a>
                            </div>
                        </div>
                    </div>
                </section>                                
                <?php endforeach; ?>
                <?php else : ?>
                 <h6>No vacancies found</h6>
                <?php endif; ?>
                <div class="text-align-center">
                    <ul class="pagination pagination-sm pagination-search-result">
                        <li class="disabled"><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
           <div id="applyconfirmaation" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Vacant application confirmation</strong></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="margin-left:5px; margin-right: 5px">
                                    <div class="footer-col-inner">
                                        <div class="form-group">  
                                            <input type="hidden" name="id" id="hh_id" value="" />
                                            <input type="hidden" name="page"  value="" />
                                            <div class="col-md-10"><label for="name">Your application has been processed and succesfuly recieved. You will be contacted by the employer for contractual negotiation once you have been shortlisted. </label><br></div>

                                        </div>
                                    </div><!--//footer-col-inner-->

                                </div>           
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" onclick="apply();" data-dismiss="modal">OK</button>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
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
        <!-- page specific libs -->

        <!-- page application js -->
        <script type="text/javascript">
         function apply(){
             //alert("You have succesfully applied");
         }
        </script>
</body>
</html>