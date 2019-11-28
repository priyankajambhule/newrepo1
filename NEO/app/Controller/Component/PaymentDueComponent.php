<?php

/**
 * @author vivekshukla
 *
 */
App::uses('Component', 'Controller');

class PaymentDueComponent extends Component {

    var $components = array("Auth");

    /**
     * Function to check user permission against the action being performed
     * checkPermission method
     * @name checkPermission
     * @acces public 
     * @param  $permissionId(id of permission)
     * @return void
     * @created 18 Nov 2014
     * @modified 18 Nov 2014
     */
    /*function checkPermission($permissionId = array()) {
        if (is_array($permissionId)) {
            if ($this->Auth->user()) {
						
                if (trim($this->Auth->user('role_id') == ADMIN_ROLE_ID)) {
                    return true;
                } else {
                    $type = 'first';
                    $conditions = array(
                        'RolePermission.role_id' => trim($this->Auth->user('role_id')),
                        'RolePermission.permission_id' => !empty($permissionId) ? $permissionId : READ_PERMISSION_ID,
                        'RolePermission.is_active' => BOOL_TRUE,
                        'RolePermission.is_deleted' => BOOL_FALSE
                    );
                    $fields = array(
                        'RolePermission.id', 'RolePermission.is_permitted'
                    );
                    $contain = NULL;
                    $order = NULL;
                    $group = NULL;
                    $recursive = 0;
                    $this->RolePermission = ClassRegistry::init('RolePermission');					
                    $isPermitted = $this->RolePermission->getPermissionData($type, $conditions, $fields, $contain, $order, $group, $recursive);
					if(!empty($isPermitted['RolePermission']))
					{
						return (trim($isPermitted['RolePermission']['is_permitted']) == 1) ? true : false;
					}
                    else
					{
						return false;
					}
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }*/
	
	function getDue($society_id,$flat_id,$from_date,$to_date) {
		$this->Society = ClassRegistry::init('Society');	
		$this->IncomeType = ClassRegistry::init('IncomeType');	
		$this->PaymentReceivedDetail = ClassRegistry::init('PaymentReceivedDetail');	
		$datetemp=date('Y',strtotime($from_date));
		$from_date1=$datetemp.'-1';
		$d1 = strtotime($from_date);
		$nd1 = strtotime($from_date1);
		$nd2 = strtotime($from_date1);
		$nd3 = strtotime($from_date1);
		$d2 = strtotime($to_date);
		
		$monthlyIncome=$this->IncomeType->getIncomeTypeByfrequency(INCOME_FREQUENCY_MONTHLY,$society_id);
		$yearlyIncome=$this->IncomeType->getIncomeTypeByfrequency(INCOME_FREQUENCY_YEARLY,$society_id);
		$halfyearlyIncome=$this->IncomeType->getIncomeTypeByfrequency(INCOME_FREQUENCY_HALFYEARLY,$society_id);
		$quaterlyIncome=$this->IncomeType->getIncomeTypeByfrequency(INCOME_FREQUENCY_QUATERLY,$society_id);
		$data=array();
		$i=0;
		// Monthly
		while ($d1 <= $d2) {
			$month=date('Y-m', $d1);
			$i++;
				if(!empty($monthlyIncome))
				{
					foreach($monthlyIncome as $row)
					{
						$paid=$this->PaymentReceivedDetail->getPaymentDetails($flat_id,$month,$row['IncomeType']['id']);
						if($paid==0)
						{
							$data['m'.$i]['month']=$month;
							$data['m'.$i]['amount']=$row['IncomeType']['amount'];
							$data['m'.$i]['name']=$row['IncomeType']['name'];
							$data['m'.$i]['due_days']=$row['IncomeType']['due_days'];
							$data['m'.$i]['income_id']=$row['IncomeType']['id'];
						}
					}
				}
			$d1 = strtotime("+1 month", $d1);
			
		}
		// Yeally
		while ($nd1 <= $d2) {
			$month=date('Y-m', $nd1);
			$i++;
				if(!empty($yearlyIncome))
				{
					foreach($yearlyIncome as $row)
					{
						$paid=$this->PaymentReceivedDetail->getPaymentDetails($flat_id,$month,$row['IncomeType']['id']);
						if($paid==0)
						{
							$data['y'.$i]['month']=$month;
							$data['y'.$i]['amount']=$row['IncomeType']['amount'];
							$data['y'.$i]['name']=$row['IncomeType']['name'];
							$data['y'.$i]['due_days']=$row['IncomeType']['due_days'];
							$data['y'.$i]['income_id']=$row['IncomeType']['id'];
						}
					}
				}
			$nd1 = strtotime("+1 year", $nd1);
			
		}
		// quaterly
		while ($nd3 <= $d2) {
			$month=date('Y-m', $nd3);
			$i++;
				if(!empty($quaterlyIncome))
				{
					foreach($quaterlyIncome as $row)
					{
						$paid=$this->PaymentReceivedDetail->getPaymentDetails($flat_id,$month,$row['IncomeType']['id']);
						if($paid==0)
						{
							$data['q'.$i]['month']=$month;
							$data['q'.$i]['amount']=$row['IncomeType']['amount'];
							$data['q'.$i]['name']=$row['IncomeType']['name'];
							$data['q'.$i]['due_days']=$row['IncomeType']['due_days'];
							$data['q'.$i]['income_id']=$row['IncomeType']['id'];
						}
					}
				}
			$nd3 = strtotime("+3 month", $nd3);
			
		}
		// Halfyearly
		while ($nd3 <= $d2) {
			$month=date('Y-m', $nd3);
			$i++;
				if(!empty($halfyearlyIncome))
				{
					foreach($halfyearlyIncome as $row)
					{
						$paid=$this->PaymentReceivedDetail->getPaymentDetails($flat_id,$month,$row['IncomeType']['id']);
						if($paid==0)
						{
							$data['hy'.$i]['month']=$month;
							$data['hy'.$i]['amount']=$row['IncomeType']['amount'];
							$data['hy'.$i]['name']=$row['IncomeType']['name'];
							$data['hy'.$i]['due_days']=$row['IncomeType']['due_days'];
							$data['hy'.$i]['income_id']=$row['IncomeType']['id'];
						}
					}
				}
			$nd3 = strtotime("+6 month", $nd3);
			
		}
		return $data;
    }

}
