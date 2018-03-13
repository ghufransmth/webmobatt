 
	
	
   <select name="atasan_2">
   <option value="0">Pilih Atasan</option>
		<?php
		foreach($data as $val){
				//$profile_image=$file_profil_save;
				$username=$val['username'];
				$username=$val['username'];
				$password=$val['password'];
				$first_name=$val['first_name'];
				$kode_jabatan=$val['kode_jabatan'];
				$nama_jabatan=$val['nama_jabatan'];
				$kode_unit=$val['kode_unit'];
				$nama_unit_kerja=$val['nama_unit_kerja'];
				$atasan_1=$val['atasan_1'];
				$atasan_2=$val['atasan_2'];
				$user_level=$val['user_level'];
				$profile_image=$val['profile_image'];
					$id=$val['id'];
		echo"
		<option value='".$val['id']."'>".$val['first_name']."</option>
		";
		
		}
		
	?>
	</select>