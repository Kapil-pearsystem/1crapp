<?php

namespace App\Http\Controllers;

use App\Models\SubscribeModel;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribers = SubscribeModel::where('agent_id', auth()->user()->id)->orderBy('id','DESC')->get(); // Fetch all subscribers from the database
        return view('subscribe.index', compact('subscribers')); // Return the view with the data
    }
}
