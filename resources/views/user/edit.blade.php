@extends('layouts.app')
@section('title', 'Munkatárs szerkesztése')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Munkatárs szerkesztése</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif
                    <!--Szerkesztés | eleje -->
                        <form method="POST" action="{{route("user.update", $user->id)}}">
                            {{--                _token --}}
                            @csrf
                            {{--               post -> put method --}}
                            @method("put")



                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Név</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{old('name', $user->name)}}" required autocomplete="name" autofocus >

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">E-mail cím</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{old('email', $user->email)}}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Telefon</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{old('phone', $user->phone)}}" autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @can("edit_forum")
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Állapot</label>

                                <div class="col-md-6">
                                    <select id="inputState" class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option>Kérlek, válassz!</option>
                                        <option value="1" {{ $user->status == 1 ? "selected"  : null }}>Aktív</option>
                                        <option value="0" {{ $user->status == 0 ? "selected"  : null }}>Inaktív</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Admin</label>

                                <div class="col-md-6">
                                    <select id="inputState" class="form-control @error('status') is-invalid @enderror" name="role">
                                        <option>Kérlek, válassz!</option>
                                        <option value="1" {{ $user->abilities()->first() != null ? "selected"  : null }}>Igen</option>
                                        <option value="0" {{ $user->abilities()->first() == null ? "selected"  : null }}>Nem</option>
                                    </select>

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @endcan
<div class="justify-content-center row">
                            <div class="form-group">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        💫 Módosítás mentése
                                    </button>

                                </div>
                            </div>
                        </form>
                            <form class="deleteo" method="POST" id="delete-form" action="{{ route('user.destroy',$user->id) }}">
                                @csrf
                                @method('DELETE')

                                <div class="form-group">
                                    <div class="col-md-12 offset-md-4">

                                    <button type="submit" class="btn btn-danger" onclick="return myFunction();">❌ Felhsználó törlése</button>
                                </div>
                                </div>
                            </form>
                    </div>
                            <script>
                                function myFunction() {
                                    if(!confirm("Bizonyosan törlésre kerül?"))
                                        event.preventDefault();
                                }
                            </script>
                        <!-- Szerkesztés | vége -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Autók listája
                        <a href="{{ route('cars2.create') }}" class="btn btn-success float-right">Új autó</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif
                        <!-- Listázás (táblázat) | eleje -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Márka</th>
                                    <th scope="col">Évjárat</th>
                                    <th scope="col">KM</th>
                                    <th scope="col">Rendszám</th>
                                    <th scope="col">Státusz</th>
                                    <th scope="col">Munkatárs</th>
                                    <th scope="col">Müveletek</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$car->brand}}</td>
                                        <td>{{$car->year}}</td>
                                        <td>{{$car->km}}</td>
                                        <td class="text-uppercase">{{$car->licence_plate}}</td>
                                        <td>{{$car->status == 1 ? '✔️ Aktív' : '❌ Inaktív'}}</td>
                                        <td>{{$car->user->name}}</td>
                                        <td><a  href="{{ route('cars2.edit',$car->id) }}" type="button" class="btn btn-secondary btn-sm">Szerkesztés ✏️</a></td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- Listázás (táblázat) | vége -->
                        <!-- Lapozó | eleje -->
                        <div class="pagination justify-content-center">
                            {{ $cars->links() }}
                        </div>
                        <!-- Lapozó | váge -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
