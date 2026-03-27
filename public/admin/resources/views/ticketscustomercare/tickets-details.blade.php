
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')



<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ticket Detail</h1>
        <a href="{{ route('ticketscustomercare.ticketscustomercarelist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        

        <div class="no-gutter_t">



            <div class="col-lg-12">
                <form action="{{ route('ticketscustomercare.addTicketComment') }}" method="post" class="form-horizontal" enctype="multipart/form-data" id="msform">
                    @csrf
                     <input type="hidden" name="issue_id" value="{{ $ticket->id }}" >
							 
                        
                    <div class="card-body">
					
				    <div class="tkc_dtlls">
					 <div class="top_araea_bxxs">
						<h5>{{ $ticket->name }} #{{ $ticket->ticket_number }}</h5>
						<p>
						<!--	15 Feb, 2024<span class="pdl_8">2:39 PM</span>
							<span class="opn_sss_vwe">Open</span>-->
							
							@php 
                			 try{
                              $tz = timezone_open('asia/kolkata');
                              $dateTimeOslo=date_create("now",timezone_open("UTC"));
                              $different = timezone_offset_get($tz,$dateTimeOslo);
                              $different= abs($different);
                              if($different > 0){
                                $timestamp = strtotime($ticket->created_at) + $different;
                              } else {
                                 $timestamp = strtotime($ticket->created_at) - $different;
                              }
                              $created_at = date('d M, Y',$timestamp).'<span class="pdl_8">'.date('g:i A',$timestamp). '</span>';
                            }        
                            catch(Exception $e) {
                              $created_at = $ticket->created_at;
                            } @endphp
                			  <?php echo $created_at ?> @if($ticket->status=='Active') <span style="
                    background: #ffcc00;
                    border-radius: 20px;
                    padding: 5px 11px;
                    box-shadow: none;
                    font-size: 14px;
                    margin-left: 10px;
                    font-weight: 400;
                    color: #fff;
                ">{{ $ticket->status }}</span>
                   @else           <span style="
                    background: #28a745;
                    border-radius: 20px;
                    padding: 5px 11px;
                    box-shadow: none;
                    font-size: 14px;
                    margin-left: 10px;
                    font-weight: 400;
                    color: #fff;
                ">Closed</span> @endif

						</p>
					 </div>

					 <div class="mb-0 snd_rp">
						<a href="#sendrp"><button type="submit" class="blkcol_cn">Send Reply</button></a>
					 </div>
					</div>
				
					
						@if(count($chat)>0)
					<!---- Chat Listst ---->
					   <div class="chat_liststs">
					<div class="chat-history">
						<ul>
						     @foreach ($chat as $data)
						     
						     @if($data->user_id==$ticket->adminid)
							 <li class="clearfix">
								<div class="message-data text-right">
									<span class="message-data-time">{{date('h:i A, d M Y ',strtotime($data->created_at))}} </span> &nbsp; &nbsp; <span class="message-data-name"> You </span>
									@if(Auth()->user()->profile_pic)
									<div class="imgUp_s1 mngbx_s1">
										<div class="ac_imagePreview_s1">
											<div class="bgr_set">
												<div class="crop no-rout" style="background-image: url('{{ URL::asset('profile/'.Auth()->user()->profile_pic)}}'); background-size: cover; background-position: center; border-radius: 100%;"></div>
											</div>
										</div>
									</div>
									@endif
								</div>
								@if($data->type==0)
									<div class="message other-message float-right com-text">{{ $data->comment }}</div>
								@else
								<div class="message other-message float-right">
									<a class="img-fluid img-thumbnail1" href="{{ URL::asset('tickets/'.$data->media)}}" data-lightbox="gallery-set" data-title="">
										<img class="img-fluid img-thumbnail1" src="{{ URL::asset('tickets/'.$data->media)}}" alt="img" />
									</a>
								</div>
								@endif
							</li>
							
							 
							
							@else 
							
								<li>
								<div class="message-data">
									<span class="message-data-name">
									    @if($data->profile_image)
										<div class="imgUp_s2 mngbx_s2">
											<div class="ac_imagePreview_s2">
												<div class="bgr_set">
													<div class="crop no-rout" style="background-image: url('{{ URL::asset('upload/profile/'.$data->profile_image)}}'); background-size: cover; background-position: center; border-radius: 100%;"></div>
												</div>
											</div>
										</div>
										@endif
										{{ $data->name }}
									</span>
									<span class="message-data-time">{{date('h:i A, d M Y ',strtotime($data->created_at))}} </span>
								</div>
								@if($data->type==0)
								
								<div class="message my-message com-text">{{ $data->comment }}</div>
							
								@else
									<div class="message my-message">
									<div class="row">
										<div class="col-sm-6 col-lg-4 m-t-10">
											<a class="img-fluid img-thumbnail1" href="{{ URL::asset('tickets/'.$data->media)}}" data-lightbox="gallery-set" data-title="">
												<img class="img-fluid img-thumbnail1" src="{{ URL::asset('tickets/'.$data->media)}}" alt="img" />
											</a>
										</div>
									</div>
								</div>
								@endif
							</li>
							 
							
							
							@endif
							
							@endforeach
							
						</ul>
					 
					</div>
				</div>
            <!---- End Chat Listst ---->
					@endif
					
                    @if($ticket->status=='Active')
					<!---- Message Area ---->
                        <div class="form-group row mt-4">
                            <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                                <span style="color: red;">*</span>Message
                                <textarea id="" name="description" class="form-control form-control-user" rows="6" cols="50" required="required"></textarea>
                            </div>

                            <div class="col-sm-12 mb-3 mt-3 mb-sm-0 upldds">
                                <span style="color: red;">&nbsp;</span>Attach Files (Only Image)
                                <input type="file" id="" placeholder="File Upload" name="inbox_gallery[]" value="" multiple  class="form-control form-control-user"   />
                            </div>

                            <div class="col-sm-12 mb-3 mt-4 mb-sm-0">
                                <button type="submit" class="btn btn-success btn-user mb-3 blkcol_cn">Send Reply</button>
                            </div>
                        </div>
                        
                        @endif
					<!---- Message Area ---->	
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection