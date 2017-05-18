<?php
namespace App\Controller;

use App\Controller\AppController;

class ArquivosController extends AppController
{
       public function index()
    {
        $arquivos = $this->paginate($this->Arquivos);

        $this->set(compact('arquivos'));
        $this->set('_serialize', ['arquivos']);
    }


    public function initialize()
    {
        
        parent::initialize();        
        $this->loadComponent('Upload');
    }

    public function upload()
    {
        if(!empty($this->request->data)){
            $this->upload->send($this->request->data['uploadfile']);
        }
    }

     public function add()
    {
        $arquivo = $this->Arquivos->newEntity();
        if ($this->request->is('post')) {
            $arquivo = $this->Arquivos->patchEntity($arquivo, $this->request->data);
            if ($this->Arquivos->save($arquivo)) {
                $this->Flash->success(__('O arquivo foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The arquivo could not be saved. Please, try again.'));
        }
        $this->set(compact('arquivo'));
        $this->set('_serialize', ['arquivo']);
    }
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $arquivo = $this->Arquivos->get($id);
        if ($this->Arquivos->delete($arquivo)) {
            $this->Flash->success(__('The arquivo has been deleted.'));
        } else {
            $this->Flash->error(__('The arquivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}

    