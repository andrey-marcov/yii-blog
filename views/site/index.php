<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Blog';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Добро пожаловать в мой блог!</h1>
        <p class="lead">Это блог, созданный с использованием Yii 2.0.</p>
        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['post/create']) ?>">Создать новый пост</a></p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <h2>Последние посты</h2>
                <?php if (isset($posts) && !empty($posts)): ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="post">
                            <h3><?= Html::encode($post->title) ?></h3>
                            <p><?= substr(Html::encode($post->content), 0, 200) ?>...</p>
                            <p><small>Автор: <?= Html::encode($post->author) ?> |
                                    Дата: <?= date('d.m.Y', strtotime($post->created_at)) ?></small></p>
                            <p><?= Html::a('Читать далее', ['post/view', 'id' => $post->id]) ?></p>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Пока нет постов.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>