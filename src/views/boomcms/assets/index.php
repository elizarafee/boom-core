<?= view('boomcms::header', ['title' => trans('boomcms::asset.manager')]) ?>

<div id="b-assets-manager">
	<?= $menuButton() ?>
	<?= $menu() ?>

	<div id="b-topbar" class="b-asset-manager b-toolbar">
        <div id="tab-controls">
            <?= $button('th', 'view-albums', ['data-view' => '', 'data-active' => 'home']) ?>

            <?php if (Gate::allows('uploadAssets', Router::getActiveSite())): ?>
                <?= $button('upload', 'upload', ['data-view' => 'upload', 'data-active' => 'upload']) ?>
            <?php endif ?>

            <?= $button('search', 'search-assets', ['data-view' => 'search', 'data-active' => 'search']) ?>
        </div>

        <div id="selection-controls">
            <?= $button('trash-o', 'delete', ['class' => 'small', 'data-selection' => 'delete', 'disabled' => 'disabled']) ?>
            <?= $button('download', 'download', ['class' => 'small', 'data-selection' => 'download', 'disabled' => 'disabled']) ?>
            <?= $button('book', 'albums', ['class' => 'small', 'data-selection' => 'albums', 'disabled' => 'disabled']) ?>

            <a href="#" id="b-assets-select-all"><?= trans('boomcms::asset.select.all') ?></a>
            &nbsp;:&nbsp;
            <a href="#" id="b-assets-select-none"><?= trans('boomcms::asset.select.none') ?></a>
        </div>

        <?= view('boomcms::assets.pagination') ?>
	</div>

    <div id="b-assets-content">
        <div id="b-assets-search">
            <h1 class='bigger'><?= trans('boomcms::asset.search.heading') ?></h1>

            <?= view('boomcms::assets.search') ?>
        </div>

        <?php if (Gate::allows('uploadAssets', Router::getActiveSite())): ?>
            <div id='b-assets-upload'>
                <h1 class='bigger'><?= trans('boomcms::asset.upload.heading') ?></h1>
                <?= view('boomcms::assets.upload') ?>
                <?= view('boomcms::assets.thumbs') ?>
            </div>
        <?php endif ?>
        
        <div id="b-assets-search-results">
            <h1 class="bigger"><?= trans('boomcms::asset.search.results') ?></h1>
            <?= view('boomcms::assets.thumbs') ?>
        </div>

        <div id="b-assets-all-albums">
            <div class='heading'>
                <h1 class='bigger'><?= trans('boomcms::asset.albums') ?></h1>
            </div>

            <div class='content'></div>
        </div>

        <div id="b-assets-view-asset-container"></div>
        <div id="b-assets-view-selection-container"></div>
        <div id="b-assets-view-album-container"></div>
    </div>

    <div id="b-assets-navigation"></div>
</div>

<script type="text/template" id="b-assets-view-template">
    <?= view('boomcms::assets.view') ?>
</script>

<script type="text/template" id="b-assets-selection-template">
    <?= view('boomcms::assets.selection') ?>
</script>

<?= view('boomcms::assets.templates') ?>

<script defer type="text/javascript" src="/vendor/boomcms/boom-core/js/asset-manager.js"></script>

<script type="text/javascript">
    window.onload = function() {
        new BoomCMS.AssetManager({
            albums: new BoomCMS.Collections.Albums(<?= Album::all() ?>),
            baseUrl: '<?= URL::route('asset-manager', ['path' => ''], false) ?>'
        });
    };
</script>

<?= view('boomcms::footer') ?>
