<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Databasebackup extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')==''){
			redirect('webmaster/login','refresh');
		}
	}

	function index($msg=0){
		$data['act_id']="settings";
		$data['msg']=$msg;
 		 
		/* Store All Table name in an Array */
		$return=""; $data="";
	  	$allTables = array();
        //$result = mysql_query('SHOW TABLES');
        $query = $this->db->query('SHOW TABLES');
		$rowDs =  $query->row_array();
        foreach($rowDs as $row)
        {
            $allTables[] = $row[0];
        }
        print_r($allTables); exit();

            foreach($allTables as $table)
            {
               // $result = mysql_query('SELECT * FROM '.$table);
            	$result = $this->db->query('SELECT * FROM '.$table);

               // $num_fields = mysql_num_fields($result);
            	 $num_fields = $this->db->count_all_results( $table );

                $return.= 'DROP TABLE IF EXISTS '.$table.';';

               // $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
                
        		$query2 = $this->db->query('SHOW CREATE TABLE '.$table);
        		$res2 = $query2->result_array();

                $return.= "\n\n".$res2[1].";\n\n";

                for ($i = 0; $i < $num_fields; $i++)
				{		
						 $RowRS = $result->result_array();
                            foreach($RowRS as $row)
                            {
                                $return.= 'INSERT INTO '.$table.' VALUES(';
                                    for($j=0; $j<$num_fields; $j++)
                                        {
                                            $row[$j] = addslashes($row[$j]);
                                                $row[$j] = str_replace("\n","\\n",$row[$j]);

                                                if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } 
                                                else { $return.= '""'; }

                                                if ($j<($num_fields-1)) { $return.= ','; }
                                        }
                                $return.= ");\n";
                            }
                    }
					$return.="\n\n";
					}// Create Backup Folder

         $folder = 'Database_Backup/';

        if (!is_dir($folder))

            mkdir($folder, 0755, true);
            chmod($folder, 0755);

           // $date = date('m-d-Y-H-i-s', time()); 
            $filename = $folder."jfreelancer_db_backup"; 

            $handle = fopen($filename.'.sql','w+');

        fwrite($handle,$return);
        fclose($handle);
        //echo "Backup of Database Taken";
		$data['sub_act_id']="db_backup";
		$this->load->view("webmaster/databasebackup",$data);
	 }
	
	 function start_backup(){
	 	$data['sub_act_id']=" ";
	 	 
	 	$path ="./uploads/Database_Backup/"; // change the path to fit your websites document structure
		$fullPath = $path.SITENAME."_db".date('Y-m-d').".sql";

		if ($fd = fopen ($fullPath, "r")) {
			$fsize = filesize($fullPath);
			$path_parts = pathinfo($fullPath);
			$ext = strtolower($path_parts["extension"]);
			switch ($ext) {
				case "pdf":
				header("Content-type: application/pdf"); // add here more headers for diff. extensions
				header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
				break;
				default;
				header("Content-type: application/octet-stream");
				header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
			}
			header("Content-length: $fsize");
			header("Cache-control: private"); //use this to open files directly
			while(!feof($fd)) {
				$buffer = fread($fd, 2048);
				echo $buffer;
			}
		}
		fclose ($fd);
		exit;
	 }
}?>