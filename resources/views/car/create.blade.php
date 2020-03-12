@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Új autó rögzítése</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("car.store") }}">

                            {{-- Token 'n' Rolls --}}
                            @csrf

<!-- Típus | eleje -->
                                <!-- Típus | eleje -->

                                <div class="form-group row">
                                    <label for="exampleFormControlSelect3" class="col-md-4 col-form-label text-md-right">Típus</label>


                                    <div class="col-md-6">
                                        <select class="form-control @error('name') is-invalid @enderror" id="exampleFormControlSelect3">
                                            <option selected>Kérem, válasszon!</option>
                                            <option value="1">User 1</option>
                                            <option value="2">User 2</option>
                                            <option value="3">User 2</option>
                                        </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Típus | vége -->
                                <!-- Rendszám | eleje -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Rendszám</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                <!-- Rendszám | vége -->
                                <!-- Kilóméter | eleje -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Kilóméter</label>

                                    <div class="col-md-6">
                                        <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Kilóméter | vége -->
                                <!-- Évjárat | eleje -->
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Évjárat</label>

                                    <div class="col-md-6">
                                        <input id="name" type="number" maxlength="4" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Évjárat | vége -->

                                <!-- Státusz | eleje -->
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1"  class="col-md-4 col-form-label text-md-right">Státusz</label>

                                    <div class="col-md-6">
                                        <select class="form-control @error('name') is-invalid @enderror" id="exampleFormControlSelect1">
                                            <option selected>Kérem, válasszon!</option>
                                            <option value="1">Aktív</option>
                                            <option value="0">Inaktív</option>
                                        </select>
                                        @error('name')
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
                                    <label for="exampleFormControlSelect2" class="col-md-4 col-form-label text-md-right">Munkatárs</label>


                                    <div class="col-md-6">
                                        <select class="form-control @error('name') is-invalid @enderror" id="exampleFormControlSelect2">
                                            <option selected>Kérem, válasszon!</option>
                                            <option>User 1</option>
                                            <option>User 2</option>
                                        </select>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Munkatérs | vége -->
                                @endcan

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
