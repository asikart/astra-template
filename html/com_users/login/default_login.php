<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.noframes');
?>

<div class="login<?php echo $this->pageclass_sfx?> login-page">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>

	<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
	<div class="login-description offset4">
	<?php endif ; ?>
		
		<?php if (($this->params->get('login_image')!='')) :?>
			<img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JTEXT::_('COM_USER_LOGIN_IMAGE_ALT')?>"/>
		<?php endif; ?>
		
		<div class="description">
			<?php if($this->params->get('logindescription_show') == 1) : ?>
				<?php echo $this->params->get('login_description'); ?>
			<?php endif; ?>	
		</div>

	<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
	</div>
	<?php endif ; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post">

		<fieldset class="form-horizontal span8 offset2">
			<?php foreach ($this->form->getFieldset('credentials') as $field): ?>
				<?php if (!$field->hidden): ?>
					<div class="control-group">
						<label id="<?php echo $field->id; ?>" class="control-label" for="<?php echo $field->name; ?>" class=""><?php echo $field->title; ?></label>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<div class="login-fields">
				<div class="control-group">
					<div class="controls">
						<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
			
						<label id="remember-lbl" for="remember" class="checkbox" >
							<input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"  alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>" />
							<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>
						</label>
						<?php endif; ?>
					
						<button type="submit" class="button"><?php echo JText::_('JLOGIN'); ?></button>
					</div>
				</div>
			</div>
			
			
			<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
			<?php echo JHtml::_('form.token'); ?>
		
			<div class="offset2">
			<ul class="nav nav-list">
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></a>
				</li>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></a>
				</li>
				<?php
				$usersConfig = JComponentHelper::getParams('com_users');
				if ($usersConfig->get('allowUserRegistration')) : ?>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
						<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?></a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
		
		
		</fieldset>
		
		
	</form>
</div>

