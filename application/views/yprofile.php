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
                                    <li class="active"><a href="#information" data-toggle="tab">Acount info</a></li>
                                    <li><a href="#profile" data-toggle="tab">Qualifications & Skills </a></li>
                                    <li><a href="#work" data-toggle="tab">Work Experience</a></li>
                                    <li><a href="#references" data-toggle="tab">References</a></li>
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
                                    <div class="tab-pane fade" id="images">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-6 col-xs-12">
                                                    <div class="well with-header">
                                                        <div class="header bordered-blue">Update Your Residential Details</div>
                                                        <div>
                                                            <form action="uploadimg" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                        <input name="userfile" type="file" size="100"   /><br>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary">Validate &amp; Submit</button>
                                                                    </div>
                                                                </div><!--//footer-col-inner-->
                                                            </form>
                                                        </div>
                                                    </div><!--//row-->
                                                </div>
                                                <div class="footer-col col-md-7 col-sm-8 newsletter">
                                                    <div class="well with-header">
                                                        <div class="header bordered-red">Lists of images on about page</div>
<?php if (isset($img)) : foreach ($img as $rows) : ?>    
                                                                <h0><strong><?php echo $rows->title; ?></strong></h0></br>
                                                                <p><?php echo anchor("/delete_files/$rows->id/$rows->title", '<span class="btn btn-danger btn-xs"><i class="fa fa-trash" style="color:white"></i>delete image</span>') ?></p>                                          
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <h6>No records </h6>
<?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                <h5><label class="col-sm-4" for="prefix">Gender:</label></h5>
                                                <div class="col-sm-4"><strong><?= $user->gender; ?></strong></div></br></br>
                                                <h5><label class="col-sm-4" for="prefix">Date of Birth:</label></h5>
                                                <div class="col-sm-4"><strong><?= $user->birth_date; ?></strong></div></br></br>
                                        </div>
                                        <div>
                                            <legend class="section">Contact Info</legend>
                                            <h5><label class="col-sm-4" for="prefix">Mobile:</label></h5>
                                            <div class="col-sm-4"><strong><?= $contact->mobile_phone ?></strong></div><div class="col-sm-2"></div><div class="col-sm-2"><a  class="btn btn-primary" href="#contacts" data-toggle="modal"><i class="fa fa-pencil" style="color:white"></i> edit</a></div></br></br>
                                            <h5><label class="col-sm-4" for="prefix">Tel:</label></h5>
                                            <div class="col-sm-4"><strong><?= $contact->telephone ?></strong></div></br></br>
                                            <h5><label class="col-sm-4" for="prefix">Email:</label></h5>
                                            <div class="col-sm-4"><strong><?= $contact->email; ?></strong></div></br></br>
                                            <h5><label class="col-sm-4" for="prefix">Fax:</label></h5>
                                            <div class="col-sm-4"><strong><?= $contact->fax; ?></strong></div></br></br>
                                        </div>
                                        <div>
                                            <legend class="section">Address</legend>
                                            <h5><label class="col-sm-4" for="prefix">Address:</label></h5>
                                            <div class="col-sm-4"><strong><?= $address->erf ?> <?= $address->street ?> Street, <?= $address->suburb ?></strong></div><div class="col-sm-2 pull-right"><a  class="btn btn-primary" href="#address" data-toggle="modal"><i class="fa fa-pencil" style="color:white"></i> edit</a></div></br></br>
                                            <h5><label class="col-sm-4" for="prefix">City</label></h5>
                                            <div class="col-sm-4"><strong><?php echo $address->city ?></strong></div></br></br>
                                            <h5><label class="col-sm-4" for="prefix">Region:</label></h5>
                                            <div class="col-sm-4"><strong><?php echo $address->region ?></strong></div></br></br>
                                            <h5><label class="col-sm-4" for="prefix">Country:</label></h5>
                                            <div class="col-sm-4"><strong><?php echo $address->country ?></strong></div></br></br>
                                        </div>
                                        <div>
                                            <article class="map-section">
                                                <div id="map"></div><!--//map-->
                                            </article>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="profile">
                                        <div class="row">
                                            <div class="col-sm-4">

                                            </div>
                                            <div class="col-sm-8">

                                            </div>
                                        </div>
                                        <div>
                                            <legend class="section">Qualifications</legend>
                                            <table class="table table-striped table-bordered table-hover" id="expandabledatatable">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Qualification name</th>
                                                        <th>Institution</th>
                                                        <th>Date obtained</th>
                                                    </tr>
                                                    <?php if (isset($qualifications)) : foreach ($qualifications as $row) : ?>                       
                                                            <tr>
                                                                <td>
                                                                    <a href="#edit_qualification"   onclick="fill_qual_edit('<?php echo $row->id ?>', '<?php echo $row->institution ?>', '<?php echo $row->date ?>', '<?php echo $row->name ?>', '<?php echo $row->date ?>');" data-toggle="modal"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil" style="color:white"></i>edit</span></a>
                                                                    <a class="btn btn-danger btn-xs" data-toggle="modal" href="#qualification_delete" onclick="getQualificationID('<?php echo $row->id ?>')"><i class="fa fa-trash" style="color:white"></i>delete</a>
                                                                </td>
                                                                <td><?php echo $row->name; ?></td>
                                                                <td><?php echo $row->institution; ?></td>
                                                                <td><?php echo $row->date; ?></td>
                                                            </tr> 

                                                        <?php endforeach; ?>


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
                                            <div class="col-sm-3"><a  class="btn btn-primary" href="#new_qualification" data-toggle="modal"><i class="fa fa-plus" style="color:white"></i> Add qualification</a></div>
                                            <br><br>
                                            <legend class="section">Skills</legend>
                                            <?php if (isset($skills)) : foreach ($skills as $row) : ?> 
                                                    <div class="col-sm-3"> <a href="#edit_skill" onclick="fill_skill_edit('<?php echo $row->id ?>', '<?php echo $row->skill ?>', '<?php echo $row->rating ?>')"  data-toggle="modal"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil" style="color:white"></i>edit</span></a> <a class="btn btn-danger btn-xs" data-toggle="modal" href="#skill_delete" onclick="getSkillID('<?php echo $row->id ?>')"><i class="fa fa-trash" style="color:white"></i>delete</a></div>
                                                    <h5><label class="col-sm-2" for="prefix"><?php echo $row->skill; ?>:</label></h5>

                                                    <div class="col-sm-2"><?php echo $row->rating; ?></a></div>
                                                    <div class="col-sm-4">
                                                        <?php $rating = $row->rating;
                                                        if ($rating == 1):
                                                            ?>
                                                            <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="starred"><i class="fa fa-star"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>
                                                        <?php elseif ($rating == 2): ?>
                                                            <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>
                                                        <?php elseif ($rating == 3): ?>
                                                            <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>
                                                        <?php elseif ($rating == 4): ?>
                                                            <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star"></i></span>
                                                        <?php elseif ($rating == 5): ?>
                                                            <span class="starred "><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>&nbsp&nbsp&nbsp&nbsp<span class="starred"><i class="fa fa-star" style="color: #eac85e;"></i></span>
                                                        <?php else : ?>
                                                    <?php endif; ?>
                                                    </div></br></br>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <h6>No Skills added </h6>
