<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    // Show feedback listing
    public function index()
    {
        $feedbacks = DB::table('tbl_app_feedback')
            ->select(
                'id',
                'overall_experience',
                'recommend_rating',
                'easy_to_manage',
                'suggestion',
                'created_at'
            )
            ->orderBy('id', 'DESC')
            ->get();

        return view('app-feedback.index', compact('feedbacks'));
    }


    
}
