<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'home';//'errors';

$route['secure'] = "webmaster/login";
$route['webmaster'] = "webmaster/login";
$route['dashboard'] = "webmaster/dashboard";


$route['my_artwork']        = "profile/my_artwork";
$route['my_favourites']     = "profile/my_favourites";
$route['my_collections']    = "profile/my_collections";
$route['save_for_later']    = "profile/save_for_later";

$route['profile']           = "profile/manage_desc/my_profile";
$route['changepassword']    = "profile/changepassword";
$route['biography']         = "profile/manage_desc/biography";
$route['statement']         = "profile/manage_desc/statement";
$route['exhibition']        = "profile/manage_desc/exhibition";
$route['awards']            = 	"profile/manage_desc/awards";
$route['publication']       = "profile/manage_desc/publication";
$route['video']      = "profile/manage_desc/my_videos";
$route['my_videos/([0-9]+)']   = "profile/manage_desc/my_videos/$1";
$route['my_videos/action/([0-9]+)'] = "profile/my_videos/$1";
$route['my_videos/delete_my_video/([0-9]+)'] = "profile/delete_my_video/$1";




$route['categories'] = "artists/categories";
$route['categories_details'] = "artists/categories_details";
$route['styles'] = "artists/styles";
$route['style_details/([0-9]+)/([a-zA-Z0-9._-]+)'] = "artists/style_details/$1/$2";
$route['artists-by-country'] = "artists/artists_by_country";
$route['artists-video/([0-9]+)'] = "artists/artist_video/$1";
$route['mostly-viewed'] = "artists/artist_mostly_viewed";
$route['recently-added'] = "artists/artist_recently_added";
$route['search'] = "artists/search";



$route['publications'] = "home/publications";
$route['publication_details/([0-9]+)/([a-zA-Z0-9._-]+)'] = "home/publication_details/$1/$2";
$route['galleries'] = "home/galleries";
$route['about-us'] = "home/about_us";
$route['services'] = "home/services";
$route['marketing-and-advertising'] = "home/marketing_advertising";
$route['digital-marketing'] = "home/digital_marketing";
$route['content-marketing'] = "home/content_marketing";
$route['website'] = "home/website";
$route['video-production'] = "home/video_production";
$route['exhibitions'] = "home/exhibitions";
$route['gallery_details/([0-9]+)/([a-zA-Z0-9._-]+)'] = "home/gallery_details/$1/$2";
$route['testimonials'] = "home/testimonials";
$route['design-services'] = "home/design";
$route['art-services'] = "home/art";
$route['guestbook'] = "home/guestbook";

$route['privacy-policy'] = "cms/index/19";
$route['terms-and-conditions'] = "cms/index/18";
$route['printing'] = "cms/printing";
$route['tutorials'] = "cms/tutorials";
$route['tutorials_list'] = "cms/tutorials_list";
$route['tutorials/details/([0-9]+)/([a-zA-Z0-9._-]+)'] = "cms/tutorials_details/$1/$2";
$route['tutorials/filters'] = "cms/filter_tutorials";
$route['tutorials/categories/([a-zA-Z0-9._-]+)/([a-zA-Z0-9._-]+)'] = "cms/tutorial_by_cats/$1/$2";
$route['magazine'] = "cms/magazine";


$route['404_override'] = 'errors/page_missing';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'imageupload';
