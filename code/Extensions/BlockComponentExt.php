<?php use SaltedHerring\Grid as Grid;

class BlockComponentExt extends DataExtension {
	protected static $has_many = array(
		'BlockComponents'		=>	'BlockComponent'
	);

	public function updateCMSFields(FieldList $fields) {
		$grid = Grid::make('BlockComponents', 'Block Components', $this->owner->BlockComponents());
		$config = $grid->getConfig();
		$config->removeComponentsByType('GridFieldAddNewButton')->addComponents($multiClass = new MultiClassSelector());

		$subComponents = ClassInfo::subclassesFor('BlockComponent');
		if (is_null($subComponents)) {
			$subComponents = array('BlockComponent');
		}else{
			unset($subComponents['BlockComponent']);
			foreach ($subComponents as $key => &$value) {
				$value = empty($key::$singular_name) ? ucwords(trim(strtolower(preg_replace('/_?([A-Z])/', ' $1', $value)))) : $key::$singular_name;
			}
		}

		$multiClass->setClasses($subComponents);

		$fields->addFieldToTab('Root.BlockComponents', $grid);
	}
}