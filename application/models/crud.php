<?php

class crud extends CI_Model {
    public function can_log_in(){
    $this->db->where('username', $this->input->post('username'));
    $this->db->where('password', $this->input->post('password'));
    $query = $this->db->get('user');
    if ($query->num_rows() == 1){
        return true;
    } else {
        return false;    
    }
}
    public function get_ids($eml){
     $this->db->where('email', $eml);
     $query = $this->db->get('user');
     
     if ($query){
         $ids = $query->row();
         $id = array(
        'id' => $ids->id,
        );
         return $id;
     } else {
         return false;
     }
    }
    
    public function getvac_des($vacid){
     $this->db->where('ID', $vacid);
     $query = $this->db->get('vacancy');
     if ($query){
            $fbuser = $query->row();
            return $fbuser;
            } else {
                return false;
            }
    }

    function  get_news(){
        $query = $this->db->get('news');
        return $query->result();
    }
    function  get_newsitem($id){
        $this->db->where('id',$id);
        $query = $this->db->get('news');
        return $query->result();
    }
    function  get_alerts(){
        $query = $this->db->get('alerts');
        return $query->result();
    }
    function  get_events(){
        $query = $this->db->get('events');
        return $query->result();
    }
    function  get_eventss($row){
        $query = $this->db->get('events',3,$row);
        if($query->num_rows()>0){
        return $query->result();
        }
    }
   
    
    function  get_user($username){
        $this->db->where('username',$username);
        $query = $this->db->get('user');
        $userdata = $query->row();
        return $userdata;
    }
    
    function  get_youthid($youthid){
        $this->db->where('id',$youthid);
        $query = $this->db->get('user');
        $userdata = $query->row();
        return $userdata;
    }
    
    function  get_vacancy($userid){
        $this->db->where('userid',$userid);
        $query = $this->db->get('vacancy');
        return $query->result();
    }
    
    function  get_users(){
        $query = $this->db->get('usercontact');
        return $query->result();
    }
    
    function  get_usercontacts($userid){
        $this->db->where('userid',$userid);
        $query = $this->db->get('contact');
        $userdata = $query->row();
        return $userdata;
    }
    
    function  get_address($userid){
        $this->db->where('userid',$userid);
        $query = $this->db->get('address');
        $userdata = $query->row();
        return $userdata;
    }
    
    function  get_skills($userid){
        $this->db->where('userid',$userid);
        $query = $this->db->get('skills');
        return $query->result();
    }
    function  get_userbyfb($fbid){
        $this->db->where('fbid',$fbid);
        $query = $this->db->get('user');
        if ($query){
            $fbuser = $query->row();
            return $fbuser;
            } else {
                return false;
            }
    }
    
    function add_news($data){
         $this->db->where('title',$title);
         $q = $this->db->get('news');
      if ( $q->num_rows() > 0 ) {
         $this->db->where('title',$title);
         $this->db->update('news',$data);
      } else {
      $this->db->insert('news',$data);
      }
    }
    
    function get_new_user_id($username){
         $this->db->where('username',$username);
         $query = $this->db->get('user');
            if ($query){
            $ids = $query->row();
            $id = array(
           'id' => $ids->id,
               );
                return $id;
            } else {
                return false;
            }
    }
    function get_new_user_fbid($fbid){
        $this->db->where('fbid',$fbid);
         $query = $this->db->get('user');
            if ($query){
            $ids = $query->row();
            $id = array(
           'id' => $ids->id,
               );
                return $id;
            } else {
                return false;
            }
    }
    function get_rating($userid)
    {
         $this->db->where('empid',$userid);
        $query = $this->db->get('rateyouthview');
        return $query->result();
        
    }
    
    function get_role($userid){
         $this->db->where('id',$userid);
         $query = $this->db->get('user');
         if ($query){
            $roles = $query->row();
            $role = array(
           'role' => $roles->role,
               );
                return $role;
            } else {
                return false;
            }
    }
    
    function add_users($signupdata){
      $this->db->insert('user',$signupdata);
    }
    
    function jobs($jobs){
      $this->db->insert('jobs',$jobs);
    }
    
    function add_vacancy($vacancydata)
    {
        $this->db->insert('vacancy',$vacancydata);
    }
    function edit_rate($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('rateyouth',$data);
    }
    
    function edit_vacancy($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('vacancy',$data);
    }
    function add_skills($data){
      $this->db->insert('skills',$data);
    }
    
    function add_userscontact($signupdatacontact){
      $this->db->insert('contact',$signupdatacontact);
    }
   
    function add_contactsinfo($data, $id){
        $this->db->where('id',$id);
        $this->db->update('contact',$data);
    }
    
