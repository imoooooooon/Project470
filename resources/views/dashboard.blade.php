@extends('layouts.app')
@section('content')<div class="card p-4 my-4"><h1 class="h3">স্বাগতম, {{ auth()->user()->name }}</h1><p>{{ auth()->user()->email }}</p><p>আপনার ভূমিকা: {{ auth()->user()->roles->pluck('name')->join(', ') }}</p><p class="mb-0">আপনার অ্যাকাউন্ট প্রস্তুত। কৃষিসেবাগুলো পরবর্তী ধাপে যুক্ত হবে।</p></div>@endsection
