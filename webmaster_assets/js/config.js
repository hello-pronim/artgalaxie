var serverurl = "artgalaxie.com";
if(window.location.host=='server:81'){	
	var url="http://server:81/Mary/artgalaxie.com/web/";
	var site_url="http://server:81/Mary/artgalaxie.com/web/";
	var rootUrl="http://server:81/Mary/artgalaxie.com/web/";
}
if(window.location.host==serverurl){	
	var url= location.protocol + "://" + serverurl + "/"; 
	var site_url= location.protocol + "://" + serverurl + "/";
	var rootUrl= location.protocol + "://" + serverurl + "/";
}
if(window.location.host=='www.' + serverurl){	
	var url= location.protocol + "://www." + serverurl + "/";
	var site_url= location.protocol + "://www." + serverurl + "/"; 
	var rootUrl= location.protocol + "://www." + serverurl + "/"; 
} 