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
      $this->load->view('statistics',$fbdat);
    }
    
    public function youthsearch(){
      $this->load->helper('form');
      $this->load->helper('url');
      $this->load->view('youthsearch');
    }
        
    public function yprofile(){
    $this->load->library('facebook');
    $this->load->model('crud');
    
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
    $fbid = $data['user_profile']['id'];
    $data['user'] = $this->crud->get_user($fbid);
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('yprofile',$data);   
    }
    
    public function rprofile(){
        $this->load->model('crud');
        
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
        $fbid = $data['user_profile']['id'];
        $data['user'] = $this->crud->get_user($fbid);
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->view('rprofile',$data);   
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
    
    public function createcontacts(){
        $this->load->model('crud');
       $id = $this->input->post('fbid');
      
       $data = array(
           'tel' => $this->input->post('tel'),
           'mobile' => $this->input->post('mobile'),
           'fax' => $this->input->post('fax'),
           'email' => $this->input->post('email'),);
       $this->crud->add_contactsinfo($data,$id);    
       redirect('rprofile');
   } 
    
    public function logout(){
        
        $this->load->helper('url');
        $this->load->library('facebook');
        $logout = $this->uri->segment(2); 
        
        // Logs off session from website
        $this->facebook->destroySession($logout);
        // Make sure you destory website session as well.
        redirect('index.php');
    }
    
    public function login_validation(){
           $this->load->library('form_validation');
           $this->load->library('session');
           $this->form_validation->set_rules('email','Email','required|trim|xxs_clean|callback_validate_credentials');           
           $this->form_validation->set_rules('password','Password','required|md5|trim');
            
        if ($this->form_validation->run()){
              $data = array(
                    'email' => $this->input->post('email'),
                    'is_logged_in' => 1
                );
                $this->session->set_userdata($data);
                redirect('admins');
            } else {
                $this->load->helper('form');
                $this->load->view('signin'); 
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
}
/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
