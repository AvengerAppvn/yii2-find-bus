<?php

use yii\db\Migration;

/**
 * Class m171127_035150_trip
 */
class m171127_035150_trip extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%trip_category}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(1024)->notNull(),
            'title' => $this->string(512)->notNull(),
            'body' => $this->text(),
            'parent_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%trip}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(1024)->notNull(),
            'title' => $this->string(512)->notNull(),
            'post_username' => $this->string(256)->notNull(),
            'post_facebook_uid' => $this->string(128)->notNull(),
            'addr_from' => $this->string(512)->notNull(),
            'addr_to' => $this->string(512)->notNull(),
            'slot' => $this->integer(),
            'price' => $this->string(128),
            'body' => $this->text()->notNull(),
            'view' => $this->string(),
            'category_id' => $this->integer(),
            'thumbnail_base_url' => $this->string(1024),
            'thumbnail_path' => $this->string(1024),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'type' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%trip_attachment}}', [
            'id' => $this->primaryKey(),
            'trip_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer()
        ], $tableOptions);

        $this->addForeignKey('fk_trip_attachment_trip', '{{%trip_attachment}}', 'trip_id', '{{%trip}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_trip_author', '{{%trip}}', 'created_by', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_trip_updater', '{{%trip}}', 'updated_by', '{{%user}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('fk_trip_category', '{{%trip}}', 'category_id', '{{%trip_category}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_trip_category_section', '{{%trip_category}}', 'parent_id', '{{%trip_category}}', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_trip_attachment_trip', '{{%trip_attachment}}');
        $this->dropForeignKey('fk_trip_author', '{{%trip}}');
        $this->dropForeignKey('fk_trip_updater', '{{%trip}}');
        $this->dropForeignKey('fk_trip_category', '{{%trip}}');
        $this->dropForeignKey('fk_trip_category_section', '{{%trip_category}}');

        $this->dropTable('{{%trip_attachment}}');
        $this->dropTable('{{%trip}}');
        $this->dropTable('{{%trip_category}}');
    }
}
