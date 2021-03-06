@charset "UTF-8";

#zbox-overlay {
  background-color: #666666;
  bottom: 0;
  left: 0;
  opacity: 0.1;
  position: fixed;
  right: 0;
  top: 0;
  z-index: 800;
}
.zbox-content
{
  position:fixed;
  z-index:801;
  opacity: 0.1;
  text-align:center;
  padding:10px 40px;
  background-color:#000000;
  border-radius:8px;
  font-size:0;
}
#zbox-magnifier
{
  box-shadow: 0px 5px 5px rgba(0,0,0,1);
  -webkit-box-shadow: 0px 5px 5px rgba(0,0,0,1);
  -moz-box-shadow: 0px 5px 5px rgba(0,0,0,1);
  display:none;
  background-repeat:no-repeat;
  background-image:none;
  background-position:-1000px -1000px;
  z-index:802; position:fixed;
  left:500px;
  top:500px;
  border:1px solid black;
  background-color:#000;
  width:180px;
  height:180px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  -moz-border-radius-bottomright: 100px;
  -moz-border-radius-bottomleft: 100px;
  -moz-border-radius-topright: 100px;
  -moz-border-radius-topleft: 100px;
}

.zbox-screen
{
  overflow:hidden;
  left: 0;
  position: absolute;
  top: 0;
  z-index: 803;
  

}
#zbox-spinner
{
  left: 0;
  position: absolute;
  top: 0;
  z-index: 803;
  width:32px;
  height:32px;
  text-indent:-9999px;
  background-image:url(spinner.gif);
  background-repeat:no-repeat;
}
.zbox-button
{
  /*background-color:#d0d0d0;
  background-image:url(/art_galaxie/web/ck_images/zbox-buttons.png);					
  background-repeat:no-repeat;*/
  cursor:pointer;
  display:block;
  position: absolute;
  color: #fff;
  font-size: 35px;
}
.zbox-button.left
{
  left:12px;
  top:64px;
  background-position:-32px 0px;
}
.zbox-button.right
{
  right:12px;
  top:64px;
  background-position:-64px 0px;
}
.zbox-button.close
{
    right: -10px;
    top: -14px;
  background-position:0px 0px;
  opacity:0.8;
}
.zbox-button.close:hover
{
   color:#fff;
   opacity:1;
  
}