    function add_addresss($data){
        $this->db->insert('address',$data);
    }
    
    function add_jobs($jobs){
        $this->db->insert('jobs',$jobs);
    }
    
    function add_address($data, $id){
        $this->db->where('userid',$id);
        $this->db->update('address',$data);
    }
    
    function insertfbid($fbdata,$cellphone){
        $this->db->where('cellphone',$cellphone);
        $this->db->update('user',$fbdata);
    }
    
    function add_personinfo($data,$id){
        $this->db->where('id',$id);
        $this->db->update('user',$data);
    }
            
    function add_dcontacts($data, $title){
        $this->db->where('name',$title);
         $q = $this->db->get('dcontacts');
      if ( $q->num_rows() > 0 ) {
         $this->db->where('name',$title);
         $this->db->update('dcontacts',$data);
      } else {
      $this->db->insert('dcontacts',$data);
      }
    }
    function add_content($data, $title){
        $this->db->where('name',$title);
         $q = $this->db->get('dcontacts');
      if ( $q->num_rows() > 0 ) {
         $this->db->where('name',$title);
         $this->db->update('dcontacts',$data);
      } else {
      $this->db->insert('dcontacts',$data);
      }
    }
    function add_gencontacts($data, $title){
        $this->db->where('nam',$title);
         $q = $this->db->get('gencon');
      if ( $q->num_rows() > 0 ) {
         $this->db->where('name',$title);
         $this->db->update('gencon',$data);
      } else {
      $this->db->insert('gencon',$data);
      }
    }
    function add_testimonials($data, $title){
        $this->db->where('name',$title);
         $q = $this->db->get('testimonials');
      if ( $q->num_rows() > 0 ) {
         $this->db->where('name',$title);
         $this->db->update('testimonials',$data);
      } else {
      $this->db->insert('testimonials',$data);
      }
    }
    function add_alerts($data, $title){
         $this->db->where('title',$title);
         $q = $this->db->get('alerts');
      if ( $q->num_rows() > 0 ) {
         $this->db->where('title',$title);
         $this->db->update('alerts',$data);
      } else {
      $this->db->insert('alerts',$data);
      }
    }
    function add_events($data, $title){
         $this->db->where('title',$title);
         $q = $this->db->get('events');
      if ( $q->num_rows() > 0 ) {
         $this->db->where('title',$title);
         $this->db->update('events',$data);
      } else {
      $this->db->insert('events',$data);
      }
    }
    function update_record($data){
        $this->db->where('id', 14);
        $this->db->update('user',$data);
    }
    function update_recordss($nkos){
        $this->db->where('id',$nkos);
        
        $data = array(
           'username' => $this->input->post('username'),
           'firstname' => $this->input->post('firstname'),
           'product' => $this->input->post('product'),
        );
         
        $this->db->update('user',$data);
    }
    function delete_row($table){
        $this->db->where('id',$this->uri->segment(2));
        $this->db->delete($table);
    }
    
    function delete_image(){
        $this->db->where('id',$this->uri->segment(2));
        $this->db->delete('pimages');
    } 
    
    function resetp(){
        $this->db->where('id',$this->uri->segment(3));
        $data = array(
           'password' => NULL,
        );
         
        $this->db->update('user',$data);
    }
    public function  currdata($datas){
        $beta = $datas;
        return $beta;
    }   
    
    public function insertprofileimg($dataimg) {
        $this->db->insert('pimages',$dataimg); 
    }
    function  get_proimg($userid){
        $this->db->where('userid',$userid);
        $query = $this->db->get('pimages');
        return $query->result();
    }
    
    function add_qualification($data){
        $this->db->insert('qualifications', $data);
        
    }
    
    function update_qualification($data, $id){
        $this->db->where('id',$id);
        $this->db->update('qualifications',$data);
    }
    
    function get_qualifications($id){
        $this->db->where('userid',$id);
        $query = $this->db->get('qualifications');
        return $query->result();
    }
    
    function get_qualification($id){
        $this->db->where('id',$id);
        $query = $this->db->get('qualifications');
        return $query->result();
    }
    
    function edit_skill($data, $id){
        $this->db->where('id',$id);
        $this->db->update('skills',$data);
    }
    
    function add_workhistory($data){
        $this->db->insert('work_history', $data);
        
    }
    
    function update_workhistory($data, $id){
        $this->db->where('id',$id);
        $this->db->update('work_history',$data);
    }
    
    function edit_workhistory($data, $id){
        $this->db->where('id',$id);
        $this->db->update('work_history',$data);
    }
    
     function get_workhistory($id){
        $this->db->where('userid',$id);
        $query = $this->db->get('work_history');
        return $query->result();
    }
}
