<?php
class UsersController extends AppController {
    
    function beforeFilter() {
        $this->Auth->allow(['login', /*'create'*/]);
    }
    
    
    function login() {
        if($this->request->is('post')) {
            
            if(!$this->Auth->login()) {
                flash('Дані не підходять', 'error');
            } else {
                $this->redirect($this->Auth->loginRedirect);
            }
        }
    }
	
	function logout() {
        $this->autoRender = false;
            
        $this->Auth->logout();
		
		return $this->redirect('/');
    }
    
    /**
    *   Create first user (admin)
    */
    function create() {
        $this->autoRender = false;
        
        App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
        
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        
        $data = [
            'email' => 'admin@localhost',
            'password' => $passwordHasher->hash('12345abc')
        ];
        
        echo $this->User->save($data) ? 'success' : 'failed';
    }
}