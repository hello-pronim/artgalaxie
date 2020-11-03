<?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?=stripslashes($cmsData['meta_description'])?>">
  <meta name="keywords" content="<?=stripslashes($cmsData['meta_keyword'])?>">
  <meta name="author" content=""> 
  <title><?=SITENAME?> - <?=stripslashes($cmsData['meta_title'])?> </title>
  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
    <link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
    <link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <script src='https://www.google.com/recaptcha/api.js'></script>    
 <style type="text/css">
.font-20 {
    font-size: 20px;
}
</style>
</head>

      <body >
     
          <?php $this->load->view('mainsite/common/header');?>
  <div class="modal fade cnt-form" id="myModalContactPrinting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <form>
                                            <div class="form-main">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <div class="modal-body">
                                                <div class="cnt-frm-txt">
                                                  <h2>Contact us</h2>
                                                  <div class="text-center">If you have any question about our Giclee prints, don'st hesitate to contact us. Our team of specialists will get back to you at the earliest.</div>
                                                </div>
                                                <div id="printing_contact_msg" class="text-center"></div>
                                                <input type="text" class="form-control" placeholder="Name" name="pcontact_name" id="pcontact_name"  >
                                                <input type="text" class="form-control" placeholder="Email" name="pcontact_email" id="pcontact_email" >
                                                <select class="form-control" name="pdepartment" id="pdepartment">
                                                  <option value="">Select Services</option>
                                                  <option value="Canvas Print">Canvas Print</option> 
                                                  <option value="Acrylic Prints">Acrylic Prints</option>
                                                  <option value="Metal Prints">Metal Prints</option>
                                                  <option value="Bamboo Prints">Bamboo Prints</option>
                                                  <option value="Prints on Paper">Prints on Paper</option>
                                                </select>
                                                <input type="text" class="form-control" placeholder="Subject" name="pcontact_subject" id="pcontact_subject">
                                                <textarea class="form-control" placeholder="Type your message here." name="pcontact_message" id="pcontact_message"></textarea>
                                                <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            </div>
                                                <div class="clearfix"></div><br>
                                                <div class="text-right">
                                                  <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:printing_contact_us_email();"><span class="lt"></span>
                                                    <span class="large-btn">Send</span><span class="rt"></span></a></div>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <!-- Modal  Thanks Contact Printing -->
                                    <div class="modal fade cnt-form" id="thanksContactPrinting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="form-main">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    <div class="modal-body">
                                                        <div class="cnt-frm-txt">
                                                            <h2>Thank you</h2>
                                                            <div class="text-center">Your message has successfully been submitted.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>

          <div class="gallery-page-in "> 

            <!--page midd Content-->
            <div class="section listartist-section dark-shadwoand-bot-border middle-tab-section-bg bord-none z-index7" >
              <div class="container" data-aos="fade-up" data-aos-once="true">
                <div class="vedio-page-disc">
                  <h2 class="section-header text-center section-header-large" style="color:#D8A825;"><?=stripslashes($cmsData['page_title'])?></h2>
                  <div class="text text-center color-fff video-txt " data-aos="fade-up" data-aos-once="true" >
                    <p><?=stripslashes($cmsData['page_desc'])?></p>

                    <div class="mar-top-50">
                      <a class="print-contact-btn" href="#" data-toggle="modal" data-target="#myModalContactPrinting">Contact us</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="xxart-agent-bot-border art-agent-bot-border dark-shadwoand-slider">&nbsp;</div>
  <!--<div class="light-blue-bg bot-shadow z-index2">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
    </div>
  </div>-->
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  <div class="xxexibition-packages art-services-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="giclee-print-section">
        <div class="text-center aos-init aos-animate" data-aos-once="true" data-aos="fade-up">
          <ul class="nav nav-tabs giclee-printing-tabs text-center">
            <li class="active"><a data-toggle="tab"  href="#materials-tab">Materials</a> </li>
            <li><a data-toggle="tab"   href="#order-form">Order Form</a></li>
          </ul>
        </div>
        <div class="mar-top-40">
          <div class="tab-content">

            <div id="materials-tab" class="tab-pane fade in active">
              <div class="xxart-services xxart-agent-blog giclee-print">
                <h2><?=stripslashes($cmsData['material_title'])?></h2>
                <div class="materials-print-blog canvas-print light-shadwoand  bg-white">
                  <div class="print-blog-header-bg canvas-print-header-bg"><?=stripslashes($dataRs[0]['cat_name'])?></div>
                  <div class="print-content-blog">
                    <p><?=nl2br(stripslashes($dataRs[0]['description']))?></p>
                    <h5><?=stripslashes($dataRs[1]['title'])?></h5>
                    <p><?=nl2br(stripslashes($dataRs[1]['description']))?></p>
                  </div>

                  <div></div></div>
                  <div class="materials-print-blog acrylic-print light-shadwoand  bg-white">
                    <div class="print-blog-header-bg acrylic-print-header-bg"><?=stripslashes($dataRs[2]['cat_name'])?></div>
                    <div class="print-content-blog">
                      <h5 class="mar-top-0"><?=stripslashes($dataRs[2]['title'])?></h5>
                      <div class="row">
                        <div class="col-md-8 col-sm-8 text-justify">
                          <p><?=nl2br(stripslashes($dataRs[2]['description']))?></p>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                          <?php if($dataRs[2]['image1']!=''){ ?>
                          <div>
                            <img src="<?=base_url()?>uploads/printing/<?=$dataRs[2]['image1']?>" class="img-responsiv light-shadwoand" alt="<?=$dataRs[2]['image1']?>"> 
                          </div>
                          <?php } ?>
                          <br>
                          <?php if($dataRs[2]['image2']!=''){ ?>
                          <div>
                            <img src="<?=base_url()?>uploads/printing/<?=$dataRs[2]['image2']?>"  class="img-responsiv light-shadwoand" alt="<?=$dataRs[2]['image2']?>"> 
                          </div>
                          <?php } ?>  
                        </div>
                      </div>

                      <h5 class=""><?=stripslashes($dataRs[3]['title'])?></h5>
                      <div class="row">
                        <div class="col-md-8 col-sm-8 text-justify">
                          <p><?=nl2br(stripslashes($dataRs[3]['description']))?></p>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                          <?php if($dataRs[3]['image1']!=''){ ?>
                          <div>
                            <img src="<?=base_url()?>uploads/printing/<?=$dataRs[3]['image1']?>" class="img-responsiv light-shadwoand" alt="<?=$dataRs[3]['image1']?>"> 
                          </div>
                          <?php } ?>
                          <br>
                          <?php if($dataRs[3]['image2']!=''){ ?>
                          <div>
                            <img src="<?=base_url()?>uploads/printing/<?=$dataRs[3]['image2']?>"  class="img-responsiv light-shadwoand" alt="<?=$dataRs[3]['image2']?>"> 
                          </div>
                          <?php } ?>  
                        </div>
                      </div>
                      <h5 class=""><?=stripslashes($dataRs[4]['title'])?></h5>
                      <div class="row">
                        <div class="col-md-8 col-sm-8 text-justify">
                          <p><?=nl2br(stripslashes($dataRs[4]['description']))?></p><br>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center"> &nbsp;</div>
                      </div>

                    </div>

                    <div></div></div>
                    <div class="materials-print-blog metal-print light-shadwoand  bg-white">
                      <div class="print-blog-header-bg metal-print-header-bg"><?=stripslashes($dataRs[5]['cat_name'])?></div>
                      <div class="print-content-blog">
                        <h5 class="mar-top-0"><?=stripslashes($dataRs[5]['title'])?></h5>
                        <div class="row">
                          <div class="col-md-8 col-sm-8 text-justify">
                            <p><?=nl2br(stripslashes($dataRs[5]['description']))?></p>
                          </div>
                          <div class="col-md-4 col-sm-4 text-center">
                            <?php if($dataRs[5]['image1']!=''){ ?>
                            <div>
                              <img src="<?=base_url()?>uploads/printing/<?=$dataRs[5]['image1']?>" class="img-responsiv light-shadwoand" alt="<?=$dataRs[5]['image1']?>"> 
                            </div>
                            <?php } ?>
                            <br>
                            <?php if($dataRs[5]['image2']!=''){ ?>
                            <div>
                              <img src="<?=base_url()?>uploads/printing/<?=$dataRs[5]['image2']?>"  class="img-responsiv light-shadwoand" alt="<?=$dataRs[5]['image2']?>"> 
                            </div>
                            <?php } ?>  
                          </div>
                        </div>

                        <h5 class=""><?=stripslashes($dataRs[6]['title'])?></h5>
                        <div class="row">
                          <div class="col-md-8 col-sm-8 text-justify">
                           <p><?=nl2br(stripslashes($dataRs[6]['description']))?></p>
                         </div>
                         <div class="col-md-4 col-sm-4 text-center">
                          <?php if($dataRs[6]['image1']!=''){ ?>
                          <div>
                            <img src="<?=base_url()?>uploads/printing/<?=$dataRs[6]['image1']?>" class="img-responsiv light-shadwoand" alt="<?=$dataRs[6]['image1']?>"> 
                          </div>
                          <?php } ?>
                          <br>
                          <?php if($dataRs[6]['image2']!=''){ ?>
                          <div>
                            <img src="<?=base_url()?>uploads/printing/<?=$dataRs[6]['image2']?>"  class="img-responsiv light-shadwoand" alt="<?=$dataRs[6]['image2']?>"> 
                          </div>
                          <?php } ?>  
                        </div>
                      </div>
                    </div>
                    <div></div></div>
                    <div class="materials-print-blog bamboo-print light-shadwoand  bg-white">
                      <div class="print-blog-header-bg bamboo-print-header-bg"><?=stripslashes($dataRs[7]['cat_name'])?></div>
                      <div class="print-content-blog">
                        <h5 class="mar-top-0"><?=stripslashes($dataRs[7]['title'])?></h5>
                        <div class="row">
                          <div class="col-md-8 col-sm-8 text-justify">
                            <p><?=nl2br(stripslashes($dataRs[7]['description']))?></p><br>
                          </div>
                          <div class="col-md-4 col-sm-4 text-center">
                            <?php if($dataRs[7]['image1']!=''){ ?>
                            <div>
                              <img src="<?=base_url()?>uploads/printing/<?=$dataRs[7]['image1']?>" class="img-responsiv light-shadwoand" alt="<?=$dataRs[7]['image1']?>"> 
                            </div>
                            <?php } ?>
                            <br>
                            <?php if($dataRs[7]['image2']!=''){ ?>
                            <div>
                              <img src="<?=base_url()?>uploads/printing/<?=$dataRs[7]['image2']?>"  class="img-responsiv light-shadwoand" alt="<?=$dataRs[7]['image2']?>"> 
                            </div>
                            <?php } ?>  
                          </div>
                        </div>

                        <h5 class=""><?=stripslashes($dataRs[8]['title'])?></h5>
                        <div class="row">
                          <div class="col-md-8 col-sm-8 text-justify">
                            <p><?=nl2br(stripslashes($dataRs[8]['description']))?></p>
                          </div>
                          <div class="col-md-4 col-sm-4 text-center">
                            <?php if($dataRs[8]['image1']!=''){ ?>
                            <div>
                              <img src="<?=base_url()?>uploads/printing/<?=$dataRs[8]['image1']?>" class="img-responsiv light-shadwoand" alt="<?=$dataRs[8]['image1']?>"> 
                            </div>
                            <?php } ?>
                            <br>
                            <?php if($dataRs[8]['image2']!=''){ ?>
                            <div>
                              <img src="<?=base_url()?>uploads/printing/<?=$dataRs[8]['image2']?>"  class="img-responsiv light-shadwoand" alt="<?=$dataRs[8]['image2']?>"> 
                            </div>
                            <?php } ?>  
                          </div>
                        </div>
                      </div>
                      <div></div></div>
                      <div class="materials-print-blog paper-print light-shadwoand  bg-white">
                        <div class="print-blog-header-bg Paper-print-header-bg"><?=stripslashes($dataRs[9]['cat_name'])?></div>
                        <div class="print-content-blog">
                           <h5><?=stripslashes($dataRs[16]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[16]['description']))?></p><br>
                            </div>
                          </div>
                          <h5><?=stripslashes($dataRs[9]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[9]['description']))?></p><br>
                            </div>
                          </div>
                          <h5><?=stripslashes($dataRs[10]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[10]['description']))?></p><br>
                            </div>
                          </div>
                          <h5><?=stripslashes($dataRs[11]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[11]['description']))?></p><br>
                            </div>
                          </div>
                          <h5><?=stripslashes($dataRs[12]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[12]['description']))?></p><br>

                            </div>
                          </div>
                          <h5><?=stripslashes($dataRs[13]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[13]['description']))?></p><br>

                            </div>
                          </div>
                          <h5><?=stripslashes($dataRs[14]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[14]['description']))?></p><br>

                            </div>
                          </div>
                          <h5><?=stripslashes($dataRs[15]['title'])?></h5>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 text-justify">
                              <p><?=nl2br(stripslashes($dataRs[15]['description']))?></p><br>
                            </div>
                          </div>
                        </div>
                        <div></div></div>

                      </div>
                    </div>
                    <div id="order-form" class="tab-pane fade">
                      <div class="print-order-form-box light-shadwoand">
                        <div class="print-order-form">
                          <div class="print-order-form-text text-center">
                            <h3>Giclée Order Form</h3>
                            <div class="color-fff font-20">
                              <p>Kindly provide us with the following details for your giclée prints.<br >Once your order form has been reviewed by our team, we will send you an email with the quotation (including shipping) as well as instructions for the submission of your files.</p>
                              <p>For any questions, do not hesitate contacting us.</p>
                            </div>
                          </div>
                          <div id="msg" class="text-center"></div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group"><input class="form-control" placeholder="First Name"  name="contact_name_printing" id="contact_name_printing" type="text"></div></div>
                              <div class="col-sm-6">
                                <div class="form-group"><input class="form-control" placeholder="Last Name" type="text" name="contact_lname_printing" id="contact_lname_printing"></div></div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group"><input class="form-control" placeholder="Email Address" type="email" name="contact_email_printing" id="contact_email_printing"></div></div>

                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group"><input class="form-control numberonly" placeholder="Number of artworks" type="text" name="number_of_artwork" id="number_of_artwork" maxlength="8"></div></div>

                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="form-group"><input class="form-control numberonly" placeholder="Number of prints required for each artwork " type="text" name="number_of_prints_requireds" id="number_of_prints_requireds"  maxlength="8"></div></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="form-group">
                                          <select class="form-control" name="material" id="material" onchange="javascript:manage_printing_sizes(this.value)">
                                            <option value="">Giclee Print materials</option>
                                            <option value="Canvas Print">Canvas Print</option>
                                            <option value="Metallic Canvas">Metallic Canvas</option>
                                            <option value="Acrylic Prints (Fine Art)">Acrylic Prints (Fine Art)</option>
                                            <option value="Direct Acrylic Print (S)">Direct Acrylic Print (S)</option>
                                            <option value="Direct Acrylic Print (D)">Direct Acrylic Print (D)</option>
                                            <option value="Print Mount on Metal">Print Mount on Metal</option>
                                            <option value="Direct Metal Print">Direct Metal Print</option>
                                            <option value="Print Mount on Bamboo">Print Mount on Bamboo</option>
                                            <option value="Direct Bamboo Print">Direct Bamboo Print</option>
                                            <option value="Hahnemuhle German Etching">Hahnemuhle German Etching</option>
                                            <option value="Entrada Rag Natural">Entrada Rag Natural</option>
                                            <option value="Metallic Photo Paper">Metallic Photo Paper</option>
                                            <option value="Photo Rag Pearl">Photo Rag Pearl</option>
                                            <option value="Enhanced Matte Paper">Enhanced Matte Paper</option>
                                            <option value="Premium Photo Gloss">Premium Photo Gloss</option>
                                            <option value="Premium Photo Luster">Premium Photo Luster</option>
                                            <option value="Premium Photo Satin">Premium Photo Satin</option>
                                          </select>
                                        </div>
                                      </div>

                                        </div>
                                        <div class="row" style="display:none;" id="canvas_finishing_row_id">
                                          <div class="col-sm-12">
                                            <div class="form-group">
                                              <select class="form-control" name="canvas_finishing" id="canvas_finishing"  onChange="javascript:showHideWrap(this.value)">
                                                <option value="">Canvas Finishing</option>
                                                <option value="Just the print">Just the print</option>
                                                <option value="0.75 inches standard wrap">0.75 inches standard wrap</option> 
                                                <option value="1.5 inches gallery wrap">1.5 inches gallery wrap</option>
                                                <option value="2 inch gallery wrap">2 inch gallery wrap</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row" style="display:none;" id="canvas_wrap_row_id">
                                          <div class="col-sm-12">
                                            <div class="form-group">
                                              <select class="form-control" name="canvas_wrap" id="canvas_wrap"  onChange="javascript:checkColour(this.value)">
                                                <option value="">Canvas Wrap</option>
                                                <option value="Mirror Image">Mirror Image</option>
                                                <option value="Image Overflow">Image Overflow</option> 
                                                <option value="Border Colour">Border Colour</option>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row"  style="display:none;" id="colour_row_id" >
                                          <div class="col-sm-12">
                                            <div class="form-group">
                                              <input class="form-control" name="colour" id="colour" placeholder="please specify color : #ffffff " type="text"></div></div>
                                            </div>
                                            <div class="row">
                                              <div class="col-sm-12">
                                                <div class="form-group">
                                                  <select class="form-control" name="size" id="size" >
                                                   <option value="">Size</option>
                                                 </select>
                                               </div>
                                             </div>
                                           </div>
                                      <div class="row" style="display:none;" id="finishing_row_id" style="display:none;">
                                              <div class="col-sm-12">
                                                <div class="form-group">
                                                  <select class="form-control" name="finishing" id="finishing" >
                                                    <option value="">Finishing</option>
                                                    <option value="1/8” Glossy Acrylic">1/8” Glossy Acrylic</option>
                                                    <option value="1/8” Trulife Acrylic">1/8” Trulife Acrylic</option> 
                                                    <option value="1/8” Matte Acrylic">1/8” Matte Acrylic</option>
                                                    <option value="1/4” Glossy Acrylic">1/4” Glossy Acrylic</option>
                                                    <option value="1/2” Glossy Acrylic">1/2” Glossy Acrylic</option> 
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                           <div class="row">
                                            <div class="col-sm-12">
                                              <div class="form-group">
                                                <input class="form-control" placeholder="Shipping Address" type="text" name="shipping_address" id="shipping_address"></div></div>
                                            </div>
                                           
                                            <div class="row">
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                  <input class="form-control" placeholder="City" type="text" id="city_name" name="city">
                                                </div>
                                               </div>
                                                <div class="col-sm-6">
                                                  <div class="form-group">
                                                    <input class="form-control numberonly" placeholder="Postal Code" type="text" id="postal_code" name="postal_code" maxlength="6"> 
                                                  </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-sm-12">
                                                    <div class="form-group"><input class="form-control" placeholder="Country" type="text"  id="country1" name="country1">
                                                    </div>
                                                   </div>

                                                  </div>
                                                  <div class="row">
                                                    <div class="col-sm-12">
                                                      <div class="form-group">
                                                        <textarea  class="form-control" placeholder="Kindly Specify any other details" type="text" rows="5"  id="contact_message_printing" name="contact_message_printing"></textarea>
                                                      </div></div>

                                                    </div>
                                                    <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            </div>
                                                      <div class="text-right">
                                                      <div class="clearfix"></div><br>
                                                      <a class="dark-gray-btn mar-top-bot-20" href="javascript:void(0);" onclick="javascript:priting_order();"><span class="lt"></span><span class="large-btn">Submit Order</span><span class="rt"></span></a></div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                     <!------>
                                     
                                     
                                        <div class="modal fade cnt-form guestbook-info-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <form>
                <div class="form-main">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                  <div class="xxmodal-body print-order-form">
                    <div class="print-order-form-text text-center">
                      <h3>Thank you</h3>
                      <div class="text-center">Your order has successfully been sumbitted. <br/>
                        Our team specialists will review your request and will get back to you with a quotation.<br>
                        For any queries, do not hesitate in contacting us.</div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
                                        
                                      <?php $this->load->view('mainsite/common/footer');?>
                                      <!-- /.container --> 
