<?php
	function encrypt($str) {
		$kunci = '979a218e0632df2935323f98d47956c9';
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			@$hasil .= $karakter;        
		}
		return urlencode(base64_encode($hasil));
	}
	
	function decrypt($str) {
		$str = base64_decode(urldecode($str));
		$hasil = '';
		$kunci = '979a218e0632df2935323f98d47956c9';
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$hasil .= $karakter;
		}
		return $hasil;
	}
?>