<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vaccines Model
 *
 * @property \App\Model\Table\AefiListOfVaccinesTable&\Cake\ORM\Association\HasMany $AefiListOfVaccines
 *
 * @method \App\Model\Entity\Vaccine newEmptyEntity()
 * @method \App\Model\Entity\Vaccine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Vaccine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vaccine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vaccine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Vaccine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vaccine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vaccine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vaccine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vaccine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vaccine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vaccine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vaccine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VaccinesTable extends Table
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

        $this->setTable('vaccines');
        $this->setDisplayField('vaccine_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AefiListOfVaccines', [
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
            ->scalar('vaccine_name')
            ->maxLength('vaccine_name', 55)
            ->allowEmptyString('vaccine_name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('health_program')
            ->maxLength('health_program', 255)
            ->allowEmptyString('health_program');

        $validator
            ->boolean('deleted')
            ->allowEmptyString('deleted');

        $validator
            ->dateTime('deleted_date')
            ->allowEmptyDateTime('deleted_date');

        return $validator;
    }
}
