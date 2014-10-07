@extends('layouts.general')
@section('content')
<h1>Ganti Kata Sandi Pengguna</h1>

<form action="" method="post" role="form">
    <div class="form-group">
        <label for="">Kata Sandi</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="">Kata Sandi Baru</label>
        <input type="password" class="form-control" name="new_password">
    </div>
    <div class="form-group">
        <label for="">Konfirmasi Kata Sandi</label>
        <input type="password" class="form-control" name="confirm_password">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Simpan</button>
</form>
@stop