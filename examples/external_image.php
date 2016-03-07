<?php
require_once "../file-manager.php";

if (FileManager::d_external_img('https://pmcdeadline2.files.wordpress.com/2014/02/minecraft__140227211000.jpg')) {
	echo 'Image downloaded';
} else {
	echo 'Could NOT download the image';
}