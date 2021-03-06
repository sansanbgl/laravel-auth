@extends('layouts.general')
@section('content')
<h1>Sunting Basic</h1>
<div class="col-md-6">

    @if ($data['item'] != null)
    <?php $item = $data['item']; ?>

    <form action="" method="post" role="form">
        <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="" value="{{ $item-> }}">
        </div>
        <div class="form-group">
            <label for=""></label>
            <div class="input-group">
                <select class="selecter form-control" name="item_id">
                    <option value="0"></option>
                @foreach ($data['items'] as $item)
                    <option value="{{ $item->id_item }}" @if ($item->item_id == $item->id_item) {{ 'selected' }} @endif >{{ $item->name_item }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="">Item</label>
            <div class="input-group">
                <select class="selecter form-control" name="item_id">
                    <option value="0"></option>
                @foreach ($data['items'] as $item)
                    <option value="{{ $item->id_item }}">{{ $item->name_item }}</option>
                @endforeach
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" id="addItem">Tambah</button>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" id="noItem">Tidak ada item terdaftar</div>
            <table class="table table-striped table-hover table-bordered" id="item">
                <tbody>
                    <tr class="sample">
                        <td>
                            <a class="text">Nama item</a>
                            <input type="hidden" value="" name="item_ids[]">
                        </td>
                        <td class="col-md-2 text-center"><button type="button" class="btn btn-warning btn-xs removeItem">Hapus</button></td>
                    </tr>
                @foreach ($item->item as $item)
                    <tr>
                        <td>
                            <a href="{{ URL::to('item/detail/' . $item->id_item) }}" class="text">{{ $item->name_item }}</a>
                            <input type="hidden" value="{{ $item->id_item }}" name="item_ids[]">
                        </td>
                        <td class="col-md-2 text-center"><button type="button" class="btn btn-warning btn-xs removeItem">Hapus</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
            runItemInputControl(['menu']);
        });
    </script>
@stop