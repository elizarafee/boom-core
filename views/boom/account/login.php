<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title>CMS | <?= __('Login'); ?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="robots" content="noindex, nofollow" />
	<?= Assets::factory('login_css')->css('cms.css.less') ?>
</head>
<body>
	<div id="b-login-form">
		<div class="ui-widget-shadow"></div>
		<div class="b-login-form-content">
			<div class="b-margin boom-tabs">
				<ul class="">
					<li class=""><a href="#tab-login">Login</a></li>
					<li class=""><a href="#tab-reset"><?= __('Password reset') ?></a></li>
				</ul>
				<div id="tab-login" class="ui-tabs-panel">
					<form id="login-form" name="login-form" action="/cms/login" method="post">
						<?= Form::hidden('csrf', Security::token()) ?>
						<fieldset id="b-login-stage1">
							<center>
								<img src="/media/b/img/ajax_load.gif" id="b-login-loader" style="display: none" />
							</center>
							<br />
							<p class="b-error ui-helper-hidden"></p>
							<p class="b-success ui-helper-hidden"></p>
							<p>
								<label for="email">
									<?= __('Email address') ?>
								</label>
								<input type="text" name="email" class="b-input" id="email" value="<?= Request::current()->query('email') ?>" />
							</p>
							<p>
								<label for="password">
									<?= __('Password') ?>
								</label>
								<input type="password" name="password" class="b-input" id="password" />
							</p>
							<p>
								<label class="b-remember-me-label">
									<input type="checkbox" name="remember" class="b-remember-me" />
									<?= __('Keep me signed in') ?> (<?= __('until you log out') ?>)
								</label>
							</p>
							<p class="ui-helper-clearfix">
								<label>&nbsp;</label>
								<button class="boom-button ui-helper-left ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit">
									<span class="ui-button-text">
										<?= __('Log in') ?>
									</span>
								</button>
							</p>
						</fieldset>
					</form>
				</div>
				<div id="tab-reset" class="ui-tabs-panel">
					<form id="reset-form" name="reset-form" action="/cms/auth/reset" method="post">
						<? if (isset($token)): ?>
							<fieldset>
								<input type="hidden" name="email" value="<?= Request::current()->query('email') ?>" />
								<input type="hidden" name="token" value="<?= Request::current()->query('token') ?>" />
								<p class="b-error ui-helper-hidden"></p>
								<p class="b-success ui-helper-hidden"></p>

								<p><?= __('Use this form to reset your password') ?>.</p>
								<p><?= __('Your new password must be a minimum of six characters') ?>.</p>

								<br/>

								<p>
									<label for="password1">
										<?= __('New password') ?>
									</label>
									<input type="password" name="password1" class="b-input" id="password1" value="" />
								</p>
								<p>
									<label for="password2">
										<?= __('Confirm password') ?>
									</label>
									<input type="password" name="password2" class="b-input" id="password2" value="" />
								</p>
								<p class="ui-helper-clearfix">
									<label>&nbsp;</label>
									<button class="boom-button ui-helper-left ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit">
										<span class="ui-button-text">
											<?= __('Change password') ?>
										</span>
									</button>
								</p>
							</fieldset>
						<? else: ?>
							<fieldset>
								<p class="b-error ui-state-error ui-corner-all<? if ( ! isset($message)): ?> ui-helper-hidden<? endif; ?>"><?if (isset($message)): echo $message; endif; ?></p>
								<p class="b-success ui-state-highlight ui-corner-all ui-helper-hidden"></p>

								<p><?= __('After you submit this form you will receive an email with instructions for resetting your password') ?>.</p>
								<br />

								<p>
									<label for="email">
										<?= __('Email address') ?>
									</label>
									<input type="text" name="email" class="b-input" id="reset-email" value="<?= Request::current()->query('email') ?>" />
								</p>
								<p class="ui-helper-clearfix">
									<button class="boom-button ui-helper-left ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit">
										<span class="ui-button-text">
											<?= __('Reset password') ?>
										</span>
									</button>
								</p>
							</fieldset>
						<? endif; ?>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?= Assets::factory('boom_login')
		->js('boom.helpers.js')
		->js('jquery.js')
		->js('jquery.ui.js')
		->js('jquery.plugins.js')
		->js('boom.plugins.js')
		->js('boom.config.js')
		->js('boom.core.js'); ?>
	<script type="text/javascript">
		//<![CDATA[
		(function($){
			$.boom.init();
		})(jQuery);
		//]]>
	</script>
</body>
</html>