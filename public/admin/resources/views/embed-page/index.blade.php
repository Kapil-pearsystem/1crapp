@extends('layouts.app')

@section('title', 'Embed Page List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Embed Page List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('embed-page.create') }}" class="btn btn-sm btn-primary">
                    <i aria-hidden="true" class="fas fa-plus"></i> ADD
                </a>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive swich_bntts">
                <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Page URL</th>
                            <th>Embed Link</th>
                            <th>Status</th>
                            <!--<th>Created By</th>-->
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $key => $list)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $list->title }}</td>
                                <td>
                                    @php
            							if(auth()->user()->custom_domain){
                                            $path = 'https://'.auth()->user()->custom_domain.'pages/'.$list->page_url;
                                        }else if(auth()->user()->subdomain){
                                            $path = 'https://'.auth()->user()->subdomain.'.1crapp.com/pages/'.$list->page_url;
                                        }
                                    @endphp
                                <i class="fa fa-copy copy-icon" data-url="{{ $path }}" style="cursor:pointer;" aria-hidden="true"></i>&ensp; |&ensp;  
                                <a href="{{ $path }}" target="_blank" class="text-right">
                                    view page >>
                                </a>
                                </td>
                                <td style="white-space:normal;">
                                    {!! Str::limit($list->embed_link, 80) !!}
                                </td>
                                <td>
                                    <span class="{{ $list->status == 'active' ? 'act_g' : 'inact_g' }}">
                                        {{ ucfirst($list->status) }}
                                    </span>
                                </td>
                                <!--<td>{{ $list->created_by ?? '-' }}</td>-->
                                <td>{{ $list->created_at ? $list->created_at->format('Y-m-d H:i') : '-' }}</td>

                                <td>
                                    <a href="{{ route('embed-page.edit', $list->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pen fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('embed-page.delete', $list->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this record?')">
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
    new DataTable('#example-table-theme', {
        paging: true,
    });
</script>
<script>
    // Select all elements with the 'copy-icon' class
    document.querySelectorAll('.copy-icon').forEach(function(icon) {
        icon.addEventListener('click', function() {
            const urlToCopy = this.getAttribute('data-url'); // Get URL from the data attribute
            navigator.clipboard.writeText(urlToCopy).then(() => {
                this.classList.remove('fa-copy'); // Remove copy icon class
                this.classList.add('fa-check', 'text-success'); // Add checkmark icon class

                // Optional: Reset the icon after a few seconds
                setTimeout(() => {
                    this.classList.remove('fa-check', 'text-success'); // Remove checkmark icon class
                    this.classList.add('fa-copy'); // Add copy icon class back
                }, 10000);
            }).catch(err => {
                console.error('Error copying text: ', err);
            });
        });
    });
</script>
@endsection
