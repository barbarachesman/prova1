<?php
class ProcedimentosController extends AppController{
  public $helpers = array('Html','Form');
  public $components = array('Flash');

  public function index(){
    $this-> set('procedimentos', $this->Procedimento->find('all',
    array( 'order' => "nome ASC")));
  }
  public function view($codigo){
    $procedimento = $this->Procedimento->findById($codigo);
    $this->set('procedimento', $procedimento);

  }
  public function add(){
    if (empty($this->request->data)){
      //Data Vazia -> campos para inserção
      //Carregar os estados para exibição
      $procedimentos = $this->Procedimento->find('list',
      array('fields'=>array('id','nome','preco')));
      //Setar na view a variável com dados do estado


    }else{
      //persistir os dados

      if ($this->Procedimento->save($this->request->data)){
        $this->Flash->set('Procedimento inserido com sucesso');
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function editar($id = NULL) {
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


    public function excluir($id = NULL) {
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
