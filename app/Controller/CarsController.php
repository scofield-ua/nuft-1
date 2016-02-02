<?php
class CarsController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/cars'
        ]);
    }
    
    function index() {
        $conds = [];
        
        if($this->request->query('number') !== null) {
            $n = trim($this->request->query('number'));
            if(!empty($n)) {
                $conds['Car.number LIKE'] = "%{$n}%";
            }
        }
        
        $this->paginate = [
            'conditions' => $conds,
            'limit' => 50,
            'order' => 'Car.id DESC'
        ];        
        
        $this->set([
            'cars' => $this->paginate($this->Car)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Car->set($this->request->data);
            
            if($this->Car->save()) {
                flash('Автомобіль додано', 'success');
                
                $this->redirect('/cars/edit/'.$this->Car->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $car = $this->Car->findById($id);
        if(empty($car)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Car->id = $id;
            
            $this->Car->set($this->request->data);
            
            if($this->Car->save()) {
                flash('Дані автомобіля оновлено', 'success');
                
                $this->redirect('/cars/edit/'.$this->Car->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $car;
        
        $this->set([
            'car' => $car
        ]);
    }
    
    function delete($id = null) {
        
    }
}