<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m260223_074554_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'tags' => $this->text(),
            'create_time' => $this->integer()->notNull(),
            'update_time' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_post_author',
            '{{%post}}',
            'author_id',
            '{{%user}}',
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
        $this->dropForeignKey('fk_post_author', '{{%post}}');
        $this->dropTable('{{%post}}');
    }
}
