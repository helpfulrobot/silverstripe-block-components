<?php

class BlockComponent extends DataObject {
	protected static $db = array(
		'SortOrder'			=>	'Int'
	);

	protected static $has_one = array(
		'inBlock'			=>	'Block'
	);

	protected static $summary_fields = array(
		'Title'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeFieldsFromTab('Root.Main', array(
			'SortOrder',
			'inBlockID',
		));
		return $fields;
	}

	public function Title() {
		return 'Block Component';
	}

	public function getTitle() {
		return $this->Title();
	}
}