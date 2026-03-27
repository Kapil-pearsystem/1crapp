<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\VerificationCodeMail;
use App\Mail\RegistrationSuccessfullyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserSocialNetworks;
use App\Models\UserCompanyDetails;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    
    public function user_home(){
        return view('dashboard/user-home');
    }
    public function realtors(){
        return view('dashboard/realtors');
    }
    public function investors(){
        return view('dashboard/investors');
    }
   
    
}
