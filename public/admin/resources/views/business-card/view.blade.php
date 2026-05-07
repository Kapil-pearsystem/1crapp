@extends('layouts.app')
@section('title', 'Thank You')
@section('content')
<?php
use Illuminate\Support\Str;
$scheme = request()->getScheme();
$host   = request()->getHost(); // admin.1crapp.com

if (str_starts_with($host, 'admin.')) {
    $host = substr($host, 6); // remove 'admin.'
}

$finalUrl = $scheme . '://' . $host;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Business Card with form</h1>
      <a href="#" onclick="window.history.back();" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
   </div>
   {{-- Alert Messages --}}
   @include('common.alert')
   <!-- DataTales Example -->
   <div class="card shadow mb-4 business_card_items">
      <div class="businnes_main">
         <h4>Digital Business Card</h4>
         <div class="content_arara">
            <div class="mettre">
               <span class="toll_tops"><i class="fa fa-info-circle"></i></span> Your digital business card share link is: <a href="{{ $finalUrl.'/business-card' }}" target="_blank">{{ $finalUrl.'/business-card' }}</a> <span class="copy_urlss" onclick="copyToClipboard('{{ $finalUrl.'/business-card' }}')">Copy your share URL</span>
            </div>
            <div class="row">
               <div class="col-lg-3"></div>
               <div class="col-lg-6">
                  <div class="user_proff">
                     <div class="user_pickks">
                        <div class="pic_araea">
                           <img class="logo" src="{{ $business_card->photo ?? '' }}" alt="Logo" />
                        </div>
                        <h4>{{ $business_card->first_name ?? '' }} {{ $business_card->last_name ?? '' }}</h4>
                        <p>CEO</p>
                        <span>{{ $business_card->organization ?? '' }}</span>
                     </div>
                     <div class="user_list">
                        <ul>
                           <li><span class="usr_icoos"><i class="fa fa-user"></i></span><span class="cntents"><a href="javascript:void(0);">Add to Contacts</a></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-phone"></i></span><span class="cntents">{{ @$business_card->telephone }} <span class="und_txss">Phone</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-envelope"></i></span><span class="cntents"><a href="mailto:{{ @$business_card->email }}" class="al_linkss">{{ @$business_card->email }}</a> <span class="und_txss">Email</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-globe"></i></span><span class="cntents">{{ @$business_card->website }} <span class="und_txss">Official Website</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-map-marker"></i></span><span class="cntents">{{ @$business_card->city_name }}, {{ @$business_card->state_name }}, {{ @$business_card->country_name }} <span class="und_txss">Address</span></span></li>
                           <li><span class="usr_icoos"><i class="fa fa-comment"></i></span><span class="cntents"><a href="javascript:void(0);" data-toggle="modal" data-target="#chat_mesages">Talk with My AI Assistant</a></span></li>
                        </ul>
                     </div>
                     <div class="social_iconsss">
                        <h6>Connect with me on</h6>
                        <ul>
                           <li><a href="{{ @$business_card?$business_card->facebook:'javascript:void(0);' }}"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->linkedin:'javascript:void(0);' }}"><i class="fa fa-linkedin"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->twitter:'javascript:void(0);' }}"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->whatsapp:'javascript:void(0);' }}"><i class="fa fa-whatsapp"></i></a></li>
                           <li><a href="mailto:{{ @$business_card?$business_card->email:'javascript:void(0);' }}"><i class="fa fa-envelope"></i></a></li>
                           <li><a href="{{ @$business_card?$business_card->instagram:'javascript:void(0);' }}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3"></div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('URL copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>