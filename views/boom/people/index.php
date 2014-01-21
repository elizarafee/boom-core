	<?= View::factory('boom/header')->set('title', 'People') ?>

	<div id="b-topbar" class="ui-helper-clearfix ui-tabs ui-widget ui-widget-content ui-corner-all">
		<?= Menu::factory('boom')->sort('priority') ?>

		<?= BoomUI::button('add', __('New person'), array('id' => 'b-people-create')) ?>
		<?= BoomUI::button('delete', __('Delete'), array('id' => 'b-button-multiaction-delete', 'disabled' => 'disabled')) ?>
	</div>

	<div id="b-people-manager">
		<div id="boom-tagmanager">
			<div class="b-items-main ui-helper-right">
				<div class="b-items-body ui-helper-clearfix">
					<div class="b-items-rightpane">
						<div class="b-items-content">
							&nbsp;
						</div>
					</div>
				</div>
			</div>
			<div class="b-items-sidebar ui-helper-left">
				<div class="b-items-box-header ui-helper-reset ui-widget-header ui-panel-header ui-corner-all">
					<a href="#" class="b-people-group-add ui-helper-right">
						<?= __('Add') ?>
					</a>
					<h3 class="ui-helper-reset">
						<?= __('Groups') ?>
					</h3>
				</div>
				<div class="boom-box ui-widget ui-corner-all ui-state-default">
					<ul class="boom-tree b-tags-tree  boom-tree-noborder">
					<?
						foreach ($groups as $id => $name):
							echo "<li id='t", $id, "'><a rel='", $id, "' id='tag_" , $id , "' class='' href='#group/", $id;
							echo "'>" , $name , "</a>\n";
						endforeach;
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?= Boom::include_js() ?>

	<script type="text/javascript">
		//<![CDATA[
		(function($){
			$.boom.init();
			$( 'body' ).browser_people();
		})(jQuery);
		//]]>
	</script>
</body>
</html>