<?php
/**
 * @package site.module mod_boxesghsvs for Joomla!
 * @version See mod_boxesghsvs.xml
 * @author G@HService Berlin Neukölln, Volkmar Volli Schlothauer (ghsvs.de)
 * @copyright Copyright (C) 2023, G@HService Berlin Neukölln, Volkmar Volli Schlothauer. All rights reserved.
 * @license GNU GPLv3 http://www.gnu.org/licenses/gpl-3.0.html; See LICENSE.txt
 * @authorUrl http://www.ghsvs.de
 */

defined('_JEXEC') or die;

use Joomla\CMS\Uri\Uri;

/*
Available variables from helper:
- String $link
- String $linktype
- String $linktarget
- String $linktext
- String $text
- String $image
- String $title
- String $modId
- Web Asset Manager WAM $wa
Others:
- $app
- $template
- $module
- Registry $params
- String $template
*/

if ($image && $linktype === 'linkYoutube')
{
	$bgPath = '"' . Uri::root() . $image . '"';
	$wa->addInlineStyle('#' . $modId . ' .iframeContainer{ background-image:url(' . $bgPath . ')');
	$image = null;
}
?>
<div id="<?php echo $modId; ?>" class="mod_boxesghsvs singleBox col <?php echo $linktype; ?> mt-3">
	<div class="card h-100">
		<div class="card-header d-flex align-items-center justify-content-center h4">
		<h3 class="h4 cardHeadline"><?php echo $title; ?></h3>
		</div>
		<div class="card-body">

			<?php if ($image) { ?>
				<img src="<?php echo $image; ?>" class="equalHeight" alt="">
			<?php } elseif ($linktype === 'linkYoutube') {
			?>
				<div class="iframeContainer equalHeight">
				<iframe class="REMOVE-SRC" src="<?php echo $link; ?>" width="100%" height="100%"
					id="masemannVideo" allowfullscreen="allowfullscreen"
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					frameborder="0"></iframe>
				</div>
			<?php } ?>
			<div class="card-text equalHeight2  d-flex align-items-center justify-content-center flex-column">
				<?php echo $text; ?>
			</div>
		</div><!--/.card-body-->
		<div class="card-footer">
			<?php if ($link) { ?>
				<a href="<?php echo $link; ?>" class="btn btnReadmore"<?php echo $target; ?>>
					<?php echo $linktext; ?>
					<span class="icon-arrow-right" aria-hidden="true"></span>
				</a>
			<?php } ?>
		</div><!--/.card-footer-->
	</div>
</div>
