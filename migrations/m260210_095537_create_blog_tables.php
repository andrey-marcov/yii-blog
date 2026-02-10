<?php

use yii\db\Migration;

class m260210_095537_create_blog_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'password' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'status' => $this->integer()->notNull(),
            'tags' => $this->text(),
            'create_time' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_time' => $this->timestamp()
                ->defaultExpression('CURRENT_TIMESTAMP')
                ->append('ON UPDATE CURRENT_TIMESTAMP'),
            'author_id' => $this->integer()->notNull(),
            'fk_author' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'status' => $this->integer()->notNull(),
            'create_time' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'author' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'url' => $this->string(255),
            'post_id' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
            'frequency' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%lookup}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'code' => $this->integer()->notNull(),
            'type' => $this->string(255)->notNull(),
            'position' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_author', '{{%post}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_post', '{{%comment}}', 'post_id', '{{%post}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m260210_095537_create_blog_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260210_095537_create_blog_tables cannot be reverted.\n";

        return false;
    }
    */
}
