@extends('layouts.app')

@section('title', 'Roles')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Roles</h1>
        
        <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary" >
            <i class="fas fa-plus"></i> Add Role
        </a>
          
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="roles-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="48%">Roles</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($roles as $role)
                           <tr>
                               <td>{{$role->name}}</td>
                               <td style="display: flex">
                                   <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-primary m-2">
                                        <i class="fa fa-pen"></i>
                                   </a>
                                   <a class="btn btn-danger m-2 deleteBtn" 
                                       href="#" 
                                       data-url="{{ route('roles.destroy', $role->id) }}"
                                       data-toggle="modal" 
                                       data-target="#deleteModal">
                                        <i class="fas fa-trash"></i>
                                    </a>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>

</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Yes, Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).on("click", ".deleteBtn", function () {
        var url = $(this).data("url");
        $("#deleteForm").attr("action", url);
    });
</script>
<script>
 

new DataTable( '#roles-dataTable', {
    paging: true,
    
} );
</script> 
@endsection