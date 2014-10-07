@extends('layouts.general')
@section('content')
<h1>Kelola Menu</h1>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('menu/create') }}" class="btn btn-primary" title="Tambah"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah</a>
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
            <th style="width:40px;">No.</th>
            <th>Nama Menu</th>
            <th>URL</th>
            <th>Urutan</th>
            <th>Parent</th>
            <th class="col-md-1">Enabled</th>
            <th class="col-md-1 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = $data['items']->getFrom(); ?>
    @foreach ($data['items'] as $item)
        <tr>
            <td class="text-center">{{ $i++ }}</td>
            <td><a href="{{ URL::to('menu/detail/' . $item->id) }}" title="">{{ $item->name }}</a></td>
            <td>{{ $item->url }}</td>
            <td class="text-center">{{ $item->order }}</td>
            <td class="text-center">{{ $item->parent_id }}</td>
            <td class="text-center">{{ $item->enabled ? 'Ya' : 'Tidak' }}</td>
            <td>
                <a href="{{ URL::to('menu/update/' . $item->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{ URL::to('menu/delete/' . $item->id) }}" class="btn btn-danger btn-xs"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('menu/create') }}" class="btn btn-primary" title="Tambah"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah</a>
    </div>
    <div class="col-md-10 text-right">{{ $data['items']->links() }}</div>
</div>
@stop