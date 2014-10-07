@extends('layouts.general')
@section('content')
<h1>Daftar Grup</h1>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('group/manage') }}" class="btn btn-primary" title="Kelola"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Kelola</a>
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
            <th>Nama Grup</th>
            <th class="col-md-1">Level Grup</th>
            <th class="col-md-1">Enabled</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = $data['items']->getFrom(); ?>
    @foreach ($data['items'] as $item)
        <tr>
            <td class="text-center">{{ $i++ }}</td>
            <td><a href="{{ URL::to('group/detail/' . $item->id) }}" title="">{{ $item->name }}</a></td>
            <td class="text-center">{{ $item->level }}</td>
            <td class="text-center">{{ $item->enabled ? 'Ya' : 'Tidak' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('group/manage') }}" class="btn btn-primary" title="Kelola"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Kelola</a>
    </div>
    <div class="col-md-10 text-right">{{ $data['items']->links() }}</div>
</div>
@stop