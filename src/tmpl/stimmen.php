<?php
defined('_JEXEC') or die;

use Joomla\CMS\Uri\Uri;
use Joomla\CMS\HTML\HTMLHelper;

/*
Available variables from helper:
- String $link
- String $linktype
- String $linktarget
- String $linktext
- String $text
- String $image
- String $alt
- String $title
- String $subtitle
- String $modId
- Web Asset Manager WAM $wa
Others:
- $app
- $template
- $module
- Registry $params
- String $template
*/

if ($subtitle)
{
	$title .= ' <span class="subtitle">' . $subtitle . '</span>';
}

if (!$image)
{
	$image = Uri::root() . 'images/stimmen/fallBack.jpg';
	$alt = '';
}
?>
<div class="card h-100 singleStimme blockquoteColored">
		<div class="card-header d-flex align-items-center justify-content-center">
			<h3 class="cardHeadline"><?php echo $title; ?></h3>
		</div>
		<div class="card-image blockquoteColored">
			<?php if ($image) { ?>
				<?php
				echo HTMLHelper::_('image', $image, $alt); ?>
			<?php } ?>
		</div>
		<div class="d-flex blockquoteColored">
			<blockquote class="align-self-center">
				<?php echo $text; ?>
			</blockquote>
		</div><!--/.card-body-->
</div><!--/.card.singleStimme -->
