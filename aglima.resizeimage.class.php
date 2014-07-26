<?php
	class AglimaImageResize {
		var $imageFile, $imageType;
		private $error = true;
		
		public function loadImage($imageFile) {
			if(file_exists($imageFile)) {
				$this->error = false;
			}
			
			if(!$this->error) {
				$imageData = getimagesize($imageFile);
				$this->imageType = $imageData[2];
				switch($this->imageType) {
					case IMAGETYPE_GIF: {
						if($this->imageFile = imagecreatefromgif($imageFile)) {
							return true;
						}
					}
					case IMAGETYPE_PNG: {
						if($this->imageFile = imagecreatefrompng($imageFile)) {
							return true;
						}
					}
					default: {
						if($this->imageFile = imagecreatefromjpeg($imageFile)) {
							return true;
						}
					}
				}
			}
		}
		
		public function getImageWidth() {
			if(!$this->error()) {
				return imagesx($this->imageFile);
			}
		}
		
		public function getImageHeight() {
			if(!$this->error()) {
				return imagesy($this->imageFile);
			}
		}
		
		public function resizeImage($w, $h) {
			if(!$this->error) {
				if($resizeImage = @imagecreatetruecolor($w, $h)) {
					if(@imagecopyresampled($resizeImage, $this->imageFile, 0, 0, 0, 0, $w, $h, $this->getImageWidth(), $this->getImageHeight())) {
						if($this->image = $resizeImage) {
							return true;
						}
					}
				}
			}
		}

		public function saveImage($imageFile, $imageType = IMAGETYPE_JPEG) {
			if(!$this->error) {
				switch($imageType) {
					case IMAGETYPE_GIF: {
						if(imagegif($this->image, $imageFile)) {
							return true;
						}
					}
					case IMAGETYPE_PNG: {
						if(imagepng($this->image, $imageFile)) {
							return true;
						}
					}
					default: {
						if(imagejpeg($this->image, $imageFile)) {
							return true;
						}
					}
				}
			}
		}
	}
?>
