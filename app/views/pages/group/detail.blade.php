@extends('layouts.general')
@section('content')
<h1>Rincian Grup</h1>
    <?php $item = $data['item']; ?>
    @if ($data['item'] != null)
    <a href="{{ URL::to('group/update/' . $item->id) }}" class="btn btn-primary" title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="{{ URL::to('group/delete/' . $item->id) }}" class="btn btn-danger"title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
    @endif
    <a href="{{ URL::to('group') }}" class="btn btn-default" title="Kembali ke Daftar"><span class="glyphicon glyphicon-list"></span></a>
    <br><br>
    @if ($data['item'] != null)
    <table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr>
                <th class="col-md-3">Nama Grup</th>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <th class="col-md-3">Level Grup</th>
                <td>{{ $item->level }}</td>
            </tr>
            <tr>
                <th>Hak Akses</th>
                <td>
                @if ($item->permission->count() == 0)
                    <span class="text-muted">Tidak terdaftar di permission apapun</span>
                @endif
                @foreach ($item->permission as $permission)
                    <li><a href="{{ URL::to('permission/detail/' . $permission->id) }}">{{ $permission->route }}</a></li>
                @endforeach
                </td>
            </tr>
            <tr>
                <th>Menu</th>
                <td>
                @if ($item->menu->count() == 0)
                    <span class="text-muted">Tidak terdaftar di menu apapun</span>
                @endif
                @foreach ($item->menu as $menu)
                    <li><a href="{{ URL::to('menu/detail/' . $menu->id) }}">{{ $menu->name }}</a></li>
                @endforeach
                </td>
            </tr>
            <tr>
                <th>Enabled</th>
                <td>{{ $item->enabled ? 'Ya' : 'Tidak' }}</td>
            </tr>
        </tbody>
    </table>
    @endif
@stop