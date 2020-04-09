<?php

class Auth_model extends Prud_Model {
	
	function __construct()
	{
		parent::__construct();
	}

    public function get_user($email,$password)
    { 
        $this->slave->select('admin_id, first_name, email, type, role_id');
        $this->slave->from('hs_admins');
        $this->slave->where("email='$email' AND password='$password'");
        $this->slave->where("status='1'");
        $user = $this->slave->get()->row();
        return $user;
    }

    public function get_user_by_email($email)
    {
        $this->slave->select('admin_id, first_name, email');
        $this->slave->from('hs_admins');
        $this->slave->where("email='$email'");
        $this->slave->where("status='1'");
        $user = $this->slave->get()->result();
        return $user;
    }

    public function get_user_by_id($admin_id)
    {
        $this->slave->select('admin_id, first_name, email, type, role_id');
        $this->slave->from('hs_admins');
        $this->slave->where("admin_id=$admin_id");
        $this->slave->where("status='1'");
        $user = $this->slave->get()->row();
        return $user;
    }

    public function get_user_reset_key($reset_key)
    {
        $this->slave->select('admin_id');
        $this->slave->from('hs_admin_password_reset');
        $this->slave->where("reset_key='$reset_key' and status='active'");
        $user = $this->slave->get()->row();
        return $user;
    }

    public function set_user_password_reset($table_name,$data)
    {
        $this->master->insert($table_name,$data);
        return  $this->master->insert_id();
    }	


    public function set_user_password($table_name,$data,$id)
    {
        $this->db->where('admin_id',$id);
        $this->db->update($table_name,$data);
    }

    public function set_user_password_reset_status($table_name,$data,$id)
    {
        $this->db->where('admin_id',$id);
        $this->db->update($table_name,$data);
    }

    public function random_password( $length = 8 ) 
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    public function generateUid(){
        $uniqid = uniqid();          
        $exists = $this->findByUid($uniqid);
        if (!empty($exists)&& count($exists)<1) {
            return $this->generateUid();
        }
        return $uniqid;
    }

	public function get_client_login($email,$password)
    {
        $this->slave->select('client_id, fname, lname, mobileno, email');
        $this->slave->from('hs_clients');
        $this->slave->where("email='$email' AND password='$password'");
        $this->slave->where("status='1'");
        $customer  = $this->slave->get()->row();
        return $customer;
    }

	public function get_client_by_email($email)
    {
        $this->slave->select('client_id, fname, email');
        $this->slave->from('hs_clients');
        $this->slave->where("email='$email'");
        $this->slave->where("status='1'");
        $client = $this->slave->get()->row();
        return $client;
    }

    public function set_client_password_reset($table_name,$data)
    {
        $this->master->insert($table_name,$data);
        return  $this->master->insert_id();
    }
    
    public function set_client_password_reset_status($table_name,$data,$id)
    {
        $this->master->where('client_id',$id);
        $this->master->update($table_name,$data);
    }

	public function get_client_reset_key($reset_key)
    {
        $this->slave->select('client_id');
        $this->slave->from('hs_client_password_reset');
        $this->slave->where("reset_key='$reset_key' AND status='active'");
        $customer = $this->slave->get()->row();
        return $customer;
    }

	public function get_client_by_id($client_id)
    {
        $this->slave->select('client_id,fname,email');
        $this->slave->from('hs_clients');
        $this->slave->where("client_id=$client_id");
        $customer = $this->slave->get()->row();
        return $customer;
    }
	
	public function set_client_password($table_name,$data,$id)
    {
        $this->master->where('client_id',$id);
        $this->master->update($table_name,$data);
    }

	public function get_client_data($client_uid)
    {
        $this->slave->select('client_id, fname, password, email');
        $this->slave->from('hs_clients');
        $this->slave->where("client_uid='".$client_uid."'");
        $user = $this->slave->get()->row();
        return $user;
    }
	
}