<?php endif; ?>
                                        </div>
                                        <div>

                                        </div>
                                        <div class="col-sm-3"><label></div>
                                        <div class="col-sm-3"><label></div>
                                        <div class="col-sm-3"><label></div>
                                        <div class="col-sm-3"><a  class="btn btn-primary" href="#new_skill" data-toggle="modal"><i class="fa fa-plus" style="color:white"></i> Add skill</a></div>
                                    </div>
                                    
                                    <div class="tab-pane fade " id="work">
                                        <div class="row">
                                            <div class="col-sm-4">

                                            </div>
                                            <div class="col-sm-8">

                                            </div>
                                        </div>
                                        <div>
                                            
                                            
                                                    <?php $count =0?>
                                                    <?php if (isset($workhistory)) : foreach ($workhistory as $row) : ?> 
                                                     <?php $count ++?>
                                            <div align="left">
                                                <button class="btn btn-primary"><?php echo $count?></button>
                                            </div><br>
                                            <div class="col-sm-3"><label>Employer</label></div>
                                            <div class="col-sm-8"> :  <?php echo $row->employer?></div>
                                            <br><br>
                                            <div class="col-sm-3"><label>Contact no</label></div>
                                            <div class="col-sm-8"> :  <?php echo $row->contact?></div>
                                            <br><br>
                                            <div class="col-sm-3"><label>Job title</label></div>
                                            <div class="col-sm-8"> :  <?php echo $row->job_title?></div>
                                            <br><br>
                                            <div class="col-sm-3"><label>Job description</label></div>
                                            <div class="col-sm-8"> :  <?php echo $row->job_description?></div>
                                            <br><br>
                                            <div class="col-sm-3"><label>Date</label></div>
                                            <div class="col-sm-8"> :  <?php echo $row->date?></div><br><br>
                                            <div class="col-sm-9"><label></label></div>
                                            <div class="col-sm-1" align=""> <a data-toggle="modal" href="#edit_history" onclick="fill_history_edit('<?php echo $row->id ?>', '<?php echo $row->employer ?>', '<?php echo $row->contact ?>', '<?php echo $row->job_title ?>', '<?php echo $row->job_description ?>', '<?php echo $row->date ?>');"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil" style="color:white"></i>edit</span></a></div>
                                            <div class="col-sm-1" align=""> <a data-toggle="modal" href="#delete_history" onclick="setHistoryId('<?php echo $row->id?>')"><span class="btn btn-danger btn-xs"><i class="fa fa-trash" style="color:white"></i>delete</a></a></div>
                                            <br><br><legend></legend><br>    
                                                <?php endforeach; ?>
                                                    <?php else : ?>
                                                    <h6>No data found </h6>
                                                    <?php endif; ?>
                                        </div>
                                        <div class="col-sm-8"><label></label></div>
                                            <div class="col-sm-2"> </div>
                                            <div class="col-sm-2" > <a class="btn btn-primary" data-toggle="modal" href="#new_history"><i class="fa fa-plus" style="color:white"></i>Add new</a></div>
                                    </div>
                                    <div class="tab-pane fade " id="references">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>Under construction...</p>
                                            </div>
                                            <div class="col-sm-8">

                                            </div>
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
                                                                            <input type="hidden" name="page"  value="yprofile" />
                                                                            <div class="col-md-3"><label for="firstname">First name</label></div>
                                                                            <div class="col-md-8"><input name="firstname" type="text" class="form-control" value="<?php echo $user->firstname ?>" /></div>
                                                                            <br><br>
                                                                            <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                            <div class="col-md-3"><label for="lastname">Lastname</label></div>
                                                                            <div class="col-md-8"><input name="lastname" type="text" class="form-control" value="<?php echo $user->lastname ?>" /></div>

                                                                            <br><br>
                                                                            <div class="col-md-3"><label for="gender">Gender</label></div>
                                                                            <div class="col-md-8"><input name="gender" type="text"  class="form-control" value="<?php echo $user->gender ?>" readonly="readonly" /></div>
                                                                            <br><br>
                                                                            <div class="col-md-3"><label for="exp">Birth date</label></div>

                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input class="form-control date-picker" id="id-date-picker-1" name="birth_date" type="date" data-date-format="YYYY-MM-DD" placeholder="" value="<?php echo $user->birth_date ?>">
                                                                                    <span class="input-group-addon">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </span>
                                                                                </div>
                                                                            </div><br><br>

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
                                                                            <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
                                                                            <div class="col-md-3"><label for="mobile">Cellpnone</label></div>
                                                                            <div class="col-md-8"><input name="mobile" type="text" id="mobile" class="form-control" value="<?php echo $contact->mobile_phone ?>" /></div>
                                                                            <br><br>
                                                                            <div class="col-md-3"><label for="lastname">Telephone</label></div>
                                                                            <div class="col-md-8"><input name="tel" type="text" id="tel" class="form-control" value="<?php echo $contact->telephone ?>" /></div>

                                                                            <br><br>
                                                                            <div class="col-md-3"><label for="id_or_passport">Fax</label></div>
                                                                            <div class="col-md-8"><input name="fax" type="text" id="fax" class="form-control" value="<?php echo $contact->fax ?>" /></div>
                                                                            <br><br>
                                                                            <div class="col-md-3"><label for="id_or_passport">Email</label></div>
                                                                            <div class="col-md-8"><input name="email" type="text" id="email" class="form-control" value="<?php echo $contact->email ?>" /></div>
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
                                        <div id="address" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Update Address Info</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="createaddress" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
