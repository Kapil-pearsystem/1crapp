@extends('layouts.app')
@section('title', isset($details) ? 'Edit Form ' : 'Add Form ')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Form</h1>
        <a href="{{ route('form.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
        <form method="POST" action="{{ route('form.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
                <div class="form-group row">
                    <div class="card-body mt-5" style="background: rgb(190, 218, 253);">
                    <div id="brd_box" class="form-group row">
                <div class="col-sm-4 mb-2 mt-1 mb-sm-0"><span style="color: red;">*</span>Form Name
                <input type="text" id="" placeholder="Enter Form Name" name="form_name" value="{{ old('form_name') ?? ($details->form_name ?? '') }}" class="form-control form-control-user" /></div>


                <div class="col-sm-4 mb-3 mt-1 mb-sm-0">
                    <span style="color: red;">*</span>Tag
                    <select name="tag_id" id="tag_id"class="form-control">
                        <option value="">Select Tag</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ (old('tag_id') ?? ($details->tag_id ?? '')) == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 mb-3 mt-1 mb-sm-0">
                    <span style="color: red;">*</span>List
                    <select name="list_id" id="list_id"class="form-control">
                        <option value="">Select List</option>
                        @foreach($lists as $list)
                            <option value="{{ $list->id }}" {{ (old('list_id') ?? ($details->list_id ?? '')) == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                        @endforeach
                    </select>
                </div>

                        <div class="col-lg-7">
                    <div class="row">
                        <div class="col-sm-9 mb-2 mt-1 mb-sm-0">
                        Subscribe to Sequence
                        <select name="sequence_id" id="sequence_id"class="form-control">
                            <option value="">Select</option>
                            @foreach($sequences as $sequence)
                                <option value="{{ $sequence->id }}" {{ (old('sequence_id') ?? ($details->sequence_id ?? '')) == $sequence->id ? 'selected' : '' }}>{{ $sequence->title }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                            Enable
                            <div class="block_araea mt-1">
                                <label class="switch"><input value="1" {{ (old('sts_visible') ?? ($details->sts_visible ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="sts_visible" /> <small></small></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-sm-12 mb-2 mt-1 mb-sm-0">
                        <span style="color: red;">*</span>Source
                        <select name="source_id" id="source_id"class="form-control">
                            <option value="">Select Source</option>
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}" {{ (old('source_id') ?? ($details->source_id ?? '')) == $source->id ? 'selected' : '' }}>{{ $source->title }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="brd_box" class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Title
                            <input type="text" id="title" placeholder="Enter Title" name="title" value="{{ old('title') ?? ($details->title ?? '') }}" class="form-control form-control-user" />
                        </div>
                        <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                            Visible
                            <div class="block_araea mt-1">
                                <label class="switch"><input value="1" type="checkbox" {{ (old('title_visible') ?? ($details->title_visible ?? '')) == 1 ? 'checked' : '' }} name="title_visible" /> <small></small></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Webcome Email
                        <select name="welcome_email" id="list_id" class="form-control">
                        <option value="">Select Email Templates</option>
                        @foreach($mails as $mail)
                            <option value="{{ $mail->id }}"  {{ (old('source_id') ?? ($details->welcome_email ?? '')) == $mail->id ? 'selected' : '' }}>{{ $mail->temp_name }}</option>
                        @endforeach
                        </select>
                        </div>
                        <!-- <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Webcome Email
                            <input type="email" id="welcome_email" placeholder="Enter Welcome Email" name="welcome_email" value="{{ old('welcome_email') ?? ($details->welcome_email ?? '') }}" class="form-control form-control-user" />
                        </div> -->
                        <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                            Enable
                            <div class="block_araea mt-1">
                                <label class="switch"><input value="1" type="checkbox" {{ (old('we_visible') ?? ($details->we_visible ?? '')) == 1 ? 'checked' : '' }} name="we_visible" /> <small></small></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div id="brd_box" class="form-group row">
                <div class="col-sm-2 mb-3 mt-1 mb-sm-0">
                <span class="tx_title">Visibility :</span>
                </div>

                <div class="col-sm-10 mb-3 mt-1 mb-sm-0">
                <div class="row">
                <div class="col-lg-3">
                    <div class="mb-3 mt-1 mb-sm-0 swich_bntts">
                        CDO Filed
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" type="checkbox" name="cod_visible" {{ (old('cod_visible') ?? ($details->cod_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3 mt-1 mb-sm-0 swich_bntts">
                        P&S Filed
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" type="checkbox" name="ps_visible" {{ (old('ps_visible') ?? ($details->ps_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                <div class="mb-3 mt-1 mb-sm-0 swich_bntts">
                    Phone No.
                    <div class="block_araea mt-1">
                        <label class="switch"><input value="1" type="checkbox" name="phone_visible" {{ (old('phone_visible') ?? ($details->phone_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                    </div>
                </div>
                </div>

                <div class="col-lg-3">
                <div class="mb-3 mt-1 mb-sm-0 swich_bntts">
                    Message Box
                    <div class="block_araea mt-1">
                        <label class="switch"><input value="1" type="checkbox" name="msgbox_visible" {{ (old('msgbox_visible') ?? ($details->msgbox_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                    </div>
                </div>
                </div>
                </div>
                </div>

            </div>


                <div id="brd_box" class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Files to Deliver:
                        <select name="drivefile_id" id="list_id"class="form-control">
                        <option value="">Select File to Deliver at Email</option>
                        @foreach($filedrives as $d_file)
                            <option value="{{ $d_file->id }}" {{ (old('list_id') ?? ($details->drivefile_id ?? '')) == $d_file->id ? 'selected' : '' }}>{{ $d_file->title }}</option>
                        @endforeach
                        </select>
                        </div>

                        <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                            Enable
                            <div class="block_araea mt-1">
                                <label class="switch">
                                    <input value="1" type="checkbox" name="df_visible" {{ (old('df_visible') ?? ($details->df_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Forward Responses to:
                            <select name="forword_email" id="list_id"class="form-control">
                            <option value="" selected="selected" disabled="disabled">Select Email to forward the lead ?</option>
                            @foreach($admins as $admin)
                                <option value="{{ $admin->email }}" {{ (old('forword_email') ?? ($details->forword_email ?? '')) == $admin->email ? 'selected' : '' }}>{{ $admin->first_name.' '.$admin->middle_name.' '.$admin->last_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Forward Responses to:
                            <input type="email" id="forword_email" placeholder="Enter Forward Email" name="forword_email" value="{{ old('forword_email') ?? ($details->forword_email ?? '') }}" class="form-control form-control-user" />
                        </div> -->
                        <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                            Enable
                            <div class="block_araea mt-1">
                                <label class="switch"><input value="1" type="checkbox" name="fe_visible" {{ (old('fe_visible') ?? ($details->fe_visible  ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="brd_box" class="form-group row">
                <div class="col-sm-12 mt-1 mb-3 mb-sm-0">
                    CTA Title
                    <textarea name="cta_title" id="" class="form-control" placeholder="Enter CAT Title">{{ old('form_name') ?? ($details->cta_title ?? '') }}</textarea>
                </div>
            </div>

            <div id="brd_box" class="form-group row">
                <div class="col-sm-3 mt-1 mb-3 mb-sm-0">
                    Destination Type
                    <select name="media_type" id="media_type" onchange="setDestination(this.value)" class="form-control form-control-user">
                        <!-- <option selected="selected" disabled="disabled">Select Type</option> -->
                        <option value="assets">My Digital Assets</option>
                        <option value="page">Custom Page</option>
                        <option value="custom" selected>Custom URL</option>
                    </select>
                </div>
                <div class="col-sm-5 mb-2 mt-1 mb-sm-0" id="destination_id">Success / Destination Page URL
                    <input type="url" id="success_destination" placeholder="Enter Success / Destination Page URL" name="success_destination" value="{{ old('success_destination') ?? ($details->success_destination ?? '') }}" class="form-control form-control-user" />
                </div>
                <div class="col-sm-4 mt-1 mb-3 mb-sm-0">Status
                    <select name="status" required class="form-control form-control-user">
                        <option value="">Select Status</option>
                        <option value="0" {{ (old('status') ?? ($details->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                        <option value="1" {{ (old('status') ?? ($details->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
            </div>
            <div class="card-footer" style="display: inline-block; width: 100%; background: transparent; border: none; text-align: center; padding-bottom: 0px;">
                <a href="{{ route('form.index') }}" class="btn btn-primary mb-3 mr-3">Cancel</a>
                <button type="submit" class="btn btn-success btn-user mb-3">{{ isset($details) ? 'Update' : 'Submit' }}</button>
            </div>
            </div>
        </div>

    </form>
    <!-- </div> -->
</div>
@endsection
<script>
    function setDestination(type){
    $.ajax({
        url: '{{ route('form.get-destination') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            type: type,
        },
        success: function (response) {
            if(response.status == true){
                $('#destination_id').html(response.data);
            } else {
                let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Gift Items Found!</h3></div></div>';
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
}

</script>
