@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CMS</h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('cms.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add CMS
                    </a>
                    
                </div>
                
            </div>

        </div>


        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Title</th>
                                <th>Page URL</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cms as $key=>$list)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->slug }}</td>
                                    <td>
                                        @if($list->image)
                                            @php
                                                $extension = pathinfo($list->image, PATHINFO_EXTENSION);
                                                $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
                                            @endphp

                                            @if(in_array(strtolower($extension), $videoExtensions))
                                                <!-- Agar video ho to play icon ya koi thumbnail -->
                                                <a href="{{ url('img') }}/{{ $list->image }}" target="_blank">
                                                    <i class="fa fa-play-circle" style="font-size: 40px;"></i>
                                                </a>
                                            @else
                                                <!-- Agar image ho to image dikhao -->
                                                <img src="{{ url('img') }}/{{ $list->image }}" width="100px"/>
                                            @endif
                                        @else
                                            --
                                        @endif
                                    </td>
									<td style="text-wrap:wrap;"><?php echo substr(trim(strip_tags($list->description)),0,50); ?></td>
                                    <td>
                                        @if ($list->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($list->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    
									  <?php  $editRoute = route('cms.edit', ['cms' => $list->id]); ?>
									  <?php  $deleteRoute = route('cms.destroy', ['cms' => $list->id]); ?>
									 <td>
									     <a href="{{ $editRoute }}" class="btn btn-primary bnt_alsss"><i class="fa fa-pen"></i></a>
									     <a href="{{ $deleteRoute }}" 
                                           class="btn btn-danger bnt_alsss delete-btn">
                                           <i class="fa fa-trash"></i>
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


@endsection

@section('scripts')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        let url = this.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>
<script>
 

new DataTable( '#example-table-theme', {
    paging: true,
    
} );
</script> 
@endsection
