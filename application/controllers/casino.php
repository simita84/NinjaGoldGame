<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Casino extends CI_Controller {
	 
  protected $gold;
  protected $activity=array();
  
	public function __construct()
	{
		parent::__construct();
		$this->activity=$this->session->userdata('activity');
		$this->output->enable_profiler();
	}
	public function index()
	{
		$sum_gold=$this->session->userdata("sum_gold");
		$this->load->view ('casino/index',
			array ('activity'	=> $this->session->userdata('activity') ,
				   'total_gold'	=> $sum_gold ) );	
	}
	public function process_money()
	{
		$building=$this->input->post('building',TRUE);

		if($building=="farm")
		{
			$this->gold = rand(10,20);
		}
		else if($building=="cave")
		{
			$this->gold = rand(5,10);
		}
		else if($building=="house")
		{
			$this->gold = rand(2,5);
		}
		else if($building=="casino")
		{
			$this->gold = rand(-50,50);
		}
	    if(!($this->session->userdata("sum_gold") ) ){
	    	$this->session->set_userdata("sum_gold",$this->gold); 
	    } 
	    else
	    {
			$this->session->set_userdata("sum_gold",
				     $this->session->userdata("sum_gold") + $this->gold ); 
	    }
	    if($this->gold<0){
	    	$result="Lost : ";
	    }
	    else
	    {
	    	$result="Got : ";
	    }
	    $this->activity[] = " You entered ".$building." and " .$result." 
	                    		 ".$this->gold." golds ".
	                     		" Total gold ".$this->session->userdata("sum_gold").
	                     		" @ ".date("d-F-Y g:i a");
	  	$this->session->set_userdata('activity', $this->activity);
		redirect(base_url('/'));
	}
	public function reset()
	{	 
		$this->session->unset_userdata('activity');
		//$this->session->sess_destroy(); 
		redirect('/');
	}
}
//end of main controller