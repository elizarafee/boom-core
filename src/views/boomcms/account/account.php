<?= view('boomcms::header', ['title' => trans('boomcms::account.heading')]) ?>

<div id="b-topbar" class="b-toolbar">
    <?= $menuButton() ?>
    <?= $menu() ?>
</div>

<div id="b-account">
    <h1><?= trans('boomcms::account.heading') ?></h1>
    <p class="information"><?= trans('boomcms::account.intro') ?></p>

    <div style="margin-top: 20px;">
        <?php if (isset($message)): ?>
            <p class="message"><?= $message ?></p>
        <?php endif ?>

        <form method="post" action="/boomcms/account">
            <input type="hidden" name="_token" value="<?= csrf_token() ?>" />

            <p>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="<?= $person->getName() ?>" />
            </p>

            <p>
                <label for="current_password">Current password</label>
                <input id="current_password" type="password" name="current_password" />
            </p>

            <p>
                <label for="password1">New password</label>
                <input id="password1" type="password" name="password1" />
            </p>

            <p>
                <label for="password2">Confirm new password</label>
                <input id="password2" type="password" name="password2" />
            </p>

            <input type="submit" value="Submit" />
        </form>
    </div>
</div>

<?= view('boomcms::footer') ?>
