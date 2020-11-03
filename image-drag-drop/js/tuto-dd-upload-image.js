    $(document).ready(function() {

     var surl = "//artgalaxie.com/";
      //  var site_url="http://server:81/Mary/artgalaxie.com/web/image-drag-drop/";  
      // var image_url="http://server:81/Mary/artgalaxie.com/web/";  
     var site_url= surl + "image-drag-drop/"; // change this path when go live
      var image_url= surl; // change this path when go live
     	
        // Add eventhandlers for dragover and prevent the default actions for this event
    	$('#dock').on('dragover', function(e) {
    		$(this).attr('class', 'dock_hover'); // If drag over the window, we change the class of the #dock div by "dock_hover"
    		e.preventDefault();
    		e.stopPropagation();
    	});
    	
    	// Add eventhandlers for dragenter and prevent the default actions for this event
    	$('#dock').on('dragenter', function(e) {
    		e.preventDefault();
    		e.stopPropagation();
    	});
    	
    	$('#dock').on('dragleave', function(e) {
    		$(this).attr('class', 'dock'); // If drag OUT the window, we change the class of the #dock div by "dock" (the original one)
    	});
    	
        //=======code on select file clicked
        $("#my-file-selector").change(function(){
            var fd = new FormData();
            // var files = $('#my-file-selector')[0].files[0]; //for single file selection
            var files = $('#my-file-selector')[0].files;//for multiple file selection file selection
            $('.progress-bar').attr('style', 'width: 0%').attr('aria-valuenow', '0').text('0%');
             $('#progress_bar_id').show();
             $('#progress_bar_id').html('Processing...'+'<img src="'+image_url+'front_assets/images/smartloader.gif" >');
            upload(files);
          });
         //=======code on select file clicked
    	
    	function upload(files){ // upload function
            var q = 0;
            var fd = new FormData(); // Create a FormData object
    		for (var i = 0; i < files.length; i++) { // Loop all files
              if (!files[i].name.match(/\.(jpg|jpeg|png|gif)$/)){
               alert('Invalid file format. ');
               exit();
            }else{   
                    fd.append('file_' + q, files[i]);
                    q++;
               }
                
    		}
    		fd.append('nbr_files', q); // The last append is the number of files
            $.ajax({ // JQuery Ajax
    			type: 'POST',
    			url: site_url+'ajax/tuto-dd-upload-image.php', // URL to the PHP file which will insert new value in the database
    			data: fd, // We send the data string
    			processData: false,
    			contentType: false,
    			success: function(data) {
                    var resultImage =  data.split('##????##');
                    $('#result').show();
                    //=======Customize code to show images in thumbnail and add conditions END
                    $('#progress_bar_id').hide(); 
                    $('#result').append(resultImage[0]);// Display images thumbnail as result
                    $('#dock').attr('class', 'dock'); // #dock div with the "dock" class
                },
    			xhrFields: { //
    				onprogress: function (e) {
    					if (e.lengthComputable) {
                            var pourc = e.loaded / e.total * 100;
                            $('#progress_bar_id').hide();//remove processing text
                            $('.progress-bar').attr('style', 'width: ' + pourc + '%').attr('aria-valuenow', pourc).text(pourc + '%');
    					}
    				}
    			},
    		});
    	}
    	
    });