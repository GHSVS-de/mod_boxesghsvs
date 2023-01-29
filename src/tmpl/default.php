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

use Joomla\CMS\Language\Text;

$modId = 'mod_boxesghsvs' . $module->id;

/*
Available variables from helper:
- String $link
- String $linktype
- String $linktarget
- String $linktext
- String $text
- String $image
- String $title
*/
?>
<div id="<?php echo $modId; ?>" class="mod_boxesghsvs singleBox g-0 col <?php echo $linktype; ?>">
	<div class="card h-100">
		<div class="card-body">
			<h3 class="card-title h4"><?php echo $title; ?></h3>
			<?php if ($image) { ?>
				<img src="<?php echo $image; ?>" class="card-img-top" alt="">
			<?php } elseif ($linktype === 'linkYoutube') { ?>
				<iframe src="<?php echo $link; ?>" width="228" height="150"
					id="masemannVideo" allowfullscreen="allowfullscreen"
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					frameborder="0"></iframe>
			<?php } ?>
			<div class="card-text">
				<?php echo $text; ?>
			</div>
			<?php if ($link) { ?>
				<a href="<?php echo $link; ?>" class="btn btn-outline-danger"<?php echo $target; ?>>
					<?php echo $linktext; ?>
					<span class="icon-arrow-right"></span>
				</a>
			<?php } ?>
		</div>
	</div>
</div>