<?php if (isset($address)) : ?>  
                                                                            <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                            <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
                                                                            <div class="col-md-3"><label for="erf">Erf</label></div>
                                                                            <div class="col-md-8"><input name="erf" type="text" id="address" class="form-control" value="<?php echo $address->erf ?>" /></div>
                                                                            <br><br><br>
                                                                            <div class="col-md-3"><label for="street">Street</label></div>
                                                                            <div class="col-md-8"><input name="street" type="text" id="tel" class="form-control" value="<?php echo $address->street ?>" /></div>
                                                                            <br><br><br>
                                                                            <div class="col-md-3"><label for="suburb">Suburb</label></div>
                                                                            <div class="col-md-8"><input name="suburb" type="text" id="suburb" class="form-control" value="<?php echo $address->suburb ?>" /></div>
                                                                            <br><br><br>
                                                                            <div class="col-md-3"><label for="city">City</label></div>
                                                                            <div class="col-md-8"><input name="city" type="text" id="tel" class="form-control" value="<?php echo $address->city ?>" /></div>
                                                                            <br><br><br>
                                                                            <div class="col-md-3"><label for="region">Region</label></div>
                                                                            <div class="col-md-8"><input name="region" type="text" id="region" class="form-control" value="<?php echo $address->region ?>" /></div>
                                                                            <br><br><br>
                                                                            <div class="col-md-3"><label for="country">Country</label></div>
                                                                            <div class="col-md-8"><input name="country" type="text" id="country" class="form-control" value="<?php echo $address->country ?>" /></div>
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
                                        <div id="new_qualification" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Add qualification</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/addQualification" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                        <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
                                                                        <div class="col-md-3"><label for="name">Qualification name</label></div>
                                                                        <div class="col-md-8"><input name="name" type="text" id="name" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="institution">Institution</label></div>
                                                                        <div class="col-md-8"><input name="institution" type="text" id="institution" class="form-control" value="" /></div>

                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="date">Date obtained</label></div>
                                                                        <div class="col-md-8"><input name="date" type="date" id="date" class="form-control" value="" /></div>
                                                                        <br><br>   


                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                        <div id="edit_qualification" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Edit qualification</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/edit_qualification" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="id" id="q_id" value="" />
                                                                        <input type="hidden" name="page"  value="" />
                                                                        <div class="col-md-3"><label for="name">Qualification name</label></div>
                                                                        <div class="col-md-8"><input name="name" id="q_name" type="text" id="name" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="institution">Institution</label></div>
                                                                        <div class="col-md-8"><input name="institution" type="text" id="inst" class="form-control" value="" /></div>

                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="date">Date obtained</label></div>
                                                                        <div class="col-md-8"><input name="date" type="date" id="o_date" class="form-control" value="" /></div>
                                                                        <br><br>   


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
                                        <div id="qualification_delete" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Delete confirmation</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <div class="footer-col-inner">
                                                                <div class="form-group">  
                                                                    <input type="hidden" name="id" id="qq_id" value="" />
                                                                    <input type="hidden" name="page"  value="" />
                                                                    <div class="col-md-10"><label for="name">Are you sure you want to permanently delete this qualification?</label></div>

                                                                </div>
                                                            </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" onclick="deleteQualification()">Yes</button><button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div> 
                                        <div id="new_skill" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Add skill</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/createskills" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="userid"  value="<?php echo $user->id ?>" />
                                                                        <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
                                                                        <div class="col-md-3"><label for="name">Skill name</label></div>
                                                                        <div class="col-md-8"><input name="skill" type="text" id="skill" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="rating">Rating</label></div>
                                                                        <div class="col-md-8">
                                                                            <select name="rating" type="text" id="rating" class="form-control">
                                                                                <option></option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>

                                                                        <br><br>  


                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>                            
                                        <div id="edit_skill" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Edit skill</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/edit_skill" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="id"  id="sid" value="" />
                                                                        <input type="hidden" name="page"  value="" />
                                                                        <div class="col-md-3"><label for="name">Skill name</label></div>
                                                                        <div class="col-md-8"><input name="skill" type="text" id="sskill" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="rating">Rating</label></div>
                                                                        <div class="col-md-8">
                                                                            <select name="rating" type="text" id="rrating" class="form-control">
                                                                                <option></option>
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                            </select>
                                                                        </div>

                                                                        <br><br>  


                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>  
                                        <div id="skill_delete" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Delete confirmation</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <div class="footer-col-inner">
                                                                <div class="form-group">  
                                                                    <input type="hidden" name="id" id="ss_id" value="" />
                                                                    <input type="hidden" name="page"  value="" />
                                                                    <div class="col-md-10"><label for="name">Are you sure you want to permanently delete this skill?</label></div>

                                                                </div>
                                                            </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" onclick="deleteSkill()">Yes</button><button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div> 
                                        <div id="new_history" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Add work experience</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/add_workhistory" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="userid"  value="<?php echo $user->id ?>" />
                                                                        <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
                                                                        <div class="col-md-3"><label for="name">Employer</label></div>
                                                                        <div class="col-md-8"><input name="employer" type="text" id="employer" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="contact">Contact no.</label></div>
                                                                        <div class="col-md-8"><input name="contact" type="text" id="contact" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="title">Job title</label></div>
                                                                        <div class="col-md-8"><input name="title" type="text" id="title" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="description">Job description</label></div>
                                                                        <div class="col-md-8"><textarea name="description" type="text" id="description" class="form-control" value="" ></textarea></div>
                                                                        <br><br><br>
                                                                        <div class="col-md-3"><label for="name">Date</label></div>
                                                                        <div class="col-md-8"><input name="date" type="date" id="date" class="form-control" value="" /></div>
                                                                        <br><br

                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div> 
                                       </div>
                                        <div id="edit_history" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Edit work experience</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <form action="/havanayouth/edit_workhistory" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="id"  id="hid" value="" />
                                                                        <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
                                                                        <div class="col-md-3"><label for="name">Employer</label></div>
                                                                        <div class="col-md-8"><input name="employer" type="text" id="emp" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="contact">Contact no.</label></div>
                                                                        <div class="col-md-8"><input name="contact" type="text" id="cont" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="title">Job title</label></div>
                                                                        <div class="col-md-8"><input name="title" type="text" id="ttitle" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="description">Job description</label></div>
                                                                        <div class="col-md-8"><textarea name="description" type="text" id="desc" class="form-control" value="" ></textarea></div>
                                                                        <br><br><br>
                                                                        <div class="col-md-3"><label for="name">Date</label></div>
                                                                        <div class="col-md-8"><input name="date" type="date" id="hdate" class="form-control" value="" /></div>
                                                                        <br><br

                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                </div>
                                        
                                         <div id="delete_history" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Delete confirmation</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            <div class="footer-col-inner">
                                                                <div class="form-group">  
                                                                    <input type="hidden" name="id" id="hh_id" value="" />
                                                                    <input type="hidden" name="page"  value="" />
                                                                    <div class="col-md-10"><label for="name">Are you sure you want to permanently delete this work experience?</label></div>

                                                                </div>
                                                            </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" onclick="deleteHistory()">Yes</button><button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        </form>
                                                    </div>
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
                                                                        <input type="hidden" name="page"  value="yprofile" />
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
                                                                         <input type="hidden" name="page"  value="yprofile" />
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
                                        <div class="tab-pane fade" id="dropdown4">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-6 col-xs-12">
                                                    <div class="well with-header">
                                                        <div class="header bordered-blue">Update Your Skills</div>
                                                        <div>
                                                            <form action="/havanayouth/createskills" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="userid"  value="<?php echo $user->id ?>" />
                                                                        <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
                                                                        <label for="exp">Skills</label>
                                                                        <input name="skill" type="text" id="mobile" class="form-control" value="" placeholder="Enter a skill here" /><br>
                                                                        <label for="exp">Rating</label>
                                                                        <input name="rating" type="text" id="tel" class="form-control" value="" placeholder="Enter a rating here" /><br>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary">Validate &amp; Submit</button>
                                                                    </div>
                                                                </div><!--//footer-col-inner-->
                                                            </form>

                                                        </div> <!-- /content -->
                                                    </div><!--//row-->
                                                </div>
                                                <div class="footer-col col-md-7 col-sm-8 newsletter">
                                                    <div class="well with-header">
                                                        <div class="header bordered-blue">Your current skills</div>
