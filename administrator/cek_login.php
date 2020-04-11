<?php
include "config.php";

$username = addslashes(trim($_POST['username']));
$password = addslashes($_POST['password']);

$login=mysql_query("SELECT * FROM login WHERE username='$username' AND password='$password' ");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan (valid)

if ($ketemu > 0){

  		   if($r['level'] == "admin") {
            $_SESSION['admin'] = $r['id_login'];
              // maka menuju ke halaman index.php
            session_start();
			$_SESSION['id_login']=$r['id_login'];
			$_SESSION['username']=$r['username'];
			$_SESSION['password']=$r['password'];
			$_SESSION['nama']=$r['nama'];
			$_SESSION['level']=$r['level'];

              header("location: index.php");
            //dan jika levelnya operator
            } 

            else if($r['level'] == "operator") {
             $_SESSION['operator'] = $r['id_user'];
              // maka menuju ke halaman index.php
            session_start();
			$_SESSION['id_user']=$r['id_user'];
			$_SESSION['username']=$r['username'];
			$_SESSION['password']=$r['password'];
			$_SESSION['email']=$r['email'];
			$_SESSION['nama']=$r['nama'];
			$_SESSION['nip']=$r['nip'];
			$_SESSION['nohp']=$r['nohp'];
			$_SESSION['level']=$r['level'];
              header("location: index.php");
           }
}
else{
?>
<script type="text/javascript">alert("Login gagal! username & password tidak benar"); window.location.href="index.php"</script> 
<?php
}
?>

