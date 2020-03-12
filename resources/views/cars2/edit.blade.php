@extends('layouts.app')
@section('title', 'Autó módosítása')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Autó módosítása</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("cars2.update",$car->id) }}">

                        {{-- Token 'n' Rolls --}}
                        @csrf
                        @method('PATCH')

                        <!-- Típus | eleje -->
                            <div class="form-group row">
                                <label for="brand" class="col-md-4 col-form-label text-md-right">Márka</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                                           value="{{old("brand",$car->brand)}}">
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
                                           value="{{ old('licence_plate',$car->licence_plate) }}" required autocomplete="licence_plate" autofocus placeholder="ABC-123">
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
                                           value="{{ old('km',$car->km) }}" required autocomplete="km" autofocus>
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
                                           value="{{ old('year',$car->year) }}" required autocomplete="year" autofocus>
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
                                        <option value="1" {{ $car->status == '1' ? "selected"  : null }}>Aktív</option>
                                        <option value="0" {{ $car->status == '0' ? "selected"  : null }}>Inaktív</option>
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
                                                <option value="{{$user->id}}" {{ old('user_id',$car->user_id) == $user->id ? 'selected':'' }}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Munkatérs | vége -->
                            @endcan


                            <div class="justify-content-center row">
                                <div class="form-group">
                                    <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                       💫 Az adatok frissítése
                                    </button>
                                </div>
                                </div>

                        </form>
                        <form class="deleteo" method="POST" id="delete-form" action="{{ route('cars2.destroy',$car->id) }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group">

                                    <button type="submit" class="btn btn-danger" onclick="return myFunction();">❌ Gépjármű törlése</button>
                                </div>

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            if(!confirm("Bizonyosan, hogy törlőd ezt a gépjárművet az adatbázis rendszerből?"))
                event.preventDefault();
        }
    </script>
@endsection
