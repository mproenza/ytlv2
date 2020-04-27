<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

// UNA CLASE DUMMY PARA EJECUTAR CONSULTAS SOLAMENTE
class DummyTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
    }
}
