<?php 
class cat extends CI_Controller {
	function __construct(){
		parent::__construct();
	}


	function index(){


		function category_list( $pid = 0 ) 
		{ 

		    // build our category list only once 
		    static $cats; 

		    if ( ! is_array( $cats ) ) 
		    { 

		        $sql  = 'SELECT * FROM `profil_menu`'; 
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

		    foreach ( $cats as $cat ) 
		    { 

		        // if not a match, move on 
		        if ( ( int ) $cat['pid'] !== ( int ) $pid ) 
		        { 
		            continue; 
		        } 

		        // open the list item 
		        $list_items[] = '<li>'; 

		        // construct the category link 
		        $list_items[] = '<a href="#' . $cat['id'] . '">'; 
		        $list_items[] = $cat['name']; 
		        $list_items[] = '</a>'; 

		        // recurse into the child list 
		        $list_items[] = category_list( $cat['id'] ); 

		        // close the list item 
		        $list_items[] = '</li>'; 

		    } 

		    // convert to a string 
		    $list_items = implode( '', $list_items ); 

		    // if empty, no list items! 
		    if ( '' == trim( $list_items ) ) 
		    { 
		        return ''; 
		    } 

		    // ...otherwise, return the list 
		    return '<ul>' . $list_items . '</ul>'; 

		}  

		echo category_list();  
	}

}
?>