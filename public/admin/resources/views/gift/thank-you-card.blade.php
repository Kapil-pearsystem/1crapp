@extends('layouts.app')



@section('title', 'Thank You Card')



@section('content')



<div class="container-fluid">



    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">Thank You Card</h1>

        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>

    </div>



    {{-- Alert Messages --}}

    @include('common.alert')



    <!-- DataTales Example -->

    <div class="card shadow mb-4">

        <h1>Thank You Card</h1>

    </div>



</div>



@endsection

