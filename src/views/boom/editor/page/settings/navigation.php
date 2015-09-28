<form id="b-page-navigation">
    <h1><?= Lang::get('boom::settings.navigation.heading') ?></h1>

    <section id="basic">
        <h2><?= Lang::get('boom::settings.basic') ?></h2>

        <label>
            <p><?= Lang::get('boom::settings.navigation.nav') ?></p>

            <select name="visible_in_nav" id="visible_in_nav">
                <option value="1"<?php if ($page->isVisibleInNav()): ?> selected="selected"<?php endif ?>>Yes</option>
                <option value="0"<?php if (!$page->isVisibleInNav()): ?> selected="selected"<?php endif ?>>No</option>
            </select>
        </label>

        <label>
            <p><?= Lang::get('boom::settings.navigation.cms') ?></p>

            <select name="visible_in_nav_cms" id="visible_in_nav_cms">
                <option value="1"<?php if ($page->isVisibleInCmsNav()): ?> selected="selected"<?php endif ?>>Yes</option>
                <option value="0"<?php if (!$page->isVisibleInCmsNav()): ?> selected="selected"<?php endif ?>>No</option>
            </select>
        </label>
    </section>

    <?php if ($allowAdvanced): ?>
        <section id='advanced'>
            <h2><?= Lang::get('boom::settings.navigation.parent') ?></h2>

            <?php if ($page->getParent()->loaded()): ?>
                <p>
                    <span class="title"><?= $page->getParent()->getTitle() ?></span>
                    (<span class="uri"><?= $page->getParent()->url()->getLocation() ?></span>)
                </p>
            <?php else: ?>
                <p><?= Lang::get('boom::settings.navigation.no-parent') ?></p>
            <?php endif ?>

            <input type="hidden" name="parent_id" value="<?= $page->getParentId() ?>">
            <?= $button('sitemap', Lang::get('boom::buttons.reparent'), ['class' => 'b-navigation-reparent b-button-withtext']) ?>
        </section>
    <?php endif ?>

    <?= $button('refresh', Lang::get('boom::buttons.reset'), ['class' => 'b-button-cancel b-button-withtext']) ?>
    <?= $button('save', Lang::get('boom::buttons.save'), ['class' => 'b-button-save b-button-withtext']) ?>
</form>
