@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Role</h1>
        <a href="{{route('roles.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
         
        <div class="card-body">
            <form method="POST" action="{{route('roles.update', ['role' => $role->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group row">

                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>Role</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                            id="exampleName"
                            placeholder="Name" 
                            name="name" 
                            value="{{ old('name') ? old('name') : $role->name }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label for="checkAllPermissionsss"> <span style="color:red;">*</span> Permissions</label>
                        <input type="checkbox" name="check-all" class="form-contol" id="checkAllPermissions" {{ (count($permissions) == count($role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}/> <label for="checkAllPermissions">All</label>
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach ($permissions as $permissionIndex => $permission)
                                    <div class="form-check form-check-inline" style=" width: 23%;">
                                        <input class="form-check-input permission-input" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} type="checkbox" name="permissions[]" id="inlineCheckbox_{{$permissionIndex}}"  value="{{$permission->id}}">
                                        <label class="form-check-label" for="inlineCheckbox_{{$permissionIndex}}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Save Button --}}
                <button type="submit" class="btn btn-success btn-user btn-blocvvk">
                    Update
                </button>

            </form>
        </div>
    </div>

</div>


@endsection


@section('scripts')
<script>
    $("#checkAllPermissions").click(function(){
        $('.permission-input').not(this).prop('checked', this.checked);
    });
</script>
@endsection