<script type="text/javascript">
    function priting_order(){
  var contact_name_printing = $('#contact_name_printing').val();
  var contact_lname_printing = $('#contact_lname_printing').val();
  var contact_email_printing = $('#contact_email_printing').val();
  var number_of_artwork = $('#number_of_artwork').val();
  
  var number_of_prints_requireds = $('#number_of_prints_requireds').val();
  var material = $('#material').val();
  var canvas_finishing = $('#canvas_finishing').val();


  var canvas_wrap = $('#canvas_wrap').val();
  var colour = $('#colour').val();
  var size = $('#size').val();
   var finishing = $('#finishing').val();
  var shipping_address = $('#shipping_address').val();
 
  var city = $('#city_name').val();


  var postal_code = $('#postal_code').val();
  var country1 = $('#country1').val();
  var contact_message_printing = $('#contact_message_printing').val();
 
 


  if(contact_name_printing=='')
  {
     $('#msg').html('<span class="text-danger">Please enter first name.</span>');
     $('#contact_name_printing').focus();
   return false
  }

  if(contact_lname_printing=='')
  {
     $('#msg').html('<span class="text-danger">Please enter last name.</span>');
     $('#contact_lname_printing').focus();
     return false
  }

  if(contact_email_printing=='')
  {
     $('#msg').html('<span class="text-danger">Please enter email address.</span>');
     $('#contact_email_printing').focus();
   return false
  }

  if(number_of_artwork=='')
  {
     $('#msg').html('<span class="text-danger">Please enter number of artwork.</span>');
     $('#number_of_artwork').focus();
    return false
  }

  if(number_of_prints_requireds=='')
  {
     $('#msg').html('<span class="text-danger">Please select number of print.</span>');
     $('#number_of_prints_requireds').focus();
    return false
  }

 /* if(material=='')
  {
     $('#msg').html('<span class="text-danger">Please select material.</span>');
     $('#material').focus();
    return false
  }*/
 
  if(shipping_address=='')
  {
     $('#msg').html('<span class="text-danger">Please enter shipping address.</span>');
     $('#shipping_address').focus();
    return false
  }

  if(city=='')
  {
     $('#msg').html('<span class="text-danger">Please enter city.</span>');
     $('#city').focus();
    return false
  }
 if(postal_code=='')
  {
     $('#msg').html('<span class="text-danger">Please enter postal code.</span>');
     $('#postal_code').focus();
    return false
  }
  if(country1=='')
  {
     $('#msg').html('<span class="text-danger">Please enter country.</span>');
     $('#country1').focus();
    return false
  }
 
    if(contact_message_printing=='')
  {
     $('#msg').html('<span class="text-danger">Please enter contact message.</span>');
     $('#contact_message_printing').focus();
    return false
  }
 
  
/* if ($("#g-recaptcha-response").val()) {
 xyz = $("#g-recaptcha-response").val();*/
  jQuery.ajax({
              type: "POST",
              url: "<?=site_url('cms/printing_email')?>",
              data: { 
                    contact_name_printing: contact_name_printing,
                    contact_lname_printing: contact_lname_printing,
                    contact_email_printing: contact_email_printing,
                    number_of_artwork: number_of_artwork,
                    number_of_prints_requireds: number_of_prints_requireds,
                    material: material,
                    canvas_finishing: canvas_finishing,
                    canvas_wrap: canvas_wrap,
                    colour: colour,
                    size: size,
                     finishing: finishing,
                    shipping_address: shipping_address,
                   
                    city: city,
                    country1: country1,
                    postal_code: postal_code,
                    contact_message_printing: contact_message_printing,
                    //captcha: xyz //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
                  },
              cache: false,
              success:  function(data)
              
            //  alert('hello');
              { 
             //  alert('***'+data);
               if(data=='done')
                {

                  $('#contact_name_printing').val('');
                  $('#contact_lname_printing').val('');
                  $('#contact_email_printing').val('');
                  $('#number_of_artwork').val('');
                  $('#number_of_prints_requireds').val('');
                  $('#material').val('');
                  $('#canvas_finishing').val('');
                  $('#canvas_wrap').val('');
                  $('#colour').val('');
                  $('#size').val('');
                   $('#finishing').val('');
                  $('#shipping_address').val('');
                 
                  $('#city').val('');
                  $('#postal_code').val('');
                   $('#country1').val('');
                  $('#contact_message_printing').val('');
                  $('#msg').html('<span class="text-success">Mail sent successfully!!</span>');
                  $('#myModal').modal('toggle');
                }
                
                if(data=='NameBlank'){
                 $('#msg').html('<span class="text-danger">Name can not be blank!!</span>');
                  $('#NameBlank').focus()
                 }
                if(data=='Emailblank'){
                 $('#msg').html('<span class="text-danger">Email address can not be blank!!</span>');
                 $('#contact_email').focus();
                 }
                if(data=='InvalidEmail'){
                    $('#msg').html('<span class="text-danger">Please enter valid e-mail address!!</span>');
                    $('#contact_email').focus();
                  }
               /* if(data=='InvalidCaptcha'){
                  $('#msg').html('<span class="text-danger">Please enter valid captcha code!!</span>');
                  $('#g-recaptcha-response').focus();
                }*/
              }
            });
 /* }else{
        $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
  }*/
}