<?php if (isset($skills)) : foreach ($skills as $row) : ?>    
                                                                <h0><strong>Skill: </strong><?php echo $row->skill; ?></h0>&nbsp;&nbsp;&nbsp;
                                                                <h0><strong>Rating: </strong><?php echo $row->rating; ?></h0></br>
                                                                <p><?php echo anchor("/delete/$row->id/skills/profile", '<span class="btn btn-danger btn-xs"><i class="fa fa-trash" style="color:white"></i>delete skill</span>') ?></p> </br></br>
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <h6>No records </h6>
<?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                            <input type="hidden" name="page"  value="<?php echo "yprofile" ?>" />
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
                                        <div class="tab-pane fade" id="dropdown9">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-6 col-xs-12">
                                                    <div class="well with-header">
                                                        <div class="header bordered-blue">Update Your Residential Details</div>
                                                        <div>
                                                            <form action="/havanayouth/createaddress" method="post" accept-charset="utf-8">	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">
                                                                            <?php if (isset($address)) : ?>  
                                                                            <input type="hidden" name="id"  value="<?php echo $user->id ?>" />
                                                                            <label for="firstname">Erf</label>
                                                                            <input name="erf" type="text" class="form-control" value="<?php echo $address->erf ?>" /><br>
                                                                            <label for="lastname">Street</label>
                                                                            <input name="street" type="text"  class="form-control" value="<?php echo $address->street ?>" /><br>
                                                                            <label for="exp">Suburb</label>
                                                                            <input name="suburb" type="text"  class="form-control" value="<?php echo $address->suburb ?>" /><br>
                                                                            <label for="exp">City</label>
                                                                            <input name="city" type="text"  class="form-control" value="<?php echo $address->city ?>" /><br>
                                                                            <label for="exp">Region</label>
                                                                            <input name="region" type="text"  class="form-control" value="<?php echo $address->region ?>" /><br>
                                                                            <?php else : ?>
                                                                            <h6>No records </h6>
                                                                            <?php endif; ?>
                                                                        <br>
                                                                        <button type="submit" class="btn btn-primary">Update Details</button>
                                                                    </div>
                                                                </div><!--//footer-col-inner-->
                                                            </form>

                                                        </div> <!-- /content -->
                                                    </div><!--//row-->
                                                </div>
                                                <div class="footer-col col-md-7 col-sm-8 newsletter">
                                                    <div class="well with-header">
                                                        <div class="header bordered-blue">Address Details</div>
