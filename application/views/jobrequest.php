
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
   
      <div class="content container">
        <div class="modal-dialog">
            <div class="modal-content" style="color: black;">
                <div class="modal-header">
                    <h4 class="modal-title" >Havana <strong>Youth </strong>Job Offer</h4>
                </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('jobrequested')?>" id="validation-form" class="form-horizontal form-label-left" method="post"
                              data-parsley-priority-enabled="false"
                              novalidate="novalidate">
                            <fieldset>
                                 <input type="hidden" name="youthcontact"  value="<?php echo $youthcontact->mobile_phone?>" />
                                 <input type="hidden" name="employercontact"  value="<?php echo $employercontact->mobile_phone?>" />
                                 <input type="hidden" name="employername"  value="<?php echo $user->firstname?>" />
                                 <input type="hidden" name="youthname"  value="<?php echo $youthuser->firstname?>" />
                                 <div class="form-group col-md-12">
                                     <h5>Hey there <strong><?=$user->firstname?></strong>, you are about to send <strong><?=$youthuser->firstname?> <?=$youthuser->lastname?> </strong>a job offer. he will receive the details of 
                                       your request via sms along with your phone number and name, he will then get back to you to arrange details of the job.</h5>
                                 </div>
                                <div class="form-group" >
                                    <label class="control-label col-md-2" for="default-select">
                                            Vacancies<span class="required">&nbsp;*</span>
                                    </label>
                                    <div class="col-md-8">
                                       <select id="website" class="select-block-level"
                                            data-width="auto"
                                            data-minimum-results-for-search="10"
                                            tabindex="-1"
                                            name="vacancy">
                                        <?php if(isset($vacancy)) : foreach($vacancy as $row) :  ?>
                                        <option value="<?php echo $row->id?>"><?=$row->description?></option>
                                        
                                        <?php  endforeach;?>
                                        <?php else : ?><h6>No records </h6>
                                        <?php endif; ?>
                                        </select>
                                    </div>

                                </div>
                                                  </fieldset>
                                                  <fieldset>
                                                    <legend class="section">  </legend>
                                                    
                                                     <div class="form-group">
                                                         </div>
                                                  </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-4 col-sm-4">
                                        
                                        
                                            <a href='<?php  echo site_url('Vacancy');?>' class="btn btn-block btn-success  "><i class="fa fa-plus"></i> Create new vacancy</a>
                                      
                                        </div>
                                        <a href="<?php echo site_url('rprofile');?>"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
                                        <button type="submit" class="btn btn-primary">Make <?=$youthuser->firstname?> A Job Offer &nbsp;&nbsp; <i class="fa fa-arrow-right"></i></button>
                                    </div>
                        </form>
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

</body>
</html> 