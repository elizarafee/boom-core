<nav id="b-menu">
	<img src="/vendor/boomcms/boom-core/img/logo-mini.png" alt="BoomCMS Logo" />

    <ul>
        <li>
            <a target='_top' href='/boomcms'><span class="fa fa-home"></span><?= trans('boomcms::menu.dashboard') ?></a>
        </li>

        <li>
            <a target='_top' href='/'><span class="fa fa-globe"></span><?= trans('boomcms::menu.view-site') ?></a>
        </li>

        <?php $items = BoomCMS\Support\Menu::items(); ?>
        <?php foreach ($items as $i => $item): ?>
            <li <?= (isset($item['break']) && $item['break'] == 1)? ' class="break"' : ''?>>
                <a target='_top' href='<?= $item['url'] ?>'><?php if (isset($item['icon'])): ?><span class="fa fa-<?= $item['icon'] ?>"></span><?php endif ?><?= $item['title'] ?></a>
            </li>
        <?php endforeach ?>

        <?php if (Gate::allows('manageAccount', Router::getActiveSite())): ?>
            <li class="break">
                <a target='_top' href='/boomcms/account'><span class="fa fa-user"></span><?= trans('boomcms::menu.account') ?></a>
            </li>
        <?php endif ?>

        <li>
            <a target='_top' href='/boomcms/logout'><span class="fa fa-sign-out"></span><?= trans('boomcms::menu.logout') ?></a>
        </li>
    </ul>

    <p class="version"><a href="http://www.boomcms.net/" target="_blank">BoomCMS</a><br />v<?= BoomCMS::getVersion() ?></p>
</nav>
