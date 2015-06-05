<?php

class HomeController extends BaseController {

	public function showHome() {
        if(Cookie::get('domain_hash')) {
            $domain = Domain::find(Cookie::get('domain_hash'));
            $homepage = $domain->homepage ? $domain->homepage : $domain->domain;
            return View::make('home')->withHomepage($homepage);
        }else{
        	if($this->_profileExists()){
	        	$profile = $this->_getProfile() ;
	            return View::make('home')->with('profile',$profile);
            }else return Output::push(array(
							'path' => 'login',
							'messages' => array('success' => _('Please Login to Your Account')),
							)); 
        }
	}
	
	public function postIndex()
	{
        $attend = new Attend;
        $attend->user_id = $this->_getUserId();
        $attend->remote_addr = $_SERVER['REMOTE_ADDR'];
        $attend->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $attend->save();
        return Output::push(array(
							'path' => '/',
							'messages' => array('success' => _('Thank You')),
							));    
	}
	
	private function _getUserId(){
		$profile = $this->_getProfile();
		$user = User::where('profile_id',$profile->id)->first();
	    return $user->id;
	}
	
	private function _getProfile(){
		$profile = Profile::where('user_agent',$_SERVER['HTTP_USER_AGENT'])->where('remote_addr',$_SERVER['REMOTE_ADDR'])->first();
		return $profile;
	}
	
	private function _profileExists(){
		$profile = Profile::where('user_agent',$_SERVER['HTTP_USER_AGENT'])->where('remote_addr',$_SERVER['REMOTE_ADDR'])->exists();
		return $profile;
	}

}
