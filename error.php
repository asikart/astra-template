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
		
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap-responsive.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
		
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
							
							<?php echo AstraHelper::_('menu.render', $this->params->get('menutype', 'mainmenu')); ?>
							
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<?php if( $fixtop ): ?>
		<div id="nav-placeholder"></div>
		<?php endif; ?>
		
		
		<!--BANNER-->
		<div id="banner" class="full-width">
			<div class="container">
				<div class="row-fluid banner-wrap">
					
					<h1 id="error-code">
						<?php echo $this->error->getCode(); ?>
					</h1>
					
				</div>	
			</div>
		</div>
		
		
		<!--MAIN CONTAINER-->
		<div id="main-container">
			<div class="container<?php echo $fluid; ?>">
				
				<!-- Header -->
				
				<!-- Banner -->
				<div class="banner">
					<jdoc:include type="modules" name="banner" style="xhtml" />
				</div>
				<div class="row-fluid">
					<div id="content" class="span12">
						<!-- Begin Content -->
						<h1 class="page-header"><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>
						<div class="well">
							<div class="row-fluid">
								<div class="span6">
									<p><strong><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></strong></p>
									<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
									<ul>
										<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
										<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
										<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
										<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
									</ul>
								</div>
								<div class="span6">
									<p><strong><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
									<p><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
									<?php
										$module = JModuleHelper::getModule('search');
										echo JModuleHelper::renderModule($module);
									?>
									<p><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></p>
									<p><a href="<?php echo $this->baseurl; ?>" class="btn"><i class="icon-home"></i> <?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
								</div>
							</div>
							<hr />
							<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
							<blockquote>
								<span class="label label-inverse"><?php echo $this->error->getCode(); ?></span> <?php echo $this->error->getMessage();?>
							</blockquote>
						</div>
						<!-- End Content -->
					</div>
				</div>
				
			</div>
		</div>
		
		<jdoc:include type="modules" name="debug" />		
		
	</body>
</html>