<?php 

$createRoute = route('pricing.create');
   
?>
@extends('layouts.app')

@section('title', 'Agents List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Price & Access Level</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $createRoute }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
               
                
            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All <?=$admin ? 'Admins' : 'Agents'?></h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th width="25%">Category</th>
                                <th width="15%">Status</th> 
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($PriceModule as $list)
                                <tr>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->title }}</td> 
                                    <td>
                                        @if ($list->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($list->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td> 
                                    <td style="display: flex">
                                        <?php 
                                            $s1Route = route('pricing.status', ['pricing_id' => $list->id, 'status' => 1]);
                                            $s2Route = route('pricing.status', ['pricing_id' => $list->id, 'status' => 0]);
                                            $editRoute = route('pricing.edit', ['pricing' => $list->id]);
                                        
                                        ?>
                                        @if ($list->status == 0)
                                            <a href="<?=$s1Route?>"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($list->status == 1)
                                            <?php if($admin){ ?>
                                            <a href="<?=$s2Route?>"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                            <?php } else { ?>
                                            <select  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                              <option selected disabled>Reason for Deactivation</option>
                                              <option value="{{ route('pricing.status', ['pricing_id' => $list->id, 'status' => 0, 'reason' => 'Policy Violation']) }}">Policy Violation</option>
                                              <option value="{{ route('pricing.status', ['pricing_id' => $list->id, 'status' => 0, 'reason' => 'Non Payment']) }}">Non Payment</option>
                                            </select>
                                            <?php } ?>
                                        @endif
                                        <a href="<?=$editRoute?>"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <!--<a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">-->
                                        <!--    <i class="fas fa-trash"></i>-->
                                        <!--</a>-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $PriceModule->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    
@endsection
