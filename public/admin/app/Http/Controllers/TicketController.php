<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PriceModuleCategory;
use App\Models\PriceModule;

use App\Models\Trigger; 
use App\Models\Inbox; 
use App\Models\InboxChat; 

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:ticket-list|ticket-create', ['only' => ['index']]);
        $this->middleware('permission:ticket-create', ['only' => ['createtickets','addTicket']]);  
	
    }


    /**
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $inbox = Inbox::where('adminid',Auth()->user()->id)->get();
       
        return view('ticketscustomercare.index', ['inbox' => $inbox, 'admin' => 0]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function createtickets()
    { 
       
        return view('ticketscustomercare.create-tickets', [ 'admin' => 0]);
    }
    
    	public function ticketsdetails(Request $request,$issue_id)
    {
        
         $user = Auth()->user();
	   
      $input=$request->all();

      $input['user_id'] = $user->id;
      $input['issue_id'] = $issue_id;
	  $ticket 	= Inbox::GetTicket($input);
	  $chat 	= Inbox::List_comments($input);
      
      if ($ticket) {
		  
		$commentcount2['counts']		=	0;  
		$commentcount2['updated_at']	=	now();
		//DB::table('issue_tickets_comment_count')->where('user_id',$input['user_id'])->where('issue_id',request('issue_id'))->update($commentcount2); 
		
		return view('ticketscustomercare.tickets-details',compact('ticket','chat'));
      } else {
		 return redirect()->route('ticketscustomercare.ticketscustomercarelist');
      }
       
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh 
     */
    public function addTicket(Request $request)
    {
        // Validations
       	
		$request->validate([
			'subject' => 'required',
			'memberid' => 'required'
		]);
        

       DB::beginTransaction();
        try { 
             
             	
		$user = Auth()->user();
	
		$request['userid'] = $user->id;
		$members = DB::table('users')->where('memberid',$request->memberid)->first();
		$request['memberid'] = $members->id;
		$ticketsdata = array();
		if($request->hasfile('inbox_gallery'))
		{
		   foreach($request->file('inbox_gallery') as $file)
		   {
				$tickets = 'ticket-'.rand().time().'.'.$file->extension();		
				$file->move(public_path('tickets'), $tickets);
				$ticketsdata[] = $tickets;  
		   }
		}
		$request['inbox_gallerys'] = $ticketsdata;
        $input = $request->all();

        $result = Inbox::addTicket($input);
        
           
            DB::commit();
            
             if ($result == 1) { 
                 return redirect()->route('ticketscustomercare.ticketscustomercarelist')->with('success','Ticket Created Successfully.');
            } else {
    		 
    			return redirect()->back()->withInput()->with('error', 'Failed to create ticket');
    			
            }
            
            
  } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        } 
    }

    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($pricing_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'pricing_id'   => $pricing_id,
            'status'    => $status
        ], [
            'pricing_id'   =>  'required|exists:price_modules,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('triggernotification.triggernotificationlist')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            PriceModule::whereId($pricing_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('triggernotification.triggernotificationlist')->with('success','Pricing Status Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit(Trigger $trigger)
    {
       
        return view('triggernotification.edit-triggernotification')->with([
            'trigger'  => $trigger,
            'admin' => 0
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, Trigger $trigger)
    {
        // Validations
        $request->validate([
            'type'    => 'required',
            'trigger_if'     => 'required', 
            'trigger_roe'     => 'required', 
            'trigger_is'     => 'required', 
            'trigger_greater_than'     => 'required', 
            'target'     => 'required', 
            'status'     => 'required', 
        ]);

        DB::beginTransaction();
        try {
             
            // Store Data
            $trigger = Trigger::find($trigger->id);
            $trigger->type = $request->type; 
            $trigger->trigger_if = $request->trigger_if;
            $trigger->trigger_roe = $request->trigger_roe;
            $trigger->trigger_is = $request->trigger_is;
            $trigger->trigger_greater_than = $request->trigger_greater_than;
            $trigger->target = $request->target; 
            $trigger->updated_at = now();
            $trigger->status = $request->status;
            $trigger->save(); 


            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('triggernotification.triggernotificationlist')->with('success','Trigger Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function delete(Trigger $trigger)
    {
        DB::beginTransaction();
        try {
            // Delete User
            Trigger::whereId($trigger->id)->delete();

            DB::commit();
            return redirect()->route('triggernotification.triggernotificationlist')->with('success', 'Trigger Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Import Users 
     * @param Null
     * @return View File
     */
    public function importUsers()
    {
        return view('users.import');
    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'agents.xlsx');
    }

       /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function editCategoryPrices(Request $request)
    {
        $pricing = PriceModuleCategory::get();
        return view('pricing.edit-price-category')->with([ 
            'pricing'  => $pricing,
            'admin' => 1
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function updateCategoryPrices(Request $request)
    {
       /* // Validations
        $request->validate([
            'amount'    => 'required', 
        ]);
*/
        DB::beginTransaction();
        try {

            foreach($request->amount as $key=>$amountlist){
                   // Store Data
            $user_updated = PriceModuleCategory::whereId($key)->update([
                 'amount'    => $amountlist,
                
            ]); 
            }
         

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('pricing.editCategoryPrices')->with('success','Category Price Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    
      // List Issue Comments
    public function get_ticket_comment(Request $request,$issue_id)
    {
      $user = Auth()->user();
	   
      $input=$request->all();

      $input['user_id'] = $user->id;
      $input['issue_id'] = $issue_id;
	  $ticket 	= Inbox::GetTicket($input);
	  $chat 	= Inbox::List_comments($input);
      
      if ($ticket) {
		  
		$commentcount2['counts']		=	0;  
		$commentcount2['updated_at']	=	now();
		//DB::table('issue_tickets_comment_count')->where('user_id',$input['user_id'])->where('issue_id',request('issue_id'))->update($commentcount2); 
		
		return view('ticketscustomercare.tickets-details',compact('ticket','chat'));
      } else {
		 return redirect()->route('ticketscustomercare.ticketscustomercarelist');
      }
      }
      // show Ends Here

      // Add Comment starts here
      public function addTicketComment(Request $request)
      {
        $user = Auth()->user();
        
        $request->validate([
			'description' => 'required'
		]);
        $issue_id	=	request('issue_id');	
       $ticketsdata = array();
		
		if($request->hasfile('inbox_gallery'))
		{
		   foreach($request->file('inbox_gallery') as $file)
		   {
				$tickets = 'ticket-'.rand().time().'.'.$file->extension();		
				$file->move(public_path('tickets'), $tickets);
				$ticketsdata[] = $tickets;  
		   }
		}

        $input	=	$request->all();
		
		$input['media'] 	=	$ticketsdata;
		$input['user_id'] 	=	$user->id;
		
        $result = Inbox::Add_comment($input);

        if ($result==1) {
		
		$issuedata = DB::table('inbox')->where('id',request('issue_id'))->select('id','adminid')->first(); 	
		$owner_id	=	$issuedata->adminid;	 
	/*	$checkfirstcomment	=	DB::table('issue_tickets_comment_count')->where('issue_id',request('issue_id'))->where('user_id',$owner_id)->first();
		if($checkfirstcomment){
		$commentcount['counts']		=	$checkfirstcomment->counts+1;  
		$commentcount['updated_at']	=	now();
		DB::table('issue_tickets_comment_count')->where('user_id',$owner_id)->where('issue_id',request('issue_id'))->update($commentcount); 
		}else{
			
		$commentcount['counts']		=	1;
		$commentcount['user_id']	=	$owner_id;  
		$commentcount['issue_id']	=	request('issue_id'); 
		$commentcount['created_at']	=	now();
		$commentcount['updated_at']	=	now();
		DB::table('issue_tickets_comment_count')->insert($commentcount); 	
		}*/ 
		$ntext   	=   'Admin replied on the ticket';
		 
	/*	$notifydata=array();
		 
		 
		$title   	=   '(Ticket Id : '.$issue_id.') Ticket replied';
			   
		$notifydata['title']					=	$title;
		$notifydata['description']				=	$ntext;
		$notifydata['created_by']				=	$owner_id;
		$notifydata['created_from']				=	Session::get('adminuser')->id;
		$notifydata['redirect']					=	8;
		$notifydata['created_at']				=	now();
		$notifydata['status']					=	1; 
		$notifydata['notify_id']				= 	$issue_id;
		
		DB::table('notifications')->insertGetId($notifydata); */
		 

	//	return redirect('admin/ticket/ticket-detail/'.$issue_id)->with('message', 'You have successfully replied'); 
		return redirect()->route('ticketscustomercare.ticketsdetails',[$issue_id])->with('success', 'You have successfully replied.');
          
        } else {
		//	return redirect('admin/ticket/ticket-detail/'.$issue_id)->with('errormsg', 'Failed to send reply'); 
			
	    	return redirect()->route('ticketscustomercare.ticketsdetails',[$issue_id])->with('error', 'Failed to send reply.');
        }

      }

      
    public function ticketResolved($issue_id)
    {
		$user = Auth()->user();
        
        $input['user_id'] = $user->id;
        $input['id'] = $issue_id;
		 

        $result = Inbox::ticketResolved($input);
        if ($result == 1) { 

			$issuedata = DB::table('inbox')->where('id',$issue_id)->select('id','adminid')->first();
			$raiseby  = $issuedata->adminid;
		
		/*	$ntext   	=   'Ticket resolved by Admin';
						 
			$notifydata=array(); 
			$title   	=   '(Ticket Id : '.$issue_id.') Ticket Resolved';
				   
			$notifydata['title']					=	$title;
			$notifydata['description']				=	$ntext;
			$notifydata['created_by']				=	$raiseby;
			$notifydata['created_from']				=	Session::get('adminuser')->id;
			$notifydata['redirect']					=	8;
			$notifydata['created_at']				=	now();
			$notifydata['status']					=	1;  
			$notifydata['notify_id']				=	$issue_id;  
			
			DB::table('notifications')->insertGetId($notifydata); */

		//	return redirect('admin/ticket/ticket-list')->with('message', 'You have successfully replied'); 
				return redirect()->route('ticketscustomercare.ticketsdetails')->with('success', 'You have successfully replied.');
  
         
        } else { 
			
	    	return redirect()->route('ticketscustomercare.ticketsdetails',[$issue_id])->with('error', 'Failed to close ticket.');
  
        }

    
	}


}
