<?php
class RoutingsController extends AppController {
	
	function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/routings'
        ]);
    }
    
    function index() {
        $conds = [];
        
        if($this->request->query('number') !== null) {
            $n = trim($this->request->query('number'));
            if(!empty($n)) {
                $conds['Routing.number LIKE'] = "%{$n}%";
            }
        }
        
        $this->paginate = [
            'conditions' => $conds,
			'contain' => ['Driver', 'Car', 'Invoice'],
            'limit' => 50,
            'order' => 'Routing.id DESC'
        ];        
        
        $this->set([
            'routing' => $this->paginate($this->Routing)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Routing->set($this->request->data);
            
            if($this->Routing->save()) {
                flash('Додано', 'success');
                
                $this->redirect('/routings/edit/'.$this->Routing->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
		
		$this->set([
			'drivers' => $this->Routing->Driver->getList(),
			'cars' => $this->Routing->Car->getList(),
			'invoices' => $this->Routing->Invoice->getList()
        ]);
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $routing = $this->Routing->findById($id);
        if(empty($routing)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Routing->id = $id;
            
            $this->Routing->set($this->request->data);
            
            if($this->Routing->save()) {
                flash('Оновлено', 'success');
                
                $this->redirect('/routings/edit/'.$this->Routing->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $routing;
        
        $this->set([
            'routing' => $routing,
			'drivers' => $this->Routing->Driver->getList(),
			'cars' => $this->Routing->Car->getList(),
			'invoices' => $this->Routing->Invoice->getList()
        ]);
    }
	
	/**
	*	Маршрутний лист для конкртеного водія
	*	@param int $id ID водія
	*/
	function driver($id = null) {
		if($id === null) throw new NotFoundException();
		
		$driver = $this->Routing->Driver->findById($id);
		if(empty($driver)) throw new NotFoundException();
		
		$paths = $this->Routing->find('all', [
			'conditions' => ['Routing.driver_id' => $id],
			'order' => 'Routing.id ASC'
		]);
		
		$this->set([
            'paths' => $paths,
			'driver' => $driver
        ]);
	}
    
    function delete($id = null) {
        
    }
}
