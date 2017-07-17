<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SituacaoConsultas Model
 *
 * @method \App\Model\Entity\SituacaoConsulta get($primaryKey, $options = [])
 * @method \App\Model\Entity\SituacaoConsulta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SituacaoConsulta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SituacaoConsulta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SituacaoConsulta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SituacaoConsulta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SituacaoConsulta findOrCreate($search, callable $callback = null, $options = [])
 */
class SituacaoConsultasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('situacao_consultas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Consultas', [
            'foreignKey' => 'situacao_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        return $validator;
    }
}
