<html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<body>
    <?php echo $error; ?>
	<p style='position:absolute;right:0;bottom:0;'>

		<?php echo form_open_multipart('image/uploadwatrfile'); ?>
			<input type="file" name="userimage" size="1000" />
			<input type="submit" value="Upload Image" />
		</form>
	</p>
</body>
</html>