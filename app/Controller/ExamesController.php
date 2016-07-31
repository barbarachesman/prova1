<?php
class ExamesController extends AppController{
  public $helpers = array('Html','Form');
  public $components = array('Flash');

  public function index(){
    $this-> set('exames', $this->Exame->find('all',
    array( 'order' => "nome ASC")));
  }
  public function view($codigo){
      $cidade = $this->Exames->findById($codigo);
      $this->set('exame', $exame);
    }

  public function edit($codigo){
    if (empty($this->request->data)){
      //Data Vazia -> campos para inserção
      //Carregar os estados para exibição
      $procedimentos = $this->Exame->Procedimento->find('list',
      array('fields'=>array('id','nome','preco')));
      $procedimentos = $this->Exame->Paciente->find('list',
      array('fields'=>array('id','nome')));
      //Setar na view a variável com dados do estado

      $this->set('procedimentos',$procedimentos);
      $this->set('pacientes',$pacientes);

      //Recuperar dados atuais

      $this->request->data = $this -> Exame->findById($codigo);


    }else{
      //persistir os dados

      if ($this->Exame->save($this->request->data)){
        $this->Flash->set('Exame atualizada com Sucesso');
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function del($codigo){

    $this->Cidade->delete($codigo);
    $this->Flash->set('Cidade excluida com Sucesso');
    $this->redirect(array('action' => 'index'));

  }

}
?>
