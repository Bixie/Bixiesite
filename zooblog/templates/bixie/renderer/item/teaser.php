<?php
/**
 * @package   com_zoo
 * @author    YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// init vars
$params = $item->getParams('site');

/* set media alignment */
$align = ($this->checkPosition('media')) ? $params->get('template.teaseritem_media_alignment') : '';

?>
<div class="uk-grid uk-grid-medium-1-2">
	<div>
		<?php echo $this->renderPosition('media'); ?>
	</div>
	<div class="uk-flex-item-1 uk-flex uk-flex-wrap uk-flex-wrap-space-between">
		<div class="uk-width-1-1">
			<?php if ($this->checkPosition('title')) : ?>
				<h1 class="uk-article-title">
					<?php echo $this->renderPosition('title'); ?>
				</h1>
			<?php endif; ?>
			<?php if ($this->checkPosition('subtitle')) : ?>
				<p class="uk-article-lead">
					<?php echo $this->renderPosition('subtitle'); ?>
				</p>
			<?php endif; ?>
			<?php if ($this->checkPosition('content')) : ?>
				<?php echo $this->renderPosition('content'); ?>
			<?php endif; ?>

		</div>
		<div class="uk-width-1-1">
			<?php if ($this->checkPosition('meta')) : ?>
				<ul class="uk-list uk-text-small">
					<?php echo $this->renderPosition('meta', array('style' => 'uikit_list')); ?>
				</ul>
			<?php endif; ?>
			<?php if ($this->checkPosition('links')) : ?>
				<div class="uk-width-1-1 uk-text-right">
					<?php echo $this->renderPosition('links', array('style' => 'uikit_subnav')); ?>
				</div>
			<?php endif; ?>
		</div>

	</div>
</div>
