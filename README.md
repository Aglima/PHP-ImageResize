ImageResize
===========
<b>Functions</b>
<ul>
  <li>loadImage(image);</li>
  <li>saveImage(image);</li>
  <li>resizeImage(width, height);</li>
  <li>getImageWidth();</li>
  <li>getImageHeight();</li>
</ul>
<b>Example</b>

	require_once("aglima.imageresize.class.php");
	$Image = new AglimaImageResize();
	
	if($Image->loadImage("test.png")) {
		echo "Loaded.<br />";
	} else {
		echo "Failed to load image.<br />";
	}
	
	if($Image->resizeImage(64, 64)) {
		echo "Resized.<br />";
	} else {
		echo "Failed to resize image.<br />";
	}
	
	if($Image->saveImage("test.gif", IMAGETYPE_GIF)) {
		echo "Saved.<br />";
	} else {
		echo "Failed to save image.<br />";
	}
