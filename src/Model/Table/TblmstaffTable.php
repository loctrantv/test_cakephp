<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblmstaff Model
 *
 * @method \App\Model\Entity\Tblmstaff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tblmstaff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tblmstaff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tblmstaff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tblmstaff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tblmstaff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tblmstaff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tblmstaff findOrCreate($search, callable $callback = null, $options = [])
 */
class TblmstaffTable extends Table
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

        $this->setTable('tblMStaff');
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
            ->scalar('StaffName')
            ->maxLength('StaffName', 100)
            ->requirePresence('StaffName', 'create')
            ->notEmptyString('StaffName');

        $validator
            ->scalar('JapaneseName')
            ->maxLength('JapaneseName', 255)
            ->requirePresence('JapaneseName', 'create')
            ->notEmptyString('JapaneseName');

        $validator
            ->date('TrialEntryDate')
            ->requirePresence('TrialEntryDate', 'create')
            ->notEmptyDate('TrialEntryDate');

        $validator
            ->date('TrialEndDate')
            ->allowEmptyDate('TrialEndDate');

        $validator
            ->date('QuitJobDate')
            ->allowEmptyDate('QuitJobDate');

        $validator
            ->dateTime('DateUpdated')
            ->requirePresence('DateUpdated', 'create')
            ->notEmptyDateTime('DateUpdated');

        return $validator;
    }
}
