<div id='b-page-feature' class="b-pagesettings">
	<section>
		<h1>Current feature image</h1>
		<p id="b-page-feature-none">This page has no feature image.</p>

		<? if ( ! $feature_image_id): ?>
			<img id='b-page-feature-current' src='' />
		<? else: ?>
			<img id='b-page-feature-current' data-asset-id="<?= $feature_image_id ?>" src='<?= Route::url('asset', array('id' => $feature_image_id, 'width' => 500)) ?>' />
		<? endif; ?>


		<div id='b-page-feature-buttons'>
			<?= new \Boom\UI\Button('asset', 'Select an image from the asset manager', array('id' => 'b-page-feature-edit', 'class' => 'b-button-withtext')) ?>
			<?= new \Boom\UI\Button('delete', 'Remove feature image', array('id' => 'b-page-feature-remove', 'class' => 'b-button-withtext')) ?>
		</div>
	</section>
	<section>
		<h1>Images used in page</h1>
		<p>The images which are used in this page are shown below. Click on an image to make it the feature image for the page.</p>

        <ul class="images-in-page"></ul>
	</section>
</div>