<?PHP
//================
$max= time();
if ($_FILES['upload']['name']!="") {
	$uploadedfile = $_FILES['upload']['tmp_name'];
	$extension=strstr($_FILES['upload']['name'],".");
	 
	$thumbpath=$max.$extension;			
	copy($_FILES['upload']['tmp_name'],"ck_images/".$thumbpath);
	?>
    <script>
	window.parent.CKEDITOR.tools.callFunction(<?=$_GET['CKEditorFuncNum']?>, "<?=base_url().'ck_images/'.$thumbpath;  ?>");
    </script>
	<?	
} 
//====================
?>