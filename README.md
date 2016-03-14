File Manager class
=================

A simple uploader class to upload single or multiple files.

*Available Functions

Upload files

	FileManager::multiple_upload($_FILES['thumb'], 'images/', 'gif|jpg|jpeg|jpe|png', 300000)

Download External images

	FileManager::d_external_img('http://url-to-image.com/image.jpg', 'img');

Delete entire directory (be carefull with this function!)

	FileManager::delete_directory('directory/path/');

Copy entire directory to new location

	FileManager::directory_copy('directory/source/', 'directory/target/');

Open zip file
	
	FileManager::openZip('path/to/zipfile.zip', 'directory/target/');
