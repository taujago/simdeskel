<?php 
class perkembangan_menu extends op_controller {
	function __construct(){
				parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("sm","mm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal"); 
	}


	function index(){
		
		$data['controller'] = get_class($this);
		
		$data['header'] = "Profil Desa";
		$data['title'] = $data['header'];
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function menu($q="",$s=""){
		

		function category_list( $pid = 0,$q="") 
		{ 

		    // build our category list only once 
		    static $cats; 

		    if ( ! is_array( $cats ) ) 
		    { 
				$temp = urldecode($q);
		        $sql  = "SELECT * FROM perkembangan_desa_menu where name like '%$temp%'"; 
				//echo $sql ."<br />";
		        $res  = mysql_query( $sql ); 
		        if(!$res) {
		        	echo "erorro... " . mysql_error();
		        }
		        $cats = array(); 
		         
		        while ( $cat = mysql_fetch_assoc( $res ) ) 
		        { 
		            $cats[] = $cat; 
		        } 
		    } 

		    // populate a list items array 
		    $list_items = array(); 
			//var_dump($cats);
		    foreach ( $cats as $cat ) 
		    { 
				if(empty($q)){
					// if not a match, move on
					if ( ( int ) $cat['pid'] !== ( int ) $pid ) 
					{ 
						continue; 
					} 
					// open the list item 
					$list_items[] = '<li>'; 
	
					// construct the category link 
					if(!empty($cat['controller'])){
						$list_items[] = '<a href="'. site_url($cat['controller']) .'">'; 
						$list_items[] = $cat['name']; 
						$list_items[] = '</a>'; 
					}
					else{
						$list_items[] = $cat['name'];
					}
	
					// recurse into the child list 
					$list_items[] = category_list( $cat['id']); 
	
					// close the list item 
					$list_items[] = '</li>'; 
				}
				else{
					if(!empty($cat['controller'])){
					$list_items[] = '<li>';
					$list_items[] = '<a href="'. site_url($cat['controller']) .'">'; 
					$list_items[] = $cat['name']; 
					$list_items[] = '</a>'; 
					//$list_items[] = category_list( $cat['id'], $q);
					$list_items[] = '</li>'; 
					}
				}
		    } 

		    // convert to a string 
		    $list_items = implode( '', $list_items ); 
			
		    // if empty, no list items! 
		    if ( '' == trim( $list_items ) ) 
		    { 
		        return ''; 
		    } 
			//echo htmlentities($list_items);
		    // ...otherwise, return the list 
		    return '<ul>' . $list_items . '</ul>'; 

		}  

		echo category_list('0',$q);  
	}

}
?>