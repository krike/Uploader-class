Uploader class
=================

A simple uploader class to upload single or multiple files.

Example:

	if(Uploader::multiple_upload($_FILES['thumb'], 'images/', 'gif|jpg|jpeg|jpe|png', 300000)):
		$feedback = "<div class='success'>Upload successfull!</div>";
	else:
		$feedback = "<div class='error'>Upload unsuccessfull!</div>";
	endif;