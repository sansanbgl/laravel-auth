@extends('layouts.general')
@section('content')
<h1>Daftar Basic</h1>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('basic/manage') }}" class="btn btn-primary" title="Kelola"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Kelola</a>
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
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $i = $data['items']->getFrom(); ?>
    @foreach ($data['items'] as $item)
        <tr>
            <td class="text-center">{{ $i++ }}</td>
            <td><a href="{{ URL::to('basic/detail/' . $item->id) }}" title="">{{ $item-> }}</a></td>
            <td>{{ $item-> }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-2">
        <a href="{{ URL::to('basic/manage') }}" class="btn btn-primary" title="Kelola"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Kelola</a>
    </div>
    <div class="col-md-10 text-right">{{ $data['items']->links() }}</div>
</div>
@stop