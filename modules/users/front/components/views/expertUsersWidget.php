<?php
/**
 * @var app\modules\users\models\Users[] $users
 */
?>
<div class="widget-authors">
    <div class="header"><?= Yii::t('users', 'Эксперты'); ?></div>
    <ul>
        <?php foreach ($users as $user) { ?>
            <li>
                <div class="author">
                    <img src="<?= $user->getImageUrl(150, 150) ?>" width="60" height="60"
                         alt="<?= $user->getUserFio(); ?>"
                         class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">

                    <div class="info">
                        <div class="t">
                            <div class="r">
                                <strong><?= $user->getUserFio(); ?></strong>
                                <small><?= $user->about ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
