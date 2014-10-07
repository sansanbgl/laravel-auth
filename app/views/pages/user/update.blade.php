@extends('layouts.general')
@section('content')
<h1>Sunting Pengguna</h1>
<div class="col-md-6">

    @if ($data['item'] != null)
    <?php $item = $data['item']; ?>

    <form action="" method="post" role="form">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" value="{{ $item->username }}" name="username">
        </div>
        <div class="row">
            <div class="form-group col-md-5">
                <label for="">Kata Sandi</label>
                <a href="{{ URL::to('user/change_password/' . $item->id) }}" class="form-control btn btn-primary">Ganti Kata Sandi</a>
            </div>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" value="{{ $item->name }}" name="name">
        </div>
        <div class="form-group">
            <label for="">E-mail</label>
            <input type="text" class="form-control" value="{{ $item->email }}" name="email">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" value="{{ $item->address }}" name="address">
        </div>
        <div class="form-group">
            <label for="">Kontak</label>
            <input type="text" class="form-control" value="{{ $item->contact }}" name="contact">
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select class="selecter form-control" name="gender">
                <option value="l" @if ($item->gender == 'l') {{ 'selected' }} @endif >Laki-laki</option>
                <option value="p" @if ($item->gender == 'p') {{ 'selected' }} @endif >Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Grup</label>
            <div class="input-group">
                <select class="selecter form-control" name="group_id">
                    <option value="0"></option>
                @foreach ($data['groups'] as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" id="addGroup">Tambah</button>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" id="noGroup">Tidak ada group terdaftar</div>
            <table class="table table-striped table-hover table-bordered" id="group">
                <tbody>
                    <tr class="sample">
                        <td>
                            <a class="text">Nama group</a>
                            <input type="hidden" value="" name="group_ids[]">
                        </td>
                        <td class="col-md-2 text-center"><button type="button" class="btn btn-warning btn-xs removeGroup">Hapus</button></td>
                    </tr>
                @foreach ($item->group as $group)
                    <tr>
                        <td>
                            <a href="{{ URL::to('group/detail/' . $group->id) }}" class="text">{{ $group->name }}</a>
                            <input type="hidden" value="{{ $group->id }}" name="group_ids[]">
                        </td>
                        <td class="col-md-2 text-center"><button type="button" class="btn btn-warning btn-xs removeGroup">Hapus</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

@section('custom_foot')
    @include('scripts.item-input-control')
    <script type="text/javascript">
        $(document).ready(function(){
            runItemInputControl(['group']);
        });
    </script>
@stop