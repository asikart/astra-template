<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.Astra
 *
 * @copyright   Copyright (C) 2008 - 2012 Asikart, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

include_once JPATH_THEMES.'/astra/includes/init.php' ;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<jdoc:include type="head" />
		
		<!--[if lt IE 9]>
<?php if( Astra::_('jversion.gte30') ): ?>
			<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
<?php else: ?>
			<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/html5.js"></script>
<?php endif; ?>
		<![endif]-->
		
		<style type="text/css">
	
		body {
			background-color: <?php echo $bg_color ; ?>;
			color: <?php echo $text_color ; ?>;
		}
		
		#banner {
<?php if( $banner_bg_file ): ?>
			background-image: url(<?php echo JURI::root().$banner_bg_file; ?>);
<?php endif; ?>
<?php if( $banner_text_color ): ?>
			color: <?php echo $banner_text_color; ?> ;
<?php endif; ?>
		}
		
		</style>
		
	</head>
	<body>
		<!--TOP NAV-->
		<div id="top-nav">
			<?php if( !$fixtop ): ?>
			<div id="header">
				<div class="container<?php echo $fluid; ?>">
					<div class="row-fluid">
						<div class="pull-left">
							<h1 id="logo">
								<a class="brand" href="index.php">
								<?php if( $logo_file ): ?>
									<img src="<?php echo $logo_file; ?>" alt="<?php echo $site_title; ?>" />
								<?php else: ?>
									<?php echo $site_title; ?>
								<?php endif; ?>
								</a>
							</h1>
							
							<?php if( $site_desc ): ?>
							<span id="subtitle">
								<?php echo $site_desc; ?>
							</span>
							<?php endif; ?>	
						</div>
						
						<?php if( $this->countModules('search-header') ): ?>
						<div class="pull-right">
							<jdoc:include type="modules" name="search-header" />
						</div>
						<?php endif; ?>	
					</div>
				</div>	
			</div>
			
			<div class="container<?php echo $fluid; ?>">
			<?php endif; ?>
			
			<div class="navbar<?php echo $inverse; ?><?php echo $fixtop ? '  navbar-fixed-top': ''; ?>">
				<div class="navbar-inner">
					<?php if( $fixtop ): ?>
					<div class="container<?php echo $fluid; ?>">
						<h1 id="logo" class="pull-left">
							<a class="brand" href="index.php">
							<?php if( $logo_file ): ?>
								<img src="<?php echo $logo_file; ?>" alt="<?php echo $site_title; ?>" />
							<?php else: ?>
								<?php echo $site_title; ?>
							<?php endif; ?>
							</a>
						</h1>
					<?php endif; ?>
						<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
						<div class="nav-collapse navbar-responsive-collapse <?php if( $responsive ) echo 'collapse' ?>">
							<?php if( $this->countModules('search-navbar') ): ?>
							<div class="navbar-search pull-right">
								<jdoc:include type="modules" name="search-navbar" />
							</div>
							<?php endif; ?>	
							
							<?php echo AstraHelper::_('menu.render', $this->params->get('menutype', 'mainmenu')); ?>
							
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php if( $fixtop ): ?>
		<div id="nav-placeholder"></div>
		<?php endif; ?>
		
		<?php if( $cols = count(AstraHelper::_('position.countPositions', array('banner-1', 'banner-2'))) ): ?>
		<!--BANNER-->
		<div id="banner" class="full-width">
			<div class="container">
				<div class="row-fluid banner-wrap">
					
					<?php if( $this->countModules('banner-1') ): ?>
					<div class="span<?php echo $cols == 2 ? 8 : 12 ; ?>">
						<jdoc:include type="modules" name="banner-1" style="<?php echo $DefaultChromeStyle; ?>" />
					</div>
					<?php endif; ?>
					
					<?php if( $this->countModules('banner-2') ): ?>
					<div class="span<?php echo $cols == 2 ? 4 : 12 ; ?>">
						<jdoc:include type="modules" name="banner-2" style="<?php echo $DefaultChromeStyle; ?>" />
					</div>
					<?php endif; ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		
		<?php if( count(AstraHelper::_('position.countPositions', array('sub-banner-1', 'sub-banner-2'))) ): ?>
		<!--SUB BANNER-->
		<div id="sub-banner" class="full-width">
			<div class="container<?php echo $fluid; ?>">
				<div class="row-fluid">
					<?php echo AstraHelper::_('position.render', 'sub-banner'); ?>
					</div>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<?php if( count($app->getMessageQueue()) ): ?>
		<!--MESSGAE-->
			<?php
				$msgs = $app->getMessageQueue();
				$last_msg = array_pop($msgs) ;
				switch( $last_msg['type'] ){
					default:
					case 'message' :
						$msg_type = 'success' ;
						break;
					
					case 'error' :
						$msg_type = 'error' ;
						break;
					
					case 'warning' :
						$msg_type = 'warning' ;
						break ;
					
					case 'notice' :
						$msg_type = 'info' ;
						break ;
				}
			?>
		<div id="message" class="full-width">
			<div class="container<?php echo $fluid; ?>">
			<?php if( JVERSION < 3 ): ?>
				<div class="alert alert-<?php echo $msg_type; ?>">
					<button type="button" class="close" data-dismiss="alert">×</button>
					
				</div>
			<?php else: ?>
				<jdoc:include type="message" />
			<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		
		
		<!--TOP CONTAINER-->
		<?php if( AstraHelper::_('position.getBlockPositions', 'top-container') ): ?>
		<div id="top-container">
			<div class="container<?php echo $fluid; ?>">
				<div class="row-fluid">
					<?php echo AstraHelper::_('position.render', 'top-container'); ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<!--MAIN CONTAINER-->
		<div id="main-container">
			<div class="container<?php echo $fluid; ?>">
				<div class="row-fluid">
					<?php $mainSpan = 12 - ($leftColSpan + $rightColSpan) ; ?>
					
					<!--LEFT-->
					<?php if( $this->countModules('left') ): ?>
					<div class="span<?php echo $leftColSpan; ?> col-left">
						<jdoc:include type="modules" name="left" style="<?php echo $DefaultChromeStyle; ?>" />
					</div>
					<?php endif; ?>
					
					<!--MAIN INNER-->
					<div class="span<?php echo $mainSpan; ?>">
						
						<!--TOP BREADCRUMBS-->
						<?php if( $this->countModules('top-breadcrumbs') ): ?>
						<div class="row-fluid">
							<div class="span12">
								<jdoc:include type="modules" name="top-breadcrumbs" />
							</div>
						</div>
						<?php endif; ?>
						
						<!--TOP INNER-->
						<?php if( AstraHelper::_('position.getBlockPositions', 'top-inner') ): ?>
						<div class="row-fluid top-inner">
							<?php echo AstraHelper::_('position.render', 'top-inner'); ?>
						</div>
						<?php endif; ?>	
						
						<!--INNER BODY-->
						<div class="row-fluid">
							<?php $mainSpan_inner = 12 - ($leftInnerColSpan + $rightInnerColSpan) ; ?>
							
							<!--LEFT INNER-->
							<?php if( $this->countModules('left-inner') ): ?>
							<div class="span<?php echo $leftInnerColSpan; ?> col-left-inner">
								<jdoc:include type="modules" name="left-inner" style="<?php echo $DefaultChromeStyle; ?>" />
							</div>
							<?php endif; ?>
							
							<!--COMPONENT-->
							<div class="span<?php echo $mainSpan_inner; ?>">
								<jdoc:include type="component" />
							</div>
							
							<!--RIGHT INNER-->
							<?php if( $this->countModules('right-inner') ): ?>
							<div class="span<?php echo $rightInnerColSpan; ?> col-right-inner">
								<jdoc:include type="modules" name="right-inner" style="<?php echo $DefaultChromeStyle; ?>" />
							</div>
							<?php endif; ?>
						
						</div>
						
						<!--BOTTOM INNER-->
						<?php if( AstraHelper::_('position.getBlockPositions', 'bottom-inner') ): ?>
						<div class="row-fluid top-inner">
							<?php echo AstraHelper::_('position.render', 'bottom-inner'); ?>
						</div>
						<?php endif; ?>	
						
					</div>
					
					<?php if( $this->countModules('right') ): ?>
					<div class="span<?php echo $rightColSpan; ?> col-right">
						<jdoc:include type="modules" name="right" style="<?php echo $DefaultChromeStyle; ?>" />
					</div>
					<?php endif; ?>
					
					
				</div>	
			</div>
		</div>
		
		<!--BOTTOM CONTAINER-->
		<?php if( AstraHelper::_('position.getBlockPositions', 'bottom-container') ): ?>
		<div id="top-container">
			<div class="container<?php echo $fluid; ?>">
				<div class="row-fluid">
					<?php echo AstraHelper::_('position.render', 'bottom-container'); ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<!--BOTTOM BREADCRUMBS-->
		<?php if( $this->countModules('bottom-breadcrumbs') ): ?>
		<div id="bottom-breadcrumbs" class="full-width">
			<div class="container<?php echo $fluid; ?>">
				<div class="row-fluid">
					<div class="span12">
						<jdoc:include type="modules" name="bottom-breadcrumbs" />
					</div>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		
		<!--FOOTER-->
		<?php if( AstraHelper::_('position.getBlockPositions', 'footer') ): ?>
		<div id="footer" class="full-width <?php echo $footer_color; ?>">
			<div class="container<?php echo $fluid; ?>">
				<div class="row-fluid">
					<?php echo AstraHelper::_('position.render', 'footer'); ?>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<?php if( $this->countModules('footer') || $this->countModules('footer-nav') ): ?>
		<div id="copyright" class="full-width <?php echo $footer_color; ?>">
			<div class="container<?php echo $fluid; ?>">
				<div class="row-fluid">
					<div class="span">
						<h3 id="footer-logo" class="<?php echo $footer_logo_float; ?>">
							<a class="brand" href="index.php">
								<?php if( $footer_logo_file ): ?>
								<img src="<?php echo $footer_logo_file; ?>" alt="<?php echo $site_title; ?>" />
								<?php else: ?>
									<?php echo $site_title; ?>
								<?php endif; ?>	
							</a>
						</h3>
						
						<div class="pull-left">
							
							<?php if( $this->countModules('footer-nav') ): ?>
							<div id="footer-nav">
								<jdoc:include type="modules" name="footer-nav" />
								<div class="clearfix"></div>
							</div>
							<?php endif; ?>
							
							<jdoc:include type="modules" name="footer" />
						</div>
						
						
					</div>
				</div>	
			</div>
		</div>
		<?php endif; ?>
		
		<jdoc:include type="modules" name="debug" />
	</body>
</html>