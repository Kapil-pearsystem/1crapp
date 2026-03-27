<!--<!DOCTYPE html>-->
<!--<html lang="en">-->

<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>1CR APP</title>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<!--    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap">-->
<!--    <link rel='stylesheet' href="{{url('')}}/css/style.css">-->
<!--    <link rel='stylesheet' href="{{url('')}}/css/buy_hold_projection-css.css">-->
<!--    <link rel='stylesheet' href="{{url('')}}/css/additional.css">-->
<!--    <meta name="_token" content="{{ csrf_token() }}"/>-->


<!--</head>-->

<!--<body>-->
<!--    @if(Auth::user())-->
<!--    <section class="shadow">-->
<!--        <div class="container">-->
<!--            <div class="nav-wrapper">-->
<!--                <div class="logo-container">-->
<!--                    <img class="logo" src="{{url('')}}/img/logo 1.png" alt="Logo">-->
<!--                </div>-->
<!--                <nav>-->
<!--                    <input class="hidden" type="checkbox" id="menuToggle">-->
<!--                    <label class="menu-btn" for="menuToggle">-->
<!--                        <div class="menu"></div>-->
<!--                        <div class="menu"></div>-->
<!--                        <div class="menu"></div>-->
<!--                    </label>-->
<!--                    <div class="nav-container">-->
<!--                        <ul class="nav-tabs">-->
<!--                        <li class="nav-tab"><a href="{{url('properties/buy-sale/list')}}">Home</a></li>-->
<!--                            <li class="nav-tab">About Us</li>-->
<!--                            <li class="nav-tab">How it works</li>-->
<!--                            <li class="nav-tab">Price</li>-->
<!--                            <li class="nav-tab">FAQ</li>-->
<!--                            <li class="nav-tab">Contact Us</li>-->
<!--                            <li class="nav-tab"><a href="{{url('setting')}}">Setting</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </nav>-->
<!--                <a href="{{url('logout')}}" class="btn btn-primary px-4">Logout</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!--    @endif-->

@include('front.layouts.user-header')
