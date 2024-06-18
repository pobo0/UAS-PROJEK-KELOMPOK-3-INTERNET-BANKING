<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceInfoController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);
        
        $username = $account->username;
        $balanceInfo = Balance::where('username', $username)->first();
            
        return view("balanceInfo", compact('account', 'balanceInfo'));
    }
}