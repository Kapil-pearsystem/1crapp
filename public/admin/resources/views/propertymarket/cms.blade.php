@extends('layouts.app')

@section('title', isset($details)?'Edit':'Add'.' Property CMS')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details)?'Edit':'Add' }} Property CMS</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <a href="{{ route('propertymarket.propertymarketlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Form for Creating OPC Resource -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('propertymarket.cms-store')}}" enctype="multipart/form-data" onsubmit="return validate()"
            name="f1">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details)?$details->id:'' }}">
            <div class="card-body" style="background: #bedafd;">
                <div class="form-group row" id="brd_box">
                    <div class="row p-4">
                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0"> Title<span class="text-danger">*</span>
                            <input type="text" id="" placeholder="Enter Popup Title" name="title"
                                value="{{ old('title') ?? ($details->title ?? '') }}"
                                class="form-control form-control-user" required/>
                        </div>

                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0"> Heading<span class="text-danger">*</span>
                            <input type="text" id="" placeholder="Enter Page Heading" name="heading"
                                value="{{ old('heading')??($details->heading ?? '')}}"
                                class="form-control form-control-user" required/>
                        </div>
                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0"> Sub Title<span class="text-danger">*</span>
                            <input type="text" id="" placeholder="Enter Page Heading" name="sub_title"
                                value="{{ old('sub_title')??($details->sub_title ?? '')}}"
                                class="form-control form-control-user" required/>
                        </div>

                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="varification_logo" >
                            Varification Logo<span class="text-danger">*</span>
                            <input type="file" id="varification_logo" placeholder="Pest URL or Link" name="varification_logo" value="{{ old('varification_logo')??($details->varification_logo ?? '')}}"  class="form-control form-control-user" @if(!isset($details->varification_logo) && empty($details->varification_logo)) required @endif/>
                            <span id="varification_logoError" class="err text-danger"></span> @if(session('varification_logo')) <span class="text-danger"> {{ session('varification_logo') }} </span> @endif
                            @if(isset($details->varification_logo) && !empty($details->varification_logo))
                                <br/>
                                <img src="{{ $details->varification_logo }}" alt="Varification Logo" width="100px" height="100px"/>  
                            @endif
                        </div>
                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="satisfaction_logo" >
                            Satisfaction Logo<span class="text-danger">*</span>
                            <input type="file" id="satisfaction_logo" placeholder="Pest URL or Link" name="satisfaction_logo" value="{{ old('satisfaction_logo')??($details->satisfaction_logo ?? '')}}"  class="form-control form-control-user"  @if(!isset($details->satisfaction_logo) && empty($details->satisfaction_logo)) required @endif/>
                            <span id="satisfaction_logoError" class="err text-danger"></span> @if(session('satisfaction_logo')) <span class="text-danger"> {{ session('satisfaction_logo') }} </span> @endif
                            @if(isset($details->satisfaction_logo) && !empty($details->satisfaction_logo))
                                <br/>
                                <img src="{{ $details->satisfaction_logo }}" alt="Satisfaction Logo" width="100px" height="100px"/>
                            @endif
                        </div>
                        <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="images" >
                            Images<span class="text-danger">*</span>
                            <input type="file" id="images" placeholder="Pest URL or Link" name="images[]" value="{{ old('images')??($details->images ?? '')}}"  class="form-control form-control-user" multiple />
                            <span id="imagesError" class="err text-danger"></span> @if(session('images')) <span class="text-danger"> {{ session('images') }} </span> @endif
                            @if(isset($details->images) && !empty($details->images))
                                <br/>
                                @foreach(json_decode($details->images) as $image)
                                    <img src="{{ $image }}" alt="Images" width="100px" height="100px"/>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <div class="card-footer"
                    style="display: inline-block; width: 100%; background: transparent; border: none; text-align: center; padding-bottom:0;">
                    <a class="btn btn-primary mb-3 mr-3" href="javascript:void(0);">Cancel</a>
                    <button type="submit"
                        class="btn btn-success btn-user mb-3">{{ isset($details)?'Update':'Save' }}</button>

                </div>
        </form>
    </div>

</div>

@endsection

<script>
    flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
    });
</script>