@extends('layouts.app')

@section('title', 'FAQ Categories')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">FAQ Categories</h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('faq.category.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> ADD</a>

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
                            <th>#</th>
                            <th>Title</th>
                            <th>priority</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($faqCategories as $key=>$category)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->priority }}</td>
                                <td>
                                    @if($category->status == 1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $category->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('faq.category.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pen fa-lg" aria-hidden="true"></i></a>

                                    <form action="{{ route('faq.category.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

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