</script>

                                      <!-- Modal -->
                                  

                                      <!-- jQuery --> 
                                      <script src="<?=base_url()?>front_assets/js/jquery.js"></script> 

                                      <!-- Bootstrap Core JavaScript --> 
                                      <script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 

                                      <!-- Script to Activate the Carousel --> 

                                      <!-- FlexSlider --> 

                                      <script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> 
                                      <script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> 
                                      <script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script> 
                                      <script src="<?=base_url()?>front_assets/js/aos.js"></script> 
                                      <!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
                                      <script>
                                      AOS.init({
                                        easing: 'ease-out-back',
                                        duration: 1500
                                      });
                                      </script> 
                                      <script src="<?=base_url()?>front_assets/js/jquery.mixitup.min.js"></script>
                                      <?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
                                      <script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
                                       <script type="text/javascript">
                                        $( document ).ready(function() {
                                          $('.numberonly').keydown(function(e)
                                            {  
                                              var key = e.charCode || e.keyCode || 0;
                                              //key == 110 || for '.'
                                              // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                                              // home, end, period, and numpad decimal
                                              return (
                                                key == 8 || 
                                                key == 9 ||
                                                key == 13 ||
                                                key == 46 ||
                                                key == 190 ||
                                                (key >= 35 && key <= 40) ||
                                                (key >= 48 && key <= 57) ||
                                                (key >= 96 && key <= 105));
                                            });
                                      });
                                      </script>
                                    </body>
                                    </html>

