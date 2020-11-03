<html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body>
	<p style='position:absolute;right:0;bottom:0;'>

		<?php echo form_open_multipart('image/upload_file'); ?>
			<input type="file" name="userimage" size="1000" />
			<input type="submit" value="Upload Image" />
		</form>
	</p>
</body>
</html>