<?php if (isset($address)) : ?>    
                                                            <h0><strong>Erf #: </strong><?php echo $address->erf ?></h0></br></br>
                                                            <h0><strong>Street: </strong><?php echo $address->street ?></h0></br></br>
                                                            <h0><strong>Suburb: </strong><?php echo $address->suburb ?></h0></br></br>
                                                            <h0><strong>City: </strong><?php echo $address->city ?></h0></br></br>
                                                            <h0><strong>Region: </strong><?php echo $address->region ?></h0></br></br>
                                                        <?php else : ?>
                                                            <h6>No records </h6>
<?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                        <div id="changeusername" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title  bordered-blue" id="myModalLabel2"><strong>Change username</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left:5px; margin-right: 5px">
                                                            	
                                                                <div class="footer-col-inner">
                                                                    <div class="form-group">  
                                                                        <input type="hidden" name="id"  id="user_id1" value="<?php echo $user->id?>" />
                                                                        <input type="hidden" name=""  id="pwd_c" value="<?php echo $user->password?>" />
                                                                        <input type="hidden" name="page"  value="yprofile" />
                                                                        <div class="col-md-3"><label for="name">Current username</label></div>
                                                                        <div class="col-md-8"><input name="currentusername" type="text" id="currentusername" class="form-control" value="<?php echo $user->username?>" readonly/></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="name">New username</label></div>
                                                                        <div class="col-md-8"><input name="newusername" type="text" id="newusername" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="name">Password</label></div>
                                                                        <div class="col-md-8"><input name="pwd_u" type="password" id="pwd_u" class="form-control" value="" /></div>
                                                                        <br><br>
                                                                        <div class="col-md-3"><label for="name"></label></div>
                                                                        <div class="col-md-8"> <label id="msg1" style="color:red"></label></div>
                                                                        <br><br>
                                                                       
                                                                    </div>
                                                                </div><!--//footer-col-inner-->

                                                        </div>           
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" onclick="changeUsername()">Save</button><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                       
                                                    </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
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
    function fill_qual_edit(id, inst, date, qname) {
        $("#q_id").val(id);
        $("#inst").val(inst);
        $("#o_date").val(date);
        $("#q_name").val(qname);

    }
    function fill_skill_edit(id,skill, rating ) {
        $("#hid").val(id);
        $("#sskill").val(skill);
        $("#rrating").val(rating);
    }
    function fill_history_edit(id,emp, cont, title, desc, date) {


        $("#hid").val(id);
        $("#emp").val(emp);
        $("#cont").val(cont);
        $("#ttitle").val(title);
        $("#desc").val(desc);
        $("#hdate").val(date);
    }
    function getSkillID(id) {
        $("#ss_id").val(id);
    }

    function getQualificationID(id) {
        $("#qq_id").val(id);
    }

    function deleteQualification() {
        var id = $("#qq_id").val();
        location.href = "/havanayouth/delete/" + id + "/qualifications/yprofile";
    }

    function deleteSkill() {
        var id = $("#ss_id").val();
        location.href = "/havanayouth/delete/" + id + "/skills/yprofile";
    }
    function setHistoryId(id){
        $("#hh_id").val(id);
    }
    function deleteHistory(){
        var id = $("#hh_id").val();
        location.href = "/havanayouth/delete/" + id + "/work_history/yprofile";
    }

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
                   location.href = "/havanayouth/changepassword/" + id + "/yprofile/"+new_pass;
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
    function changeUsername(){
        var id = $("#user_id1").val();
        var username = $("#newusername").val();
        var current_pas = $("#pwd_c").val();
        var typed_pass = $("#pwd_u").val();

        if(username != ""){
            if(typed_pass != ""){
                if(typed_pass == current_pas){
                    alert("Username succesfully changed. You will be logged out so you can login with your new username.");
                    location.href = "/havanayouth/changeusername/" + id + "/yprofile/"+username;

                    $("#msg1").text("");

                }else  if(typed_pass != current_pas){
                    $("#msg1").text("Incorrect password! Please try again.");
                    $("#pwd_u").val("");
                }
            }else{
                 $("#msg1").text("Enter password");
            }

        }else{
            $("#msg1").text("Enter new username");

        }


    }

        </script>


    </body>
</html>