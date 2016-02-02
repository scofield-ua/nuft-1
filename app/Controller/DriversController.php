<?php
class DriversController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/drivers'
        ]);
    }
    
    function index() {
        $conds = [];
        
        if($this->request->query('name') !== null) {
            $name = trim($this->request->query('name'));
            if(!empty($name)) {
                $conds['Driver.name LIKE'] = "%{$name}%";
            }
        }
        
        $this->paginate = [
            'conditions' => $conds,
            'limit' => 50,
            'order' => 'Driver.name ASC'
        ];        
        
        $this->set([
            'drivers' => $this->paginate($this->Driver)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Driver->set($this->request->data);
            
            if($this->Driver->save()) {
                flash('Водій доданий', 'success');
                
                $this->redirect('/drivers/edit/'.$this->Driver->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $driver = $this->Driver->findById($id);
        if(empty($driver)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Driver->id = $id;
            
            $this->Driver->set($this->request->data);
            
            if($this->Driver->save()) {
                flash('Дані водія оновлено', 'success');
                
                $this->redirect('/drivers/edit/'.$this->Driver->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $driver;
        
        $this->set([
            'driver' => $driver
        ]);
    }
    
    function delete($id = null) {
        
    }
}