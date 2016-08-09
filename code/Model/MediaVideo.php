<?php

class MediaVideo extends MediaObject {
	protected static $db = array(
		'VideoID'	=>	'Varchar(11)'
	);

	public function getCMSFields() {
	    $fields = parent::getCMSFields();
	    $fields->addFieldToTab('Root.Main', new YouTubeField('VideoID', 'YouTube Video'));
	    return $fields;
	}

	public function Thumbnail() {
		return $this->VideoID;
	}
}