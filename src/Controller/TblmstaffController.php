<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tblmstaff Controller
 *
 * @property \App\Model\Table\TblmstaffTable $Tblmstaff
 *
 * @method \App\Model\Entity\Tblmstaff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TblmstaffController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $from = $this->request->getQuery('from');
        $to = $this->request->getQuery('to');
        if (!empty($to) && !empty($from)) {
            $query = $this->Tblmstaff->find()->where(['DATEDIFF( NOW( ) , `TrialEntryDate` ) >=' => $from, 'DATEDIFF( NOW( ) , `TrialEntryDate` ) <' => $to]);
        } else {
            $query = $this->Tblmstaff;
        }
        $tblmstaff = $this->paginate($query);

        $this->set(compact('tblmstaff'));
    }

    /**
     * View method
     *
     * @param string|null $id Tblmstaff id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tblmstaff = $this->Tblmstaff->get($id, [
            'contain' => [],
        ]);

        $this->set('tblmstaff', $tblmstaff);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tblmstaff = $this->Tblmstaff->newEntity();
        if ($this->request->is('post')) {
            $tblmstaff = $this->Tblmstaff->patchEntity($tblmstaff, $this->request->getData());
            if ($this->Tblmstaff->save($tblmstaff)) {
                $this->Flash->success(__('The tblmstaff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tblmstaff could not be saved. Please, try again.'));
        }
        $this->set(compact('tblmstaff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tblmstaff id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tblmstaff = $this->Tblmstaff->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tblmstaff = $this->Tblmstaff->patchEntity($tblmstaff, $this->request->getData());
            if ($this->Tblmstaff->save($tblmstaff)) {
                $this->Flash->success(__('The tblmstaff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tblmstaff could not be saved. Please, try again.'));
        }
        $this->set(compact('tblmstaff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tblmstaff id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tblmstaff = $this->Tblmstaff->get($id);
        if ($this->Tblmstaff->delete($tblmstaff)) {
            $this->Flash->success(__('The tblmstaff has been deleted.'));
        } else {
            $this->Flash->error(__('The tblmstaff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
