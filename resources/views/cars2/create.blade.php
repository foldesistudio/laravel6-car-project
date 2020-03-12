@extends('layouts.app')
@section('title', 'Új autó')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Új autó rögzítése</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("cars2.store") }}">

                        {{-- Token 'n' Rolls --}}
                        @csrf

                            <!-- Típus | eleje -->
                            <div class="form-group row">
                                <label for="brand" class="col-md-4 col-form-label text-md-right">Márka</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                                        value="{{old("brand")}}">
                                    @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Típus | vége -->

                            <!-- Rendszám | eleje -->
                            <div class="form-group row">
                                <label for="licence_plate" class="col-md-4 col-form-label text-md-right">Rendszám</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('licence_plate') is-invalid @enderror" id="licence_plate" name="licence_plate"
                                           value="{{ old('licence_plate') }}" required autocomplete="licence_plate" autofocus>
                                    @error('licence_plate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Rendszám | vége -->

                            <!-- Kilóméter | eleje -->
                            <div class="form-group row">
                                <label for="km" class="col-md-4 col-form-label text-md-right">Kilóméter</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('km') is-invalid @enderror" id="km" name="km"
                                           value="{{ old('km') }}" required autocomplete="km" autofocus>
                                    @error('km')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Kilóméter | vége -->

                            <!-- Évjárat | eleje -->
                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right">Évjárat</label>
                                <div class="col-md-6">
                                    <input type="text" maxlength="4" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                                           value="{{ old('year') }}" required autocomplete="year" autofocus>
                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Évjárat | vége -->

                            <!-- Státusz | eleje -->
                            <div class="form-group row">
                                <label for="status"  class="col-md-4 col-form-label text-md-right">Státusz</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                        <option value="" selected disabled>Kérem, válasszon!</option>
                                        <option value="1" {{ old('status') == 1 ? 'selected':'' }}>Aktív</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected':'' }}>Inaktív</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Státusz | vége -->

                        @can("edit_forum")
                            <!-- Munkatárs | eleje -->
                                <div class="form-group row">
                                    <label for="user_id" class="col-md-4 col-form-label text-md-right">Munkatárs</label>


                                    <div class="col-md-6">
                                        <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                            <option value="" selected disabled>Kérem, válasszon!</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" {{ old('user_id') == $user->id ? 'selected':'' }}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Munkatárs | vége -->
                            @endcan

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Új autó felvétele
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
