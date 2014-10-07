@extends('layouts.general')
@section('content')
<h1>Rincian Pengguna</h1>
    <?php $item = $data['item']; ?>
    @if ($data['item'] != null)
    <a href="{{ URL::to('user/update/' . $item->id) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="{{ URL::to('user/delete/' . $item->id) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
    @endif
    <a href="{{ URL::to('user') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
    <br><br>
    @if ($data['item'] != null)
    <table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr>
                <th class="col-md-3">Username</th>
                <td>{{ $item->username }}</td>
            </tr>
            <tr>
                <th>Kata Sandi</th>
                <td><a href="{{ URL::to('user/change_password/' . $item->id) }}" title="">Ganti kata sandi</a></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td>{{ $item->email }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $item->address }}</td>
            </tr>
            <tr>
                <th>Kontak</th>
                <td>{{ $item->contact }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>
                    @if ($item->gender == 'l')
                    Laki-laki
                    @elseif ($item->gender == 'p')
                    Perempuan
                    @endif
                </td>
            </tr>
            <tr>
                <th>Grup</th>
                <td>
                @if ($item->group->count() == 0)
                    <span class="text-muted">Tidak terdaftar di group apapun</span>
                @endif
                @foreach ($item->group as $group)
                    <li><a href="{{ URL::to('group/detail/' . $group->id) }}">{{ $group->name }}</a></li>
                @endforeach
                </td>
            </tr>
            <tr>
                <th>Enabled</th>
                <td>{{ $item->enabled ? '<span class="label label-success">Ya</span>' : '<span class="label label-default">Tidak</span>' }}</td>
            </tr>
        </tbody>
    </table>
    @endif
@stop