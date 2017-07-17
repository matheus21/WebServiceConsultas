<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SituacaoConsultasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SituacaoConsultasTable Test Case
 */
class SituacaoConsultasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SituacaoConsultasTable
     */
    public $SituacaoConsultas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.situacao_consultas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SituacaoConsultas') ? [] : ['className' => SituacaoConsultasTable::class];
        $this->SituacaoConsultas = TableRegistry::get('SituacaoConsultas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SituacaoConsultas);

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
}
