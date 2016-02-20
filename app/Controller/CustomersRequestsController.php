<?php
class CustomersRequestsController extends AppController {
	public $uses = ['CustomerRequest'];
	
	
	function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/customers_requests'
        ]);
    }
    
    function index() {
        $conds = [];
		
		$get_fields = ['customer_id', 'amount', 'product_id'];
		foreach($get_fields as $field) {
			$val = $this->request->query($field);
			if(!empty($val) && $val == true) $conds['CustomerRequest.'.$field] = $val;
		}
        
        $this->paginate = [
            'contain' => ['Customer', 'Product'],
            'conditions' => $conds,
            'limit' => 50,
            'order' => 'CustomerRequest.id DESC'
        ];
        
        $this->set([
            'crs' => $this->paginate($this->CustomerRequest),
			'customers' => [null => 'Будь-який'] + $this->CustomerRequest->Customer->getList(),
			'products' => [null => 'Будь-який'] + $this->CustomerRequest->Product->getList(),
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->CustomerRequest->set($this->request->data);
            
            if($this->CustomerRequest->save()) {
                flash('Заявка додана', 'success');
                
                $this->redirect('/customers_requests/edit/'.$this->CustomerRequest->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
        
        $this->set([
            'customers' => $this->CustomerRequest->Customer->getList(),
			'products' => $this->CustomerRequest->Product->getList(),
        ]);
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $crs = $this->CustomerRequest->findById($id);
        if(empty($crs)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->CustomerRequest->id = $id;
            
            $this->CustomerRequest->set($this->request->data);
            
            if($this->CustomerRequest->save()) {
                flash('Дані контракта оновлено', 'success');
                
                $this->redirect('/customers_requests/edit/'.$this->CustomerRequest->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $crs;
        
        $this->set([
            'crs' => $crs,
            'customers' => $this->CustomerRequest->Customer->getList(),
			'products' => $this->CustomerRequest->Product->getList(),
        ]);
    }
	
	function view($id = null) {
		if($id === null) throw new NotFoundException();
        
		$this->CustomerRequest->recursive = 1;
        $crs = $this->CustomerRequest->findById($id);
        if(empty($crs)) throw new NotFoundException();
		
		$this->set([
            'crs' => $crs,
        ]);
	}
    
    function delete($id = null) {
        
    }
}