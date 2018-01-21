<?php


use Phinx\Migration\AbstractMigration;

class User extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function create()
    {

        $table = $this->table("user");
        $table->addColumn('id', 'integer', ['auto_increments', 'primary key', 'not null']);
        $table->addColumn('username', 'varchar(255)', ['not null']);
        $table->addColumn('email', 'varchar(255)', ["not null", 'unique', 'index']);
        $table->addColumn('phone', 'varchar(255)', ["not null", 'unique', 'index']);
        $table->addColumn('password', 'varchar(255)', ["not null"]);
        $table->addColumn('created', 'datetime');
        $table->create();
    }


}
