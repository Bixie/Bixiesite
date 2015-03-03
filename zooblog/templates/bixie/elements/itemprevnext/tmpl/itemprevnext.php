<?php
/**
 * @package   com_zoo
 * @author    YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$this->app->document->addStylesheet('elements:itemprevnext/itemprevnext.css');

?>

<ul class="uk-pagination">
	<?php if ($prev_link) : ?>
		<li class="uk-pagination-previous"><a href="<?php echo $prev_link; ?>"><i
					class="uk-icon-chevron-left uk-margin-small-right"></i><?php echo JText::_('JPREV'); ?></a></li>
	<?php endif; ?>

	<?php if ($next_link) : ?>
		<li class="uk-pagination-next"><a href="<?php echo $next_link; ?>"><?php echo JText::_('JNEXT'); ?><i
					class="uk-icon-chevron-right uk-margin-small-left"></i></a></li>
	<?php endif; ?>
</ul>