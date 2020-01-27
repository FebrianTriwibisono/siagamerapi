@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><font size="4" color="black">Edit Data record</font></div>
                <div class="panel-body">
                    <form action="{{ route('record.update', $record->id) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('seismik') ? 'has-error' : '' }}">
                                    <label for="seismik" class="col-sm-4 form-control-label">Intensitas Gempa <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">

                                        <input type="number" name="seismik" class="form-control" placeholder="Intensitas Gempa" value="{{$record->seismik }}" required="required">
                                        @if ($errors->has('seismik'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('seismik') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('deformasi') ? 'has-error' : '' }}">
                                    <label for="deformasi" class="col-sm-4 form-control-label">Deformasi <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
     
                            <input type="number" name="deformasi" class="form-control" placeholder="Deformasi" value="{{ $record->deformasi }}" required="required">

                                        @if ($errors->has('deformasi'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('deformasi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('intensitas_gas') ? 'has-error' : '' }}">
                                    <label for="intensitas_gas" class="col-sm-4 form-control-label">Intensitas Gas <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" name="intensitas_gas" class="form-control" placeholder="Intensitas Gas" value="{{$record->intensitas_gas }}" required="required">
                                        @if ($errors->has('intensitas_gas'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('intensitas_gas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('suhu') ? 'has-error' : '' }}">
                                    <label for="suhu" class="col-sm-4 form-control-label">suhu <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
     
                            <input type="number" name="suhu" class="form-control" placeholder="suhu" value="{{ $record->suhu }}" required="required">

                                        @if ($errors->has('suhu'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('suhu') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('tgl') ? 'has-error' : '' }}">
                                    <label for="tgl" class="col-sm-4 form-control-label">Tanggal Waktu <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="datetime-local" name="tgl" class="form-control" placeholder="Tanggal dan Waktu" value="{{$record->tgl}}" required="required">
                                        @if ($errors->has('tgl'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="alert alert-info" role="alert">
                                    <b>Catatan</b><br>
                                    <font size="3" color="black">Tanda bintang merah (<span style="color:red;font-weight:bold">*</span>) menandakan kolom tersebut wajib diisi.
                                    </font>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <a class="btn btn-primary" href="{{ route('record.index') }}">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
@endpush
