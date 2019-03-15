<?php
/**
 * @var \app\modules\languages\models\Languages [] $models
 * @var \app\modules\languages\models\Languages $current
*/
?>
<div class="lang-selector">
    <a class="current-lang" href="#"><?=$current->title?></a>
    <ul>
        <?php foreach ($models as $model) : ?>
            <li>
                <a href="/<?=$model->code?>"><?=$model->title?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
