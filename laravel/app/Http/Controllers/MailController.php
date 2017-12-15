<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Faker\Factory as Faker;

class MailController extends Controller
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
        $faker = Faker::create('nl_NL');
        $code = $faker->isbn10();
        $this->validate($request, [
            'userOption' => 'required|string|min:1',
            'userId' => 'required|string|min:1',
            'codeValue' => 'required|int|min:1',
            'startDate' => 'required|date|before:endDate',
            'endDate' => 'required|date|after:startDate',
        ]);

        $voucher = new \App\voucher();
        if ($request->userOption == 0){
            $voucher->user_id = NULL;
        }
        else{
            $voucher->user_id = $request->userId;
        }
        $voucher->code = $code;
        $voucher->codeValue = $request->codeValue;
        $voucher->startDate = $request->startDate . ' 00:00:01';
        $voucher->endDate = $request->endDate . ' 23:59:59';
        $voucher->created_at = Now();
        $voucher->updated_at = Now();
        $voucher->save();

        if ($request->userOption == 0 && $request->userId == 0)
        {
            $users = \App\User::all();
            foreach ($users as $user)
            {
                Mail::send('email.voucher', ['user' => $user->firstName, 'code' => $code, 'startDate' => $request->startDate . ' 00:00', 'endDate' => $request->endDate . ' 23:59', 'value' => $request->codeValue], function ($message){
                    $message->to('tomaszt@hotmail.nl', 'Tomasz Tabis')->subject('Sending email laravel');
                    $message->from('amoradius@hotmial.nl', 'Radius Test');
                });
            }
        }
        else{
            $oneUser = \App\User::find($request->userId);
            Mail::send('email.voucher', ['user' => $oneUser->firstName, 'code' => $code, 'startDate' => $request->startDate . ' 00:00', 'endDate' => $request->endDate . ' 23:59', 'value' => $request->codeValue], function ($message){
                $message->to('tomaszt@hotmail.nl', 'Tomasz Tabis')->subject('Sending email laravel');
                $message->from('amoradius@hotmial.nl', 'Radius Test');
            });
        }


        return back();
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
}