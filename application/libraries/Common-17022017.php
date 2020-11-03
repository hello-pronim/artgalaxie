<?PHP class Common
{   
   function __construct() 
    {
        $this->CI =&get_instance();
        $this->CI->load->database();
    }
    function insert_entry( $tbl, $entries )
    {
        $this->CI->db->insert($tbl, $entries);
    }
    function update_entry( $tbl, $update_array, $where_array)
    {
        if (is_array($update_array) && is_array($where_array)) 
        {
            $this->CI->db->where($where_array);
            if($this->CI->db->update($tbl,$update_array))
            {                
                return true;
            }   
            else
            {
                return false;
            }   
        } 
        else 
        {
            return false;
        }
    }
    function delete_entry( $tbl, $where)
    {
        $this->CI->db->delete( $tbl, $where);
    }
    function getnumRow( $tbl, $where ){
        $this->CI->db->where($where);
        return $num = $this->CI->db->count_all_results( $tbl );
    }
    function getOneRow( $select, $tbl, $where ){
        $num = $this->getnumRow( $tbl, $where );
        if ($num>0) {
            $this->CI->db->select( $select );
            $this->CI->db->from( $tbl );
            $this->CI->db->where( $where );
            $query = $this->CI->db->get();

            return $data = $query->row();
        }else return 0;
    }
    function getOneRowArray( $select, $tbl, $where ){
        $num = $this->getnumRow( $tbl, $where );
        if ($num>0) {
            $this->CI->db->select( $select );
            $this->CI->db->from( $tbl );
            $this->CI->db->where( $where );
            $query = $this->CI->db->get();
            $data = $query->row_array();
            // echo "==>>>".$this->CI->db->last_query();
            return $data;
        }else return 0;
    }
    function getAllRow( $select, $tbl, $where ){
        $this->CI->db->select($select);
        $this->CI->db->from($tbl);
        $this->CI->db->where($where);
        $query = $this->CI->db->get();
        
        return $rs = $query->result();
    }
    function getAllRowArray( $select, $tbl, $where, $OrderBy ='' , $orderType ='desc' ,$Limit =''  ){
        $this->CI->db->select($select);
        $this->CI->db->from($tbl);
        $this->CI->db->where($where);
        if($OrderBy!=''){
               $this->CI->db->order_by($OrderBy,$orderType);
        }
         if($Limit!=''){
              $this->CI->db->limit($Limit);
        }
        $query = $this->CI->db->get();
        $rs = $query->result_array();
     //  echo  $this->CI->db->last_query();
   
        return $rs;
    }
    /*function getAllRowOrderByArray( $select, $tbl, $where , $OrderBy ,$Limit ){
            echo "LIMIt".$Limit;
        $this->CI->db->select($select);
        $this->CI->db->from($tbl);
        $this->CI->db->where($where);
        $this->CI->db->order_by($OrderBy,'desc');
        $this->CI->db->limit($Limit);
        $query = $this->CI->db->get();
    
        return $rs = $query->result_array();
    }*/
    function getSiteLogo(){
        $whereUp = 
        $res = $this->getOneRow('website_logo','`tbl_admin`',array('id' => '1'));
        return $res->website_logo;
    }
    function add_records($table_name,$insert_array)
    {
        if (is_array($insert_array)) 
        {
            if ($this->CI->db->insert($table_name,$insert_array))
                return true;
            else
                return false;
        }
        else 
        {
            return false; 
        }
    }
    function genRandomString()
    {
        $length = 8;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $string = '';    
        for ($p = 1; $p <=$length; $p++) {
            @$string .= $characters[mt_rand(0, strlen($characters))];
        }
        return $string;
     }  
    function generateHashPassword($passwordValue)
     {
        if (!$passwordValue){
            return false;
        }else{
            if ( CRYPT_BLOWFISH && defined("CRYPT_BLOWFISH")) {
                $saltValue = '$2y$11$' . substr(md5 (uniqid(rand(), true)), 0, 22);
                return crypt($passwordValue, $saltValue);
            }  
        }
    }
    function verifyHashPassword($passwordPlain,$hashedPassword) {
        if (!$passwordPlain || !$hashedPassword){
            return false;  //  echo "<br/>>>>>NOT MATCH";
        }else{
           $UserEnteredHash = crypt($passwordPlain, $hashedPassword);
            if($UserEnteredHash==$hashedPassword){
                //echo "<br/> 1".crypt($passwordPlain, $hashedPassword);
                return true;
            }else{
                return false;
            }
        }
    }
    // ----------------------- User SECTION -------------------------------
    function num_users($where = array()){
         $tbl="tbl_user_master";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function getUserList($select,$where = array()){
        $tbl="tbl_user_master";
        if($this->num_users()>0){
            return $this->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    function getUserDetails($id){
        $where =  array('id' => $id);
        $tbl="tbl_user_master";
        if($this->num_users($where)>0){
            return $this->getOneRowArray( '*', $tbl, $where );
        }else return 0;
    }
    function getUserName($id){
        $where =  array('id' => $id);
        $tbl="tbl_user_master";
        if($this->num_users($where)>0){
            $data = $this->getOneRow('first_name,last_name',$tbl,$where);
           return $data->first_name.' '.$data->last_name;
        }else return 0;
    }
    function getInterviewsOfUser($id){

        $where =  array('user_id' => $id);
        $tbl="tbl_interview";
        if($this->getnumRow($tbl,$where)>0){
            return $this->getAllRowArray('*',$tbl,$where);
        }else{
            return '0';
        }
    }
    function getUserArtist($userId){
        $where =  array('user_id' => $userId);
        $tbl="tbl_artist_user";
        $data = $this->getOneRowArray('*',$tbl,$where);
        return $data;
     
    }
    //---------------------Category--------------------------------------
    function num_galleries($where = array()){
        $tbl="tbl_galleries";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function get_galleries($where = array()){
        $select ="*";
        $tbl="tbl_galleries";
        
        if($this->num_galleries()>0){  
            return $this->getAllRowArray( $select, $tbl, $where , 'sort_no' , 'asc' ,'' );
        }else return 0;
    }
    function getGalleryName($id=0){
        if($id>0){
            if($this->num_galleries()>0){
            $data = $this->getOneRow('cat_name','`tbl_galleries`',array('cat_id' => $id));
            return $data->cat_name;
            }else{  
                return '-';
            }
        }else{
            return '-';
        }
       
    }
    //---------------------Style--------------------------------------
    function num_style($where = array()){
        $tbl="tbl_style";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function get_style($where = array()){
        $select ="cat_id, cat_name, colour_type,image_name";
        $tbl="tbl_style";
        
        if($this->num_style()>0){
            return $this->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    function getStyleName($id=0){
        if($id>0){
            if($this->num_style()>0){
                $data = $this->getOneRow('cat_name','`tbl_style`',array('cat_id' => $id));
                return $data->cat_name;
            }else{  
                return '-';
            }
        }else{
                return '-';
        }
    }
     //---------------------Country--------------------------------------
    function num_country($where = array()){
        $tbl="tbl_country";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function get_country($where = array()){
        $select ="*";
        $tbl="tbl_country";
        if($this->num_country()>0){
            return $this->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    //----------------------Site Logo----------------------------------
    function getLogo(){
        $where = array('id' => '1' );
        $logo_data =$this->getOneRow("website_logo","tbl_admin",$where);
        return $logo_data->website_logo;
    }
    function getSocialLinks($id){
        $where = array('id' => $id );
        $social_data =$this->getOneRow("link","tbl_social_links",$where);
        return $social_data->link;
    }
    // ----------------------- Users Video -------------------------------
    function num_artistVideos($where = array()){
         $tbl="tbl_artist_videos";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function getArtistVideoList($select,$where = array()){
        $tbl="tbl_artist_videos";
        if($this->num_users()>0){
            return $this->getAllRowArray( $select, $tbl, $where );
        }else return 0;
    }
    function getVideoDetails($where_array){
        $tbl="tbl_artist_videos";
        return $this->getOneRowArray('*',$tbl,$where_array);
    }
    //-----------------------Social Links
    function num_artistSocialLinks($where = array()){
         $tbl="tbl_artist_social_links";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function getartistSocialLinks($where_array){
        $tbl="tbl_artist_social_links";
        if($this->num_artistSocialLinks($where_array)>0){
            return $this->getOneRowArray('*',$tbl,$where_array);
        }else{
            return '';
        }  
    }
    //--------------------Gallery
    function num_ArtistGallery($where = array()){
        $tbl = "tbl_artist_gallery";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function getArtistGallery($where_array,$limit=''){
        $tbl="tbl_artist_gallery";
        if($this->num_artistGallery($where_array)>0){  
            return $this->getAllRowArray('*',$tbl,$where_array,'','',$limit);
        }else{
            return '';
        }  
    }
    function getArtistGalleryDetails($id){
        $tbl = "tbl_artist_gallery";
        $where = array('id' => $id );
        return   $this->getOneRowArray('*',$tbl,$where);
    }
    //--------------------Publication   

    function num_publication($where = array()){
        $tbl = "tbl_publication";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function getPublication($where_array = array(),$limit=''){
        $tbl="tbl_publication";
        if($this->num_publication($where_array)>0){    
            return $this->getAllRowArray('*',$tbl,$where_array,'id','desc',$limit);
        }else{
            return '';
        }  
    }
    //---------About us
    function getAboutUs($where_array = array(),$limit=''){
        $tbl="tbl_about_section";
        return $this->getAllRowArray('*',$tbl,$where_array,'id','asc','');
    }
     //---------------------Regionwise Gallery--------------------------------------
    function num_regionwise_galleries($where = array()){
        $tbl="tbl_regionwise_galleries";
        return $numRec = $this->getnumRow( $tbl, $where );
    }
    function get_regionwise_galleries($where = array()){
        $select ="*";
        $tbl="tbl_regionwise_galleries";
        
        if($this->num_galleries()>0){  
            return $this->getAllRowArray( $select, $tbl, $where , 'cat_id' , 'desc' ,'' );
        }else return 0;
    }
    //--------Get one row  of user -----
    function getUserDetailsForTestimonials($id){
        $where =   array('id' => $id );
        $tbl="tbl_user_master";
        if($this->num_users($where)>0){
            $data = $this->getOneRow('first_name,last_name,user_type',$tbl,$where);
           return $data;
        }else return 0;
    }
     
    //---------------Chose colour class
    function chooseColourClass($colourId){
     
        $strColour = "";
         if($colourId==1){ 
            $strColour = 'box-color-one'; // red
         }else if($colourId==2){  
            $strColour = 'box-color-two'; //brown / marun shade
         }else if($colourId==3){  
            $strColour = 'box-color-four'; // green //'box-color-three'; 
         }else if($colourId==4){  
            $strColour = 'box-color-nine'; // blue colour
         }else if($colourId==5){  
            $strColour = 'box-color-five'; //Light Blue 
         }else if($colourId==6){  
            $strColour = 'box-color-six';  //Brown
         }else if($colourId==7){  
            $strColour = 'box-color-seven'; //Light Purple
         }else if($colourId==8){  
            $strColour = 'box-color-eight'; //Dark Purple 
         }else if($colourId==9){  
            $strColour = 'box-color-three'; //Yellow
         }   
         return $strColour;
    }
    //----------Video parse
    function parseVideos($videoString = null){
        // return data
        $videos = array();
        if (!empty($videoString)) {
            // split on line breaks
            $videoString = stripslashes(trim($videoString));
            $videoString = explode("\n", $videoString);
            $videoString = array_filter($videoString, 'trim');
            // check each video for proper formatting
            foreach ($videoString as $video) {
                // check for iframe to get the video url
                if (strpos($video, 'iframe') !== FALSE) {
                    // retrieve the video url
                    $anchorRegex = '/src="(.*)?"/isU';
                    $results = array();
                    if (preg_match($anchorRegex, $video, $results)) {
                        $link = trim($results[1]);
                    }
                } else {
                    // we already have a url
                    $link = $video;
                }
                // if we have a URL, parse it down
                if (!empty($link)) {
                    // initial values
                    $video_id = NULL;
                    $videoIdRegex = NULL;
                    $results = array();
                    // check for type of youtube link
                    if (strpos($link, 'youtu') !== FALSE) {
                        if (strpos($link, 'youtube.com') !== FALSE) {
                            // works on:
                            // http://www.youtube.com/embed/VIDEOID
                            // http://www.youtube.com/embed/VIDEOID?modestbranding=1&amp;rel=0
                            // http://www.youtube.com/v/VIDEO-ID?fs=1&amp;hl=en_US
                            $videoIdRegex = "/^(?:http(?:s)?:\/\/)?(?:www.)?(?:m.)?(?:youtu.be\/|youtube.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
                        } else if (strpos($link, 'youtu.be') !== FALSE) {
                            // works on:
                            // http://youtu.be/daro6K6mym8
                            $videoIdRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                        }
                        if ($videoIdRegex !== NULL) {
                            if (preg_match($videoIdRegex, $link, $results)) {
                                $video_str = 'http://www.youtube.com/v/%s?fs=1&amp;autoplay=1';
                                $thumbnail_str = 'http://img.youtube.com/vi/%s/2.jpg';
                                $fullsize_str = 'http://img.youtube.com/vi/%s/0.jpg';
                                $video_id = $results[1];
                            }
                        }
                    }
                    // handle vimeo videos
                    else if (strpos($video, 'vimeo') !== FALSE) {
                        if (strpos($video, 'player.vimeo.com') !== FALSE) {
                            // works on:
                            // http://player.vimeo.com/video/37985580?title=0&amp;byline=0&amp;portrait=0
                            $videoIdRegex = '/player.vimeo.com\/video\/([0-9]+)\??/i';
                        } else {
                            // works on:
                            // http://vimeo.com/37985580
                            $videoIdRegex = '/vimeo.com\/([0-9]+)\??/i';
                        }
                        if ($videoIdRegex !== NULL) {
                            if (preg_match($videoIdRegex, $link, $results)) {
                                $video_id = $results[1];
                                // get the thumbnail
                                try {
                                    $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_id.php"));
                                    if (!empty($hash) && is_array($hash)) {
                                        $video_str = 'http://vimeo.com/moogaloop.swf?clip_id=%s';
                                        $thumbnail_str = $hash[0]['thumbnail_small'];
                                        $fullsize_str = $hash[0]['thumbnail_large'];
                                    } else {
                                        // don't use, couldn't find what we need
                                        unset($video_id);
                                    }
                                } catch (Exception $e) {
                                    unset($video_id);
                                }
                            }
                        }
                    }
                    // check if we have a video id, if so, add the video metadata
                    if (!empty($video_id)) {
                        // add to return
                        $videos[] = array(
                            'url' => sprintf($video_str, $video_id),
                            'thumbnail' => sprintf($thumbnail_str, $video_id),
                            'fullsize' => sprintf($fullsize_str, $video_id)
                        );
                    }
                }
            }
        }
        // return array of parsed videos
        return $videos;
    }
    //--------------------create thumb
    public function create_thumb_resize($file_name,$path,$width,$height,$newFolderName='')
    { // create thumb of the size which required.
        $CI3 =& get_instance();
        $CI3->load->library('image_lib');
        $config_1['image_library']='gd2';
        $config_1['source_image']=$path.$file_name;
        $config_1['create_thumb']=TRUE;
        $config_1['maintain_ratio']=FALSE;
        $config_1['thumb_marker']='';
        if($newFolderName!=''){
             $config_1['new_image']=$path.$newFolderName.'/'.$file_name;
        }else{
             $config_1['new_image']=$path.$file_name;
        }
        $config_1['width']=$width;
        $config_1['height']=$height;
        $CI3->image_lib->initialize($config_1);
        $CI3->image_lib->resize();
    }
    /* ---------------Cut Creation Start ------------------ */
    function Cut($string, $max_length){
        if (strlen($string) > $max_length){
            $string = substr($string, 0, $max_length);
            $pos = strrpos($string, " ");
            if($pos === false) {
                    return substr($string, 0, $max_length)."...";
            }
                return substr($string, 0, $pos)."...";
        }else{
            return $string;
        }
    }        
    /* ---------------Slug Creation Start ------------------ */
    function create_slug($string){
        $string = $this->remove_accents($string);
        $string = $this->symbols_to_words($string);
        $string = strtolower($string);
        $string = str_replace('�',"'",$string);
        $space_chars = array(
        " " , "�" , "�" , "�" , "/", "\\" , ":" , ";" , "." , "+" , "#" , "~" , "_" , "|"
        );
        foreach($space_chars as $char){
            $string = str_replace($char, '-', $string);
        }
        $string = preg_replace('/([^a-zA-Z0-9\-]+)/', '', $string);
        $string = preg_replace('/-+/', '-', $string); 
        if(substr($string, -1)==='-'){ 
            $string = substr($string, 0, -1);
        }
        if(substr($string, 0, 1)==='-'){
            $string = substr($string, 1);
        }
        return $string;
    }
    
    function symbols_to_words($output){
        $output = str_replace('@', ' at ', $output);
        $output = str_replace('%', ' percent ', $output);
        $output = str_replace('&', ' and ', $output);
        return $output;
    }
    function remove_accents($string) {
        if(!preg_match('/[\x80-\xff]/', $string)){
            return $string;
        }
        if($this->seems_utf8($string)){
            $chars = array(
            chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
            chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
            chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
            chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
            chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
            chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
            chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
            chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
            chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
            chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
            chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
            chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
            chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
            chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
            chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
            chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
            chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
            chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
            chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
            chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
            chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
            chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
            chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
            chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
            chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
            chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
            chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
            chr(195).chr(191) => 'y',
            chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
            chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
            chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
            chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
            chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
            chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
            chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
            chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
            chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
            chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
            chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
            chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
            chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
            chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
            chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
            chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
            chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
            chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
            chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
            chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
            chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
            chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
            chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
            chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
            chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
            chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
            chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
            chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
            chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
            chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
            chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
            chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
            chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
            chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
            chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
            chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
            chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
            chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
            chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
            chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
            chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
            chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
            chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
            chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
            chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
            chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
            chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
            chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
            chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
            chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
            chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
            chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
            chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
            chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
            chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
            chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
            chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
            chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
            chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
            chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
            chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
            chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
            chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
            chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
            chr(226).chr(130).chr(172) => 'E',
            chr(194).chr(163) => '');
            $string = strtr($string, $chars);
        } else {
            $chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
            .chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
            .chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
            .chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
            .chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
            .chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
            .chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
            .chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
            .chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
            .chr(252).chr(253).chr(255);
            $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";
            $string = strtr($string, $chars['in'], $chars['out']);
            $double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
            $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
            $string = str_replace($double_chars['in'], $double_chars['out'], $string);
        }
        return $string;
    }
    
    /* ---------------Slug Creation End  ------------------ */
}
?>