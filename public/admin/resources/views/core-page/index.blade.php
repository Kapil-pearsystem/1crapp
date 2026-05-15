@extends('layouts.app')
<?php
use Illuminate\Support\Str;
$scheme = request()->getScheme();
$host   = request()->getHost(); // admin.1crapp.com
if (str_starts_with($host, 'admin.')) {
    $host = substr($host, 6); // remove 'admin.'
}
$finalUrl = $scheme . '://' . $host;
$layouts = array(
    0=>'None',
    1=>'Default',
    2=>'Custom'
);
?>
@section('title', 'Core Page List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Core Page List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('core-page.create') }}" class="btn btn-sm btn-primary">
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
                            <th>Page name</th>
                            <th>Layout</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $key => $list)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $list->page_name }}

                                 @php
                                        $path = $finalUrl.'/core-page/'.$list->slug;
                                    @endphp
                                    <i class="fa fa-copy copy-icon" data-url="{{ $path }}" style="cursor:pointer;" aria-hidden="true"></i>&ensp; |&ensp;  
                                    <a href="{{ $path }}" target="_blank" class="text-right">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </td>
                                <td>{{ $layouts[$list->layout] }}</td>
                                <td>
                                    @if ($list->status == 0)
                                    <span class="badge badge-danger ">Inactive</span>
                                    @elseif ($list->status == 1)
                                    <span class="badge badge-success badge-lg">Active</span>
                                    @endif
                                </td>
                                <td>{{ $list->created_at ? $list->created_at->format('Y-m-d H:i') : '-' }}</td>
                                <td>
                                    @if($list->sections->isNotEmpty())
                                        <a href="javascript:void(0);" onclick="viewSection('{{ $list->id }}')" class="btn btn-info btn-sm">
                                            <i class="fa fa-list fa-lg" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('core-page.edit', $list->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pen fa-lg" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('core-page.delete', $list->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this record?')">
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

<div class="modal fade" id="viewSectionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sections</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Section Name</th>
                        </tr>
                    </thead>
                    <tbody id="sectionData"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<script>
function viewSection(id)
{
    $.ajax({
        url: "{{ route('core-page.view-section') }}",
        type: "GET",
        data: {
            id: id
        },
        success: function(response) {
            let html = '';
            if (response.length > 0) {
                response.forEach(function(item, index) {
                    html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>
                                <span class="badge badge-${
                                    item.type == 'hero' ? 'primary' : 'success'
                                }">
                                    ${item.type.toUpperCase()}
                                </span>
                            </td>
                            <td>${item.section_name}</td>
                        </tr>
                    `;
                });
            } else {
                html += `
                    <tr>
                        <td colspan="3" class="text-center">
                            No Sections Found
                        </td>
                    </tr>
                `;
            }
            $('#sectionData').html(html);
            $('#viewSectionModal').modal('show');
        }
    });
}
</script>
@endsection
