@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
@endsection

@section('content')
<style type="text/css">
    th{
        text-align:center;
        font-size:114%;
    }
    td{
        text-align:center;
        font-size:120%;
        color:black;
    }
</style>
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('info_message'))
            <div class="alert alert-info"><p>{{ Session::get('info_message') }}</p></div>
            @endif
            @if (Session::has('warning_message'))
            <div class="alert alert-warning"><p>{{ Session::get('warning_message') }}</p></div>
            @endif
            @if (Session::has('success_message'))
            <div class="alert alert-success"><p>{{ Session::get('success_message') }}</p></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <font size="4" color="black"> Data record</font></div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-3" style="border">
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="{{ route('record.create')}}" class="btn btn-success"><i class="fa fa-plus fa-fw"></i></a>
                                </div>
                            </div>
                            <div class="col-xs-3" align="center">
                                <form method="get" class="input-group input-group-sm">
                                    <input name="page" type="hidden" value="{{ $records->currentPage()}}" />
                                    <input name="q" type="text" class="form-control" placeholder="Cari" value="{{ $request->input('q')}}" />
                                    <div class="input-group-btn">
                                        <input type="submit" class="btn btn-success" value="Cari">
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-4">
                                <form method="get" class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" href="{{ str_replace('/?', '?', $records->url(1))}}"
                                           @if($records->currentPage() == 1) disabled @endif>&laquo;</a>
                                        <a class="btn btn-default"
                                           href="{{ str_replace('/?', '?', $records->previousPageUrl())}}"
                                           @if($records->currentPage() == 1) disabled @endif><</a>
                                    </span>
                                    <span class="input-group-addon" id="basic-addon2">page</span>
                                    <input name="page" type="number" style="border-left: 0; border-right: 0;" value="{{ $records->currentPage()}}" min="1" max="{{ $records->lastPage()}}" class="form-control crud-page-number">
                                    <span class="input-group-addon">of {{ $records->lastPage()}}</span>
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" href="{{ str_replace('/?', '?', $records->nextPageUrl())}}{{ (count($request->input('q')) > 0) ? ('&q='.$request->input('q')) : ('')}}"
                                           @if($records->currentPage() == $records->lastPage()) disabled @endif>></a>
                                        <a class="btn btn-default" href="{{ str_replace('/?', '?', $records->url($records->lastPage()))}}{{ (count($request->input('q')) > 0) ? ('&q='.$request->input('q')) : ('')}}"
                                           @if($records->currentPage() == $records->lastPage()) disabled @endif>&raquo;</a>
                                    </span>
                                </form>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group input-group-sm">
                                     <font size="3" color="black"> Total: {{ $records->total()}} data </font>
                                </div>
                            </div>
                        </div><!-- /.row -->
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                @if ( !$records->count() )
                                <div class="alert alert-warning">
                                    <p>Tidak ada data</p>
                                </div>
                                @else
                                <table class="table table-striped table-condensed table-hover table-bordered">
                                    <tr>
                                        <th>Id</th>
                                        <th>Intensitas Gempa</th>
                                        <th>Deformasi(ha(meter))</th>
                                        <th>Intensitas Gas(Tons)</th>
                                        <th>Suhu( &#8451;)</th>
                                        <th>Status</th>
                                        <th>Faktor Kepastian<br>(0-1)</th>
                                        <th>Tanggal/Waktu</th>
                                        <th>Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                        if ($records->currentPage() == 1) {
                                            $no = 1;
                                        } else {
                                            $no = $records->perPage() * ($records->currentPage() - 1) + 1;
                                        }
                                    ?>
                                    @foreach($records as $record)
                                        <tr>
                                            <td>{{ $record->id }}</td>
                                            <td>{{ $record->seismik }}</td>
                                            <td>{{ $record->deformasi }}</td>
                                            <td>{{ $record->intensitas_gas }}</td>
                                            <td>{{ $record->suhu }}</td>
                                            <td>{{ $record->status }}</td>
                                            <td>{{ $record->kemungkinan }}</td>
                                            <td>{{ $record->tgl }}</td>
                                            <td>{{ $record->user->name }}</td>
                
                                            <td align="center">
                                                <div class="btn-group btn-group-xs">
                                                    <a class="btn btn-default" href="{{ route('record.edit', $record->id)}}"><i class="fa fa-pencil fa-fw"></i></a>
                                                        <confirm id="{{ $record->id }}"></confirm>
                                                </div>
                                                <form method="POST" action="{{ route('record.destroy', $record->id)}}" id="form{{ $record->id }}">
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection

@endsection
