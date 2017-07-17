<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Paciente;

/**
 * Pacientes Controller
 *
 * @property \App\Model\Table\PacientesTable $Pacientes
 *
 * @method \App\Model\Entity\Paciente[] paginate($object = null, array $settings = [])
 */
class PacientesController extends AppController
{

    /**
     * Json
     */
    public function login()
    {
        $this->request->allowMethod(['post']);
        $login = $this->request->getData('login');
        $senha = $this->request->getData('senha');
        $paciente = $this->Pacientes->find('all')
            ->where(['Pacientes.cpf' => $login])
            ->andWhere(['Pacientes.senha' => $senha])
            ->first();
        $this->response->type('json');
        $this->response->body(json_encode($paciente));
        $this->autoRender = false;
    }

    /**
     * Json
     */
    public function alterarSenha()
    {
        $this->request->allowMethod(['post']);
        $id = $this->request->getData('paciente_id');
        $nova_senha = $this->request->getData('nova_senha');
        $paciente = $this->Pacientes->get($id);
        $paciente->senha = $nova_senha;
        $paciente->acessou = 1;
        $this->Pacientes->save($paciente);
        $this->response->type('json');
        $this->response->body(json_encode($paciente));
        $this->autoRender = false;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pacientes = $this->paginate($this->Pacientes);

        $this->set(compact('pacientes'));
        $this->set('_serialize', ['pacientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Paciente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paciente = $this->Pacientes->get($id, [
            'contain' => ['Consultas']
        ]);

        $this->set('paciente', $paciente);
        $this->set('_serialize', ['paciente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paciente = $this->Pacientes->newEntity();
        if ($this->request->is('post')) {
            $paciente = $this->Pacientes->patchEntity($paciente, $this->request->getData());
            if ($this->Pacientes->save($paciente)) {
                $this->Flash->success(__('O paciente foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar paciente, tente novamente.'));
        }
        $this->set(compact('paciente'));
        $this->set('_serialize', ['paciente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paciente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paciente = $this->Pacientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paciente = $this->Pacientes->patchEntity($paciente, $this->request->getData());
            if ($this->Pacientes->save($paciente)) {
                $this->Flash->success(__('O paciente foi editado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar paciente, por favor tente novamente.'));
        }
        $this->set(compact('paciente'));
        $this->set('_serialize', ['paciente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paciente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paciente = $this->Pacientes->get($id);
        if ($this->Pacientes->delete($paciente)) {
            $this->Flash->success(__('O paciente foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao deletar paciente, por favor tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
