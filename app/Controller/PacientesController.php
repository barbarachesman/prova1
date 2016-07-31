<?php
class PacientesController extends AppController{
  public $helpers = array('Html','Form');
  public $components = array('Flash');


  public function index1(){
    $this->loadModel('Paciente');

  }
  public function index(){
    $ss = $this->Session->read("Paciente.id");
    if(isset($ss))
    {
      $this-> set('exames', $this->Paciente->Exame->find('all',array('conditions' =>
      array('Paciente.id' => $ss), 'order' => "data DESC, procedimento.nome ASC")));
    }else{
      $this->redirect(array("action" => '/index1/'));
    }
  }
  public function view($codigo){
    $paciente = $this->Paciente->findById($codigo);
    $this->set('paciente', $paciente);
  }

  public function addp(){
    if ($this->Paciente->save($this->request->data)) {
      $this->Flash->set('Usuario Inserido com Sucesso!');
      $this->redirect(array('action' => 'login'));
    }
  }

  public function add(){
    if ($this->request->is("post")) {
      $this->loadModel('Exame');
      if ($this->Exame->save($this->request->data)) {
        $this->redirect(array("action" => '/index/'));
      } else {
        $this->Flash->set("Erro: não foi possível salvar o registro.");
        $this->redirect(array("action" => '/index/'));
      }

    }else{
      $ss = $this->Session->read("Paciente.id");
      $this-> set('id', $ss);
      $this->loadModel('Procedimento');
      $procedimentos = $this->Procedimento->Find('list',array('fields' => array('id','nome')));
      $this-> set('procedimentos', $procedimentos);
    }
  }
  public function editar($id = NULL) {
    $this->set("title", "Editar Paciente");
    $this->Paciente->id = $id;
    if (!$this->Paciente->exists()) {
      throw new NotFoundException(__('Registro não encontrado.'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->Paciente->saveAssociated($this->request->data)) {
        $this->Session->setFlash(__('Registro salvo com sucesso.'));
        $this->redirect(array('action' => '/index/'));
      } else {
        $this->Session->setFlash(__('Erro: não foi possível salvar o registro.'));
      }
    } else {
      $this->request->data = $this->Paciente->read(NULL, $id);
    }
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
        $this->redirect(array('action' => '/index/'));
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
      $this->redirect(array('action' => '/index/'));
    }
    $this->Flash->set('Erro: não foi possível excluir o registro.');
    $this->redirect(array('action' => '/index/'));
  }
  public function logout(){
    $this->Session->destroy();
    $this->Session->delete('Paciente.nome');
    $this->Session->delete('Paciente.id');
    $this->redirect(array("action" => '/index/', "controller" => 'Procedimentos'));
  }
  public function login(){
    if ($this->request->is("post")) {
      $login = $this->request->data('Paciente.login');
      $senha = $this->request->data('Paciente.senha');
      $user = $this->Paciente->find('all',array('conditions' =>
      array('login' => $login, 'senha' => $senha)));

      if(count($user)> 0){
        $this->Session->write("Paciente.nome", $user[0]['Paciente']['nome']);
        $this->Session->write("Paciente.id", $user[0]['Paciente']['id']);
        $this->redirect(array("action" => '/index/'));
      }
      else {
        $this->Flash->set("Usuário ou senha inválidos.");
        $this->redirect(array("action" => '/login/'));
      }
    }
  }
}
?>
