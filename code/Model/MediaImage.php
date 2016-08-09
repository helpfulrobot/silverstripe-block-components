<?php

class MediaImage extends MediaObject {
	protected static $has_one = array(
		'Image'		=>	'Image'
	);

	public function Thumbnail() {
		return $this->Image()->FillMax(100, 100);
	}
}