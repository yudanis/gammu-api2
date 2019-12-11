<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Sendsms extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
   }
   
   function index_post()
   {
        $data_array = array(
            'DestinationNumber'  => $this->post('destination'),
            'SenderID'  => $this->post('modemcode'),
            'TextDecoded' => $this->post('message'),
            'CreatorID' => $this->post('userid')
        );
        $this->load->database();
        $this->load->model('M_Outbox');
        $this->M_Outbox->insert($data_array);
        // Set the response and exit
        $this->response($data_array, 201); 
         
   }

}