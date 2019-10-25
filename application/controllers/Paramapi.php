<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paramapi extends CI_Controller
{

    private $key = 'ê lgÜOÇØ	Dè¾lDÄPòL¶SK¥\G£~€"Vú-'; #Same as in JAVA

    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('User_level_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','paramapi/tbl_user_level_list');
    } 

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('paramapi/create_action'),
	    'id_user_level' => set_value('id_user_level'),
	    'nama_level' => set_value('nama_level'),
	    );
        $this->template->load('template','paramapi/tbl_user_level_form', $data);
    }

    public function downloadapi(){
        $this->load->helper('download');
        $nama_file = 'C:\Users\User\Documents\Repository Code\hmacgenerator\target\hmacgenerator-0.0.1-SNAPSHOT.jar';
        force_download($nama_file, NULL);
    }

    public function downloadlib(){
        $this->load->helper('download');
        $nama_file = 'C:\Users\User\Documents\Repository Code\generatorhmac\target\generatorhmac-1.0-SNAPSHOT-jar-with-dependencies.jar';
        force_download($nama_file, NULL);
    }
    
    public function create_action_api() 
    {
        $apikeys=$this->input->post('apikeys');
        $secretkey=$this->input->post('secretkey');
        $ip=$this->input->post('ip');

            $pathToFile = $this->config->item('path_to_file');
            $fileContent = file_get_contents($pathToFile);
            $fileContent = str_replace("@secretkey@", $secretkey, $fileContent);
            $fileContent = str_replace("@apikey@", $apikeys, $fileContent);
            $fileContent = str_replace("@IP@", $ip, $fileContent);
            file_put_contents($pathToFile, $fileContent);
            
            echo system("cmd /c C:\wamp64\www\garuda_crud_generator\generatejar.bat");
            $link = array(
                'linkdownload' => "<a href=\"<?php echo base_url('/index.php/paramapi/download')?>\">Download file</a>",
                'caption' => "Download File"
            );
            
            // set default
            $fileContentSetDefault = file_get_contents($pathToFile);
            $fileContentSetDefault = str_replace($secretkey, "@secretkey@", $fileContentSetDefault);
            $fileContentSetDefault = str_replace($apikeys, "@apikey@", $fileContentSetDefault);
            $fileContentSetDefault = str_replace($ip, "@IP@", $fileContentSetDefault);
            file_put_contents($pathToFile, $fileContentSetDefault);
        

/*        $link = array(
            'linkdownload' => "<a href=\"<?php echo base_url('/index.php/paramapi/download')?>\">Download file</a>"
        );*/
        
    }

    public function create_action_lib() 
    {
        $apikeys=$this->input->post('apikeys');
        $secretkey=$this->input->post('secretkey');
        $ip=$this->input->post('ip');

            $pathToFile = $this->config->item('path_to_file_lib');
            $fileContent = file_get_contents($pathToFile);
            $fileContent = str_replace("@secretkey@", $secretkey, $fileContent);
            $fileContent = str_replace("@apikey@", $apikeys, $fileContent);
            $fileContent = str_replace("@IP@", $ip, $fileContent);
            file_put_contents($pathToFile, $fileContent);
            
            echo system("cmd /c C:\wamp64\www\garuda_crud_generator\generatelib.bat");
            $link = array(
                'linkdownload' => "<a href=\"<?php echo base_url('/index.php/paramapi/download')?>\">Download file</a>",
                'caption' => "Download File"
            );
            
            // set default
            $fileContentSetDefault = file_get_contents($pathToFile);
            $fileContentSetDefault = str_replace($secretkey, "@secretkey@", $fileContentSetDefault);
            $fileContentSetDefault = str_replace($apikeys, "@apikey@", $fileContentSetDefault);
            $fileContentSetDefault = str_replace($ip, "@IP@", $fileContentSetDefault);
            file_put_contents($pathToFile, $fileContentSetDefault);
        

/*        $link = array(
            'linkdownload' => "<a href=\"<?php echo base_url('/index.php/paramapi/download')?>\">Download file</a>"
        );*/
        
    }

    public function create_action_txt() 
    {
        
        $apikeys=$this->input->post('apikeys');
        $secretkey=$this->input->post('secretkey');
        
        //$pathoutput = FCPATH.'output';
        $pathoutput = $this->config->item('path_output_txt');
        $filename = $apikeys;
        $pathoutput = $pathoutput.'\\'.$filename.'.ag';


        $hex = '';
        for ($i=0; $i<strlen($secretkey); $i++){
            $ord = ord($secretkey[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0'.$hexCode, -2);
        }
        $secretkey = strToUpper($hex);
        
        $handle = fopen($pathoutput, 'w') or die('Cannot open file:  '.$pathoutput);
        fwrite($handle, $secretkey);
        fclose($handle);
    }

}