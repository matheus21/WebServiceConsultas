<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consultas Model
 *
 * @property \App\Model\Table\PacientesTable|\Cake\ORM\Association\BelongsTo $Pacientes
 * @property \App\Model\Table\PacientesTable|\Cake\ORM\Association\BelongsTo $SituacaoConsultas
 *
 * @method \App\Model\Entity\Consulta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Consulta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Consulta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Consulta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Consulta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Consulta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Consulta findOrCreate($search, callable $callback = null, $options = [])
 */
class ConsultasTable extends Table
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

        $this->setTable('consultas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pacientes', [
            'foreignKey' => 'paciente_id'
        ]);

        $this->belongsTo('SituacaoConsultas', [
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
            ->date('data')
            ->allowEmpty('data');

        $validator
            ->time('hora')
            ->allowEmpty('hora');

        $validator
            ->integer('situacao')
            ->allowEmpty('situacao');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['paciente_id'], 'Pacientes'));

        return $rules;
    }
}
