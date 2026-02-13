<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Comment;

class RecentComments extends Widget
{
    public $maxComments = 10;

    public function run()
    {
        $comments = Comment::find()
            ->where(['status' => 2])
            ->orderBy(['create_time' => SORT_DESC])
            ->limit($this->maxComments)
            ->all();

        $html = '<ul class="recent-comments">';
        foreach ($comments as $comment) {
            $html .= '<li>' . Html::a(
                    $comment->author,
                    ['post/view', 'id' => $comment->post_id]
                ) . '</li>';
        }
        $html .= '</ul>';

        return $html;
    }
}