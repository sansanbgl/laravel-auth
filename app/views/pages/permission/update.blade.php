@extends('layouts.general')
@section('content')
<h1>Sunting Hak Akses</h1>
<div class="col-md-6">


    @if ($data['item'] != null)
    <?php $item = $data['item']; ?>

    <form action="" method="post" role="form">
        <div class="form-group">
            <label for="">Rute Hak Akses </label>
            <input type="text" class="form-control" value="{{ $item->route }}" name="route">
        </div>
        <div class="form-group">
            <label for="">Enabled</label>
            <select class="selecter form-control" name="enabled">
                <option value="1" @if ($item->enabled == '1') {{ 'selected' }} @endif >Ya</option>
                <option value="0" @if ($item->enabled == '0') {{ 'selected' }} @endif >Tidak</option>
            </select>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Simpan</button>
    </form>
    @endif
</div>
@stop