<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = \App\User::paginate(9);
        return view('admin/userPeople/user')
            ->with('users' , $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = \App\User::where('id','=', $id)->get();
        return view('admin/userpeople/userShow')
            ->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	if(Auth::check()==true)
	    {
	        if(Auth::user()->role === 'teacher')
		    {
		        $user = \App\User::find($id);
		        return view('admin/userpeople/userEdit')
		            ->with('user', $user);
		    }
		    else
		    {
		        $user = \App\User::find(Auth::user()->id);
		        return view('userEdit')->with('user', $user);
		    }
	    }
	    return redirect()->action('PagesController@index');
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
        $user = \App\User::find($id);


        $user->house_id = $request->house_id;
        $user->streetName = $request->streetName;
        $user->houseNumber = $request->houseNumber;
        $user->houseNumberAdd = $request->houseNumberAdd;
        $user->zipcode = $request->zipcode;

        $user->firstLogin = 1;

        $user->save();
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
