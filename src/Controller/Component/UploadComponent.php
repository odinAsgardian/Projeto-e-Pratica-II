<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;


class UploadComponent extends Component{


	public $maxFiles = 5;


	public function FunctionName($data)
	{
		if (!empty( $data )) {
			if(count($data) > $this->max_files){
				throw new InternalErrorException("Error Processing Request. Numero maximo de arquivos aceitos é {$this->maxFiles}", 1);
				
			}

			foreach ($data as $file) {

				$filename = $file['nome'];
				$file_tmp_name = $file['tmp_nome'];
				$dir = WWW_ROOT.'Downloads'.DS.'uploads';
				$allowed = array('png', 'jpg', 'jpeg');

				if (!in_array( substr( strrchr($filename, '.'), 1), $allowed)) {
					throw new InternalErrorException("Error Processing Request", 1);
					
				}elseif(is_uploaded_file($file_tmp_name)){
					$filename = Text::uuid().'-'.$filename;

					$filedb = TableRegistry::get('Arquivos');
					$entity = $filedb->newEntity();
					$entity->filename = $filename;
					$filedb->save($entity);

					move_uploaded_file($file_tmp_name,$dir.DS.$filename);

				}
			}
		}
	}

}
?>