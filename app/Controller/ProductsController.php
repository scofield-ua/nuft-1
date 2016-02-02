<?php
class ProductsController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        
        $this->set([
            'current_nav' => '/products'
        ]);
    }
    
    function index() {
        $conds = [];
        
        if($this->request->query('name') !== null) {
            $n = trim($this->request->query('name'));
            if(!empty($n)) {
                $conds['Product.title LIKE'] = "%{$n}%";
            }
        }
        
        $this->paginate = [
            'conditions' => $conds,
            'limit' => 50,
            'order' => 'Product.id DESC'
        ];        
        
        $this->set([
            'products' => $this->paginate($this->Product)
        ]);
    }
    
    function add() {
        if($this->request->is('post')) {
            $this->Product->set($this->request->data);
            
            if($this->Product->save()) {
                flash('Продукт додано', 'success');
                
                $this->redirect('/products/edit/'.$this->Product->id);
            } else {
                flash('Помилка', 'error');                
            }
        }
    }
    
    function edit($id = null) {
        if($id === null) throw new NotFoundException();
        
        $product = $this->Product->findById($id);
        if(empty($product)) throw new NotFoundException();
        
        if($this->request->is('post')) {
            $this->Product->id = $id;
            
            $this->Product->set($this->request->data);
            
            if($this->Product->save()) {
                flash('Дані продукта оновлено', 'success');
                
                $this->redirect('/products/edit/'.$this->Product->id);
            } else {
                flash('Помилка', 'error');
            }
        }
        
        $this->request->data = $product;
        
        $this->set([
            'product' => $product
        ]);
    }
    
    function delete($id = null) {
        
    }
}