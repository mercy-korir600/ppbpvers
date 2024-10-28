<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AefiListOfVaccines Model
 *
 * @property \App\Model\Table\AefisTable&\Cake\ORM\Association\BelongsTo $Aefis
 * @property \App\Model\Table\SaefisTable&\Cake\ORM\Association\BelongsTo $Saefis
 * @property \App\Model\Table\VaccinesTable&\Cake\ORM\Association\BelongsTo $Vaccines
 *
 * @method \App\Model\Entity\AefiListOfVaccine newEmptyEntity()
 * @method \App\Model\Entity\AefiListOfVaccine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine get($primaryKey, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AefiListOfVaccine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AefiListOfVaccinesTable extends Table
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

        $this->setTable('aefi_list_of_vaccines');
        $this->setDisplayField('vaccine_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Aefis', [
            'foreignKey' => 'aefi_id',
        ]);
        $this->belongsTo('Saefis', [
            'foreignKey' => 'saefi_id',
        ]);
        $this->belongsTo('Vaccines', [
            'foreignKey' => 'vaccine_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('aefi_id')
            ->allowEmptyString('aefi_id');

        $validator
            ->integer('saefi_id')
            ->allowEmptyString('saefi_id');

        $validator
            ->integer('vaccine_id')
            ->allowEmptyString('vaccine_id');

        $validator
            ->scalar('vaccine_name')
            ->maxLength('vaccine_name', 200)
            ->allowEmptyString('vaccine_name');

        $validator
            ->dateTime('vaccination_date')
            ->allowEmptyDateTime('vaccination_date');

        $validator
            ->scalar('vaccination_time')
            ->maxLength('vaccination_time', 10)
            ->allowEmptyString('vaccination_time');

        $validator
            ->scalar('vaccine_manufacturer')
            ->maxLength('vaccine_manufacturer', 255)
            ->allowEmptyString('vaccine_manufacturer');

        $validator
            ->scalar('vaccination_route')
            ->maxLength('vaccination_route', 255)
            ->allowEmptyString('vaccination_route');

        $validator
            ->scalar('vaccination_site')
            ->maxLength('vaccination_site', 55)
            ->allowEmptyString('vaccination_site');

        $validator
            ->scalar('dosage')
            ->maxLength('dosage', 255)
            ->allowEmptyString('dosage');

        $validator
            ->scalar('icsr_code')
            ->maxLength('icsr_code', 255)
            ->allowEmptyString('icsr_code');

        $validator
            ->scalar('batch_number')
            ->maxLength('batch_number', 255)
            ->allowEmptyString('batch_number');

        $validator
            ->date('expiry_date')
            ->allowEmptyDate('expiry_date');

        $validator
            ->scalar('diluent_batch_number')
            ->maxLength('diluent_batch_number', 55)
            ->allowEmptyString('diluent_batch_number');

        $validator
            ->scalar('diluent_manufacturer')
            ->maxLength('diluent_manufacturer', 255)
            ->allowEmptyString('diluent_manufacturer');

        $validator
            ->date('diluent_expiry_date')
            ->allowEmptyDate('diluent_expiry_date');

        $validator
            ->boolean('suspected_drug')
            ->allowEmptyString('suspected_drug');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('aefi_id', 'Aefis'), ['errorField' => 'aefi_id']);
        $rules->add($rules->existsIn('saefi_id', 'Saefis'), ['errorField' => 'saefi_id']);
        $rules->add($rules->existsIn('vaccine_id', 'Vaccines'), ['errorField' => 'vaccine_id']);

        return $rules;
    }
}
