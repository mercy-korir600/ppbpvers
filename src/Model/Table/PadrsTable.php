<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\Log\Log;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Padrs Model
 *
 * @property \App\Model\Table\PadrsTable&\Cake\ORM\Association\BelongsTo $Padrs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CountiesTable&\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\SubCountiesTable&\Cake\ORM\Association\BelongsTo $SubCounties
 * @property \App\Model\Table\DesignationsTable&\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\PadrListOfMedicinesTable&\Cake\ORM\Association\HasMany $PadrListOfMedicines
 * @property \App\Model\Table\PadrsTable&\Cake\ORM\Association\HasMany $Padrs
 *
 * @method \App\Model\Entity\Padr newEmptyEntity()
 * @method \App\Model\Entity\Padr newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Padr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Padr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Padr findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Padr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Padr[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Padr|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Padr saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Padr[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Padr[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Padr[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Padr[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PadrsTable extends Table
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

        $this->setTable('padrs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Padrs', [
            'foreignKey' => 'padr_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Counties', [
            'foreignKey' => 'county_id',
        ]);
        $this->belongsTo('SubCounties', [
            'foreignKey' => 'sub_county_id',
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id',
        ]);
        $this->hasMany('PadrListOfMedicines', [
            'foreignKey' => 'padr_id',
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Padrs', [
            'foreignKey' => 'padr_id',
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Attachments', [
            'foreignKey' => 'foreign_key',
            'dependent' => true,
            'cascadeCallbacks' => true,
            'conditions' => [
                'Attachments.model' => 'Padr',
                //  'Attachments.group' => 'attachment'
            ],
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
            ->requirePresence('reporter_name', 'create')
            ->notEmptyString('reporter_name', 'Name cannot be empty')
            ->maxLength('reporter_name', 255, 'Name cannot be longer than 255 characters');

        $validator
            ->requirePresence('county_id', 'create')
            ->notEmptyString('county_id', 'County cannot be empty');


        $validator
            ->requirePresence('sub_county_id', 'create')
            ->notEmptyString('sub_county_id', 'Please provide sub county');


        $validator->allowEmptyString('reporter_email', 'Please provide either a phone number or an email address', function ($context) {
            return !empty($context['data']['reporter_phone']);
        });
        $validator->allowEmptyString('date_of_birth', 'Date of birth OR age at onset required', function ($context) {
            return !empty($context['data']['age_group']);
        });

        $validator
            ->requirePresence('patient_name', 'create')
            ->notEmptyString('patient_name', 'Patient Name cannot be empty')
            ->maxLength('patient_name', 255, 'Patient Name cannot be longer than 255 characters');

        $validator
            ->requirePresence('report_sadr', 'create')
            ->notEmptyString('report_sadr', 'Please select report type');

        $validator->add('sadr_vomiting', 'atLeastOne', [
            'rule' => function ($value, $context) {
                return !empty($context['data']['sadr_vomiting']) ||
                    !empty($context['data']['sadr_dizziness']) ||
                    !empty($context['data']['sadr_headache']) ||
                    !empty($context['data']['sadr_rash']) ||
                    !empty($context['data']['sadr_mouth']) ||
                    !empty($context['data']['sadr_stomach']) ||
                    !empty($context['data']['sadr_urination']) ||
                    !empty($context['data']['sadr_eyes']) ||
                    !empty($context['data']['sadr_died']) ||
                    !empty($context['data']['sadr_joints']);
            },
            'message' => 'Please select at least one side effect experienced'
        ]);



        $validator
            ->requirePresence('outcome', 'create')
            ->notEmptyString('outcome', 'Please provide outcome');
        $validator
            ->requirePresence('consent', 'create')
            ->notEmptyString('consent', 'Please provide consent');

        // $validator
        //     ->scalar('')
        //     ->maxLength('patient_name', 100)
        //     ->allowEmptyString('patient_name');

        // $validator
        //     ->boolean('pqmp_material')
        //     ->allowEmptyString('pqmp_material');

        // $validator
        //     ->scalar('date_of_birth')
        //     ->maxLength('date_of_birth', 20)
        //     ->allowEmptyString('date_of_birth');

        // $validator
        //     ->scalar('age_group')
        //     ->maxLength('age_group', 40)
        //     ->allowEmptyString('age_group');

        // $validator
        //     ->scalar('patient_address')
        //     ->maxLength('patient_address', 100)
        //     ->allowEmptyString('patient_address');

        // $validator
        //     ->boolean('pqmp_color')
        //     ->allowEmptyString('pqmp_color');

        // $validator
        //     ->scalar('gender')
        //     ->maxLength('gender', 7)
        //     ->allowEmptyString('gender');

        // $validator
        //     ->boolean('pqmp_smell')
        //     ->allowEmptyString('pqmp_smell');

        // $validator
        //     ->boolean('pqmp_working')
        //     ->allowEmptyString('pqmp_working');

        // $validator
        //     ->boolean('pqmp_bottle')
        //     ->allowEmptyString('pqmp_bottle');

        // $validator
        //     ->scalar('pregnancy_status')
        //     ->maxLength('pregnancy_status', 20)
        //     ->allowEmptyString('pregnancy_status');

        // $validator
        //     ->scalar('weight')
        //     ->maxLength('weight', 10)
        //     ->allowEmptyString('weight');

        // $validator
        //     ->scalar('height')
        //     ->maxLength('height', 10)
        //     ->allowEmptyString('height');

        // $validator
        //     ->scalar('diagnosis')
        //     ->allowEmptyString('diagnosis');

        // $validator
        //     ->scalar('medical_history')
        //     ->allowEmptyString('medical_history');

        // $validator
        //     ->scalar('date_of_onset_of_reaction')
        //     ->maxLength('date_of_onset_of_reaction', 20)
        //     ->allowEmptyString('date_of_onset_of_reaction');

        // $validator
        //     ->scalar('date_of_end_of_reaction')
        //     ->maxLength('date_of_end_of_reaction', 25)
        //     ->allowEmptyString('date_of_end_of_reaction');

        // $validator
        //     ->scalar('description_of_reaction')
        //     ->allowEmptyString('description_of_reaction');

        // $validator
        //     ->scalar('reaction_resolve')
        //     ->maxLength('reaction_resolve', 55)
        //     ->allowEmptyString('reaction_resolve');

        // $validator
        //     ->scalar('reaction_reappear')
        //     ->maxLength('reaction_reappear', 55)
        //     ->allowEmptyString('reaction_reappear');

        // $validator
        //     ->scalar('lab_investigation')
        //     ->allowEmptyString('lab_investigation');

        // $validator
        //     ->scalar('severity')
        //     ->maxLength('severity', 100)
        //     ->allowEmptyString('severity');

        // $validator
        //     ->scalar('serious')
        //     ->maxLength('serious', 255)
        //     ->allowEmptyString('serious');

        // $validator
        //     ->scalar('serious_reason')
        //     ->maxLength('serious_reason', 255)
        //     ->allowEmptyString('serious_reason');

        // $validator
        //     ->scalar('action_taken')
        //     ->maxLength('action_taken', 100)
        //     ->allowEmptyString('action_taken');

        // $validator
        //     ->scalar('outcome')
        //     ->maxLength('outcome', 100)
        //     ->allowEmptyString('outcome');

        // $validator
        //     ->scalar('causality')
        //     ->maxLength('causality', 100)
        //     ->allowEmptyString('causality');

        // $validator
        //     ->scalar('any_other_comment')
        //     ->allowEmptyString('any_other_comment');


        // $validator
        //     ->scalar('reporter_email')
        //     ->maxLength('reporter_email', 100)
        //     ->allowEmptyString('reporter_email', 'This field is required', function ($context) {
        //         return !$context['data']['reporter_phone'];
        //     });


        // $validator
        //     ->scalar('reporter_phone')
        //     ->maxLength('reporter_phone', 100)
        //     ->allowEmptyString('reporter_phone', 'This field is required', function ($context) {
        //         return !$context['data']['reporter_email'];
        //     });



        // $validator
        //     ->scalar('reporter_name_diff')
        //     ->maxLength('reporter_name_diff', 255)
        //     ->allowEmptyString('reporter_name_diff');

        // $validator
        //     ->integer('reporter_designation_diff')
        //     ->allowEmptyString('reporter_designation_diff');

        // $validator
        //     ->scalar('reporter_email_diff')
        //     ->maxLength('reporter_email_diff', 255)
        //     ->allowEmptyString('reporter_email_diff');

        // $validator
        //     ->scalar('reporter_phone_diff')
        //     ->maxLength('reporter_phone_diff', 255)
        //     ->allowEmptyString('reporter_phone_diff');

        // $validator
        //     ->date('reporter_date_diff')
        //     ->allowEmptyDate('reporter_date_diff');


        // $validator
        //     ->dateTime('assigned_date')
        //     ->allowEmptyDateTime('assigned_date');

        // $validator
        //     ->scalar('reaction_on')
        //     ->maxLength('reaction_on', 25)
        //     ->allowEmptyString('reaction_on');

        // $validator
        //     ->scalar('consent')
        //     ->maxLength('consent', 255)
        //     ->allowEmptyString('consent');
        return $validator;
    }


    // Custom validation function
    public function validateReporterContact($value, $context)
    {
        $reporterEmail = $context['data']['reporter_email'] ?? null;
        $reporterPhone = $context['data']['reporter_phone'] ?? null;

        // Validation passes if either reporter_email or reporter_phone is provided
        return !empty($reporterEmail) || !empty($reporterPhone);
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
        $rules->add($rules->existsIn('padr_id', 'Padrs'), ['errorField' => 'padr_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('county_id', 'Counties'), ['errorField' => 'county_id']);
        $rules->add($rules->existsIn('sub_county_id', 'SubCounties'), ['errorField' => 'sub_county_id']);
        $rules->add($rules->existsIn('designation_id', 'Designations'), ['errorField' => 'designation_id']);

        return $rules;
    }
}
