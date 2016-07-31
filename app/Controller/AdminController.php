<?php
    class AdminController extends AppController{
        public $helpers = array('Html','Form');
        public $components = array('Flash');

        public function index(){
            $this->loadModel('Exame');

        }
        public function exameS(){
            $this->loadModel('Exame');
            $this-> set('exameS', $this->Exame->find('all',array('order' => "data DESC")));
        }


        public function pacientes(){
            $this->loadModel('Paciente');
            $this-> set('pacientes', $this->Paciente->find('all',array( 'order' => "nome ASC")));
        }
        public function procedimentos(){
          $this->loadModel('Procedimento');
          $this-> set('procedimentos', $this->Procedimento->find('all', array( 'order' => "nome ASC")));
        }

        public function totalE(){
            $this->loadModel('Exame');
            $this-> set('totalE', $this->Exame->find('all'));
        }
        public function totalP(){
            $this->loadModel('Exame');
            $this-> set('totalP', $this->Exame->find('all'));
        }

        public function editar($id = NULL) {
            $this->loadModel('Paciente');
            $this->set("title", "Editar Paciente ");
            $this->Paciente->id = $id;
            if (!$this->Paciente->exists()) {
                throw new NotFoundException(__('Registro não encontrado.'));
            }
            if ($this->request->is('get') || $this->request->is('put')) {
                if ($this->Paciente->saveAssociated($this->request->data)) {
                    $this->Paciente->setFlash(__('Registro salvo com sucesso.'));
                    $this->redirect(array('action' => '/index/'));
                } else {
                    $this->Flash->set('Erro: não foi possível salvar o registro.');
                }
            } else {
                $this->request->data = $this->Paciente->read(NULL, $id);
            }
        }
        public function excluir($id = NULL) {
          $this->loadModel('Paciente');
          if (!$this->request->is('get')) {
              throw new MethodNotAllowedException();
          }
          $this->Paciente->id = $id;
          if (!$this->Paciente->exists()) {
              throw new NotFoundException(__('Registro não encontrado.'));
          }
          if ($this->Paciente->delete()) {
              $this->Flash->set('Registro excluído com sucesso.');
              $this->redirect(array('action' => '/index/'));
          }
          $this->Flash->set('Erro: não foi possível excluir o registro.');
          $this->redirect(array('action' => '/index/'));
      }

      public function editarE($id = NULL) {
          $this->loadModel('Exame');
          $this->set("title", "Editar Exames ");
          $this->Exame->id = $id;
          if (!$this->Exame->exists()) {
              throw new NotFoundException(__('Registro não encontrado.'));
          }
          if ($this->request->is('post') || $this->request->is('put')) {
              if ($this->Exame->saveAssociated($this->request->data)) {
                  $this->Flash->set(__('Registro salvo com sucesso.'));
                  $this->redirect(array('action' => '/exame_s/'));
              } else {
                  $this->Flash->set('Erro: não foi possível salvar o registro.');
              }
          } else {
              $this->request->data = $this->Exame->read(NULL, $id);
          }
      }
      public function excluirE($id = NULL) {
        $this->loadModel('Exame');
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Exame->id = $id;
        if (!$this->Exame->exists()) {
            throw new NotFoundException(__('Registro não encontrado.'));
        }
        if ($this->Exame->delete()) {
            $this->Flash->set('Registro excluído com sucesso.');
            $this->redirect(array('action' => '/exame_s/'));
        }
        $this->Flash->set('Erro: não foi possível excluir o registro.');
        $this->redirect(array('action' => '/exame_s/'));
    }


    public function editarP($id = NULL) {
      $this->loadModel('Procedimento');
          $this->set("title", "Editar Procedimento");
          $this->Procedimento->id = $id;
          if (!$this->Procedimento->exists()) {
              throw new NotFoundException(__('Registro não encontrado.'));
          }

          if ($this->request->is('post') || $this->request->is('put')) {
              if ($this->Procedimento->saveAssociated($this->request->data)) {
                  $this->Session->setFlash(__('Registro salvo com sucesso.'));
                  $this->redirect(array('action' => '/index/'));
              } else {
                  $this->Session->setFlash(__('Erro: não foi possível salvar o registro.'));
              }
          } else {
              $this->request->data = $this->Procedimento->read(NULL, $id);
          }
      }


      public function excluirP($id = NULL) {
        $this->loadModel('Procedimento');
              if (!$this->request->is('get')) {
                  throw new MethodNotAllowedException();
              }
              $this->Procedimento->id = $id;
              if (!$this->Procedimento->exists()) {
                  throw new NotFoundException(__('Registro não encontrado.'));
              }
              if ($this->Procedimento->delete()) {
                  $this->Session->setFlash(__('Registro excluído com sucesso.'));
                  $this->redirect(array('action' => '/index/'));
              }
              $this->Session->setFlash(__('Erro: não foi possível excluir o registro.'));
              $this->redirect(array('action' => '/index/'));
          }



    }
?>
