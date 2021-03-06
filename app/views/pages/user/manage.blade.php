@extends('layouts.general')
@section('content')
<h1>Kelola Pengguna</h1>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('user/create') }}" class="btn btn-primary" title="Tambah"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah</a>
    </div>
    <div class="col-md-10 text-right">{{ $data['items']->links() }}</div>
</div>
<div class="row">
    <div class="col-md-5 pull-right text-right"><strong>Total data:</strong> <span class="badge alert-info">{{ $data['items']->getTotal() }}</span></div>
</div>
<br>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th class="col-md-1">No.</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Username</th>
            <th>E-mail</th>
            <th class="col-md-1 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = $data['items']->getFrom(); ?>
    @foreach ($data['items'] as $item)
        <tr>
            <td class="text-center">{{ $i++ }}</td>
            <td><a href="{{ URL::to('user/detail/' . $item->id) }}" title="">{{ $item->name }}</a></td>
            <td>
                @if ($item->gender == 'l')
                Laki-laki
                @elseif ($item->gender == 'p')
                Perempuan
                @endif
            </td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <a href="{{ URL::to('user/update/' . $item->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ URL::to('user/delete/' . $item->id) }}" class="btn btn-danger btn-xs"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('user/create') }}" class="btn btn-primary" title="Tambah"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah</a>
    </div>
    <div class="col-md-10 text-right">{{ $data['items']->links() }}</div>
</div>
@stop