    <?php
    include('../db.class.php');
    ini_set('post_max_size', '2000M');
    ini_set('upload_max_filesize', '5M');
    ini_set('max_execution_time', '6000000'); 
    ini_set('max_input_time','6000000'); 
    ini_set('memory_limit', '128M'); 
    $bdd = new db();
    
    $asiteurl = "artgalaxie.com";
	$http = (isset($_SERVER['HTTPS']) ? "https" : "http");
	if($_SERVER['HTTP_HOST'] == "server:81") 
	{
		$rootUrl = "http://server:81/Mary/artgalaxie.com/";	
	}else if($_SERVER['HTTP_HOST'] == $asiteurl) 
	{	
		$rootUrl = $http."://" . $asiteurl . "/";
	} 
	else if($_SERVER['HTTP_HOST'] == "www." . $asiteurl)  
	{
		$rootUrl = $http."://www." . $asiteurl . "/";
	}
	
    $acceptedExtension = Array('image/jpeg', 'image/jpg', 'image/pjpg', 'image/pjpeg', 'image/png', 'image/gif'); // add here allowed extensions
    $maxSize = 6000000; //image size max 5Mb == 5000000  //1000000==1MB
    $destFolder = '../uploads/testimonials/';
    $countOfImages =0;
    //echo '<div class="result-in">'; // Bootstrap CSS Thumbnails
    echo ''; // Bootstrap CSS Thumbnails
   for($i = 0; $i < $_POST['nbr_files']; $i++) { // Loop through each file
    	 $countOfImages++;
    	$imgType = $_FILES["file_".$i]["type"];
    	$imgSize = $_FILES["file_".$i]["size"];
    	$imgName = $_FILES["file_".$i]["name"];
    	$imgTmpName = $_FILES["file_".$i]["tmp_name"];
        if (in_array($imgType, $acceptedExtension) && $imgSize <= $maxSize && $imgSize != "") { // we test the validity of the image
     
    		$randNbr = rand(1000000, 9999999); // Choose a random number between 1000000 and 9999999
    		$newOriginalImageName = 'img-'.$randNbr.'.'.pathinfo($imgName, PATHINFO_EXTENSION); // Create a new file name including the random number, starting by img-
    		$newThumbImageName = 'adimg-'.$randNbr.'.'.pathinfo($imgName, PATHINFO_EXTENSION); // Create a thumbnail name including the random number, starting by img-small-
     
    		if(move_uploaded_file($imgTmpName,"../".$destFolder.$newOriginalImageName)) { // test if the original image is moved on the server 
                
    			copy("../".$destFolder.$newOriginalImageName, "../".$destFolder.$newThumbImageName); // we copy the origininal image and rename it (it will be our thumbnail)
    			chmod ("../".$destFolder.$newThumbImageName, 0777); // we change the chmod so we can crop
    					
    			// we crop the photo
    			list($width, $height, $type, $attr) = getimagesize("../".$destFolder.$newOriginalImageName); // we take the image height and width
    			// the crop function is below
    			if ($width>$height) { // if the image is landscape style
    				crop_img ("../".$destFolder.$newThumbImageName, 306, 233); // we crop and resize 160x120px
    			} else { // if the image is portrait style
    				crop_img ("../".$destFolder.$newThumbImageName, 306, 233);// we crop and resize 120x160px
    			}
    		  	// we instert into database; the thumbnail path and the original path
    			$upload = $bdd->execute('INSERT INTO temp_image_upload_tbl (date_ins, hour_ins, img_thumb, img_original, member_id) VALUES (NOW(), NOW(), "'.$newThumbImageName.'", "'.$newOriginalImageName.'", "'.$member_id.'")');
    			$insertID =  mysql_insert_id();
    			echo '<div class="col-xs-6 col-md-3 uplode-img" id="imageID_'.$insertID.'" ><a href="#" class="thumbnail"><img src="'.$rootUrl."uploads/testimonials/".$newThumbImageName.'" alt="'.$member_id.'"  /></a><input type="hidden"  id="uploadedImageName" name="uploadedImageName" value="'.$newThumbImageName.'"></div>'; // we send back the thumbnail - check Bootstrap for the CSS
                 ?>
                <script type="text/javascript">
                    $(document).ready(function(){  //manage progress bar width
                        $('.progress-bar').attr('style', 'width: 100%').attr('aria-valuenow', '100').text('100%'); 
                        }); 
                </script>
                <?
    		}
          
    	} 
     }
 
    // crop function (feel free to adapt)
    function crop_img ($image, $thumb_width, $thumb_height) {  
        
        $asiteurl = "artgalaxie.com";
    	$http = (isset($_SERVER['HTTPS']) ? "https" : "http");
    	if($_SERVER['HTTP_HOST'] == "server:81") 
    	{
    		$rootUrl = "http://server:81/Mary/artgalaxie.com/";	
    	}else if($_SERVER['HTTP_HOST'] == $asiteurl) 
    	{	
    		$rootUrl = $http."://" . $asiteurl . "/";
    	} 
    	else if($_SERVER['HTTP_HOST'] == "www." . $asiteurl)  
    	{
    		$rootUrl = $http."://www." . $asiteurl . "/";
    	}

        //----- Water mark code
        $small_stamp1=$rootUrl."front_assets/images/ArtGalaxieWatermark.png";
                                

        $watermark = imagecreatefrompng($small_stamp1);
    
        $watermark_width = imagesx($watermark);  
        $watermark_height = imagesy($watermark); 
         
        $dest_x = 306 - $watermark_width - 5;  
        $dest_y = 233 - $watermark_height - 5;
        //----- Water mark code


    	$filename = $image;
    	$image = imagecreatefromstring(file_get_contents("$image"));
     
    	$width = imagesx($image);
    	$height = imagesy($image);
     
    	$original_aspect = $width / $height;
    	$thumb_aspect = $thumb_width / $thumb_height;
     
    	if ( $original_aspect >= $thumb_aspect ) {
    	   // If image is wider than thumbnail (in aspect ratio sense)
    	   $new_height = $thumb_height;
    	   $new_width = $width / ($height / $thumb_height);
    	} else {
    	   // If the thumbnail is wider than the image
    	   $new_width = $thumb_width;
    	   $new_height = $height / ($width / $thumb_width);
    	}
     
    	$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
     
    	// Resize and crop
    	imagecopyresampled($thumb,
    		$image,
    		0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
    		0 - ($new_height - $thumb_height) / 2, // Center the image vertically
    		0, 0,
    		$new_width, $new_height,
    		$width, $height);

        imagecopy($thumb, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height); 
        
    	return imagejpeg($thumb, $filename, 50);
    }

    ?>