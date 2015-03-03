<?php
/**
* @version 1.4.0
* @package RSform!Pro 1.4.0
* @copyright (C) 2007-2013 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$out = '';

if ($this->_form->ShowFormTitle) {
	$out.='<h1 class="uk-article-title">{global:formtitle}</h1>'."\n";
}

$out.='{error}'."\n";

$page_num = 0;
$out.= '<!-- Do not remove this ID, it is used to identify the page so that the pagination script can work correctly -->'."\n";
$out.='<div class="uk-form uk-form-horizontal" id="rsform_'.$formId.'_page_'.$page_num.'">'."\n";

foreach ($quickfields as $quickfield)
{	
	// skip...
	if (in_array($quickfield, $hiddenfields)) {
		continue;
	}
	
	// handle pagebreaks
	if (in_array($quickfield, $pagefields))
	{
		$page_num++;
		$last_page  = $quickfield == end($pagefields);
		$last_field = $quickfield == end($quickfields);
		
		$out.="\t".'<div class="uk-form-row rsform-block-'.JFilterOutput::stringURLSafe($quickfield).'">'."\n";
		$out.= "\t\t".'<label class="uk-form-label">&nbsp;</label>'."\n";
		$out.= "\t\t".'<div class="uk-form-controls">'."\n";
		$out.= "\t\t".'{'.$quickfield.':body}'."\n";
		$out.= "\t\t".'</div>'."\n";
		$out.="\t".'</div>'."\n";
		
		$out .= "\t".'</div>'."\n";
		if (!$last_page || !$last_field)
		{
			$out.= '<!-- Do not remove this ID, it is used to identify the page so that the pagination script can work correctly -->'."\n";
			$out.='<div class="uk-form uk-form-horizontal" id="rsform_'.$formId.'_page_'.$page_num.'">'."\n";
		}
		
		continue;
	}

	if (stripos($quickfield, 'text') === 0) {// handle standard fields
		$out .= "\t" . '<div class="uk-form-row rsform-block-' . JFilterOutput::stringURLSafe($quickfield) . '">' . "\n";
		$out .= "\t\t" . '<p>{' . $quickfield . ':body}</p>' . "\n";
		$out .= "\t" . '</div>' . "\n";
	} else {
		$required = in_array($quickfield, $requiredfields) ? '&nbsp;&nbsp;<em class="uk-text-danger">' . (isset($this->_form->Required) ? $this->_form->Required : '*') . '</em>' : "";
		$out .= "\t" . '<div class="uk-form-row rsform-block-' . JFilterOutput::stringURLSafe($quickfield) . '">' . "\n";
		$out .= "\t\t" . '<label class="uk-form-label" title="">{' . $quickfield . ':caption}' . $required . '</label>' . "\n";
		$out .= "\t\t" . '<div class="uk-form-controls">' . "\n";
		$out .= "\t\t" . '{' . $quickfield . ':body}<span class="uk-form-help-inline">{' . $quickfield . ':validation}</span>' . "\n";
		$out .= "\t\t" . '<p class="uk-form-help-block">{' . $quickfield . ':description}</p>' . "\n";
		$out .= "\t\t" . '</div>' . "\n";
		$out .= "\t" . '</div>' . "\n";
	}
}

$out.='</div>'."\n";

if ($out != $this->_form->FormLayout && $this->_form->FormId)
{
	// Clean it
	// Update the layout
	$db = JFactory::getDBO();
	$db->setQuery("UPDATE #__rsform_forms SET FormLayout='".$db->escape($out)."' WHERE FormId=".$this->_form->FormId);
	$db->execute();
}
	
return $out;