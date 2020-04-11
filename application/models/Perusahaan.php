<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan extends CI_Model 
{
	function __construct(){
    // copy your old constructor function code here
 	}

	public function Perusahaan(){		
		$this->load->database();
	}

	public function daftar_perusahaan(){
		$query = $this->db->query('SELECT * FROM perusahaan');
		return $query->result_array();
	}

	public function daftar_lowongan(){
		$query = $this->db->query('SELECT lowongan.id_lowongan,lowongan.info_lowongan,lowongan.kota,lowongan.syarat,lowongan.tgl_close,perusahaan.nama_perusahaan,perusahaan.logo,perusahaan.id_perusahaan FROM lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan where lowongan.deleted = 0 order by id_perusahaan,tgl_post DESC');
		return $query->result_array();
	}
	
	public function batas_apply(){
		$query = $this->db->query('SELECT laporan.id_laporan, lowongan.id_lowongan,lowongan.info_lowongan,lowongan.kota,lowongan.syarat,lowongan.tgl_close,perusahaan.nama_perusahaan,perusahaan.logo,perusahaan.id_perusahaan FROM lowongan INNER JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan LEFT JOIN laporan ON laporan.id_lowongan = lowongan.id_lowongan ORDER BY lowongan.id_lowongan ASC');
		return $query->result_array();
	}


	function insert_data($data=array())
	{
		if(count($data)>0){
			$this->db->insert('pelamar',$data);
		}
	}

	function update_data($data=array(),$id=0)
	{
		if(count($data)>0){
			$this->db->where('id_pelamar',$id);
			$this->db->update('pelamar',$data);
		}
	}

	function apply_data($data=array())
	{
		if(count($data)>0){
			$this->db->insert('laporan',$data);
		}
	}

	public function view_profile($id=FALSE)

	{

		if($id==TRUE){

			$this->db->from('pelamar');  

			$this->db->where('id_pelamar',$id);

			$query = $this->db->get();

		}else{

			$this->db->from('pelamar');

			$query = $this->db->get();

		}

		return $query->result();

	}

	public function check_login() {

			if($this->session->userdata('isloggedin')==FALSE){

			redirect('');

		}

	}

	public function checkDuplicateEmail($post_email) {

    $this->db->where('email', $email_id);

    $query = $this->db->get('pelamar');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }
	}

	function changeActiveState($key)
	{
	 $this->load->database();
	 $data = array(
	 'status' => 1
	 );

	 $this->db->where('encrypt_email', $key);
	 $this->db->update('pelamar', $data);

	 return true;
	}


	public function chkLogin($us = FALSE, $pw = FALSE) {

		if($us!==FALSE and $pw!==FALSE) {

			$x = 0;

			$q = $this->db->query("SELECT * FROM pelamar WHERE email='$us' AND password='$pw' AND status='1' OR no_hp='$us' AND password='$pw' AND status='1'");

			$res = $q->row_array();

			$x = $q->num_rows();

			if($x>0) {

				$sess = array(

					'usernm' => $res['email'],

					'isloggedin' => TRUE,

					'id_pelamar'   => $res['id_pelamar'],

					'email'   => $res['email'], 

					'no_hp'   => $res['no_hp'], 

					'nama'   => $res['nama'],

					'status'   => $res['status'],

				);

				$this->session->set_userdata($sess);

			}

			return $x;

		}

	}


	public function send_mail($subject_,$pesan_,$to_)

	{ 

	
		$this->load->library('email');

		$result = $this->email

					->from('edwin@winsekai.my.id','Admin Job Vacany') 

					->to($to_)

					->subject($subject_)

					->set_mailtype("html")

					->message($pesan_)

					->send();
    
		return TRUE;	 

	}
	
	
	public function getUsername($email)
	 {
	  $this->db->where('email' , $email);
	  $query = $this->db->get('pelamar');

	  if($query->num_rows()>0){
	   return true;
	  }
	  else {
	   return false;
	  }
	 }
	 
	 public function getApply($id_pelamar,$id_lowongan)
	 {
	  $this->db->where('id_pelamar' , $id_pelamar);
	  //$this->db->where('id_lowongan' , $id_lowongan);
	  $query = $this->db->get('laporan');

	  if($query->num_rows()>0){
	   return true;
	  }
	  else {
	   return false;
	  }
	 }
	 
	 public function view_riwayat($id=FALSE)

	{

		if($id==TRUE){

			$this->db->from('laporan');  

			$this->db->where('id_pelamar',$id);

			$this->db->join('lowongan', 'laporan.id_lowongan = lowongan.id_lowongan');

			$this->db->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id_perusahaan');


			$query = $this->db->get();

		}else{

			$this->db->from('laporan');

			$query = $this->db->get();

		}

		return $query->result();

	}
	
	
	//Start: method tambahan untuk reset code  
   public function getUserInfo($id)  
   {  
     $q = $this->db->get_where('pelamar', array('id_pelamar' => $id), 1);   
     if($this->db->affected_rows() > 0){  
       $row = $q->row();  
       return $row;  
     }else{  
       error_log('no user found getUserInfo('.$id.')');  
       return false;  
     }  
   }  
   
  public function getUserInfoByEmail($email){  
     $q = $this->db->get_where('pelamar', array('email' => $email), 1);   
     if($this->db->affected_rows() > 0){  
       $row = $q->row();  
       return $row;  
     }  
   }  
   
   public function insertToken($user_id)  
   {    
     $token = substr(sha1(rand()), 0, 30);   
     $date = date('Y-m-d');  
       
     $string = array(  
         'token'=> $token,  
         'id_pelamar'=>$user_id,  
         'created'=>$date  
       );  
     $query = $this->db->insert_string('tokens',$string);  
     $this->db->query($query);  
     return $token . $user_id;  
       
   }  
   
   public function isTokenValid($token)  
   {  
     $tkn = substr($token,0,30);  
     $uid = substr($token,30);     
       
     $q = $this->db->get_where('tokens', array(  
       'tokens.token' => $tkn,   
       'tokens.id_pelamar' => $uid), 1);               
           
     if($this->db->affected_rows() > 0){  
       $row = $q->row();         
         
       $created = $row->created;  
       $createdTS = strtotime($created);  
       $today = date('Y-m-d');   
       $todayTS = strtotime($today);  
         
       if($createdTS != $todayTS){  
         return false;  
       }  
         
       $user_info = $this->getUserInfo($row->id_pelamar);  
       return $user_info;  
         
     }else{  
       return false;  
     }  
       
   }   
   
   public function updatePassword($post)  
   {    
     $this->db->where('id_pelamar', $post['id_pelamar']);  
     $this->db->update('pelamar', array('password' => $post['password']));      
     return true;  
   }  
   //End forgot password
	
	public function hapus_riwayat($id){
		$this->db->where('id_laporan', $id);
		return $this->db->delete('laporan');
	}

}
?>