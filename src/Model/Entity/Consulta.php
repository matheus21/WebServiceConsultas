<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Consulta Entity
 *
 * @property int $id
 * @property int $paciente_id
 * @property \Cake\I18n\FrozenDate $data
 * @property \Cake\I18n\FrozenTime $hora
 * @property int $situacao
 *
 * @property \App\Model\Entity\Paciente $paciente
 */
class Consulta extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
