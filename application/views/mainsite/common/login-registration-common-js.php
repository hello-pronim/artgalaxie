<?php 
if($this->session->userdata('CUST_ID')=='')
{ 
?>
    <script type="text/javascript">
    $("#login-nav").keypress(function(event) {
        if (event.which == 13) {
    		checkLogin();
    	}
    });
    
    $("#Formreg").keypress(function(event) {
        if (event.which == 13) {
    		checkRegistration();
    	}
    });
    //===================================
    function checkLogin()
    {
    	var email=$('#Lemail').val();
    	var password=$('#Lpassword').val();
    	var remember =$('#remember').val();
    	var parameters="email="+email+"&password="+password+"&remember="+remember;
    	$("#div_errorL").html('');
    	$('#div_successL').html('');
    	
    	if(email=='')
    	{
    	    $("#div_errorL").show();
    		$("#div_errorL").html('Please enter Email Id');
    		$("#Lemail").focus();
    		return false;
    	}
    	else
    	{
    		$("#Lpassword").focus();
    	}	
    	
    	if(password=='')
    	{
    	    $("#div_errorL").show();
    		$("#div_errorL").html('Please enter password');
    		return false;
    	}
    	
    	 $.ajax({
    		type: "POST",
    		url: "<?=site_url("home/login")?>",
    		data: parameters,
    		cache: false,
    		success: function(data){
    			// alert('here In Loginb'+data)
    			$res = data.split('####');
    			
    			if($res[0]=='Done'){
    				 
    			   $('#div_successL').html('<b>You have successfully signed in!</b>');
    			 //  window.location.href="<?=current_url();?>";
    			   window.location.href="<?=site_url('profile')?>";
    			   $('#div_successL').show();
    			   var email=$('#Lemail').val('');
    			   var password=$('#Rpassword').val('');
    			 
    			}else{
    				$('#div_errorL').show();
    				$('#div_errorL').html('<b>'+data+'</b>');
    			}
    		}
    	 });
    }
    
    function checkRegistration()
    {
    	var fname=$('#first_name').val().trim();
    	var lname=$('#last_name').val().trim();
    	var email=$('#email_address').val().trim();
    	var password=$('#password').val().trim();	
    	var confirmpassword=$('#cpassword').val().trim();
    	var address=$('#address').val().trim();
    	var address2=$('#address2').val().trim();
    	var country=$('#country').val().trim();
    	var state=$('#state').val().trim();
    	var city=$('#city').val().trim();
    	var phone=$('#phone').val().trim();
    	var zip=$('#zip').val().trim();
        var user_type='New User';
    		
    	//var regulerExpression = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).{8,}$/;
     
    	var parameters="first_name="+fname+"&last_name="+lname+"&email="+email+"&password="+password+"&address="+address+"&address2="+address2+"&country="+country+"&state="+state+"&city="+city+"&phone="+phone+"&zip="+zip;
    	
    	$("#div_error").html('');
    	$('#div_success').html('');
    
        // First Name
    	if(fname=='')
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Please enter your first name');
    		$("#first_name").focus();
    		return false;
    	}
    	/*else
    	{ 
    	    $("#last_name").focus();
    	}*/
    	
    	// Lasst Name
    	/*if(lname=='')
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Please enter your last name');
    		$("#last_name").focus();
    		return false;
    	}*/
    
        // Email Address
    	if(email=='')
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Please enter your email address');	
    		$("#email_address").focus();
    		return false;
    	}
    	
    	// Password
    	if(password=='')
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Please enter a password');
    		$("#password").focus();
    		return false;
    	}
    	
    	//Confirm Password
    	if(confirmpassword=='')
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Please confirm your password');
    		$("#cpassword").focus();
    		return false;
    	}
    	if(password != confirmpassword)
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Password & confirmed password do not match');
    		$("#cpassword").focus();
    		return false;
    	}	
        
        // Address
    	/*if(address==''){
    	    $("#div_error").show();
    		$("#div_error").html('Please enter address');
    		$("#address").focus();
    		return false;
    	}*/
    
        // Country
    	/*if(country=='')
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Please select country');
    		$("#country").focus();
    		return false;
    	}*/
    
        //Phone 
    	/*if(phone=='')
    	{
    	    $("#div_error").show();
    		$("#div_error").html('Please enter your phone number');
    		$("#phone").focus();
    		return false;
    	}
    	else if(!phone.match(/^\d+$/))
    	{
    	 	$("#div_error").show();
    		$("#div_error").html('Please enter valid phone number');
    		$("#phone").focus();
    		$("#phone").val('');
    		return false;
    	}
    	else if(phone.length<10)
    	{
    		$("#div_error").show();
    		$("#div_error").html('Please enter 10 digit valid phone number');
    		$("#phone").focus();
    		return false;
    	}*/
    	
    	 $.ajax({
    		type: "POST",
    		url: "<?=site_url("home/register")?>",	
    		data: parameters+"&user_type="+user_type,
    		cache: false,
    		success: function(data){
    			
    			if(data=='Done')
    			{
    				$('#div_success').show();
    				$('#RegDivFrm').show();
    				$('#RegDivFrmhead').show();
    				$('#RegDivFrmreg').hide();
				$('#RegDivFrm').html('Thank you for registering on Art Galaxie!</br>An email containing the activation link has been sent to your email address.<style>.modal.in .modal-dialog{transform: translate(0px,50%);}.cnt-form .modal-dialog {width: auto;margin: 0% 25%;}.contact-madal .modal-footer .btn{display:none;}#RegDivFrm{font-size: 20px;}</style>');
    				$('#reg-col-1').hide();
    				$('#regsubmitbtn').hide();
    			    setTimeout(function() {$('#myModalRegister').modal('hide');}, 6000);
    			}
    			else
    			{
    				$('#div_error').show();
    				$('#div_error').html('<b>'+data+'</b>');
    			}
    		}
    	 });
    }
