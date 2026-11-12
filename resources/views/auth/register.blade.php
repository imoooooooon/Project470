@extends('layouts.app')
@section('content')<div class="card p-4 mx-auto my-4" style="max-width:600px"><h1 class="h3">নতুন অ্যাকাউন্ট</h1><form method="post" action="{{ route('register') }}">@csrf
<label for="name">নাম</label><input id="name" name="name" class="form-control" value="{{ old('name') }}" autocomplete="name" required maxlength="100">
<label for="email">ইমেইল</label><input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" autocomplete="email" required>
<label for="password">পাসওয়ার্ড (অন্তত ৮ অক্ষর)</label><input id="password" name="password" type="password" class="form-control" autocomplete="new-password" required minlength="8">
<label for="password_confirmation">পাসওয়ার্ড আবার লিখুন</label><input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" required minlength="8">
<fieldset class="mt-4"><legend class="h6">আপনার ভূমিকা (একাধিক নির্বাচন করা যাবে)</legend>@foreach(['farmer'=>'কৃষক','buyer'=>'ক্রেতা','worker'=>'কৃষিশ্রমিক','seller'=>'কৃষিপণ্য বিক্রেতা'] as $value=>$label)<label class="d-block mt-2"><input type="checkbox" name="roles[]" value="{{ $value }}" @checked(in_array($value, (array) old('roles', [])))> {{ $label }}</label>@endforeach</fieldset><button class="btn btn-success mt-4 w-100">অ্যাকাউন্ট তৈরি করুন</button></form></div>@endsection
