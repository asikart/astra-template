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
						<jdoc:include type="modules" name="banner-1" style="xhtml" />
					</div>
					<?php endif; ?>
					
					<?php if( $this->countModules('banner-2') ): ?>
					<div class="span<?php echo $cols == 2 ? 4 : 12 ; ?>">
						<jdoc:include type="modules" name="banner-2" style="xhtml" />
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
					<?php $cols = count(AstrapHelper::_('position.countPositions', array('left-1', 'right-1'))); ?>
					<?php $colSpan = 2; ?>
					<?php $mainSpan = 12 - ($colSpan*$cols) ; ?>
					
					<!--LEFT-->
					<?php if( $this->countModules('left-1') ): ?>
					<div class="span<?php echo $colSpan; ?> col-left-1">
						<jdoc:include type="modules" name="left-1" style="xhtml" />
					</div>
					<?php endif; ?>
					
					<!--MAIN INNER-->
					<div class="span<?php echo $mainSpan; ?>">
						
						<!--TOP BREADCRUMBS-->
						<div class="row-fluid">
							<div class="span12">
								<jdoc:include type="modules" name="top-breadcrumbs" />
							</div>
						</div>	
						
						<!--TOP INNER-->
						<?php if( AstrapHelper::_('position.getBlockPositions', 'top-inner') ): ?>
						<div class="row-fluid top-inner">
							<?php echo AstrapHelper::_('position.render', 'top-inner'); ?>
						</div>
						<?php endif; ?>	
						
						<!--INNER BODY-->
						<div class="row-fluid">
							<?php $cols_inner = count(AstrapHelper::_('position.countPositions', array('left-inner', 'right-inner'))); ?>
							<?php $colSpan_inner = 3; ?>
							<?php $mainSpan_inner = 12 - ($colSpan_inner*$cols_inner) ; ?>
							
							<!--LEFT INNER-->
							<?php if( $this->countModules('left-inner') ): ?>
							<div class="span<?php echo $colSpan_inner; ?> col-left-inner">
								<jdoc:include type="modules" name="left-inner" style="xhtml" />
							</div>
							<?php endif; ?>
							
							<!--COMPONENT-->
							<div class="span<?php echo $mainSpan_inner; ?>">
								<jdoc:include type="component" />
							</div>
							
							<!--RIGHT INNER-->
							<?php if( $this->countModules('right-inner') ): ?>
							<div class="span<?php echo $colSpan_inner; ?> col-right-inner">
								<jdoc:include type="modules" name="right-inner" style="xhtml" />
							</div>
							<?php endif; ?>
						
						</div>
						
						<!--BOTTOM INNER-->
						<?php if( AstrapHelper::_('position.getBlockPositions', 'bottom-inner') ): ?>
						<div class="row-fluid top-inner">
							<?php echo AstrapHelper::_('position.render', 'bottom-inner'); ?>
						</div>
						<?php endif; ?>	
						
					</div>
					
					<?php if( $this->countModules('right-1') ): ?>
					<div class="span<?php echo $colSpan; ?> col-right-1">
						<jdoc:include type="modules" name="right-1" style="xhtml" />
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
		
		<!--BOTTOM BREADCRUMBS-->
		<div id="bottom-breadcrumbs">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<jdoc:include type="modules" name="bottom-breadcrumbs" />
					</div>
				</div>	
			</div>
		</div>
		
		
		<!--FOOTER-->
		<?php if( AstrapHelper::_('position.getBlockPositions', 'footer') ): ?>
		<div id="footer">
			<div class="container-fluid">
				<div class="row-fluid">
					<?php echo AstrapHelper::_('position.render', 'footer'); ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<?php if( $this->countModules('footer') ): ?>
		<div id="copyright">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span">
						<h3 id="footer-logo" class="pull-left">
							<a class="brand" href="index.php">LOGO</a>
						</h3>
						<jdoc:include type="module" name="footer" />
					</div>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		
	</body>
</html>