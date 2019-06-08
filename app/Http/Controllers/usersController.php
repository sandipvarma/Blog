<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use DB;
use Session;



class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	#dd($request);
        return view('app.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'=>'required',
          //  'email_id'=> 'required',
			'password'=>'required',
			'role'=> 'required',
			'email_id' => 'unique:users,email_id'
        ]);
		 $user = new users([
			'name' => $request->get('name'),
			'email_id'=> $request->get('email_id'),
			'password'=> $request->get('password'),
			'user_role'=> $request->get('role'),
		]);
		$user->save();
		return redirect('/user/login');
		
	 }
	 
	  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
	   return view('app.login');
		
	}
	
	 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logincheck(Request $request)
    {
        $data = $this->validate($request, [
            'email_id'=> 'required',
			'password'=>'required',
		]);
		$user = DB::table('users')->where('email_id', $request->get('email_id'))->where('password', $request->get('password'))->first();
		
		if(!empty($user)){
			session(['user' => $user ]);
			//dd( Session::get('user'));
			return redirect('/blog');
		}else{
			 
			return redirect('/user/login');
			
		}		
		
	 }
	 
	
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	//used for logout functionality	
	public function logout(Request $request)
	{
		
		$request->session()->flush();
        $request->session()->regenerate();

		return redirect('/blog');
	}
}
