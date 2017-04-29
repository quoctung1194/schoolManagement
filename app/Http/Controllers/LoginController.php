<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class LoginController extends Controller
{
	public function __construct()
	{
		$this->view_url = 'admins.login';
	}
	
	public function index()
	{
		return $this->view('index');
	}
	
	public function login(Request $request)
	{
		if (\Auth::attempt(['name' => $request->username, 'password' => $request->password]))
		{
			return redirect()->route('AS-001');
		}
		else 
		{
			return redirect()->route('LG');
		}
	}
	
	public function logout()
	{
		\Auth::logout();
		return redirect()->route('LG');
	}
}