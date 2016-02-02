<?php
class Product extends AppModel {
    
	function getList() {
        return $this->find('list', [
            'fields' => ['id', 'title'],
            'order' => 'title ASC'
        ]);
    }
}