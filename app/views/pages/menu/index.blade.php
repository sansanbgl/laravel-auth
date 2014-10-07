@extends('layouts.general')
@section('content')
<h1>Daftar Menu</h1>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('menu/manage') }}" class="btn btn-primary" title="Kelola"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Kelola</a>
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
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('menu/manage') }}" class="btn btn-primary" title="Kelola"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Kelola</a>
    </div>
    <div class="col-md-10 text-right">{{ $data['items']->links() }}</div>
</div>
@stop