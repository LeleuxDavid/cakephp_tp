<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;

/**
 * Contact Controller
 *
 * @property \App\Model\Table\ContactTable $Contact
 *
 * @method \App\Model\Entity\Contact[] paginate($object = null, array $settings = [])
 */
class ContactController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
     public function index()
     {
         $contact = new ContactForm();
         if ($this->request->is('post')) {
             if ($contact->execute($this->request->getData())) {
                $this->redirect('/');
             } else {
                 $this->Flash->error('Il y a eu un problème lors de la soumission de votre formulaire.');
             }
         }
         $this->set('contact', $contact);
     }

}
