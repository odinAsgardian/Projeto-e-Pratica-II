<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comprovantes Controller
 *
 * @property \App\Model\Table\ComprovantesTable $Comprovantes
 */
class ComprovantesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize(){
        parent::initialize();
        // Load Files model
        $this->loadModel('Files');
    
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $comprovantes = $this->paginate($this->Comprovantes);

        $this->set(compact('comprovantes'));
        $this->set('_serialize', ['comprovantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Comprovante id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comprovante = $this->Comprovantes->get($id, [
            'contain' => ['Users', 'Comprovantes']
        ]);

        $this->set('comprovante', $comprovante);
        $this->set('_serialize', ['comprovante']);
    }

            /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comprovante = $this->Comprovantes->newEntity();
        $this->user_id = $this->Auth->user('id');
        

        if ($this->request->is('post')) {
            $uploadPath = 'uploads/files/';
            $fileName = $this->request->data['arquivo']['name'];
            //$fileRequest = $this->request->data['arquivo']['tmp_name'];
            $extension = pathinfo($this->request->data['arquivo']['name'], PATHINFO_EXTENSION);

            $comprovante = $this->Comprovantes->patchEntity($comprovante, $this->request->data);

            $sendFile = $this->Files->uploadAndSaveFile('envio', $uploadPath, $fileName.'.'.$extension);
            if ($this->Comprovantes->save($comprovante)) {
                $this->Flash->success(__('The comprovante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comprovante could not be saved. Please, try again.'));
        }
        $users = $this->Comprovantes->Users->find('list', ['limit' => 200]);
        $this->set(compact('comprovante', 'users'));
        $this->set('_serialize', ['comprovante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comprovante id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comprovante = $this->Comprovantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comprovante = $this->Comprovantes->patchEntity($comprovante, $this->request->data);
            if ($this->Comprovantes->save($comprovante)) {
                $this->Flash->success(__('The comprovante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comprovante could not be saved. Please, try again.'));
        }
        $users = $this->Comprovantes->Users->find('list', ['limit' => 200]);
        $this->set(compact('comprovante', 'users'));
        $this->set('_serialize', ['comprovante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comprovante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comprovante = $this->Comprovantes->get($id);
        if ($this->Comprovantes->delete($comprovante)) {
            $this->Flash->success(__('The comprovante has been deleted.'));
        } else {
            $this->Flash->error(__('The comprovante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /*public function isAuthorized($user){
        if ($this->request->action === 'add') {
            return true;
        }
        if (in_array($this->request->action, ['edit', 'delete'])) {

            $comprovanteId = (int)$this->request->params['pass'][0];
            if ($this->Articles->isOwnedBy($comprovanteId, $user['id'])) {

               return true;
            }
    }
        return parent::isAuthorized($user);
    }*/
}
