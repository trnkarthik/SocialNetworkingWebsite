<?php
	// This file is the place to store all basic functions

	function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

	function redirect_to( $location = NULL ) {
            echo "reached";
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
	
	function get_all_subjects($public = true) {
		global $connection;
		$query = "SELECT * 
				FROM subjects ";
		if ($public) {
			$query .= "WHERE visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$subject_set = mysql_query($query, $connection);
		confirm_query($subject_set);
		return $subject_set;
	}
	
	function get_pages_for_subject($subject_id, $public = true) {
		global $connection;
		$query = "SELECT * 
				FROM pages ";
		$query .= "WHERE subject_id = {$subject_id} ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$page_set = mysql_query($query, $connection);
		confirm_query($page_set);
		return $page_set;
	}
	
	function get_subject_by_id($subject_id) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id=" . $subject_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($subject = mysql_fetch_array($result_set)) {
			return $subject;
		} else {
			return NULL;
		}
	}

	function get_page_by_id($page_id) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id=" . $page_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
		if ($page = mysql_fetch_array($result_set)) {
			return $page;
		} else {
			return NULL;
		}
	}
	
	function get_default_page($subject_id) {
		// Get all visible pages
		$page_set = get_pages_for_subject($subject_id, true);
		if ($first_page = mysql_fetch_array($page_set)) {
			return $first_page;
		} else {
			return NULL;
		}
	}
	
	function find_selected_page() {
		global $sel_subject;
		global $sel_page;
		if (isset($_GET['subj'])) {
			$sel_subject = get_subject_by_id($_GET['subj']);
			$sel_page = get_default_page($sel_subject['id']);
		} elseif (isset($_GET['page'])) {
			$sel_subject = NULL;
			$sel_page = get_page_by_id($_GET['page']);
		} else {
			$sel_subject = NULL;
			$sel_page = NULL;
		}
	}

	function navigation($sel_subject, $sel_page, $public = false) {
		$output = "<ul class=\"subjects\">";
		$subject_set = get_all_subjects($public);
		while ($subject = mysql_fetch_array($subject_set)) {
			$output .= "<li";
			if ($subject["id"] == $sel_subject['id']) { $output .= " class=\"selected\""; }
			$output .= "><a href=\"edit_subject.php?subj=" . urlencode($subject["id"]) . 
				"\">{$subject["menu_name"]}</a></li>";
			$page_set = get_pages_for_subject($subject["id"], $public);
			$output .= "<ul class=\"pages\">";
			while ($page = mysql_fetch_array($page_set)) {
				$output .= "<li";
				if ($page["id"] == $sel_page['id']) { $output .= " class=\"selected\""; }
				$output .= "><a href=\"content.php?page=" . urlencode($page["id"]) .
					"\">{$page["menu_name"]}</a></li>";
			}
			$output .= "</ul>";
		}
		$output .= "</ul>";
		return $output;
	}


	
	function check_user_folder_create()
	{
		// Desired folder structure
		 $structure = './users/'.$_SESSION[user_id];
		// To create the nested structure, the $recursive parameter 
		// to mkdir() must be specified.
		
		 if (!mkdir($structure, 0, true)) {
		  die('Failed to create folders...');
                 }

	}
	function get_user_name($user_id)
	{
		$user_name_query="SELECT username from users where user_id=$user_id";
		$user_name_processing=mysql_query($user_name_query);
		$user_name=mysql_result($user_name_processing,0);
		return $user_name;
	}
	function check_rand_repeat($pic_print_key,$temp_rand)
	{
		for($i=0;$i<=sizeof($pic_print_key);$i++)
		{
			if($pic_print_key[$i]==$temp_rand)
			{
			   goto a;
			}	
		}
		return 1;        //not repeating
	a:
		return 0;        // repeating
	}
	function get_profile_pic_id($user_id)
	{
		$profile_pic_query="SELECT photo_id from profile_pic where user_id=$user_id";
		
		 $profile_pic_processing=mysql_query($profile_pic_query);
		$pic_id=mysql_result($profile_pic_processing,0);
		if(!$profile_pic_processing)
		{
			return 87;
		}
		return $pic_id;

	}
	
	
?>