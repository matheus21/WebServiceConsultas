<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Consultas Controller
 *
 * @property \App\Model\Table\ConsultasTable $Consultas
 *
 * @method \App\Model\Entity\Consulta[] paginate($object = null, array $settings = [])
 */
class ConsultasController extends AppController
{
    /**
     * Solicita cancelamento da consulta marcada
     */
    public function solicitarCancelamento() {
        $this->request->allowMethod(['post']);
        $id = $this->request->getData('consulta_id');
        $consulta = $this->Consultas->get($id);
        /**
         * Solicitou cancelamento da consulta
         */
        $consulta->situacao_id = 3;
        $this->Consultas->save($consulta);
        $this->autoRender = false;
    }

    /**
     * Adiciona consulta do app
     */

    public function addConsulta()
    {
        $this->request->allowMethod(['post']);
        $consulta = $this->Consultas->newEntity();

        $consulta->id = $this->request->getData('id');
        $consulta->paciente_id = $this->request->getData('paciente_id');
        $consulta->situacao_id = $this->request->getData('situacao_id');
        $consulta->hora = $this->request->getData('hora');

        $mil = $this->request->getData('data');
        $seconds = $mil / 1000;
        $consulta->data = date("Y-m-d", $seconds);

        $this->Consultas->save($consulta);
        $this->autoRender = false;
    }

    public function listarConsultas()
    {
        $paciente_id = $this->request->getData('paciente_id');
        $consultas = $this->Consultas->find('all')
            ->where(['paciente_id' => $paciente_id])
            ->andWhere(['situacao_id <>' => 4])
            ->order(['id' =>'DESC']);

        foreach ($consultas as $c) {

            $c->hora = date_format($c->hora, 'H:i');


        }

        $this->response->type('json');
        $this->response->body(json_encode($consultas));
        $this->autoRender = false;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pacientes', 'SituacaoConsultas']
        ];
        $consultas = $this->paginate($this->Consultas);

        $this->set(compact('consultas'));
        $this->set('_serialize', ['consultas']);
    }

    /**
     * View method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consulta = $this->Consultas->get($id, [
            'contain' => ['Pacientes']
        ]);

        $this->set('consulta', $consulta);
        $this->set('_serialize', ['consulta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consulta = $this->Consultas->newEntity();
        if ($this->request->is('post')) {
            $consulta = $this->Consultas->patchEntity($consulta, $this->request->getData());
            if ($this->Consultas->save($consulta)) {
                $this->Flash->success(__('Consulta salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar consulta, por favor tente novamente'));
        }
        $pacientes = $this->Consultas->Pacientes->find('list', ['limit' => 200]);
        $situacao_consultas = $this->Consultas->SituacaoConsultas->find('list', ['limit' => 200]);
        $this->set(compact('consulta', 'pacientes', 'situacao_consultas'));
        $this->set('_serialize', ['consulta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consulta = $this->Consultas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consulta = $this->Consultas->patchEntity($consulta, $this->request->getData());
            if ($this->Consultas->save($consulta)) {
                $this->Flash->success(__('A consulta foi editada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar consulta, por favor, tente novamente.'));
        }
        $pacientes = $this->Consultas->Pacientes->find('list', ['limit' => 200]);
        $situacao_consultas = $this->Consultas->SituacaoConsultas->find('list', ['limit' => 200]);
        $this->set(compact('consulta', 'pacientes', 'situacao_consultas'));
        $this->set('_serialize', ['consulta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consulta = $this->Consultas->get($id);
        if ($this->Consultas->delete($consulta)) {
            $this->Flash->success(__('Consulta deletada com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao deletar consulta, por favor tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
