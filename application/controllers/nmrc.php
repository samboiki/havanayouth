<?php if (!defined('BASEPATH')) die();
class Nmrc extends Main_Controller {
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
   public function signin_validation(){
           $this->load->library('form_validation');
           $this->load->library('session');
           $this->form_validation->set_rules('username','Username','required|trim|xxs_clean|callback_validate_credentials');           
           $this->form_validation->set_rules('password','Password','required|md5|trim');
            
        if ($this->form_validation->run()){
              $data = array(
                    'username' => $this->input->post('username'),
                    'logged_in' => 1
                );
                $this->session->set_userdata($data);
                
                $username = $this->input->post('username');
                
                $id_of_user = $this->crud->get_new_user_id($username);
                $userid = $id_of_user['id'];
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
                
            } else {
                $this->load->helper('form');
                $this->load->view('signin'); 
                }
        } 
        
        
   public function signup_validation() {
       $this->load->library('form_validation');
       $this->load->helper('date');
        //runnning backend form validation to sanitize the data
        $this->form_validation->set_rules('email','Email','trim|xxs_clean|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','trim');
        $this->form_validation->set_rules('firstname','Firstname','trim|xxs_clean');
        $this->form_validation->set_rules('lastname','Lastname','trim|xxs_clean');
        $this->form_validation->set_rules('username','Username','trim|xxs_clean|is_unique[user.username]'); 
        $this->form_validation->set_rules('number','Number','trim|xxs_clean');
        $this->form_validation->set_rules('role','Role','trim|xxs_clean');
            //if validation runs successfully insert the data
            if ($this->form_validation->run()){
                    $this->load->model('crud');
                    $signupdata = array(
                                    'last_modified' => now(),
                                    'firstname' => $this->input->post('firstname'),
                                    'lastname' => $this->input->post('lastname'),
                                    'username' => $this->input->post('username'),
                                    'password' => $this->input->post('password'),
                                    'email' => $this->input->post('email'),
                                    'role' => $this->input->post('role')
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
                                    'email' => $this->input->post('email'),
                                    'mobile_phone' => $this->input->post('number'),
                                    'userid' => $userid,
                    );
                    
                    // invoking add_userscontact() method to add the user
                    $this->crud->add_userscontact($signupdatacontact);
                    
                    // now im setting up session data
                    $data = array(
                        'username' => $this->input->post('username'),
                        'logged_in' => 1
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
    
           
    public function yprofile(){
        //loading required libraries and model
        $this->load->library('facebook');
        $this->load->library('session');
        $this->load->model('crud');
        
        //check to see if user is logged in else redirect to restricted page
            if($this->session->userdata('logged_in')){
            
                                  
              // var_dump($this->session->all_userdata());
               $username = $this->session->userdata('username');
            
               $data['user'] = $this->crud->get_user($username);
               $userid = $data['user']->id;
               $data['contact'] = $this->crud->get_usercontacts($userid);
              // echo $data['contact']->id;
               $this->load->helper('form');
               $this->load->helper('url');
               $this->load->view('yprofile',$data);
            } else {
                redirect('restricted');
            }
    }
    
    public function rprofile(){
    //loading required libraries and model
        $this->load->library('facebook');
        $this->load->library('session');
        $this->load->model('crud');
        
        //check to see if user is logged in else redirect to restricted page
            if($this->session->userdata('logged_in')){
            
                                  
              // var_dump($this->session->all_userdata());
               $username = $this->session->userdata('username');
            
               $data['user'] = $this->crud->get_user($username);
               $userid = $data['user']->id;
               $data['contact'] = $this->crud->get_usercontacts($userid);
              // echo $data['contact']->id;
               $this->load->helper('form');
               $this->load->helper('url');
               $this->load->view('rprofile',$data);
            } else {
                redirect('restricted');
            } 
    }
    
    public function fbcheck() {
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
            $data['logout_url'] = site_url('logout'); // Logs off application
            $data['logout_url'] = $this->facebook->getLogoutUrl();// Logs off FB!
        } else {
        }
        
        return $data;
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
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }
      if ($user) {
            $data['logout_url'] = site_url('logout'); // Logs off application
            $data['logout_url'] = $this->facebook->getLogoutUrl();// Logs off FB!
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('yprofile'), 
                'scope' => array("email") // permissions here
            ));
        }
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('signin',$data);
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
        
    public function login(){

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
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {
            $data['logout_url'] = site_url('logout'); // Logs off application
          //  $data['logout_url'] = $this->facebook->getLogoutUrl();// Logs off FB!
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login'), 
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('login',$data);
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
        
    public function statistics(){
     
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('statistics',  $this->fbcheck());
    }
    public function notifications(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('notifications',  $this->fbcheck());
    }
    
    public function youthsearch(){
        
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('youthsearch',$this->fbcheck());
    }
 
    
    

    public function aprofile(){
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
            $data['logout_url'] = site_url('logout'); // Logs off application
            $data['logout_url'] = $this->facebook->getLogoutUrl();// Logs off FB!
        } else {
        }
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('aprofile',$data);   
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
    
    public function logout(){
        $this->session->sess_destroy();
        $this->load->library('facebook');
        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
        redirect('index.php');
    }
    
    
       
}
/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
