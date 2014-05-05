<?php

namespace Intersvyaz\Widgets;

class BootstrapDateTimePicker extends \CInputWidget
{
	/**
	 * Options for the bootstrap-datetimepicker plugin.
	 * @var array
	 */
	public $options = [];

	/**
	 * JavaScript event handlers ('event' => 'handler').
	 * @var array
	 */
	public $events = [];

	/**
	 * Whether to use minified assets.
	 * @var bool
	 */
	public $minifedAssets = true;

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		if (!isset($this->options['language'])) {
			$this->options['language'] = \Yii::app()->getLanguage();
		}
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		list($name, $id) = $this->resolveNameID();

		if (isset($this->htmlOptions['id'])) {
			$id = $this->htmlOptions['id'];
		} else {
			$this->htmlOptions['id'] = $id;
		}
		if (isset($this->htmlOptions['name'])) {
			$name = $this->htmlOptions['name'];
		}

		if ($this->hasModel()) {
			echo \CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
		} else {
			echo \CHtml::textField($name, $this->value, $this->htmlOptions);
		}

		$options = !empty($this->options) ? \CJavaScript::encode($this->options) : '';

		$script = "jQuery('#{$id}').datetimepicker({$options})";
		foreach ($this->events as $event => $handler) {
			$script .= ".on('{$event}'," . \CJavaScript::encode($handler) . ")";
		}
		$script .= ';';

		\Yii::app()->clientScript
			->registerScript(__CLASS__ . '#' . $this->getId(), $script);
		$this->registerAssets();
	}

	/**
	 * Register widget assets.
	 */
	protected function registerAssets()
	{
		$assetPath = realpath(__DIR__ . '/../assets');
		$assetUrl = \Yii::app()->assetManager->publish($assetPath);
		$minifyPrefix = $this->minifedAssets ? '.min' : '';

		\Yii::app()->clientScript
			->registerCssFile($assetUrl . '/bootstrap-datetimepicker' . $minifyPrefix . '.css')
			->registerScriptFile($assetUrl . '/bootstrap-datetimepicker' . $minifyPrefix . '.js');

		$localeFile = '/locales/bootstrap-datetimepicker.' . $this->options['language'] . '.js';
		if (file_exists($assetPath . $localeFile)) {
			\Yii::app()->clientScript->registerScriptFile($assetUrl . $localeFile);
		}
	}
}

