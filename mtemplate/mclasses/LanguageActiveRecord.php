<?php
/**
 * Created by PhpStorm.
 * User: yevgeniy
 * Date: 10/28/14
 * Time: 12:24 PM
 */

namespace mtemplate\mclasses;

use app\modules\languages\models\Languages;

class LanguageActiveRecord extends ActiveRecord
{

    public function beforeValidate()
    {
        parent::beforeValidate();

        if ($this->hasAttribute('lang_id') && empty($this->lang_id)) {
            $this->lang_id = Languages::getAdminCurrent()->id;
        }

        return true;
    }
}
