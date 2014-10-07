@extends('layouts.general')
@section('content')
<h1>Rincian Basic</h1>
    <?php $item = $data['item']; ?>
    @if ($item != null)
    <a href="{{ URL::to('basic/update/' . $item->id) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="{{ URL::to('basic/delete/' . $item->id) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
    @endif
    <a href="{{ URL::to('basic') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
    <br><br>
    @if ($item != null)
    <table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr>
                <th></th>
                <td>{{ $item-> }}</td>
            </tr>
        </tbody>
    </table>
    @endif
@stop