<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m260223_074604_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'create_time' => $this->integer()->notNull(),
            'author' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'url' => $this->string(255),
            'post_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_comment_post',
            '{{%comment}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_comment_post', '{{%comment}}');
        $this->dropTable('{{%comment}}');
    }
}
