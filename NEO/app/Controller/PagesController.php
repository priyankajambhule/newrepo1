<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'display');
    }

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
  
 public function login() {
           if ($this->request->is('post')) {
			//print_r($this->request->data);
			$from_date=$this->request->data['Login']['fromdate'];
			$to_date=$this->request->data['Login']['todate'];
	        $from_date11 = date("Y-m-d", strtotime($from_date));
	        $to_date11 = date("Y-m-d", strtotime($to_date));
		    $geocodeFromAddr= file_get_contents('https://api.nasa.gov/neo/rest/v1/feed?start_date='.$from_date11.'&end_date='.$to_date11.'&api_key=DEMO_KEY');
            $apidata=json_decode($geocodeFromAddr);
	        $apidata12=(array)$apidata;
	        $near=(array)$apidata12['near_earth_objects'];
            //echo"<pre>";print_r($near);exit;
	       $from=$near[$from_date11];
	   //echo"<pre>";print_r($from);exit;
	        $items1 = array();
	       $id1 = array();
	       $id=array();
	       foreach($from as $k=>$row)
	        {
		       $data=(array)$row;
		  
	         
		  $datas=$data['id'];
		  $close=(array)$data['close_approach_data'][0];
		
		  $velo=(array)$close['relative_velocity'];
		    	
		  $kmh=$velo['kilometers_per_hour'];
		   $items1[] = $kmh;
		     ///echo "<pre>"; print_r($items1);
		   }
	      /*$fine12=array_merge($maxs,$maxs1);
          $finalkmh=max($largest);*/
		  $max= max($items1);
           echo "<pre>";print_r($max);










			
 }}
}