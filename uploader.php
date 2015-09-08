<?php

Class Uploader
{
	public function multiple_upload($files, $upload_dir = 'images/', $allowed_types = 'gif|jpg|jpeg|jpe|png', $size)
	{
		if(isset($files) && !empty($files)):
		$errors = FALSE;
		$filename = $files['name'];
		$rand = rand(111111111,999999999);
		$filetmp = $files['tmp_name'];
		$filetype = $files['type'];
		$filesize = $files['size'];
		$path = realpath($upload_dir)."/".$rand.$filename;
		$allowed_types = explode("|", $allowed_types);
			$allowed = false;
			foreach($allowed_types as $types):
				if($filetype == "image/".$types):
					$allowed = true;
				endif;
			endforeach;
			
			//if the submitted file is larger then the allowed size, return false
			if($filesize > $size):
				return false;
			endif;
			
			if($allowed == true):
				if(move_uploaded_file($filetmp,$path)):
					return $path;
				else:
					return false;
					$error = true;
				endif;
			else:
				return false;
			endif;
	
		endif;//end of if files exist and is not empty
			

		// There was errors, we have to delete the uploaded files
		if($errors):
			@unlink($path);
			return false;
		else:
			return $files;
		endif;

    }

    public function d_external_img($src, $targetFolder) 
	{
		$error = false;
		//create unique id, with time() it will always be unique because time is unique
		$t = time();
		$r = rand(000,999);
		$filename = $t."-tutimage-".$r;
		//get image information
		//list($width, $height, $type, $attr) = getimagesize($src);
		$type = substr($src, -4);
		if($type != '.gif' && $type != '.jpg' && $type != '.png'){
			$error = true;
		}
		//download the file
		if($error == false):
	            $path = $targetFolder.$filename.$type;
	            if($ch = curl_init($src)):
	                $fp = fopen($path, 'wb');
	                curl_setopt($ch, CURLOPT_FILE, $fp);
	                curl_setopt($ch, CURLOPT_HEADER, 0);
		            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	                curl_exec($ch);
	                curl_close($ch);
	                fclose($fp);
	            else:
	                return false;
	            endif;
	            return $filename.$type;
		else:
	            return false;
		endif;
	}
	/*
	NOG AAN TE PASSEN
	public function upload_batch_images($name = 'userfile', $upload_dir = 'sources/images/', $allowed_types = 'gif|jpg|jpeg|jpe|png', $size)
	{
		/*$CI =& get_instance();
			$realpath = $upload_dir."images-".rand(1111111111,9999999999); //let's make it unique
			$config['upload_path']   = $realpath;
			$config['allowed_types'] = $allowed_types;
			$config['max_size']      = $size;
			$config['overwrite']     = FALSE;
			$config['encrypt_name']  = TRUE;

		$CI->upload->initialize($config);

		if(mkdir($realpath)):
			if($CI->upload->do_upload($name)):
				$files = $CI->upload->data();
				if(openZip($realpath."/".$files['file_name'], $realpath)):
					@unlink($files['full_path']);
					return $realpath;
				else:
					@unlink($files['full_path']);
					return false;
				endif;
			endif;
		else:
			return false;
		endif;

	}

	public function openZip($file_to_open, $zip_target)
	{
		/*$zip = new ZipArchive();
		$x = $zip->open($file_to_open);
		if ($x === true):
			$zip->extractTo($zip_target);
			$zip->close();
			return true;
		else:
			return false;
		endif;
	}*/
}