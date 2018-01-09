<?php

namespace App\Http\Controllers;

use App\Mail\Vouchers;
use App\User;
use App\voucher;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Faker;
use App\Voucher_used;


class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher_used::all();
        return view('admin/vouchers/voucherUsed')->with('vouchers', $vouchers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('admin/vouchers/voucherAdd')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = Faker\Factory::create('nl_NL');
        $code = $faker->isbn10();
        $shopLink = env('APP_URL', 'http://amo.rocks/shop');

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
                Mail::to($user->email)->queue(new Vouchers($user->firstName, $user->lastName, $code, $request->codeValue, $request->startDate . ' 00:00:01', $request->endDate . ' 23:59:59', $shopLink,public_path() . '/img/voucher_top.png', public_path() . '/img/voucher_botom.png'), function ($message){

                }  );
            }
        }
        else{
            $oneUser = \App\User::find($request->userId);
            Mail::to($oneUser->email)->queue(new Vouchers($oneUser->firstName, $oneUser->lastName, $code, $request->codeValue, $request->startDate . ' 00:00:01', $request->endDate . ' 23:59:59', $shopLink, public_path() . '/img/voucher_top.png', public_path() . '/img/voucher_botom.png'), function ($message){

            }  );
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(voucher $voucher)
    {
        //
    }
}
