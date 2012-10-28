<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

include_once JPATH_THEMES.'/astrap/includes/init.php' ;



// Load optional rtl Bootstrap css and Bootstrap bugfixes
// JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<jdoc:include type="head" />
		
		<!--[if lt IE 9]>
			<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<!--TOP NAV-->
		<div id="top-nav">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container-fluid">
						<h1 id="logo" class="pull-left">
							<a class="brand" href="index.php">LOGO</a>
						</h1>
						<?php echo AstrapHelper::_('menu.render', 'aboutjoomla'); ?>
					</div>
				</div>
			</div>	
		</div>
		
		<div id="nav-placeholder"></div>
		
		<?php if( $cols = count(AstrapHelper::_('position.countPositions', array('banner-1', 'banner-2'))) ): ?>
		<!--BANNER-->
		<div id="banner">
			<div class="container">
				<div class="row-fluid banner-wrap">
					
					<?php if( $this->countModules('banner-1') ): ?>
					<div class="span<?php echo $cols == 2 ? 8 : 12 ; ?>">
						<jdoc:include type="modules" name="banner-1" />
					</div>
					<?php endif; ?>
					
					<?php if( $this->countModules('banner-2') ): ?>
					<div class="span<?php echo $cols == 2 ? 4 : 12 ; ?>">
						<jdoc:include type="modules" name="banner-2" />
					</div>
					<?php endif; ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		
		<?php if( count(AstrapHelper::_('position.countPositions', array('sub-banner-1', 'sub-banner-2'))) ): ?>
		<!--SUB BANNER-->
		<div id="sub-banner">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span6 pull-left">
						<jdoc:include type="modules" name="sub-banner-1" />
					</div>
					
					<div class="span6 pull-right">
						<jdoc:include type="modules" name="sub-banner-2" />
					</div>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<!--TOP CONTAINER-->
		<?php if( AstrapHelper::_('position.getBlockPositions', 'top-container') ): ?>
		<div id="top-container">
			<div class="container-fluid">
				<div class="row-fluid">
					<?php echo AstrapHelper::_('position.render', 'top-container'); ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<!--MAIN CONTAINER-->
		<div id="main-container">
			<div class="container-fluid">
				<div class="row-fluid">
					<?php $cols = count(AstrapHelper::_('position.countPositions', array('left-1', 'left-2', 'right-1', 'right-2'))); ?>
					<?php $colSpan = 2; ?>
					<?php $mainSpan = 12 - ($colSpan*$cols) ; ?>
					
					<?php if( $this->countModules('left-1') ): ?>
					<div class="span<?php echo $colSpan; ?> col-left-1">
						<jdoc:include type="modules" name="left-1" style="xhtml" />
					</div>
					<?php endif; ?>
					
					<?php if( $this->countModules('left-2') ): ?>
					<div class="span<?php echo $colSpan; ?> col-left-2">
						<jdoc:include type="modules" name="left-2" style="xhtml" />
					</div>
					<?php endif; ?>
					
					
					<div class="span<?php echo $mainSpan; ?>">
						<jdoc:include type="component" />
					</div>
					
					
					<?php if( $this->countModules('right-1') ): ?>
					<div class="span<?php echo $colSpan; ?> col-right-1">
						<jdoc:include type="modules" name="right-1" style="xhtml" />
					</div>
					<?php endif; ?>
					
					<?php if( $this->countModules('right-2') ): ?>
					<div class="span<?php echo $colSpan; ?> col-right-2">
						<jdoc:include type="modules" name="right-2" style="xhtml" />
					</div>
					<?php endif; ?>
				</div>	
			</div>
		</div>
		
		<!--BOTTOM CONTAINER-->
		<?php if( AstrapHelper::_('position.getBlockPositions', 'bottom-container') ): ?>
		<div id="top-container">
			<div class="container-fluid">
				<div class="row-fluid">
					<?php echo AstrapHelper::_('position.render', 'bottom-container'); ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
	</body>
</html>