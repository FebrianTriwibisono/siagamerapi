@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Admin</div>
                <div class="panel-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="col-sm-4 form-control-label">Nama <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control" placeholder="Nama User" value="{{ $user->name }}" required="required">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="nama" class="col-sm-4 form-control-label">Email <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" placeholder="Email User" value="{{ $user->email }}" required="required">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="nama" class="col-sm-4 form-control-label">Password <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row {{ $errors->has('password-repeat') ? 'has-error' : '' }}">
                                    <label for="nama" class="col-sm-4 form-control-label">Ulangi Password <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password-repeat" class="form-control" placeholder="Ulangi Password" value="{{ old('password-repeat') }}">
                                        @if ($errors->has('password-repeat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password-repeat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="alert alert-info" role="alert">
                                <font size="3" color="black">
                                    <b>Catatan</b><br>
                                    Tanda bintang merah (<span style="color:red;font-weight:bold">*</span>) menandakan kolom tersebut wajib diisi.
                                </font>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <a class="btn btn-primary" href="{{ route('user.index') }}">Kembali</a>
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
