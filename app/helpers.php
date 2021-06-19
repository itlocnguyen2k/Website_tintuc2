<?php 
	use Illuminate\Support\Facades\Auth;

	if(!function_exists('user_login')){
		function user_login()
		{
			if(Auth::check())
			{
				$user1 = Auth::user();
				return $user1;
			}	
		}
	}
 ?>