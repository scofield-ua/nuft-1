<?php
class SchedulersController extends AppController {
	
	public $uses = ['Scheduler'];
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/schedules'
        ]);
    }
    
    function index() {
        $conds = [];
        
        if($this->request->query('date') !== null) {
            $d = trim($this->request->query('date'));
            if(!empty($d)) {
                $conds['Scheduler.date LIKE'] = '%'.date('Y-m-d', strtotime($d)).'%';
            }
        }
        
        $this->paginate = [
            'conditions' => $conds,
			'contain' => ['Product', 'Customer'],
            'limit' => 50,
            'order' => 'Scheduler.id DESC'
        ];        
        
        $this->set([
            'schedules' => $this->paginate($this->Scheduler)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Scheduler->set($this->request->data);
            
            if($this->Scheduler->save()) {
                flash('Додано', 'success');
                
                $this->redirect('/schedulers/edit/'.$this->Scheduler->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
		
		$this->set([
			'products' => $this->Scheduler->Product->getList(),
			'customers' => $this->Scheduler->Customer->getList(),
        ]);
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $scheduler = $this->Scheduler->findById($id);
        if(empty($scheduler)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Scheduler->id = $id;
            
            $this->Scheduler->set($this->request->data);
            
            if($this->Scheduler->save()) {
                flash('Оновлено', 'success');
                
                $this->redirect('/schedules/edit/'.$this->Scheduler->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $scheduler;
        
        $this->set([
            'scheduler' => $scheduler,
			'products' => $this->Scheduler->Product->getList(),
			'customers' => $this->Scheduler->Customer->getList(),
        ]);
    }
    
    function delete($id = null) {
        
    }
}