@extends('layouts.app')

@section('title', isset($details) ? 'Edit Header Navigation' : 'Add Header Navigation')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Header Navigation</h1>
        <a href="{{ route('header-navigation.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('header-navigation.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="form-group row">

                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" class="form-control" required
                            value="{{ old('title', $details->title ?? '') }}" placeholder="Enter title" />
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Type</label>
                        <select class="form-control" name="is_authorized" required>
                            <option value="">Select</option>
                            <option value="0" {{ old('is_authorized', isset($details)?$details->is_authorized : 0) == 0 ? 'selected' : '' }}>Pre Login</option>
                            <option value="1" {{ old('is_authorized', isset($details)?$details->is_authorized : 1) == 1 ? 'selected' : '' }}>Post Login</option>
                            <option value="2" {{ old('is_authorized', isset($details)?$details->is_authorized : 2) == 2 ? 'selected' : '' }}>Common</option>
                        </select>
                        @error('parent_page_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Parent Page</label>
                          <select class="form-control" name="parent_page_id" onchange="checkPage()" id="parent_page_id">
                            <option value="0">Select</option>
                            @php 
                                $parent_menus = \App\Models\HeaderNavigationModel::where('tbl_header_navigation.created_by', auth()->id())
                                ->where('tbl_header_navigation.parent_page_id', 0)
                                ->where('tbl_header_navigation.status', 1)
                                ->orderBy('tbl_header_navigation.id','DESC')
                                ->get();
                            @endphp
                            @foreach($parent_menus as $menu)
                                <option value="{{ $menu->id }}" {{ old('parent_page_id', isset($details)?$details->parent_page_id:'') == $menu->id ? 'selected' : '' }}>{{ $menu->title }}</option>
                            @endforeach
                        </select>
                        @error('parent_page_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span>Page</label>
                          <select class="form-control" name="page_id" onchange="checkPage()" id="page_id">
                            <option value="">Select</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}" {{ old('page_id', isset($details)?$details->page_id:'') == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
                            @endforeach
                        </select>
                        @error('page_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                   

                    
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Priority</label>
                        <input type="number" name="priority" class="form-control" required value="{{ old('priority', $details->priority ?? '') }}" placeholder="Enter priority (e.g. 1, 2, 3)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"/>
                        @error('priority')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1" {{ old('status', isset($details)?$details->status: 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', isset($details)?$details->status: 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('header-navigation.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    function checkPage(){
        var parent_page = $('#parent_page_id').val();
        var page_id = $('#page_id').val();
        if(parent_page == page_id){
            $('#page_id').val('');
        }
        
    }
</script>
@endsection
