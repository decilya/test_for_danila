<?php

use yii\db\Migration;

class m251208_072305_addApple extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apple}}', [
            'id' => $this->primaryKey(),
            'color' => $this->string(50)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'fallen_at' => $this->integer(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'size' => $this->decimal(3, 2)->notNull()->defaultValue(1.00),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apple}}');
    }
}
