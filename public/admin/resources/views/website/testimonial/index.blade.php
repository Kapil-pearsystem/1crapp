@extends('layouts.app')

@section('title', 'Testimonials')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Testimonials</h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('web.testimonial.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Testimonials</a>
                    <!--<a href="{{ route('customer.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>-->
                </div>

            </div>

        </div>

   {{-- Alert Messages --}}
    @include('common.alert')


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive swich_bntts">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>About</th>
                                <th>Rating</th>
                                <th>Contact</th>
                                <th>Video</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key => $testimonial)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->designation }}</td>
                                <td>{{ $testimonial->company }}</td>
                                <td>{{ $testimonial->location }}</td>
                                <td>{{ Str::limit($testimonial->about, 50) }}</td>
                                <td>{{ $testimonial->rating }}</td>
                                <td>{{ $testimonial->contact }}</td>
                                <td>{{ $testimonial->video }}</td>
                                <td>
                                    <img src="{{ asset($testimonial->image) }}" alt="Testimonial Image" height="50" width="50" />
                                </td>
                                <td>{{ date('d M, Y', strtotime($testimonial->created_at)) }}</td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" @if($testimonial->status == 1) checked @endif>
                                        <small></small>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{ route('web.testimonial.edit', [$testimonial->id]) }}" class="btn btn-primary">
                                        <i class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete this?')) { window.location.href='{{ route('web.testimonial.delete', [$testimonial->id]) }}'; }">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
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
<script>


new DataTable( '#example-table-theme', {
    paging: true,

} );
</script>
@endsection