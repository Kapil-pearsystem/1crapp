@extends('layouts.app')

@section('title', 'Form List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form List</h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('form.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Form</a>
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
                                <th>Form Name</th>
                                <th>Source </th>
                                <th>List </th>
                                <th>Tag</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
                            <tr>
                              <td>{{ ++$key }}</td>
                              <td title="Copy Embeded Code"  style="cursor: pointer;">{{ $list->form_name }} |&ensp; <i class="fa fa-code copy-icon text-info" data-url="#" aria-hidden="true" onclick="getEmbededCode({{ $list->id }})" data-toggle="modal" data-target="#embeded_code"></i>&ensp;</td>
                              <th>{{ $list->source_name }}</th>
                              <td>{{ $list->list_name }}</td>
                              <td>{{ $list->tag_name }}</td>
                              <td>{{ date('F d, Y',strtotime($list->created_at)) }}</td>
                              <td>
                              <label class="switch">
                                <input @if($list->status==1) checked @endif  type="checkbox">
                                <small></small>
                              </label>
                              </td>
                              <td>
                                <a href="#" class="btn btn-info bnt_alsss"  onclick="getEmbededCode({{ $list->id }})" data-toggle="modal" data-target="#view_form"><i aria-hidden="true" class="fa fa-eye"></i></a>
                                <a href="{{ route('form.edit',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
                                <a href="{{ route('form.delete',[$list->id]) }}" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger bnt_alsss"><i aria-hidden="true" class="fas fa-trash-alt"></i></a>
                              </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="embeded_code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body position-relative">
        <!-- Close Button -->
        <button type="button" class="btn btn-primary rounded-circle border-2 position-absolute close" data-dismiss="modal"  aria-label="Close"
          style="top: 10px; right: 10px; width: 40px; height: 40px;">
          <span aria-hidden="true">&times;</span>
        </button>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="codeTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="copy-tab" data-bs-toggle="tab" data-bs-target="#copy" type="button" role="tab" aria-controls="copy" aria-selected="true">
              Copy Code
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="true">
              View Form
            </button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content p-3" id="codeTabsContent" style="min-height:400px;">
          <!-- Copy Code Tab -->
          <div class="tab-pane fade show active" id="copy" role="tabpanel" aria-labelledby="copy-tab"  style="min-height:400px;">
            <textarea class="form-control embeded_codeclass" id="copyCode" rows="5" readonly  style="min-height:400px;">

            </textarea>
            <button class="btn btn-primary mt-2" onclick="copyToClipboard()">Copy to Clipboard</button>
          </div>

          <!-- View Code Tab -->
          <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab"  style="min-height:400px;">
            <div class="code-preview bg-light p-3 embeded_formclass"  style="min-height:400px;">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade " id="view_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-body position-relative">
        <!-- Close Button -->
        <button type="button" class="btn btn-primary rounded-circle border-2 position-absolute close" data-dismiss="modal"  aria-label="Close"
          style="top: 10px; right: 10px; width: 40px; height: 40px;">
          <span aria-hidden="true">&times;</span>
        </button>

        <!-- Tab Content -->
        <div class="tab-content p-3 embeded_formclass" style="min-height:400px;">
        </div>
      </div>
    </div>
  </div>
</div>




@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>


new DataTable( '#example-table-theme', {
    paging: true,

} );


</script>


@endsection
<script>
    function getEmbededCode(form_id){
    $.ajax({
        url: '{{ route('form.get-embeded-code') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            form_id: form_id,
        },
        success: function (response) {
            if(response.status == true){
                $('.embeded_codeclass').html(response.html);
                $('.embeded_formclass').html(response.form);
            } else {
                let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Items Found!</h3></div></div>';
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
}
function copyToClipboard() {
  const copyText = document.getElementById("copyCode");
  copyText.select();
  document.execCommand("copy");
  alert("Code copied to clipboard!");
}
</script>