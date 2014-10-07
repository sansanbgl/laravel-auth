@extends('layouts.general')
@section('content')
<h1>Selamat Datang</h1>
@if (Auth::check())
<p>Anda login sebagai <strong>[{{ Auth::user()->getGroupRole()->name }}]</strong></p>
@else
<p>Silakan <a href="{{ URL::to('login') }}">login</a> terlebih dahulu.</p>
@endif
@stop