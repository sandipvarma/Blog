<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use DB;
use Session;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogsdata = posts::all();
		$user_data="";
		$user_data = Session::get("user");
		$user_role = "";
		if(	!empty($user_data) && $user_data != ""){
				 $user_id = $user_data->id; 
				 $user_role = $user_data->user_role; 
		}else{
				 $user_id = ""; 
		}
	//dd($user_data);
        return view('app.blogindex',array('blogsdata'=>$blogsdata,'user_id'=>$user_id,"user_role"=>$user_role));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.blogcreate');
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
            'title'=>'required',
            'description'=> 'required',
		 ]);
		 $posts = new posts([
			'title' => $request->get('title'),
			'description'=> $request->get('description'),
			]);
	     $user_data = Session::get("user");		
		 $posts->user_id = $user_data->id; 
		$posts->save();
		return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = posts::find($id);
        return view('app.blogshow', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = posts::find($id);
        return view('app.blogedit', compact('blog'));
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
        $data = $this->validate($request, [
            'title'=>'required',
            'description'=> 'required',
		 ]);
		 $blog = posts::find($id);
		 $blog->title = $request->get('title');
	     $blog->description = $request->get('description');
		 $user_data = Session::get("user");		
		 //$blog->use_id = $user_data->id;
		 $blog->updated_on = date("Y-m-d h:i:s");
		 $blog->save();
		return redirect('/blog');
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
	
}
