<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_stats
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="nav nav-list row-fluid stats-module<?php echo $moduleclass_sfx ?>">
<?php foreach ($list as $item) : ?>
	<li><span class="label label-info"><?php echo $item->title;?></span> <?php echo $item->data;?></li>
<?php endforeach; ?>
</ul>
