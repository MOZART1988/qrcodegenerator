<?php
/**
 * @var rocketfirm\engine\modules\menu\models\Menus $menu
 */
echo '<ul>';
foreach ($menu->items as $item) {
    if (strpos(\Yii::$app->request->url, $item['url'][0]) !== false) {
        echo '<li class="active"><a href="' . \yii\helpers\Url::to($item['url'][0]) . '">' . $item['label'] . '</a></li>';
    } else {
        echo '<li><a href="' . \yii\helpers\Url::to($item['url'][0]) . '">' . $item['label'] . '</a></li>';
    }

}
echo '</ul>';
