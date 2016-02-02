<?php
class ContractsController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/contracts'
        ]);
    }
    
    function index() {
        $conds = [];
        
        if($this->request->query('name') !== null) {
            $n = trim($this->request->query('name'));
            if(!empty($n)) {
                $conds['Customer.title LIKE'] = "%{$n}%";
            }
        }
        
        $this->paginate = [
            'contain' => ['Customer'],
            'conditions' => $conds,
            'limit' => 50,
            'order' => 'Contract.id DESC'
        ];        
        
        $this->set([
            'contracts' => $this->paginate($this->Contract)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Contract->set($this->request->data);
            
            if($this->Contract->save()) {
                flash('Контракт додано', 'success');
                
                $this->redirect('/contracts/edit/'.$this->Contract->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
        
        $this->set([
            'customers' => $this->Contract->Customer->getList()
        ]);
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $contract = $this->Contract->findById($id);
        if(empty($contract)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Contract->id = $id;
            
            $this->Contract->set($this->request->data);
            
            if($this->Contract->save()) {
                flash('Дані контракта оновлено', 'success');
                
                $this->redirect('/contracts/edit/'.$this->Contract->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $contract;
        
        $this->set([
            'contract' => $contract,
            'customers' => $this->Contract->Customer->getList()
        ]);
    }
    
    function delete($id = null) {
        
    }
}