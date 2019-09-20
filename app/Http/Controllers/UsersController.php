<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest as Request;
use App\Models\User;

/**
 *  Class UsersController
 *
 *  @package    App\Http\Controllers
 *  @author     Arslan Ali
 *  @email      marslan.ali@gmail.com
 *
 */
class UsersController extends Controller
{

    /**
     * Sending request to a user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invite($id){

        $invitee = User::find($id);

        if(!$invitee)
            return response()->json(['status'=>'error', 'message'=>'Requested Invitee Not Found!']);

        $invited = $invitee->invite();

        if(!$invited)
        {
            return response()->json([
                'status'    =>  'error',
                'message'   =>  'Could not invite '. $invitee->name.'! Please try again.'
            ]);
        }

        return response()->json([
            'status'    =>  'error',
            'message'   =>  $invitee->name.' invited successfully'
        ]);
    }

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
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
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
     * @param  \App\Http\Requests\UserRequest  $request
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


}
