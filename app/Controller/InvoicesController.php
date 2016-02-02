<?php
class InvoicesController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/invoices'
        ]);
    }
    
    function index() {
        $conds = [];
        
        if($this->request->query('date') !== null) {
            $d = trim($this->request->query('date'));
            if(!empty($d)) {
                $conds['Invoice.date LIKE'] = '%'.date('Y-m-d', strtotime($d)).'%';
            }
        }
        
        $this->paginate = [
            'conditions' => $conds,
			'contain' => ['Product', 'Customer'] ,
            'limit' => 50,
            'order' => 'Invoice.date DESC'
        ];        
        
        $this->set([
            'invoices' => $this->paginate($this->Invoice)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Invoice->set($this->request->data);
            
            if($this->Invoice->save()) {
                flash('Накладну додано', 'success');
                
                $this->redirect('/invoices/edit/'.$this->Invoice->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
		
		$this->set([
			'products' => $this->Invoice->Product->getList(),
			'customers' => $this->Invoice->Customer->getList(),
		]);
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $invoice = $this->Invoice->findById($id);
        if(empty($invoice)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Invoice->id = $id;
            
            $this->Invoice->set($this->request->data);
            
            if($this->Invoice->save()) {
                flash('Дані накладної оновлено', 'success');
                
                $this->redirect('/invoices/edit/'.$this->Invoice->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $invoice;
        
        $this->set([
            'invoice' => $invoice,
			'products' => $this->Invoice->Product->getList(),
			'customers' => $this->Invoice->Customer->getList(),
        ]);
    }
    
    function delete($id = null) {
        
    }
}