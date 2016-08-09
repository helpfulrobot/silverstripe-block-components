<?php

class MediaObject extends DataObject {

	protected static $db = array(
		'SortOrder'			=>	'Int'
	);

	protected static $has_one = array(
		'inComponent'		=>	'MediaComponent'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('SortOrder');
		$fields->removeByName('inComponentID');
		return $fields;
	}

	protected static $summary_fields = array(
		'Thumbnail'
	);

	public function Thumbnail() {
		return false;
	}
}