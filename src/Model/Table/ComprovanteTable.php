<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comprovante Model
 *
 * @method \App\Model\Entity\Comprovante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comprovante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comprovante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comprovante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comprovante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comprovante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comprovante findOrCreate($search, callable $callback = null, $options = [])
 */
class ComprovanteTable extends Table
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

        $this->table('comprovante');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('siape')
            ->add('siape', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('arquivo');

        $validator
            ->allowEmpty('boleto');

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
        $rules->add($rules->isUnique(['siape']));

        return $rules;
    }
}