</script> 
<?php 
} 
?>
<script src="<?=base_url()?>front_assets/js/config.js"></script>
<script type="text/javascript">
//Newsletter subscribe
function subscribe_newsletter() {
  var contact_name = $('#contact_name_news').val();
  var contact_email = $('#contact_email_news').val();
 if(contact_name=='')
  {
     $('#msg-newsletter').html('<span class="text-danger">Please enter name.</span>');
     $('#contact_name_news').focus();
   return false
  }
  if(contact_email=='')
  {
     $('#msg-newsletter').html('<span class="text-danger">Please enter email address.</span>');
     $('#contact_email_news').focus();
   return false
  }
 //if ($("#g-recaptcha-response-news").val()) {

    xyz = $("#g-recaptcha-response-news").val();
    jQuery.ajax({
              type: "POST",
              url: site_url+"home/subscribe_newsletter",
              data: {           
                    contact_name: contact_name,
                    contact_email: contact_email
                   // captcha: xyz //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
                  },
              cache: false,
              success:  function(data)
            { 
             if(data=='done')
              {
                $('#contact_name_news').val('');
                $('#contact_email_news').val('');
                $('#msg-newsletter').html('<span class="text-success">Mail sent successfully!!</span>');
                $('#myModalNewsletter').modal('hide')
               	$('#thanksnewslettermodal').modal('toggle');
              }
              
              if(data=='NameBlank'){
               $('#msg-newsletter').html('<span class="text-danger">Name can not be blank!!</span>');
               $('#contact_name_news').focus()
               }
              if(data=='Emailblank'){
               $('#msg-newsletter').html('<span class="text-danger">Email address can not be blank!!</span>');
               $('#contact_email_news').focus();
               }
              if(data=='InvalidEmail'){
                  $('#msg-newsletter').html('<span class="text-danger">Please enter valid e-mail address!!</span>');
                  $('#contact_email_news').focus();
                }
              /*if(data=='InvalidCaptcha'){
                $('#msg-newsletter').html('<span class="text-danger">Please enter valid captcha code!!</span>');
                $('#g-recaptcha-response-news').focus();
              }*/
              if(data=='AlreadyExists'){
                $('#msg-newsletter').html('<span class="text-danger">You have already subscribed to our Newsletters!!</span>');
              }
              }
            });
            
  /*  }else{
        $('#msg-newsletter').html('<span class="text-danger">Please Fill Captcha!!</span>');
    }*/
}
</script>