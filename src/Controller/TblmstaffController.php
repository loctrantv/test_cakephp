<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Tblmstaff;
use Cake\Mailer\Email;
use Cake\View\View;

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
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $to = (int)$data['to'];
            $from = (int)$data['from'];
            $email = $data['email'];
            if ($to >= 0 && $from >= 0) {
                if ($from <= $to) {
                    $query = $this->Tblmstaff->find()->contain(['tblMStaff2'])->where(['DATEDIFF( NOW( ) , `TrialEntryDate` ) >=' => $from, 'DATEDIFF( NOW( ) , `TrialEntryDate` ) <' => $to]);
                    if ($query->all()->count() > 0) {
                        $fileName = 'List_Staff_Working_'.$from.'_'.$to.'_days_'.time().'.pdf';
                        if (!empty($data['from'])) {
                            $sent =$this->sendPdf($query->all(),$email,$fileName);
                            if ($sent) {
                                $this->Flash->success('This was successful');
                            } else {
                                $this->Flash->error('This was not successful'.$sent);
                            }
                        } else {
                            $this->Flash->error('Please input your email to send file');
                        }

                    } else {
                        $this->Flash->error('Do not have any record match with your input');
                    }
                } else {
                    $this->Flash->error('Please input "From" value less than "To" value !');
                    $query = $this->Tblmstaff->find()->where('1 = -1');
                }

            } else {
                $this->Flash->error('Please input your range day to send staff list to your email');
                $query = $this->Tblmstaff;
            }
        } else {
            $query = $this->Tblmstaff->find()->contain(['tblMStaff2']);
        }

        $tblmstaff = $this->paginate($query);
        $this->set(compact('tblmstaff'));
    }

    public function sendPdf($data, $emailUser, $fileName)
    {
        $CakePdf = new \CakePdf\Pdf\CakePdf();
        $CakePdf->template('staff', '');
        $CakePdf->viewVars(['tblmstaff' => $data]);
        $pdf = $CakePdf->write(APP . 'files' . DS . $fileName);
        try {
            $email = new Email();
            $email->setTo($emailUser);
            $email->setSubject('Your Staff List');
            $email->addAttachments(APP . 'files' . DS . $fileName);
            $email->send('Dear User, Please see attachment file !');

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
