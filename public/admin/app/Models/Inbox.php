<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Inbox extends Model
{

    use HasFactory;
    protected $table = 'inbox';
    public $timestamps = true;
   // protected $fillable = ['id', 'name', 'content', 'isread','userid','status', 'created_at', 'updated_at'];
   
    public static function addTicket($data)
    {

            DB::beginTransaction();
           try {
			   
				$user_id 		= $data['userid'];
				$memberid 		= $data['memberid'];
				$cat_name 		= $data['subject']; 
				$description 	= $data['description']; 
				
				$issuedata['userid'] 		= $memberid;
				$issuedata['adminid'] 	= $user_id;
                $issuedata['title'] 		= $cat_name;
				$issuedata['description']	= $description; 
                $issuedata['status']		= 'Active';
				$issuedata['updated_at'] 	= now();
                $issuedata['created_at'] 	= now();
				$txn32 = DB::table('inbox')->insertGetId($issuedata);
				$uissuedatatid 	= 100000 + $txn32;
				$uissuedata['ticket_number'] 	= 'ST'.$uissuedatatid;
				DB::table('inbox')->where('id',$txn32)->update($uissuedata);
 
				if (!empty($data['inbox_gallerys']) && $txn32)
						{
							
							

							$files=$data['inbox_gallerys'];                    
							$DgalleryData=array();
							$DgalleryData2=array();
							foreach($files as $file)
							{
								$item=array();						
								if($file!='')
								{												
									$item['issue_id']	=	$txn32;							
									$item['image']		=	$file;	
									$item['updated_at'] = 	now();
									$item['created_at'] = 	now();					
									$DgalleryData[]		=	$item;
									
									$item2=array();						
					 											
									$item2['issue_id']	=	$txn32;
									$item2['user_id']	=	$user_id;
									$item2['message_by']	=	'admin';
									$item2['comment']	=	$file;
									$item2['media']		=	$file;
									$item2['type']		=	1;	
									$item2['created_at'] =	now();
									$item2['updated_at'] =	now();				
									$DgalleryData2[]		=	$item2;
								}						
							}
						   if(!empty($DgalleryData))
						   {
							 DB::table('inbox_gallery')->insert($DgalleryData);	
		 		
						   }
						    if(!empty($DgalleryData2))
						   {
							 DB::table('inbox_chat')->insert($DgalleryData2);
		 		
						   }
						}
				 
 
			/*	$ntext   	=   'New ticket created by admin';
						 
				$notifydata=array();
				$title   =   '(Ticket Id : '.$txn32.') New Ticket';
					   
				$notifydata['title']					=	$title;
				$notifydata['description']				=	$ntext;
				$notifydata['created_by']				=	$memberid;
				$notifydata['redirect']					=	8;
				$notifydata['created_at']				=	now();
				$notifydata['status']					=	1; 
				$notifydata['notify_id']				= 	$txn32;
				
				DB::table('notifications')->insertGetId($notifydata); */
		
				DB::commit();
				return 1;
            } catch (\Exception $e) {
                DB::rollback();
               return 0;
           }

    }
 
	
    public static function ticketResolved($data)
    {

            DB::beginTransaction();
           try {
			   
				$id 		= $data['id'];
				$user_id 	= $data['user_id'];
				
				$issuedata['status']		= 'Resolved';
				$issuedata['resolved_by']	= $user_id;
				$issuedata['updated_at'] 	= now();
                $txn1 = DB::table('inbox')->where('id',$id)->update($issuedata);
				  
				DB::commit();
				return 1;
            } catch (\Exception $e) {
                DB::rollback();
               return 0;
           }

    }
	
    public static function UserTicketList($data)
    {	  
		$result = DB::table('inbox')
				->join('users','users.id','inbox.userid')
				->select('inbox.*');
			   
if($data['search']!='')
   {		
		$q=$data['search'];		
		$result->where(function ($query) use($q) {	
			$query->where('inbox.title','like','%'.$q.'%');
			$query->Orwhere('inbox.ticket_number','like',$q);
				 				
	   });
   } 			  	 
			   $result->orderBy("inbox.id",'desc');
						
						
			   $res =  $result->paginate(10);	
								
			   return $res;	
    }
	
    public static function GetTicket($data)
    {
		
			$results0	=	DB::table('inbox')
								->where('inbox.id',$data['issue_id'])
								->select('inbox.*','inbox.title as name')
								->orderBy('inbox.id','desc')->first(); 
			if(!$results0){
			    	return ''; 
			}			
			$issueGallery = DB::table('inbox_gallery')
								->select('id','image')
								->where('issue_id',$results0->id)
								->get();
			$results0->issueGallery	=	$issueGallery;		

		 
			
			return $results0;
			
	}
	 
    public static function List_comments($input) 
    {
    	$issue_id	=	$input['issue_id']; 
		$list		=	DB::table('users')
							->join('inbox_chat', 'inbox_chat.user_id', '=', 'users.id')
							->where('inbox_chat.issue_id','=',$issue_id)
							->select("users.name","users.profile_image", "inbox_chat.type", "inbox_chat.comment", "inbox_chat.media", "inbox_chat.created_at", "inbox_chat.user_id")
							->orderBy('inbox_chat.id','desc')
							->get();
				
			 
      	return $list;
    }

 
    public static function Add_comment($input)
    {
    	$u_id = $input['user_id'];
		$i_id = $input['issue_id'];
		$comm = $input['description'];
		$media = $input['media']; 
	      DB::beginTransaction();
	      try{
	        $tic['issue_id']	= $i_id;
	        $tic['user_id']	= $u_id;
			$tic['comment'] = $comm;
			if(!$media){
				$tic['media'] = '';
			}
			$tic['type'] = 0;	
	        $tic['created_at'] = now();
	        $tic['updated_at'] = now(); 
			DB::table('inbox_chat')->insertGetID($tic);
			
			if($media){

				$DgalleryData=array();
					foreach($media as $values)
					{
						$item=array();						
					 											
						$item['issue_id']	=	$i_id;
						$item['user_id']	=	$u_id;
						$item['comment']	=	$values;
						$item['media']		=	$values;
						$item['type']		=	1;	
						$item['created_at'] =	now();
						$item['updated_at'] =	now();				
						$DgalleryData[]		=	$item;
					 					
				}
 
			DB::table('inbox_chat')->insert($DgalleryData);
			}
	        DB::commit();
	        return 1;
			}catch (\Exception $e) {
	  			DB::rollback();
	  			return 0;
	  		}
    }
	
	
	public static function getUserTicketCount($userid)
    {
		
			$results0	=	DB::table('inbox')
								->where('inbox.adminid',$userid)
								->select('inbox.id')->count(); 
			 
 
			return $results0;
			
	}
}