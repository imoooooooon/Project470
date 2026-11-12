@extends('layouts.app')
@section('content')
<section class="hero"><p class="text-uppercase fw-bold text-success">কৃষকের পাশে, প্রতিদিন</p><h1 class="display-4 fw-bold">আপনার কৃষি, আপনার বাজার।</h1><p class="lead mt-4">ফসল, বাজারদর ও কৃষিসেবার জন্য এক জায়গা।</p><p class="text-muted">প্রাথমিক সংস্করণ: এখন অ্যাকাউন্ট তৈরি ও লগ ইন করা যাবে। অন্যান্য সেবা তৈরি হচ্ছে।</p><a class="btn btn-success btn-lg mt-3" href="{{ route('register') }}">শুরু করুন</a></section>
<div class="row g-3">@foreach(['ফসলের বাজার','স্থানীয় বাজারদর','গবাদিপশুর তথ্য','কৃষিকাজের সুযোগ'] as $title)<div class="col-sm-6 col-lg-3"><article class="card p-4 h-100"><h2 class="h5">{{ $title }}</h2><span class="text-muted">শীঘ্রই আসছে</span></article></div>@endforeach</div>
@endsection
