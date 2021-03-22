<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblmstaff2 Model
 *
 * @method \App\Model\Entity\Tblmstaff2 get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tblmstaff2 newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tblmstaff2[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tblmstaff2|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tblmstaff2 saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tblmstaff2 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tblmstaff2[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tblmstaff2 findOrCreate($search, callable $callback = null, $options = [])
 */
class Tblmstaff2Table extends Table
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

        $this->setTable('tblMStaff2');
        $this->setDisplayField('StaffID');
        $this->setPrimaryKey('StaffID');
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
            ->scalar('StaffID')
            ->maxLength('StaffID', 5)
            ->allowEmptyString('StaffID', null, 'create');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 50)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email');

        $validator
            ->requirePresence('Gender', 'create')
            ->notEmptyString('Gender');

        $validator
            ->scalar('Hometown')
            ->maxLength('Hometown', 100)
            ->requirePresence('Hometown', 'create')
            ->notEmptyString('Hometown');

        $validator
            ->integer('MarialStatus')
            ->requirePresence('MarialStatus', 'create')
            ->notEmptyString('MarialStatus');

        $validator
            ->scalar('KeyCard')
            ->maxLength('KeyCard', 5)
            ->requirePresence('KeyCard', 'create')
            ->notEmptyString('KeyCard');

        $validator
            ->dateTime('DateUpdated')
            ->requirePresence('DateUpdated', 'create')
            ->notEmptyDateTime('DateUpdated');

        return $validator;
    }
}
