<?= $before_closing_head ?>
<?= Boom::include_css() ?>
</head>
<?= $body_tag ?>

<? if (\Boom\Editor\Editor::instance()->isEnabled()): ?>
	<script type="text/javascript">
		(function() {
			document.getElementsByTagName("BODY")[0].style['margin-left'] = "60px";
		})();
	</script>
<? endif ?>

<iframe frameBorder="0" style="max-width: none; position: fixed; left: 0; top: 0; bottom: 0; width: auto; height: <?= $editor->isEnabled()? '100%' : '35px' ?>; overflow: hidden; z-index: 10000; background: transparent; <? if (\Boom\Editor\Editor::instance()->getState() !== \Boom\Editor\Editor::EDIT): ?>border: none; width: 100px; right: 0; <? endif; ?>" id='b-page-topbar' scrolling="no" src='/cms/editor/toolbar/<?= $page_id ?>'></iframe>