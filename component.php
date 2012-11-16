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
		
		<jdoc:include type="component" />
	</body>
</html>