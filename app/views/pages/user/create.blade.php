@extends('layouts.general')
@section('content')
<h1>Tambah Pengguna</h1>
<div class="col-md-6">


    <form action="" method="post" role="form">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="">Kata Sandi</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="">E-mail</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
            <label for="">Kontak</label>
            <input type="text" class="form-control" name="contact">
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select class="selecter form-control" name="gender">
                <option value="l">Laki-laki</option>
                <option value="p">Perempuan</option>
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
                </tbody>
            </table>
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

@section('custom_foot')
    @include('scripts.item-input-control')
    <script type="text/javascript">
        $(document).ready(function(){
            runItemInputControl(['group']);
        });
    </script>
@stop