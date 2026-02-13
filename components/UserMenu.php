<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class UserMenu extends Widget
{
    public function init()
    {
        parent::init();
        echo '<ul class="user-menu">';
    }

    public function run()
    {
        $html = '<li>' . Html::a('Создать новую запись', ['post/create']) . '</li>';
        $html .= '<li>' . Html::a('Управление записями', ['post/index']) . '</li>';
        $html .= '<li>' . Html::a('Одобрение комментариев', ['comment/index']) . '</li>';
        $html .= '<li>' . Html::beginForm(['site/logout'], 'post')
            . Html::submitButton('Выход', ['class' => 'btn btn-link'])
            . Html::endForm() . '</li>';
        echo $html . '</ul>';
    }
}