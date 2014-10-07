@extends('layouts.general')
@section('content')
<h1>Tambah Hak Akses</h1>
<div class="col-md-6">


    <form action="" method="post" role="form">
        <div class="form-group">
            <label for="">Rute Hak Akses </label>
            <input type="text" class="form-control" name="route">
        </div>
        <div class="form-group">
            <label for="">Enabled</label>
            <select class="selecter form-control" name="enabled">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Simpan</button>
    </form>
</div>
@stop