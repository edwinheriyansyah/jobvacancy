<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));		
		$this->load->model('perusahaan');	
	}


	public function index()
	{

		$this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('login'))
        {
            //mengambil nama dari session
            $session = $this->session->userdata('login');
            $data['nama'] = $session['nama'];
			$data['email'] = $session['email'];
			$data['active'] = $session['active'];
            $this->load->view('v_home',$data);
        }
        
        $limit=$this->perusahaan->batas_apply();
        $batas=FALSE;
        for ($i=0; $i < count($limit) ; $i++) { 
        	if($limit[$i]['id_laporan']!=null){
        		$batas = TRUE;
        		break;
        	}
        }

		$data=array(
			'tampil_perusahaan' => $this->perusahaan->daftar_perusahaan(),
			'tampil_lowongan' => $this->perusahaan->daftar_lowongan(),
			'batas_apply' => $this->perusahaan->batas_apply(),
			'batas' => $batas);
		$this->load->view('../views/all',$data);
	}

	public function register()
	{

		$this->load->view('../views/top');
		$this->load->view('../views/register');
		$this->load->view('../views/footer');
	}
	
	public function contact()
	{
		$this->load->view('../views/top');
		$this->load->view('../views/contact');
		$this->load->view('../views/footer');
	}

	public function jadwal()
	{
		$this->perusahaan->check_login();
		$this->load->view('../views/top');
		$this->load->view('../views/jadwal');
		$this->load->view('../views/footer');
	}
	
	public function faq()
	{
		$this->load->view('../views/top');
		$this->load->view('../views/faq');
		$this->load->view('../views/footer');
	}
	
	public function alur_pendaftaran()
	{
		$this->load->view('../views/top');
		$this->load->view('../views/alur_pendaftaran');
		$this->load->view('../views/footer');
	}

	public function profile()
	{

		$this->perusahaan->check_login();
		$userid=$this->session->userdata('id_pelamar');

		$data['profile']=$this->perusahaan->view_profile($userid);

		$this->load->view('../views/top');
		$this->load->view('../views/profile',$data);
		$this->load->view('../views/footer');
	}

	public function failed()
	{

		$this->load->view('../views/top');
		$this->load->view('../views/failed');
		$this->load->view('../views/footer');
	}

	public function success()
	{
        $this->perusahaan->check_login();
		$this->load->view('../views/top');
		$this->load->view('../views/success');
		$this->load->view('../views/footer');
	}

	public function cek_email()
	{

		$this->load->view('../views/top');
		$this->load->view('../views/cek_email');
		$this->load->view('../views/footer');
	}

	public function batal($id){
		$this->perusahaan->hapus_riwayat($id);
		redirect(base_url().'riwayat');
	}

	public function add_pelamar()
	{
		$this->load->library('form_validation');
		$post_email = $this->input->post('email');		
		$this->form_validation->set_rules('email', 'Email ', 'required|trim|xss_clean|valid_email|callback_check_duplicate_email[' . $post_email . ']');
    	$this->form_validation->set_rules('password', 'Your password', 'required|min_length[5]|max_length[12]|matches[confirm_password');

		
		if($_FILES['photo']['name'])
		{
			$nmfile = "foto_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = 'assets/images/pelamar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '1024';
			$config['max_width'] = '2000';
			$config['max_height'] = '4000';
			$config['overwrite'] = TRUE; //menimpa file upload dengan nama yang sama
			$config['file_name'] = $nmfile; //menamai file yang tersimpan dengan nmfile
			
			$this->upload->initialize($config);
			if ($this->upload->do_upload('photo'))
			{
                		$imgkonten = $this->upload->data();
                		$entry['foto'] = $imgkonten['file_name'];
            }else{ 
				$imgkonten="";
            		}
        	}else{
			$imgkonten="";
		}	
		

		$today = date("Y-m-d");
 
		$entry['nama']			= $this->input->post('nama');

		$entry['gender']		= $this->input->post('gender');

		$entry['no_ktp']		= $this->input->post('no_ktp');

		$entry['tmpt_lahir']	= $this->input->post('tmpt_lahir');

		$entry['tgl_lahir']		= $this->input->post('tgl_lahir');

		$entry['alamat']		= $this->input->post('alamat');

		$entry['no_hp']			= $this->input->post('no_hp');

		$entry['email']			= $this->input->post('email');

		$entry['password']		= md5($this->input->post('password'));

		$entry['facebook']		= $this->input->post('facebook');

		$entry['twitter']		= $this->input->post('twitter');

		$entry['instagram']		= $this->input->post('instagram');

		$entry['linkedin']		= $this->input->post('linkedin');

		$entry['tgl_daftar']	= $today;

		$entry['status']		= 0;

		$id = $this->input->post('no_ktp');

		$entry['encrypt_email']		= md5($id);

		$this->db->trans_start(); /*untuk rollback jika data gagal*/
		$this->perusahaan->insert_data($entry);
		$this->db->trans_complete();

		$pesan = '<div class="alert alert-success">';

		$pesan .= '<button class="close" data-dismiss="alert">×</button>';

		$pesan .= '<strong>Info!</strong>';

		$pesan .= 'Data telah berhasil disimpan!';

		$pesan .= '</div>';

		$this->session->set_flashdata('pesan',$pesan);

		/*Kirim email*/

				$encrypted_id = md5($id);
				$subject_="ADMIN - Verifikasi Akun";
				
				$pesan_='
				Terimakasih telah melakukan registrasi, untuk memverifikasi akun silahkan klik tautan dibawah ini :<br><br>
      			<a href='.site_url().'welcome/verification/'.$encrypted_id.'>'.site_url().'welcome/verification/'.$encrypted_id.'</a>
				';
				$to_=$this->input->post('email');
				
				$this->perusahaan->send_mail($subject_,$pesan_,$to_);	

		
		redirect('cek-email');

	}

	public function edit_pelamar()
	{
		
		$id = $this->input->post('id_pelamar');

		/*if($_FILES['photo']['name']){ //jika ada dokumen

			$filename = strtolower(basename($_FILES['photo']['name']));

			$filenameArr = explode('.',$filename);

			$ori_name = str_replace(' ','_',$filenameArr[0]);

			$ext = $filenameArr[count($filenameArr)-1];

			$ran = date("mdYHis");

			$ran2 = $ran.".";

			$target = 'assets/images/pelamar/';

			$target = $target.$ori_name.'_'.$ran2.$ext;


			if(@move_uploaded_file($_FILES['photo']['tmp_name'], $target))

			{

				$entry['foto'] = $ori_name.'_'.$ran2.$ext;

			}

		}*/
		
		if($_FILES['photo']['name'])
		{
			$nmfile = "foto_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = 'assets/images/pelamar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '1024';
			$config['max_width'] = '2000';
			$config['max_height'] = '4000';
			$config['overwrite'] = TRUE; //menimpa file upload dengan nama yang sama
			$config['file_name'] = $nmfile; //menamai file yang tersimpan dengan nmfile
			
			$this->upload->initialize($config);
			if ($this->upload->do_upload('photo'))
			{
                		$imgkonten = $this->upload->data();
                		$entry['foto'] = $imgkonten['file_name'];
            }else{ 
				$imgkonten="";
            		}
        	}else{
			$imgkonten="";
		}	

		$today = date("Y-m-d");
 
		$entry['nama']			= $this->input->post('nama');

		$entry['gender']		= $this->input->post('gender');

		$entry['no_ktp']		= $this->input->post('no_ktp');

		$entry['tmpt_lahir']	= $this->input->post('tmpt_lahir');

		$entry['tgl_lahir']		= $this->input->post('tgl_lahir');

		$entry['alamat']		= $this->input->post('alamat');

		$entry['no_hp']			= $this->input->post('no_hp');

		$entry['email']			= $this->input->post('email');

		$entry['facebook']		= $this->input->post('facebook');

		$entry['twitter']		= $this->input->post('twitter');

		$entry['instagram']		= $this->input->post('instagram');

		$entry['linkedin']		= $this->input->post('linkedin');


		$this->db->trans_start(); /*untuk rollback jika data gagal*/
		$this->perusahaan->update_data($entry,$id);
		$this->db->trans_complete();

		$pesan = '<div class="alert alert-success">';

		$pesan .= '<button class="close" data-dismiss="alert">×</button>';

		$pesan .= '<strong>Info!</strong>';

		$pesan .= 'Data telah berhasil disimpan!';

		$pesan .= '</div>';

		$this->session->set_flashdata('pesan',$pesan);
		redirect('profile');

	}


	public function apply_lowongan()
	{
		$this->load->library('form_validation');
	

		/*if($_FILES['ijazah']['name']){ //jika ada dokumen

			$filename = strtolower(basename($_FILES['ijazah']['name']));

			$filenameArr = explode('.',$filename);

			$ori_name = str_replace(' ','_',$filenameArr[0]);

			$ext = $filenameArr[count($filenameArr)-1];

			$ran = date("mdYHis");

			$ran2 = $ran.".";

			$target = 'assets/uploads/';

			$target = $target.$ori_name.'_'.$ran2.$ext;


			if(@move_uploaded_file($_FILES['ijazah']['tmp_name'], $target))

			{

				$entry['ijazah'] = $ori_name.'_'.$ran2.$ext;

			}

		}*/
		
		if (empty($_FILES['ijazah']['name']) OR empty($_FILES['ktp']['name']))
		{
		    echo "<script>alert('Mohon upload file Ijazah dan KTP'); window.history.back(-1);</script>";
		}
		else {
		
		if($_FILES['ijazah']['name'])
		{
			$nmfile = "ijazah_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = 'assets/uploads';
			$config['allowed_types'] = 'bmp|gif|jpg|png|jpeg|pdf|doc|docx|rar';
			//$config['max_size'] = '9024';
			//$config['max_width'] = '2000';
			//$config['max_height'] = '4000';
			$config['overwrite'] = TRUE; //menimpa file upload dengan nama yang sama
			$config['file_name'] = $nmfile; //menamai file yang tersimpan dengan nmfile
			
			$this->upload->initialize($config);
			if ($this->upload->do_upload('ijazah'))
			{
                		$imgkonten = $this->upload->data();
                		$entry['ijazah'] = $imgkonten['file_name'];
            }else{ 
				$imgkonten="";
            		}
        	}else{
			$imgkonten="";
		}
		

		/*if($_FILES['ktp']['name']){ //jika ada dokumen

			$filename = strtolower(basename($_FILES['ktp']['name']));

			$filenameArr = explode('.',$filename);

			$ori_name = str_replace(' ','_',$filenameArr[0]);

			$ext = $filenameArr[count($filenameArr)-1];

			$ran = date("mdYHis");

			$ran2 = $ran.".";

			$target = 'assets/uploads/';

			$target = $target.$ori_name.'_'.$ran2.$ext;


			if(@move_uploaded_file($_FILES['ktp']['tmp_name'], $target))

			{

				$entry['ktp'] = $ori_name.'_'.$ran2.$ext;

			}

		}*/
		
		if($_FILES['ktp']['name'])
		{
			$nmfile = "ktp_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = 'assets/uploads';
			$config['allowed_types'] = 'bmp|gif|jpg|png|jpeg|pdf|doc|docx|rar';
			//$config['max_size'] = '1024';
			//$config['max_width'] = '2000';
			//$config['max_height'] = '4000';
			$config['overwrite'] = TRUE; //menimpa file upload dengan nama yang sama
			$config['file_name'] = $nmfile; //menamai file yang tersimpan dengan nmfile
			
			$this->upload->initialize($config);
			if ($this->upload->do_upload('ktp'))
			{
                		$imgkonten = $this->upload->data();
                		$entry['ktp'] = $imgkonten['file_name'];

            		}else{ 
				$imgkonten="";
            		}
        	}else{
			$imgkonten="";
		}	


		/*if($_FILES['transkrip']['name']){ //jika ada dokumen

			$filename = strtolower(basename($_FILES['transkrip']['name']));

			$filenameArr = explode('.',$filename);

			$ori_name = str_replace(' ','_',$filenameArr[0]);

			$ext = $filenameArr[count($filenameArr)-1];

			$ran = date("mdYHis");

			$ran2 = $ran.".";

			$target = 'assets/uploads/';

			$target = $target.$ori_name.'_'.$ran2.$ext;


			if(@move_uploaded_file($_FILES['transkrip']['tmp_name'], $target))

			{

				$entry['transkrip'] = $ori_name.'_'.$ran2.$ext;

			}

		}*/
		
		if($_FILES['transkrip']['name'])
		{
			$nmfile = "transkrip_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = 'assets/uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
			$config['max_size'] = '1024';
			$config['max_width'] = '2000';
			$config['max_height'] = '4000';
			$config['overwrite'] = TRUE; //menimpa file upload dengan nama yang sama
			$config['file_name'] = $nmfile; //menamai file yang tersimpan dengan nmfile
			
			$this->upload->initialize($config);
			if ($this->upload->do_upload('transkrip'))
			{
                		$imgkonten = $this->upload->data();
                		$entry['transkrip'] = $imgkonten['file_name'];

            		}else{ 
				$imgkonten="";
            		}
        	}else{
			$imgkonten="";
		}
		
		

		/*if($_FILES['sertifikat']['name']){ //jika ada dokumen

			$filename = strtolower(basename($_FILES['sertifikat']['name']));

			$filenameArr = explode('.',$filename);

			$ori_name = str_replace(' ','_',$filenameArr[0]);

			$ext = $filenameArr[count($filenameArr)-1];

			$ran = date("mdYHis");

			$ran2 = $ran.".";

			$target = 'assets/uploads/';

			$target = $target.$ori_name.'_'.$ran2.$ext;


			if(@move_uploaded_file($_FILES['sertifikat']['tmp_name'], $target))

			{

				$entry['sertifikat'] = $ori_name.'_'.$ran2.$ext;

			}

		}*/
		
		if($_FILES['sertifikat']['name'])
		{
			$nmfile = "sertifikat_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = 'assets/uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
			$config['max_size'] = '1024';
			$config['max_width'] = '2000';
			$config['max_height'] = '4000';
			$config['overwrite'] = TRUE; //menimpa file upload dengan nama yang sama
			$config['file_name'] = $nmfile; //menamai file yang tersimpan dengan nmfile
			
			$this->upload->initialize($config);
			if ($this->upload->do_upload('sertifikat'))
			{
                		$imgkonten = $this->upload->data();
                		$entry['sertifikat'] = $imgkonten['file_name'];

            		}else{ 
				$imgkonten="";
            		}
        	}else{
			$imgkonten="";
		}


		$today = date("Y-m-d");
		
		$today_lowongan = date("d-m-Y");

		$entry['id_pelamar']	= $this->input->post('id_pelamar');
 
		$entry['id_lowongan']	= $this->input->post('bookId');

		$entry['tgl_lamar']		= $today;

		$entry['pendidikan']	= $this->input->post('pendidikan');

		$entry['instansi']	= $this->input->post('instansi');

		$entry['jurusan']	= $this->input->post('jurusan');

		$entry['nilai']	= $this->input->post('nilai');

		$entry['pl_perusahaan']	= $this->input->post('pl_perusahaan');

		$entry['pl_posisi']	= $this->input->post('pl_posisi');

		$entry['pl_tahun']	= $this->input->post('pl_tahun');

		$entry['pl_alasan']	= $this->input->post('pl_alasan');

		$entry['pt_jenis']	= $this->input->post('pt_jenis');

		$entry['pt_tahun']	= $this->input->post('pt_tahun');

		$entry['alasan']	= $this->input->post('alasan');
		
		$lowongan	= $this->input->post('bookLowongan');


		$this->db->trans_start(); /*untuk rollback jika data gagal*/
		$this->perusahaan->apply_data($entry);
		$this->db->trans_complete();

		$pesan = '<div class="alert alert-success">';

		$pesan .= '<button class="close" data-dismiss="alert">×</button>';

		$pesan .= '<strong>Info!</strong>';

		$pesan .= 'Data telah berhasil dikirim!';

		$pesan .= '</div>';

		$this->session->set_flashdata('pesan',$pesan);
		

		redirect('success');

	    }
	}


	public function verification($key)
	{
	 $this->load->helper('url');
	 $this->load->model('perusahaan');
	 $this->perusahaan->changeActiveState($key);

	 $this->load->view('../views/top');
	 $this->load->view('../views/verifikasi');
	 $this->load->view('../views/footer');
	}


	public function doLogin() {
		$us = $this->input->post('email');
		$pw = md5($this->input->post('password'));
		$res = $this->perusahaan->chkLogin($us, $pw);

		if($res == 1){ //cek data berdasarkan username & pass						
            $this->session->set_userdata(array(
			                'isloggedin'   => TRUE, //set data telah login
			                'usernm'  => $us, //set session username
							
			));
	        $q = $this->db->where('email', $us, 'status', 1)->or_where('no_hp', $us)->get('pelamar');
			$cek = $q->row_array();
	                if($res==1) {
	                	$set = $this->db->get_where('pelamar',array('email'=>$cek['email']))->row_array();
	                	$this->session->set_userdata(array(
	                				'id_pelamar'   => $set['id_pelamar'],
					                'email'   => $set['email'], 
									'nama'   => $set['nama'],
									'gender'   => $set['gender'],
									'password'   => $set['password'],
									'alamat'   => $set['alamat'],
									'tgl_lahir' => $set['tgl_lahir'],
									'tmpt_lahir' => $set['tmpt_lahir'],
									'no_ktp'   => $set['no_ktp'],
									'no_hp'   => $set['no_hp'],
									'facebook'   => $set['facebook'],
									'instagram'   => $set['instagram'],
									'twitter'   => $set['twitter'],
									'linkedin'   => $set['linkedin'],
									'foto'   => $set['foto'],
			                ));
	                	redirect(base_url());
						}	
        	}

        	else {
        		redirect(base_url().'failed');

        	}
		}

	public function doLogout() {
	    $this->session->sess_destroy();
		//session_destroy();
		session_unset();
		unset($_SESSION["loggedin"]);
		unset($_SESSION["loggedinop"]);
		unset($_SESSION["usernm"]);
		unset($_SESSION["id_pelamar"]);
		unset($_SESSION["email"]);
		unset($_SESSION["nama"]);
		unset($_SESSION["status"]);
		$_SESSION = array();
		redirect(base_url());
	}
	
	public function checkUsername()
		 {	 
		  if($this->perusahaan->getUsername($_POST['email'])){
		   echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
		   </i> Maaf Email Sudah Terdaftar</span></label>';
		  }
		  else {
		   echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Email Tersedia</span></label>';
		  }
		 }
		 
	public function checkApply()
		 {	 
		  if($this->perusahaan->getApply($_POST['id_pelamar'],$_POST['id_lowongan'])){
		   echo '1';
		  }
		  else {
		   echo '0';
		  }
		 }
		 
	public function riwayat()
		 {	 
		  $this->perusahaan->check_login();
		$userid=$this->session->userdata('id_pelamar');

		$data['riwayat']=$this->perusahaan->view_riwayat($userid);

		$this->load->view('../views/top');
		$this->load->view('../views/riwayat',$data);
		$this->load->view('../views/footer');
		 }
		 
		 
		 
		 
    //Start: method tambahan untuk forgot password 

		 public function notfound()
		 {	 
		 
		$this->load->view('../views/top');
		$this->load->view('../views/notfound');
		$this->load->view('../views/footer');
		 }

		 public function cek_forgot_password()
		 {	 
		 
		$this->load->view('../views/top');
		$this->load->view('../views/cek_forgot_password');
		$this->load->view('../views/footer');
		 }
		 
		 public function reset_success()
		 {	 
		 
		$this->load->view('../views/top');
		$this->load->view('../views/reset_success');
		$this->load->view('../views/footer');
		 }


		public function forgot_password(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
         
         if($this->form_validation->run() == FALSE) {  
             //$data['title'] = 'Halaman Reset Password';  
             $this->load->view('../views/top');  
             $this->load->view('../views/forgot_password');
             $this->load->view('../views/footer');
         }else{  
             $email = $this->input->post('email');   
             $clean = $this->security->xss_clean($email);  
             $userInfo = $this->perusahaan->getUserInfoByEmail($clean);  
               
             if(!$userInfo){  
               $this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');  
               redirect(site_url('not-found'),'refresh');   
             }    
               
             //build token   
                       
             $token = $this->perusahaan->insertToken($userInfo->id_pelamar);              
             $qstring = $this->base64url_encode($token);           
             $url = site_url() . 'welcome/reset_password/token/' . $qstring;  
             $link = '<a href="' . $url . '">' . $url . '</a>';   
               
             $message = '';             
             $message .= 'Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.<br>';  
             $message .= 'Silakan klik tautan dibawah ini:<br><br>' . $link;         
   
             //echo $message; //send this through mail  

             /*Kirim email*/
				$subject_="ADMIN - Forgot Password";
				
				$pesan_='Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.<br>Silakan klik tautan dibawah ini:<br><br>'. $link;
				$to_=$email;
				
				$this->perusahaan->send_mail($subject_,$pesan_,$to_);	

		
		redirect('cek-forgot-password');
             exit;  
	}
}


	 public function reset_password()  
     {  
       $token = $this->base64url_decode($this->uri->segment(4));           
       $cleanToken = $this->security->xss_clean($token);  
         
       $user_info = $this->perusahaan->isTokenValid($cleanToken); //either false or array();          
         
       if(!$user_info){  
         $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
         redirect(site_url('welcome'),'refresh');   
       }    
   
       $data = array(  
         'title'=> 'Halaman Reset Password | Tutorial reset password CodeIgniter @ https://recodeku.blogspot.com',  
         'nama'=> $user_info->nama,   
         'email'=>$user_info->email,   
         'token'=>$this->base64url_encode($token)  
       );  
         
       $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');  
       $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         
         
       if ($this->form_validation->run() == FALSE) { 
       		 $this->load->view('../views/top');  
             $this->load->view('../views/reset_password', $data);
             $this->load->view('../views/footer');   
       }else{  
                           
         $post = $this->input->post(NULL, TRUE);          
         $cleanPost = $this->security->xss_clean($post);          
         $hashed = md5($cleanPost['password']);            
         $cleanPost['password'] = $hashed;  
         $cleanPost['id_pelamar'] = $user_info->id_pelamar;  
         unset($cleanPost['passconf']);          
         if(!$this->perusahaan->updatePassword($cleanPost)){  
           $this->session->set_flashdata('sukses', 'Update password gagal.');  
         }else{  
           $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');  
         }  
         redirect('reset-success','refresh');         
       }  
     }  
       
   public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
   }   
   
   public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
   }    

}
