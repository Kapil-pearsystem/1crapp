@extends('layouts.app')

@section('title', 'Product Inspection List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Inspection</h1>

        <a href="{{ route('productservices.inspection.add', $product_id) }}"
           class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add Inspection
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive swich_bntts">
                <table class="table table-bordered" id="inspection-table" width="100%">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Product ID</th>
                            <th>Bullet Points</th>
                            <th>YouTube</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($inspections as $key => $inspection)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $inspection->product_id }}</td>

                            <td>
                                <ul style="padding-left:15px;">
                                    @if($inspection->bullet1)<li>{{ $inspection->bullet1 }}</li>@endif
                                    @if($inspection->bullet2)<li>{{ $inspection->bullet2 }}</li>@endif
                                    @if($inspection->bullet3)<li>{{ $inspection->bullet3 }}</li>@endif
                                    @if($inspection->bullet4)<li>{{ $inspection->bullet4 }}</li>@endif
                                    @if($inspection->bullet5)<li>{{ $inspection->bullet5 }}</li>@endif
                                    @if($inspection->bullet6)<li>{{ $inspection->bullet6 }}</li>@endif
                                </ul>
                            </td>

                            <td>
                                @if($inspection->youtube_embed_link)
                                    <a href="{{ $inspection->youtube_title_link ?? '#' }}"
                                       target="_blank">
                                       {{ $inspection->youtube_title ?? 'View Video' }}
                                    </a>
                                @else
                                    —
                                @endif
                            </td>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" {{ $inspection->status ? 'checked' : '' }} disabled>
                                    <small></small>
                                </label>
                            </td>

                            <td>{{ date('d-m-Y', strtotime($inspection->created_at)) }}</td>

                            <td>
                                <a href="{{ route('productservices.inspection.edit', [$inspection->product_id, $inspection->id]) }}"
                                   class="btn btn-primary bnt_alsss">
                                   <i class="fa fa-pen"></i>
                                </a>

                                <form action="{{ route('productservices.inspection.delete', [$inspection->product_id, $inspection->id]) }}"
      method="POST"
      style="display:inline-block;"
      onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger bnt_alsss">
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
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    new DataTable('#inspection-table', {
        paging: true
    });
</script>
@endsection
