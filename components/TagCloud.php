<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Tag;

class TagCloud extends Widget
{
    public $maxTags = 20;

    public function run()
    {
        $tags = Tag::find()->orderBy(['frequency' => SORT_DESC])->limit($this->maxTags)->all();

        if (empty($tags)) {
            return '<div class="tag-cloud"><p class="text-muted">Нет тегов</p></div>';
        }

        $frequencies = array_column($tags, 'frequency');
        $maxFrequency = max($frequencies);
        $minFrequency = min($frequencies);
        $step = ($maxFrequency - $minFrequency) / 10;

        $step = max($step, 1);

        $html = '<div class="tag-cloud">';
        foreach ($tags as $tag) {
            $weight = 10 - floor(($maxFrequency - $tag->frequency) / $step);
            $html .= Html::a(
                    $tag->name,
                    ['post/index', 'tag' => $tag->name],
                    ['class' => 'tag tag-weight-' . $weight]
                ) . ' ';
        }
        $html .= '</div>';

        return $html;
    }
}