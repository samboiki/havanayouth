<?php if (!defined('BASEPATH')) die();
class Nmrc extends Main_Controller {
    public $user = "";
    public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
	}
    public function index(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('index');
   }
   
   public function uimodals(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('uimodals');
   }
   public function tester() {
       $this->load->helper('date');
       $time = now();
       echo $time;
   }
   
   public function edit_rating(){
       $this->load->model('crud');
                    $ratingdata = array(
                                  
                                    'comment' => $this->input->post('comment'),
                                    'rating' => $this->input->post('rate'),
                                   
                                  
                                   
                    );
                   $rateID = $this->input->post('id');
                    $this->crud->edit_rate($ratingdata,$rateID); 
                    redirect('vacancy');
       
   }
   
   public function edit_vacancy(){
       $this->load->model('crud');
                    $vacancydata = array(
                                  
                                    'type' => $this->input->post('type'),
                                    'location' => $this->input->post('location'),
                                    'description' => $this->input->post('description'),
                                    'date' => $this->input->post('date'),
                                  
                                   
                    );
                   $UsID = $this->input->post('id');
                    $this->crud->edit_vacancy($vacancydata,$UsID); 
                    redirect('vacancy');
   }
  public function edit_rprofile(){
       $this->load->model('crud');
                    $vacancydata = array(
                                  
                                    'type' => $this->input->post('type'),
                                    'location' => $this->input->post('location'),
                                    'description' => $this->input->post('description'),
                                    'date' => $this->input->post('date'),
                                  
                                   
                    );
                   $UsID = $this->input->post('id');
                    $this->crud->edit_vacancy($vacancydata,$UsID); 
                     echo '<script>alert("Updated successful");
                window.location = "/havanayouth/vacancy";
                </script>';
                   
   }

   public function post_vacancy(){
       
       $this->load->model('crud');
                    $vacancydata = array(
                                  
                                    'type' => $this->input->post('type'),
                                    'location' => $this->input->post('location'),
                                    'description' => $this->input->post('description'),
                                    'date' => $this->input->post('date'),
                                    'userid' => $this->input->post('id'),
                                   
                    );
                    
                    $this->crud->add_vacancy($vacancydata); 
                     echo '<script>alert("Vacancy posted successful");
                window.location = "/havanayouth/vacancy";
                </script>';
                  
            
   }
   
   public function signin_validation(){
           $this->load->library('form_validation');
           $this->load->library('facebook');
      $user = $this->facebook->getUser();
      if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fbsignin'), 
                'scope' => array("email") // permissions here
            ));
           // var_dump($data['login_url']);
            } catch (FacebookApiException $e) {
                $user = null;
            }
            $this->load->view('signin',$data);
        }
     
         else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fbsignin'), 
                'scope' => array("email") // permissions here
            ));
           // var_dump($data['login_url']);
        }
           $this->load->library('session');
           $this->form_validation->set_rules('username','Username','required|trim|xxs_clean|callback_validate_credentials');           
           $this->form_validation->set_rules('password','Password','required|md5|trim');
            
        if ($this->form_validation->run()){
                $username = $this->input->post('username');
                
                $id_of_user = $this->crud->get_new_user_id($username);
                $userid = $id_of_user['id'];
                //get role
                    $rowarray = $this->crud->get_role($userid);
                    $role = $rowarray['role'];
                    
                    //create session variables
                    $data = array(
                        'username' => $this->input->post('username'),
                        'logged_in' => 1,
                        'role' => $role
                    );
                    
                    //set the session
                    $this->session->set_userdata($data);
                    
                    //redirect user to appropriate page 
                    if($role == 'employer'){
                         redirect('rprofile');
                         
                    } elseif ($role == 'youth') {
                         redirect('yprofile');
                    }
                    else {
                         redirect('aprofile');
                    }
                
            } else {
                $this->load->helper('form');
                $this->load->view('signin_validation',$data); 
                }
        } 
   
        public function signup_validationtest() {
            $signupdata = array(
                                            
                                            
                                            'type' => $this->input->post('type'),
                                            'location' => $this->input->post('location'),
                'description' => $this->input->post('description'),
                'date' => $this->input->post('date'),
                'user_id' => $this->input->post('id'),
                
                                            
                            );
                            var_dump($signupdata);
           // $role = $this->input->post('role');
            //echo $role;
        }
        
   public function signup_validation() {
       $this->load->library('form_validation');
       $this->load->helper('date');
        //runnning backend form validation to sanitize the data
        $this->form_validation->set_rules('email','Email','trim|xxs_clean|is_unique[contact.email]');
        $this->form_validation->set_rules('password','Password','trim');
        $this->form_validation->set_rules('role','Role','trim|xxs_clean');
        $this->form_validation->set_rules('firstname','Firstname','trim|xxs_clean');
        $this->form_validation->set_rules('lastname','Lastname','trim|xxs_clean');
        $this->form_validation->set_rules('username','Username','trim|xxs_clean|is_unique[user.username]'); 
        $this->form_validation->set_rules('number','Number','trim|xxs_clean');
            //if validation runs successfully insert the data
            if ($this->form_validation->run()){
                    $this->load->model('crud');
                    $signupdata = array(
                                    'last_modified' => now(),
                                    'firstname' => $this->input->post('firstname'),
                                    'lastname' => $this->input->post('lastname'),
                                    'username' => $this->input->post('username'),
                                    'password' => $this->input->post('password'),
                                    'role' => $this->input->post('role'),
                                    'cellphone' => $this->input->post('number')
                    );
                    
                    $this->crud->add_users($signupdata);
                    
                    //getting current id of recently inserted user
                    $username = $this->input->post('username');
                    
                    //using the posted username to compare the latest of the one in the DB as 
                    //its a unique one so that i can get that users id which will be added in the contact table crud is 
                    //model name, get_new_user_id is funtion name in that model and im passing the username value and i store the returned row of that function 
                    //in $id_of_added_user and will get the id value only and and store to $userid which will be used as foreign key in contact table
                    $id_of_added_user = $this->crud->get_new_user_id($username);
                    $userid = $id_of_added_user['id'];
                    
                    $signupdatacontact = array(
                                    'mobile_phone' => $this->input->post('number'),
                                    'email' => $this->input->post('email'),
                                    'userid' => $userid,
                    );
                    
                    // invoking add_userscontact() method to add the user
                    $this->crud->add_userscontact($signupdatacontact);
                    
                    $dataid = array(
                                    'userid' => $userid,
                    );
                    
                       $this->crud->add_addresss($dataid);
                  
                    
                    // now im setting up session data
                    $data = array(
                        'username' => $this->input->post('username'),
                        'logged_in' => 1,
                        'role' => $this->input->post('role')
                    );
                    $this->session->set_userdata($data);
                    
                    //get role
                    $rowarray = $this->crud->get_role($userid);
                    $role = $rowarray['role'];
                    
                    if($role == 'employer'){
                         redirect('rprofile');
                         
                    } elseif ($role == 'youth') {
                         redirect('yprofile');
                    }
                    else {
                         redirect('aprofile');
                    }
                    
            }
            else {
                redirect();
            }
   }
   
   public function jobrequest(){
      
      $this->load->model('crud');
      $this->load->library('facebook');
      $this->load->library('session');
      if($this->session->userdata('logged_in')){
            
                    if($this->session->userdata('role') == "employer"){            
                    // var_dump($this->session->all_userdata());
                     $Username = $this->session->userdata('username');
                    
                     $data['user'] = $this->crud->get_user($Username);
                     $userid = $data['user']->id;
                     $data['contact'] = $this->crud->get_usercontacts($userid);
                     $data['users'] = $this->crud->get_users();
                     $data['vacancy']= $this->crud->get_vacancy($userid);
                    // echo $data['contact']->id;
                     $this->load->helper('form');
                     $this->load->helper('url');
                     $requestorid = $this->uri->segment(3);
                     $youthid = $this->uri->segment(2);
                     $this->session->set_userdata('youthid', $youthid);
                     $this->session->set_userdata('requestorid', $requestorid);
                     //echo $youthid;
                     //$this->load->view('jobrequest',$data);
                     //var_dump($data['requestorid']);
                    // $this->jobrequests($data);
                     redirect('jobrequests');
                     }
                else {
                redirect('restricted'); 
                }
            } else {
                redirect('restricted');
            } 
   }
   public function jobrequests(){
     $this->load->library('session');
     $userid = $this->session->userdata('requestorid');
     $youthid = $this->session->userdata('youthid');
     
     $data['youthuser'] = $this->crud->get_youthid($youthid);
     $data['youthcontact'] = $this->crud->get_usercontacts($youthid);
     $data['employercontact'] = $this->crud->get_usercontacts($userid);
     
     $Username = $this->session->userdata('username');
     $data['user'] = $this->crud->get_user($Username);
     
     $data['vacancy']= $this->crud->get_vacancy($userid);
     
    //var_dump($data);
     $this->load->view('jobrequest',$data);
   }
   
   public function jobrequested(){
      $this->load->model('crud');
      $this->load->library('facebook');
      $this->load->library('session');
      $this->load->helper('date');
      if($this->session->userdata('logged_in')){
            if($this->session->userdata('role') == "employer"){  
                $youthid = $this->session->userdata('youthid');
                $userid = $this->session->userdata('requestorid');
                
                $data['youthcontact'] = $this->input->post('youthcontact');
                $data['employercontact'] = $this->input->post('employercontact');
                $data['employername'] = $this->input->post('employername');
                $data['youthname'] = $this->input->post('youthname');
                $data['vacancy'] = $this->input->post('vacancy');
                $vacid = $data['vacancy'];
                echo $vacid;
                $vdes = $this->crud->getvac_des($vacid);
                $vdesc = $vdes->Description;
                $to = $data['youthcontact'];
                $message = "Hi ".$data['youthname'].", Havana Youth Jobs here. You got a Job request message from ".$data['employername'].
                " and it reads as follow: ".$vdesc." .Please contact him on ".$data['employercontact']." ASAP";
               
                
                $jobs = array(
                                            'last_modified' => now(),
                                            'employerid' => $userid,
                                            'youthid' => $youthid,
                                            'vacancyid' => $vacid,
                                            'status' => 0,
                                            'message' => $message
                            );
                //adding jobs to database 
                $this->crud->add_jobs($jobs);
              //var_dump($jobs);
                echo $message;
                
                $sms['to'] = $to;
                $sms['message'] = $message;
               
                $this->load->view('test',$sms);
             }
            else {
            redirect('restricted'); 
            }
        } else {
            redirect('restricted');
        } 
   }
   
   
    public function validate_credentials(){
            $this->load->library('form_validation');
            $this->load->model('crud');
            if($this->crud->can_log_in()){
               return true;
            } else {
                
                $this->form_validation->set_message('validate_credentials','incorrect username/password');
                return false;
            }
    }  
     
    //function to delete a specific row in table
    function delete_files(){  
        $item = $this->uri->segment(3);
        unlink('./images/'.$item);
        $this->crud->delete_image();
        redirect('yprofile');
    }
    
     public function delete(){
       $this->load->model('crud');
       $table = $this->uri->segment(3); 
       $page  = $this->uri->segment(4);
       $this->crud->delete_row($table);
       redirect($page);
    }
   
   //youth profile function , loads the required libraries , and view, gets data from db and passes it to view
    public function yprofile(){
        //loading required libraries and model
        $this->load->library('facebook');
        $this->load->library('session');
        $this->load->model('crud');
        
        //check to see if user is logged in else redirect to restricted page
            if($this->session->userdata('logged_in')){
            
                if($this->session->userdata('role') == "youth"){                  
                    // var_dump($this->session->all_userdata());
                     $username = $this->session->userdata('username');
                
                     $data['user'] = $this->crud->get_user($username);
                     $userid = $data['user']->id;
                     $data['contact'] = $this->crud->get_usercontacts($userid);
                     $data['skills'] = $this->crud->get_skills($userid);
                     $data['address'] = $this->crud->get_address($userid);
                     $data['qualifications']= $this->crud->get_qualifications($userid);
                     //$data['workhistory']= $this->crud->get_workhistory($userid);
                     $data['img'] = $this->crud->get_proimg($userid);
                     //$img = $data['img'];
                    // var_dump($img);
                     $this->load->helper('form');
                     $this->load->helper('url');
                     $this->load->view('yprofile',$data);
                }
                else {
                    echo "because of youth";
                redirect('restricted'); 
                }
            } else {
                redirect('signin');;
            }
    }
    
    public function rprofile(){
    //loading required libraries and model
        $this->load->library('facebook');
        $this->load->library('session');
        $this->load->model('crud');
        
        //check to see if user is logged in else redirect to restricted page
            if($this->session->userdata('logged_in')){
            
                    if($this->session->userdata('role') == "employer"){            
                    // var_dump($this->session->all_userdata());
                     $username = $this->session->userdata('username');

                     $data['user'] = $this->crud->get_user($username);
                     $userid = $data['user']->id;
                     $data['contact'] = $this->crud->get_usercontacts($userid);
                      $data['img'] = $this->crud->get_proimg($userid);
                    // echo $data['contact']->id;
                     $this->load->helper('form');
                     $this->load->helper('url');
                     $this->load->view('rprofile',$data);
                     }
                else {
                redirect('restricted'); 
                }
            } else {
                redirect('restricted');
            } 
    }
    
  
   
    public function header(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('include/header',$data);
    }
   
    public function signin(){
      $this->load->library('facebook');
      $user = $this->facebook->getUser();
      if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fbsignin'), 
                'scope' => array("email") // permissions here
            ));
           // var_dump($data['login_url']);
            } catch (FacebookApiException $e) {
                $user = null;
            }
            $this->load->view('signin',$data);
        }
     
         else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fbsignin'), 
                'scope' => array("email") // permissions here
            ));
           // var_dump($data['login_url']);
             $this->load->helper('form');
             $this->load->helper('url');
             $this->load->view('signin',$data);
        }
            
   }
   
    public function signup(){
      $this->load->library('facebook');
      $user = $this->facebook->getUser();
      if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }
      if ($user) {
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('yprofile'), 
                'scope' => array("email") // permissions here
            ));
        }
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('signup',$data);
   }
   
   public function fbsignupa(){
       $this->load->view('fbsignupform');
   }
   public function fbconnect(){
       $this->load->model('crud');
                $this->load->library('facebook');
                $user = $this->facebook->getUser();
                if ($user) {
                           try {
                               $data['user_profile'] = $this->facebook->api('/me');
                               $data['fbid'] = $data['user_profile']['id'];
                           } catch (FacebookApiException $e) {
                               $user = null;
                           }
                           $this->load->helper('url');
                           $this->load->view('fbconnect',$data);
                
                }
       
                          //  var_dump($fbconnectdata);
   
      //   echo $fbid;
      
   }
   
   public function fbconnection(){
       $this->load->model('crud');
       $this->load->library('form_validation');
       $fbid = $this->input->post('fbid');
       $this->form_validation->set_rules('cellphone','Cellphone','required|trim|xxs_clean|callback_validate_credentials');           
       $this->form_validation->set_rules('password','Password','required|md5|trim');
            
        if ($this->form_validation->run()){
            $fbdata = array(        
                                
                                'fbid' => $this->input->post('fbid')
                            );
                          $cellphone = $this->input->post('cellphone');  
                          $this->crud->insertfbid($fbdata,$cellphone);
                          
                          $dataf['fbuser'] = $this->crud->get_userbyfb($fbid);
                          $role = $dataf['fbuser']->role;
                       
                          $data = array(
                               'cellphone' => $cellphone,
                               'logged_in' => 1,
                               'role' => $role
                           );
                          
                                //set the session
                         $this->session->set_userdata($data);

                         //redirect user to appropriate page 
                         if($role == 'employer'){
                            //echo "emp";
                            redirect('rprofile');

                         } elseif ($role == 'youth') {
                             //echo "youth";
                             redirect('yprofile');
                         }
                         else {
                             redirect('aprofile');
                         }
        }
        else {
           
                $this->load->helper('form');
                $this->load->library('facebook');
                $user = $this->facebook->getUser();
                if ($user) {
                           try {
                               $data['user_profile'] = $this->facebook->api('/me');
                               $data['fbid'] = $data['user_profile']['id'];
                           } catch (FacebookApiException $e) {
                               $user = null;
                           }
                           $this->load->helper('url');
                           $this->load->view('fbconnection',$data);
                }
                }
       
                          //  var_dump($fbconnectdata);
   
      //   echo $fbid;
   }
   
   public function fbsignin(){
       $this->load->library('facebook');
           $user = $this->facebook->getUser();
          
            if ($user) {
                  try {
                      $data['user_profile'] = $this->facebook->api('/me');
                  } catch (FacebookApiException $e) {
                      $user = null;
                  }
                // echo var_dump($datas);
        
        
                        //--------------------------------------------------------------------------------------//
                                        //getting current id of user loging in using their fb id
                                        $fbid = $data['user_profile']['id'];
                                        //$id_of_login_user = $this->crud->get_new_user_fbid($fbid);
                                        //$userid = $id_of_login_user['id'];
                        //--------------------------------------------------------------------------------------//
         if($this->crud->get_userbyfb($fbid)){
            
            $dataf['fbuser'] = $this->crud->get_userbyfb($fbid);
            $role = $dataf['fbuser']->role;
            $cellphone = $dataf['fbuser']->cellphone;
  
         } 
         else {  redirect('fbconnect');}
         
         $data = array(
                        'cellphone' => $cellphone,
                        'logged_in' => 1,
                        'role' => $role
                    );
                          
                    //set the session
                    $this->session->set_userdata($data);
                    
                    //redirect user to appropriate page 
                    if($role == 'employer'){
                       //echo "emp";
                       redirect('rprofile');
                         
                    } elseif ($role == 'youth') {
                        //echo "youth";
                        redirect('yprofile');
                    }
                    else {
                        redirect('aprofile');
                    }
   }
        else {       redirect('signin');}
   }
   public function fbcheck(){
       $this->load->library('facebook');
       $user = $this->facebook->getUser();
                            if ($user) {
                                 try {
                                     $token = $this->facebook->getAccessToken();
                                     $data['user_profile'] = $this->facebook->api('/me/');
                                 } catch (FacebookApiException $e) {
                                     $user = null; }
                                 $token = $this->facebook->getAccessToken();
                              }
var_dump($data);
   }
   
   public function fbsignup(){
       //loading my models
       $this->load->helper('file');
       $this->load->library('facebook');
       $this->load->library('form_validation');
       $this->load->helper('date');
       //--------------------------------------------------------------------------------------//
        //runnning backend form validation to sanitize the data 
       $this->form_validation->set_rules('number','Number','trim|xxs_clean|is_unique[user.cellphone]');
       $this->form_validation->set_rules('password','Password','trim');
       $this->form_validation->set_rules('role','Role','trim|xxs_clean');
      
       if ($this->form_validation->run()){
                    $this->load->model('crud');
                        //--------------------------------------------------------------------------------------//
                        //getting facebook user access tokens and their profile details so i store those in the database 
                            $user = $this->facebook->getUser();
                            if ($user) {
                                 try {
                                     $token = $this->facebook->getAccessToken();
                                     $data['user_profile'] = $this->facebook->api('/me');
                                 } catch (FacebookApiException $e) {
                                     $user = null; }
                                 $token = $this->facebook->getAccessToken();
                             }   else { $this->facebook->destroySession();}

                             //get profile details of user from fb        
                             $fbid = $data['user_profile']['id'];
                             $firstname = $data['user_profile']['first_name'];
                             $lastname = $data['user_profile']['last_name'];
                             $gender = $data['user_profile']['gender'];
                             //$email = $data['user_profile']['email'];
                        //--------------------------------------------------------------------------------------//
                            //--------------------------------------------------------------------------------------//
                            $signupdata = array(
                                            'last_modified' => now(),
                                            'firstname' => $firstname,
                                            'lastname' => $lastname,
                                            'fbid' => $fbid,
                                            'gender' => $gender,
                                            'cellphone' => $this->input->post('number'),
                                            'password' => $this->input->post('password'),
                                            'role' => $this->input->post('role')
                            );
                            //adding sign up to database 
                            $this->crud->add_users($signupdata);
                            //--------------------------------------------------------------------------------------//
                                            //getting current id of recently inserted user
                                            $number = $this->input->post('number');
                                            $id_of_added_user = $this->crud->get_new_user_id($number);
                                            $userid = $id_of_added_user['id'];
                            //--------------------------------------------------------------------------------------//
                            //inserting init data in contacts table
                            $signupdatacontact = array(
                                            'mobile_phone' => $this->input->post('number'),
                                            'userid' => $userid,
                            );
                             // invoking add_userscontact() method to add the user
                            $this->crud->add_userscontact($signupdatacontact);
                    //--------------------------------------------------------------------------------------//
                            //initialising the address table for a registering user
                            $dataid = array(
                                            'userid' => $userid,
                            );
                           // if($this->input->post('role')=="youth"){
                               $this->crud->add_addresss($dataid);
                          //  }
                    //--------------------------------------------------------------------------------------//
                            // adding image of user to database so when the log in next time it will automaticly pull from the db
                            $pic = file_get_contents("https://graph.facebook.com/".$fbid."/picture?type=large");
                            $file = "images". DIRECTORY_SEPARATOR . $lastname.".jpg"; 
                            $fp = fopen($file, "w");
                            fwrite($fp, $pic);
                            fclose($fp);

                                $path= base_url().$file;
                                $title = $lastname.".jpg";  
                                $dataimg = array(
                                            'path' => $path,
                                            'title' => $title,
                                            'userid' => $userid,
                                );
                                $this->crud->insertprofileimg($dataimg);
                    //-------------------------------------------------------------------------------------//
                            // now im setting up session data
                    $data = array(
                        'cellphone' => $this->input->post('number'),
                        'logged_in' => 1,
                        'role' => $this->input->post('role')
                    );
                    $this->session->set_userdata($data);
                    
                    //get role
                    $rowarray = $this->crud->get_role($userid);
                    $role = $rowarray['role'];
                    
                    if($role == 'employer'){
                         redirect('rprofile');
                         
                    } elseif ($role == 'youth') {
                         redirect('yprofile');
                    }
                    else {
                         redirect('aprofile');
                    }
       }
       else {
           redirect();
       }
   }
   
   public function login(){
                $this->load->helper('file');
		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));
	$user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null; }
            $token = $this->facebook->getAccessToken();
        }   else { $this->facebook->destroySession();}

        if ($user) {
            $data['logout_url'] = site_url('logout'); // Logs off application
          //  $data['logout_url'] = $this->facebook->getLogoutUrl();// Logs off FB!
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login'), 
                'scope' => array("email") // permissions here
            ));
        }
         $perm = $data['user_profile'];
        $picc = $data['user_profile']['id'];
        // $pic = file_get_contents("https://graph.facebook.com/".$picc."/picture?type=large");
         $file = "images". DIRECTORY_SEPARATOR . "sam.jpg"; 
         //$fp = fopen($file, "w");
        // fwrite($fp, $pic);
        // fclose($fp);
         var_dump($picc);
         //$this->load->view('login',$data);
	}
   
   public function test(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('test');
        }
    
    public function calendar(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('calendar');
    }
      public function termsyouth(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('termsyouth');
    }
    
     public function termsemployer(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('termsemployer');
    }
    
    public function statistics(){
     
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('statistics');
    }
    
    
    public function vacancy(){
      //loading required libraries and model
        $this->load->library('facebook');
        $this->load->library('session');
        $this->load->model('crud');
        
        //check to see if user is logged in else redirect to restricted page
            if($this->session->userdata('logged_in')){
            
                    if($this->session->userdata('role') == "employer"){            
                    // var_dump($this->session->all_userdata());
                     $Username = $this->session->userdata('username');

                     $data['user'] = $this->crud->get_user($Username);
                     $userid = $data['user']->id;
                     $data['contact'] = $this->crud->get_usercontacts($userid);
                     $data['vacancy']= $this->crud->get_vacancy($userid);
                     $data['rating']= $this->crud->get_rating($userid);
                    // echo $data['contact']->id;
                     $this->load->helper('form');
                     $this->load->helper('url');
                     $this->load->view('Vacancy',$data);
                     }
                else {
                redirect('restricted'); 
                }
            } else {
                redirect('restricted');
            } 
    }
     public function notifications(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('notifications');
    }
     public function registration(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('registration');
    }
    public function youthsearch(){
      $this->load->model('crud');
      $this->load->library('facebook');
      $this->load->library('session');
      if($this->session->userdata('logged_in')){
            
                    if($this->session->userdata('role') == "employer"){            
                    // var_dump($this->session->all_userdata());
                     $Username = $this->session->userdata('username');

                     $data['user'] = $this->crud->get_user($Username);
                     $userid = $data['user']->id;
                     $data['contact'] = $this->crud->get_usercontacts($userid);
                     $data['users'] = $this->crud->get_users();
                     $data['vacancy']= $this->crud->get_vacancy($userid);
                    // echo $data['contact']->id;
                     $this->load->helper('form');
                     $this->load->helper('url');
                     $this->load->view('youthsearch',$data);
                     }
                else {
                redirect('restricted'); 
                }
            } else {
                redirect('restricted');
            } 
    }

    public function aprofile(){
    //loading required libraries and model
        $this->load->library('facebook');
        $this->load->library('session');
        $this->load->model('crud');
        
        //check to see if user is logged in else redirect to restricted page
        //    if($this->session->userdata('logged_in')){
            
                  //  if($this->session->userdata('role') == "admin"){            
                    // var_dump($this->session->all_userdata());
                     $username = $this->session->userdata('username');

                     $data['user'] = $this->crud->get_user($username);
                     $userid = $data['user']->id;
                     $data['contact'] = $this->crud->get_usercontacts($userid);
                    // echo $data['contact']->id;
                     $this->load->helper('form');
                     $this->load->helper('url');
                     $this->load->view('aprofile',$data);
            //         }
              //  else {
             //   redirect('restricted'); 
            //    }
         //   } else {
          //      redirect('restricted');
         //   }    
    }

    public function fblogout(){
        $this->load->library('facebook');
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
        redirect('signin');
    }
    public function restricted(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('restricted');
    }
    
    public function error(){
        $this->load->library('facebook');
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
        redirect('signin');
    }
    
    public function createcontacts(){
       $this->load->model('crud');
       $id = $this->input->post('id');
      
       $data = array(
           'mobile_phone' => $this->input->post('mobile'),
           'telephone' => $this->input->post('tel'),
           'fax' => $this->input->post('fax'),
           'email' => $this->input->post('email'),);
       $this->crud->add_contactsinfo($data,$id);    
       redirect('yprofile');
   } 
   
   public function createperson(){
       $this->load->model('crud');
       $id = $this->input->post('id');
       $page = $this->input->post('page');
       $data = array(
           'firstname' => $this->input->post('firstname'),
           'lastname' => $this->input->post('lastname'),
           'gender' => $this->input->post('gender'),
           'birth_date' => $this->input->post('birth_date'),);
       var_dump($data);
       $this->crud->add_personinfo($data,$id);    
       redirect($page);
   } 
   
   public function createaddress(){
       $this->load->model('crud');
       $id = $this->input->post('id');
      
       $data = array(
           'erf' => $this->input->post('erf'),
           'street' => $this->input->post('street'),
           'suburb' => $this->input->post('suburb'),
           'city' => $this->input->post('city'),
           'country' => $this->input->post('country'),
           'region' => $this->input->post('region'),);
      
       $this->crud->add_address($data,$id);    
       redirect('yprofile');
   } 
   
   public function uploadimg() {
      $this->load->helper('download');
      $this->load->helper('array');
      $this->load->helper('directory');
      $this->load->helper('url');
       $config['upload_path']= "./images/";
       $config['allowed_types']='*';
       $config['max_size']  = 100;
       $this->load->library('upload',$config);
       
       if( !$this->upload->do_upload()){
           $error = array('error' =>  $this->upload->display_errors());
           
           echo 'couldnt upload';
           var_dump($error);
       } else {
           $file = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image']	= './images/'.$file['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
              //  $config['width']	= 1023;
              //  $config['height']	= 326;
                $this->load->library('image_lib', $config); 
             
                
           $path= base_url().'/images/'.$file['file_name'];
           $title = $file['file_name'];
           
           $dataimg = array(
           'userid' => $this->input->post('id'),
           'path' => $path,
           'title' => $title,);
           
           $this->crud->insertprofileimg($dataimg);
           redirect('yprofile');
          // var_dump($file);
       }
   } 
   
   public function createskills(){
       $this->load->model('crud');
      
       $data = array(
           'userid' => $this->input->post('userid'),
           'skill' => $this->input->post('skill'),
           'rating' => $this->input->post('rating'),);
       
       $this->crud->add_skills($data);    
       redirect('yprofile');
   } 
    
   public function logout(){
        $this->session->sess_destroy();
        $this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
        redirect('index.php');
    }
    
   public function addQualification() {
        $this->load->model('crud');
        $data = array(
            'userid' => $this->input->post('id'),
            'name'   => $this->input->post('name'),
            'institution' => $this->input->post('institution'),
            'date'        => $this->input->post('date'),
        );
        $this->crud->add_qualification($data);
        redirect('yprofile');
    }
    
   public function edit_qualification(){
       $this->load->model('crud');
       $id = $this->input->post('id');
       
       $data = array(
           'name' => $this->input->post('name'),
           'institution' =>$this->input->post('institution'),
           'date'        => $this->input->post('date'),
       );
       $this->crud->update_qualification($data, $id);
       redirect('yprofile');
    }
   
   public function edit_skill(){
      $this->load->model('crud');
      $id = $this->input->post('id');
      
      $data = array(
          'skill' => $this->input->post('skill'),
          'rating' => $this->input->post('rating'),
      );
      $this->crud->edit_skill($data, $id);
      redirect('yprofile');
              
   }
     
   public function add_workhistory() {
        $this->load->model('crud');
        
        $data = array(
            'userid' => $this->input->post('userid'),
            'employer'   => $this->input->post('employer'),
            'contact' => $this->input->post('contact'),
            'job_title' => $this->input->post('title'),
            'job_description' => $this->input->post('description'),
            'date'        => $this->input->post('date'),
        );
        $this->crud->add_workhistory($data);
        redirect('yprofile');
    }
    
    public function edit_workhistory() {
        $this->load->model('crud');
        $id = $this->input->post('id');
        $data = array(
            'employer'   => $this->input->post('employer'),
            'contact' => $this->input->post('contact'),
            'job_title' => $this->input->post('title'),
            'job_description' => $this->input->post('description'),
            'date'        => $this->input->post('date'),
        );
        $this->crud->update_workhistory($data, $id);
        redirect('yprofile');
    }
    
    
       
}
/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
