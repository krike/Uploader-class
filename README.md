Uploader class
=================

A simple uploader class to upload single or multiple files.

***Available Functions

Upload files

	Uploader::multiple_upload($_FILES['thumb'], 'images/', 'gif|jpg|jpeg|jpe|png', 300000)

Download External images

	Uploader::d_external_img('http://url-to-image.com/image.jpg', 'img');

Delete entire directory (be carefull with this function!)

	Uploader::delete_directory('directory/path/');

Copy entire directory to new location

	Uploader::directory_copy('directory/source/', 'directory/target/');

Open zip file
	
	Uploader::openZip('path/to/zipfile.zip', 'directory/target/');