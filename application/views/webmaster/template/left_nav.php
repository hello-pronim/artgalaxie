<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                   <a href="<?=site_url('webmaster/dashboard')?>">
                    <?php if($this->common->getSiteLogo()!=""){?>
                        <img class="img-responsive" src="<?=base_url()?>uploads/sitelogo/<?=$this->common->getSiteLogo()?>" alt="<?=SITENAME?>">
                    <?php }else{?>
                        <img class="img-responsive" src="<?=base_url()?>img/logo.jpg" alt="<?=SITENAME?>">
                    <?php } ?>
                    </a>
                </div>
            </li>
            <li <?php if ($act_id=='CMS') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-lg fa-align-left"></i> <span class="nav-label">Manage Content</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <!--<li><a href="<?=site_url('webmaster/manage_cms/page_list')?>">CMS Pages</a></li>  -->
                <li <?php if (@$sub_act_id=='homePage') {?> class="active" <?php }?> >
                    <a href="#">Homepage<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='homeMainSlider') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_slider')?>">Main Slider</a></li>
                        <li <?php if (@$sub_sub_act_id=='otherSlider') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/home_content/sliders')?>">Sliders</a></li>
                        <li <?php if (@$sub_sub_act_id=='section1') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/home_content/section1')?>">Who we are</a></li>
                        <li <?php if (@$sub_sub_act_id=='section2') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/home_content/section2')?>">Our Mission</a></li>
                        <li <?php if (@$sub_sub_act_id=='section3') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/home_content/section3')?>">The Art of Giving</a></li>
                        <li <?php if (@$sub_sub_act_id=='otherLinks') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/other_links/other_links_list')?>">Icon Links</a></li>
                        <li <?php if (@$sub_sub_act_id=='services') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/services')?>">Service Icons</a></li>
                    </ul>
                </li>
                <li <?php if (@$sub_sub_act_id=='category_list') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/categories/category_list')?>">Categories</a></li>
                <li <?php if (@$sub_sub_act_id=='country_list') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/categories/country_list')?>">Countries</a></li>
                <li <?php if (@$sub_sub_act_id=='city_list') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/categories/city_list')?>">Cities</a></li>
                <li <?php if (@$sub_sub_act_id=='region_list') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/categories/region_list')?>">Regions</a></li>
                <li <?php if (@$sub_sub_act_id=='style_list') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/categories/style_list')?>">Styles</a></li>
                <li <?php if (@$sub_sub_act_id=='other_pages_sliders') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/manage_slider/other_pages_sliders')?>">Video/Image sliders</a></li>
                <li <?php if (@$sub_sub_act_id=='more_featured_artists') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/categories/more_featured_artists')?>">Featured Artist Thumbnails</a></li>
            </ul>
            </li>
            <li <?php if ($act_id=='allPages') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-file fa-align-left"></i> <span class="nav-label">Manage Pages</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li <?php if (@$sub_act_id=='regionwiseGallery') {?> class="active" <?php }?> >
                    <a href="#">Galleries<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='galleryCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/2')?>">CMS</a></li>
                        <li <?php if (@$sub_sub_act_id=='regiongallery') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/regionwise_gallery')?>">Gallery</a></li>
                    </ul>
                </li>
               <li <?php if (@$sub_act_id=='gallery_benefits') {?> class="active" <?php }?> >
                    <a href="#">Gallery Benefits<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='gallery_benefitsCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/24')?>">CMS</a></li>

                        <li <?php if (@$sub_sub_act_id=='gallery_benefitsCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/gallery_benefits')?>">Gallery Benefits</a></li>
                    </ul>
                </li>
                <li <?php if (@$sub_act_id=='publication') {?> class="active" <?php }?> >
                    <a href="#">Publication<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='publicationCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/7')?>">CMS</a></li>

                        <li <?php if (@$sub_sub_act_id=='managePublication') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/publication')?>">Publication</a></li>
                    </ul>
                </li>

                 <li <?php if (@$sub_act_id=='video') {?> class="active" <?php }?> >
                    <a href="#">Video <span class="fa arrow"></span>  </a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='videoCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/17')?>">CMS</a></li>
                         <li <?php if (@$sub_sub_act_id=='othervideo') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/other_videos/other_video_list')?>">Video Portfolio</a></li>
                    </ul>
                </li>
                <li <?php if (@$sub_act_id=='artist_video') {?> class="active" <?php }?> >
                    <a href="#">Artist Video <span class="fa arrow"></span>  </a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='artist_videoCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/29')?>">CMS</a></li>
                    </ul>
                </li>

                <li <?php if (@$sub_act_id=='aboutUs') {?> class="active" <?php }?> >
                    <a href="#">About Us<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='aboutUsCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/8')?>">CMS</a></li>
                        <li <?php if (@$sub_sub_act_id=='manageAboutUs') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/about_us')?>">About Us</a></li>
                    </ul>
                </li>

                <li <?php if (@$sub_act_id=='services') {?> class="active" <?php }?> >
                    <a href="#">Services<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level collapse" style="">
                        <li <?php if (@$sub_sub_act_id=='servicesCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/9')?>">CMS</a></li>
                        <li <?php if (@$sub_sub_act_id=='manageServices') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/services_page/index')?>">Services</a></li>
                        
                        <!-- Art Services-->
                         <li <?php if (@$sub_sub_act_id=='artServices') {?> class="active" <?php }?> >
                            <a href="#">Art Services <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='artSericesCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/15')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='manageArtSerices') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/services_page/art')?>">Art Services</a></li>
                            </ul>
                        </li>
                        
                        <!-- Websites-->
                        <li <?php if (@$sub_sub_act_id=='website') {?> class="active" <?php }?> >
                        <a href="#">Website <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='websiteCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/11')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='manageWebsite') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/website/index')?>">Website</a></li>
                            </ul>
                        </li>
                        
                        <!-- Art Marketing-->
                        <li <?php if (@$sub_sub_act_id=='art_marketing') {?> class="active" <?php }?> >
                        <a href="#">Art Marketing <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='art_marketingCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/10')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='manageArtMarketing') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/art_marketing/index')?>">Art Marketing</a></li>
                            </ul>
                        </li>
                        
                        <!-- Design Services-->
                        <li <?php if (@$sub_sub_act_id=='design') {?> class="active" <?php }?> >
                            <a href="#">Design Services <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='DesignSericesCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/14')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='manageDesignSerices') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/services_page/design')?>">Design Services</a></li>
                            </ul>
                        </li>
                        
                        <!-- Painting-->
                        <li <?php if (@$sub_sub_act_id=='printing') {?> class="active" <?php }?> >
                        <a href="#">Printing <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='printingCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/20')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='manageprinting') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/printing')?>">Printing</a></li>
                            </ul>
                        </li>
                        
                        <!-- Video Production-->
                        <li <?php if (@$sub_sub_act_id=='video-production') {?> class="active" <?php }?> >
                        <a href="#">Video Production <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='video-productionCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/12')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='manageVideo-production') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/video_production/index')?>">Video Production</a></li>
                            </ul>
                        </li>
                        
                        <!-- Exhibitions-->
                        <li <?php if (@$sub_sub_act_id=='exhibitions') {?> class="active" <?php }?> >
                            <a href="#">Exhibitions <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='exibitionCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/13')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='manageExibition') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/exhibitions')?>">Exhibitions</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <!-- Art of Giving -->
                    <li <?php if (@$sub_act_id=='art_of_giving') {?> class="active" <?php }?> >
                    <a href="#">Art of Giving<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse" style="">
                            <li <?php if (@$sub_sub_act_id=='art_of_givingCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/23')?>">CMS</a></li>
                            <li <?php if (@$sub_sub_act_id=='art_of_giving') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/art_of_giving')?>">Art of Giving</a></li>
                            
                            <!-- Just Giving Book -->
                            <li <?php if (@$sub_sub_act_id=='just_giving_book') {?> class="active" <?php }?> >
                            <a href="#">Just Giving Book<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='just_giving_bookCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/25')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='just_giving_bookmanage') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/art_of_giving/just_giving_book')?>">Just giving Book</a></li>
                            </ul>
                            </li>
                            
                            <!-- Just Giving Websites -->
                            <li <?php if (@$sub_sub_act_id=='just_giving_websites') {?> class="active" <?php }?> >
                            <a href="#">Just Giving Websites<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='just_giving_websitesCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/26')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='just_giving_websitesmanage') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/art_of_giving/just_giving_websites')?>">Just giving Websites</a></li>
                            </ul>
                            </li>
                            
                            <!-- Just Giving Video -->
                            <li <?php if (@$sub_sub_act_id=='just_giving_video') {?> class="active" <?php }?> >
                            <a href="#">Just Giving Video<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='just_giving_videoCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/27')?>">CMS</a></li>
                                 <li <?php if (@$sub_sub_sub_act_id=='just_giving_videomanage') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/art_of_giving/just_giving_video')?>">Just giving Video</a></li>
                            </ul>
                            </li>
                            
                            <!-- View Competitions -->
                            <li <?php if (@$sub_sub_act_id=='view_competitions') {?> class="active" <?php }?> >
                            <a href="#">View Competitions<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse" style="">
                                <li <?php if (@$sub_sub_sub_act_id=='view_competitionsCms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/28')?>">CMS</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='view_competitionsmanage') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/art_of_giving/view_competitions')?>">Competitons</a></li>
                                <li <?php if (@$sub_sub_sub_act_id=='past_competitions_intro') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/art_of_giving/past_competitions_intro')?>">Past Intro</a></li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                        
                        
                </li>
               
                <li <?php if (@$sub_act_id=='termsConditions') {?> class="active" <?php }?> >
                     <a href="<?=site_url('webmaster/manage_cms/manage_page/18')?>"><span class="nav-label">Terms & Conditions</span></a>
                </li>  
                 <li <?php if (@$sub_act_id=='privacyPolicy') {?> class="active" <?php }?> >
                     <a href="<?=site_url('webmaster/manage_cms/manage_page/19')?>"><span class="nav-label">Privacy Policy</span></a>
                </li>
                <li <?php if (@$sub_act_id=='magzin') {?> class="active" <?php }?> >
                    <a href="<?=site_url('webmaster/manage_cms/manage_page/21')?>">Magazine</a>
                </li>
            </ul>
            </li>

          <!--  <li <?php if ($act_id=='publication') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Publication</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="<?=site_url('webmaster/manage_cms/manage_page/7')?>">CMS</a></li>
                <li><a href="<?=site_url('webmaster/publication')?>">Manage Publication</a></li>
            </ul>
            </li>-->
            
           
           
            
            <li <?php if ($act_id=='smartslider3') {?> class="active" <?php }?> >
            <a href="/smartslider" target="_blank"><i class="fa fa-sliders"></i> <span class="nav-label">Smartslider3</span><span class="fa arrow"></span></a>
            </li>
            
            <li <?php if ($act_id=='user') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-users" aria-hidden="true"></i><span class="nav-label">Users</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="<?=site_url('webmaster/user/index')?>">Users List</a></li>
            </ul>
            </li>

            <li <?php if ($act_id=='product_attr') {?> class="active" <?php }?> >
                <a href="#"><i class="fa fa-cart-plus fa-align-left" aria-hidden="true"></i><span class="nav-label">Shop</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <!--<li <?php if (@$sub_act_id=='manageProductcms') {?> class="active" <?php }?> ><a href="<?=site_url('webmaster/manage_cms/manage_page/22')?>">Manage Products CMS </a></li>-->
                    <li <?php if (@$sub_act_id=='managebooks') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/shop')?>">Books</a></li>
                    <li  <?php if (@$sub_act_id=='manageProduct') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/products')?>">Original Artworks</a></li>
                    <li <?php if (@$sub_act_id=='shoplinks') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/shop_links')?>">Shop links</a></li>
                    <!--<li><a href="<?=site_url('webmaster/product_attributes/colours_list')?>">Manage Colours</a></li>
                    <li><a href="<?=site_url('webmaster/product_attributes/dimensions_list')?>">Manage Dimensions</a></li>-->
                    
                    
                </ul>
            </li>
            
            <li <?php if ($act_id=='blog') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-blogger fa-align-left" aria-hidden="true"></i><span class="nav-label">Blog</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li <?php if (@$sub_act_id=='blogsCMS') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/manage_cms/manage_page/16')?>">CMS</a></li>
                <li <?php if (@$sub_act_id=='pageImages') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/blog/blog_images')?>">Banners</a></li>
                <li <?php if (@$sub_act_id=='blogsmanage') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/blog/index')?>">Articles</a></li>
                <li <?php if (@$sub_act_id=='blogfilter') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/blog/filter')?>">Search Filter</a></li>
            </ul>
            </li>

            <li <?php if ($act_id=='testimonials') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-quote-left" aria-hidden="true"></i><span class="nav-label">Testimonials</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li <?php if (@$sub_act_id=='testimonialsList') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/testimonials')?>">Testimonials</a></li>
            </ul>
            </li>

            <li <?php if ($act_id=='newsletters') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span class="nav-label">Newsletters</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li <?php if (@$sub_act_id=='newslettersList') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/newsletters/subscriber')?>">Subscription Link</a></li>
            </ul>
            </li>
            <li <?php if ($act_id=='guestbook') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-book" aria-hidden="true"></i><span class="nav-label">Guestbook</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li<?php if (@$sub_act_id=='guestbookList') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/guestbook')?>">Guestbook</a></li>
            </ul>
            </li>

            <li <?php if ($act_id=='tuto') {?> class="active" <?php }?> >
            <a href="#"><i class="fa fa-tags"></i> <span class="nav-label">Tutorials</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li <?php if (@$sub_act_id=='tuto_cat') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/tutorials/categories')?>">Buttons</a></li>
                <li <?php if (@$sub_act_id=='art_categories') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/tutorials/art_categories')?>"> Categories</a></li>
                <li <?php if (@$sub_act_id=='tutorialsmanage') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/tutorials')?>">Tutorials</a></li>

            </ul>
            </li>

            <li <?php if ($act_id=='setting') {?> class="active" <?php }?>>
            <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li <?php if (@$sub_act_id=='ManageLogo') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/manage_logo')?>">Logo</a></li>
                <li <?php if (@$sub_act_id=='ChangePass') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/changepassword')?>">Change Password</a></li>
                <li <?php if (@$sub_act_id=='SocialManage') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/social_links')?>">Social Links</a></li>
                <li <?php if (@$sub_act_id=='ManageUpload') {?> class="active" <?php }?>><a href="<?=site_url('webmaster/upload_standards')?>">Upload Standards</a></li>
                <!--<li><a href="<?=site_url('webmaster/databasebackup')?>">DB Backup</a></li>-->
            </ul>
            </li>
            <!--<li <?php if ($act_id=='site_activity') {?> class="active" <?php }?> >
            <a href="<?=site_url("webmaster/site_activity");?>"><i class="fa fa-user-secret" aria-hidden="true"></i><span class="nav-label">Site Activity</span><span class="fa arrow"></span></a>-->
        </ul>
    </div>
</nav>