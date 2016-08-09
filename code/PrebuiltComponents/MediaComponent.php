<?php use SaltedHerring\Grid as Grid;

class MediaComponent extends BlockComponent {
	public static $singular_name = 'Media Component';

	protected static $db = array(

	);

	protected static $has_many = array(
		'Medias'		=>	'MediaObject'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Medias');
		$grid = Grid::make('Medias', 'Medias', $this->Medias());
		$config = $grid->getConfig();
		$config->removeComponentsByType('GridFieldAddNewButton')->addComponents($multiClass = new MultiClassSelector());

		$mediaTypes = array(
			'MediaImage'	=>	'Image',
			'MediaVideo'	=>	'Video'
		);

		$multiClass->setClasses($mediaTypes);

		$fields->addFieldToTab('Root.Main', $grid);


		return $fields;
	}

	public function Title() {
		return 'Media Component';
	}

	public function getTitle() {
		return $this->Title();
	}
}