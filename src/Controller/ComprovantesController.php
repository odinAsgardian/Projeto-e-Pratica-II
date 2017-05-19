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

        public function uploadFiles($request, $comprovante){
            $checkSave = false;
            $data = '';
            foreach ($request['arquivo'] as $datas) {
                $data .= '-' . $datas;
            }

            $uploadPath = 'uploads/files';

            $username = $this->Auth->user('name');
            $username = str_replace("", "", $username);

            if(strcmp($request['plType'], '1') == 0){
                if (!empty($request['fileOne']['name'] && !empty($request['fileTwo']['name']))) {

                    $fileNameOne = $username . $data . '-1.pdf';
                    $uploadFileOne = $uploadPath.$fileNameOne;

                    $fileNameTwo = $username . $data . '-2.pdf';
                    $uploadFileTwo = $uploadPath.$fileNameTwo;

                    if (move_uploaded_file($request['fileOne']['tmp_name'], WWW_ROOT . $uploadFileOne) && move_uploaded_file($request['fileTwo']['tmp_name'], WWW_ROOT . $uploadFileTwo)) {
                        
                        $fileOne = $this->files->newEntity();
                        $fileOne->comprovante_id = $comprovante['id'];
                        $fileOne->name = $fileNameOne;
                        $fileOne->path = $uploadPath;

                        $fileTwo = $this->files->newEntity();
                        $fileTwo->comprovante_id = $comprovante['id'];
                        $fileTwo->name = $fileNameTwo;
                        $fileTwo->path = $uploadPath;

                        if ($this->Files->save($fileOne) && $this->Files->save($fileTwo)) {
                            $checkSave = true;
                        }
                    }
                }
            }

            return $checkSave;
        }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comprovante = $this->Comprovantes->newEntity();
        if ($this->request->is('post')) {
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
