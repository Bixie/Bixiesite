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
$align = ($this->checkPosition('media')) ? $view->params->get('template.item_media_alignment') : '';

?>

<?php if ($this->checkPosition('top')) : ?>
	<?php echo $this->renderPosition('top', array('style' => 'uikit_block')); ?>
<?php endif; ?>



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

<?php if ($align == "top") : ?>
	<?php echo $this->renderPosition('media', array('style' => 'uikit_block')); ?>
<?php endif; ?>

<?php if ($this->checkPosition('meta')) : ?>
	<p class="uk-text-bold">
		<?php echo $this->renderPosition('meta'); ?>
	</p>
<?php endif; ?>

<?php echo $this->renderPosition('media', array('style' => 'uikit_block')); ?>

<div class="uk-grid">
    <div class="uk-width-medium-1-2">
		<?php if ($this->checkPosition('content')) : ?>
			<?php echo $this->renderPosition('content'); ?>
		<?php endif; ?>
    </div>
    <div class="uk-width-medium-1-2">
		<?php if ($this->checkPosition('author')) : ?>
			<div class="uk-panel uk-panel-box">
				<?php echo $this->renderPosition('author'); ?>
			</div>
		<?php endif; ?>
		<?php if ($this->checkPosition('taxonomy')) : ?>
			<ul class="uk-list">
				<?php echo $this->renderPosition('taxonomy', array('style' => 'uikit_list')); ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
<?php if ($this->checkPosition('bottom')) : ?>
	<?php echo $this->renderPosition('bottom', array('style' => 'uikit_block')); ?>
<?php endif; ?>

<?php if ($this->checkPosition('related')) : ?>
	<?php echo $this->renderPosition('related'); ?>
<?php endif; ?>

