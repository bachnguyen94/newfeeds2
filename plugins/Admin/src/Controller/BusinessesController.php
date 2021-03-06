<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\Utility\Security;
use Cake\Validation\Validator;
/**
 * Business Controller
 *
 * @property \Admin\Model\Table\BusinessTable $Business
 */
class BusinessesController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadModel('Slides');
        $this->loadModel('Businesses');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $hello = $this->Businesses->find()->contain(['Slides'])->first();
        $businesses = $this->paginate($this->Businesses);

        $this->set(compact('businesses'));
        $this->set('_serialize', ['businesses']);
    }

    /**
     * View method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $business = $this->Businesses->get($id, [
            'contain' => []
        ]);

        $this->set('business', $business);
        $this->set('_serialize', ['$business']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function form($id = null)
    {
        $business = $this->Businesses->newEntity();
        if($id){
            die;
            $business = $this->Businesses->get($id,['contain' => ['Slides']]);
            $slide_order = $this->Slides->find()->select(['display_order'])->where(['Slides.recordId' => $id])->first();
        }
        if ($this->request->data) {
            $business = $this->Core->patchEntity($business, $this->request->data,[
                'associated' => ['Slides']
            ]);
                if ($this->Businesses->save($business)) {
                $this->Flash->success(__('The busines has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The busines could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('business', 'slides_displayorder','slide_order'));
        $this->set('_serialize', ['business']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    /**
     * Delete method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $business = $this->Businesses->get($id);
//        debug($business);die;
        if ($this->Businesses->delete($business)) {
            $this->Flash->success(__('The business has been deleted.'));
        } else {
            $this->Flash->error(__('The business could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
