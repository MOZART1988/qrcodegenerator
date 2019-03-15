<?php

namespace rocketfirm\engine\modules\menu\front\components;

use rocketfirm\engine\modules\menu\models\Menus;

class Menu extends \yii\base\Widget
{

    public $menuName;
    public $cssClass;
    public $viewFile = 'menu';
    public $id;

    public function run()
    {
        if (empty($this->menuName)) {
            return false;
        }

        $menu = \Yii::$app->db->cache(function () {
            return Menus::find()->joinWith('menuItems')->where(['menus.title' => $this->menuName])->one();
        }, 1000);

        if ($menu === null) {
            return false;
        }

        return $this->render($this->viewFile, ['menu' => $menu, 'cssClass' => $this->cssClass, 'id' => $this->id]);
    }

}
