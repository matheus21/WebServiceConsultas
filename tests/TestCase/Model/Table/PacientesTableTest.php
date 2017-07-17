<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PacientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PacientesTable Test Case
 */
class PacientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PacientesTable
     */
    public $Pacientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pacientes',
        'app.consultas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pacientes') ? [] : ['className' => PacientesTable::class];
        $this->Pacientes = TableRegistry::get('Pacientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pacientes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
