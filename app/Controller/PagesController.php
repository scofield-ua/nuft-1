<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = [];

	public function home() {
		
	}
	
	/*public function code_output() {
		$this->autoRender = false;
		
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		
		$controller_folder = APP.'Controller';		
		
		$folder = new Folder($controller_folder);
		
		$files = $folder->read();
		
		foreach($files[1] as $filename) {
			echo "<strong>".APP_DIR.DS."{$filename}</strong><br/>";
			
			$file = new File($controller_folder.DS.$filename);
			
			echo htmlspecialchars($file->read())."<br/>";
		}
	}*/
}
