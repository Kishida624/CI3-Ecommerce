<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Backup extends MX_Controller
{

function __construct() {
parent::__construct();
}

function  backup_bdd(){

        $this->load->library('session');
        $this->load->module('securite');

$this->securite->_verify_admin();

        //echo"Manage";

$data['view_file']="backup_bdd";
$this->load->module('templates');
$this->templates->admin($data);

    }
function database_backup()
{
	$this->load->helper('url');
	$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
	$this->load->dbutil();
	$db_format=array('format'=>'zip','filename'=>'pfeprojet.sql');
	$backup=& $this->dbutil->backup($db_format);
	$dbname='backup-on-'.date('Y-m-d').'zip';
	$save='backup_base_de_donnees/db_backup'.$dbname;
	write_file($save,$backup);
	force_download($dbname, $backup);
 
  

}

}