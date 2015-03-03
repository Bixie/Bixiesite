<?php
/**
 * @package   com_zoo
 * @author    YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// register ElementOption class
App::getInstance('zoo')->loader->register('ElementOption', 'elements:option/option.php');

/*
	Class: ElementCheckbox
		The checkbox element class
*/
class ElementCheckbox extends ElementOption {

	/*
	   Function: edit
	       Renders the edit form field.

	   Returns:
	       String - html
	*/
	public function edit(){

		// init vars
		$options_from_config = $this->config->get('option', array());
		$default			 = $this->config->get('default');

		if (count($options_from_config)) {

			// set default, if item is new
			if ($default != '' && $this->_item != null && $this->_item->id == 0) {
				$default = array($default);
			} else {
				$default = array();
			}

			$selected_options  = $this->get('option', $default);

			$i       = 0;
			$html    = array('<div>');
				foreach ($options_from_config as $option) {
					$name = $this->getControlName('option', true);
					$checked = in_array($option['value'], $selected_options) ? ' checked="checked"' : null;
					$html[]  = '<div><input id="'.$name.$i.'" type="checkbox" name="'.$name.'" value="'.$option['value'].'"'.$checked.' /><label for="'.$name.$i++.'">'.$option['name'].'</label></div>';
					}
				// workaround: if nothing is selected, the element is still being transfered
				$html[] = '<input type="hidden" name="'.$this->getControlName('check').'" value="1" />';
			$html[] = '</div>';

			return implode("\n", $html);
		}

		return JText::_("There are no options to choose from.");
	}

	public function render($params = array()) {

		// init vars
		$params = $this->app->data->create($params);
		$selected_options  = $this->get('option', array());

		$iconMap = array(
			'javascript-ajax'=>'tm-icon-yootheme-jquery',
			'php'=>'uk-icon-terminal',
			'html5'=>'uk-icon-html5',
			'css3'=>'uk-icon-css3',
			'less'=>'tm-icon-yootheme-less',
			'html-css'=>'uk-icon-code',
			'joomla-framework'=>'uk-icon-joomla',
			'bixie-printshop'=>'uk-icon-bixie',
			'bixie-printshop-2-5'=>'uk-icon-bixie',
			'printshop-3-0'=>'uk-icon-bixie',
			'zoo-van-yootheme'=>'tm-icon-yootheme-zoo',
			'virtuemart-webwinkel'=>'uk-icon-shopping-cart',
			'uikit'=>'tm-icon-yootheme-uikit',
			'warp-template'=>'tm-icon-yootheme-warp',
			'custom-component'=>'uk-icon-magic'
		);

		$options = array();
		foreach ($this->config->get('option', array()) as $option) {
			if (in_array($option['value'], $selected_options)) {
				$icon = isset($iconMap[$option['value']]) ? '<i class="' . $iconMap[$option['value']] . ' uk-icon-fixed uk-text-primary"></i>' : '';
				$options[] = $icon.$option['name'];
			}
		}

		return $this->app->element->applySeparators($params->get('separated_by'), $options);

	}

}