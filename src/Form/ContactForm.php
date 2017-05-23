<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

/**
 * Contact Form.
 */
class ContactForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema(Schema $schema)
    {
      return $schema->addField('name', 'string')
          ->addField('email', ['type' => 'string'])
          ->addField('object', ['type' => 'string'])
          ->addField('body', ['type' => 'text']);
    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
                'rule' => ['minLength', 5],
                'message' => 'Un nom est requis(5 lettres minimum)',
            ])->add('email', 'format', [
                'rule' => 'email',
                'message' => 'Une adresse email valide est requise',
            ]);;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {
      $email = new Email();
      $email->setFrom(['me@example.com' => 'My Site'])
        ->setTo('you@example.com')
        ->setSubject('About')
        ->send('My message');
        return true;
    }
}
