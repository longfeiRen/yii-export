<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%supplier}}`.
 */
class m220428_064443_create_supplier_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
         * CREATE TABLE `supplier` ( `id` int unsigned NOT NULL AUTO_INCREMENT,
         * `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
         * `code` char(3) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL,
         * `t_status` enum('ok','hold') CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL DEFAULT 'ok',
         * PRIMARY KEY (`id`), UNIQUE KEY `uk_code` (`code`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
         */

        $this->createTable('{{%supplier}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string('50')->notNull()->defaultValue(''),
            'code' => 'char(3) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL',
            't_status' => "enum('ok','hold') CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL DEFAULT 'ok'",
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci');
        $this->createIndex('uk_code', '{{%supplier}}', 'code', true);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%supplier}}');
    }
}
