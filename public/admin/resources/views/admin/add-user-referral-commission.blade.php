@extends('layouts.app')

@section('title', isset($r_commission) ? 'Edit User Referral Comission' : 'Add User Referral Comission')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($r_commission) ? 'Edit User Referral Comission' : 'Add User Referral Comission' }}</h1>
        <a href="{{ route('user-referral-commission.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

   {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('user-referral-commission.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ isset($r_commission) ? $r_commission->id: '' }}"/>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Enter Points 
                        <input type="text" id="" placeholder="" name="points" value="{{ old('name', isset($r_commission) ? $r_commission->points: '') }}" required class="form-control form-control-user" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span> Status
                        <select name="status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ old('status', $r_commission->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ old('status', $r_commission->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">{{ isset($r_commission) ? 'Update' : 'Add' }}</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('user-referral-commission.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection
