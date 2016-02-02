<?php
class CustomersController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/customers'
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
            'conditions' => $conds,
            'limit' => 50,
            'order' => 'Customer.title ASC'
        ];        
        
        $this->set([
            'customers' => $this->paginate($this->Customer)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Customer->set($this->request->data);
            
            if($this->Customer->save()) {
                flash('Замовника додано', 'success');
                
                $this->redirect('/customers/edit/'.$this->Customer->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $customer = $this->Customer->findById($id);
        if(empty($customer)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Customer->id = $id;
            
            $this->Customer->set($this->request->data);
            
            if($this->Customer->save()) {
                flash('Дані замовника оновлено', 'success');
                
                $this->redirect('/customers/edit/'.$this->Customer->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $customer;
        
        $this->set([
            'customer' => $customer
        ]);
    }
    
    function delete($id = null) {
        
    }
}