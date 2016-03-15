<?php
class am extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
	function get_all($table,$order='',$del='')
	{
		if(!empty($order))$this->db->order_by($order,'asc');
		if(!empty($del))$this->db->where('deleted','0');
		$ret = $this->db->get($table)->result_array();
		return $ret;
	}
	function get($data,$table)
	{
		$t = array();
		foreach($data as $val)
		{
			$t[] = $val['table'];
		}
		$str = implode(",",$t);
		$pos = preg_match("/^v_/",$table);
		//var_dump($pos);
		$str = "SELECT ".$str." FROM ".$table;
		if($pos == '0') $str .= " WHERE $table.deleted = '0'";
		$ret = $this->db->query($str)->result_array();
		if(count($ret)==0){
			foreach($t as $val)
			{
				$ret[0][$val]='&nbsp;';
			}
			//var_dump($ret);
		}
		//var_dump($ret);
		return $ret;
	}
	function export($data)
	{
		//var_dump($data);
		$d = array();
		$c = 0;
		foreach($data as $val)
		{
			$temp = explode(",",$val);
			$d[$c]['table'] = $temp[0];
			$d[$c]['width'] = $temp[1];
			$d[$c]['title'] = isset($temp[2])?$temp[2]:'';
			$d[$c]['c'] = isset($temp[3])?$temp[3]:'';
			$d[$c]['sisip'] = isset($temp[4])?$temp[4]:'';
			$d[$c]['tambahan'] = isset($temp[5])?$temp[5]:'';
			$d[$c]['skip'] = isset($temp[6])?$temp[6]:'';
			$c++;
		}
		return $d;
	}
}
?>