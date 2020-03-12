@extends('layouts.app')
@section('title', 'Autók listája')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                    <!-- Szűrő/kereső (űrlap) | eleje -->
                            <div class="justify-content-center row">

                            <form action="{{route("cars2.index")}}" method="get" target="_self">
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label  class="sr-only" for="inlineFormInput">Autó típus</label>
                                    <input name="brand" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Autó típus" value="{{request()->query('brand')}}">
                                </div>
                                <div class="col-auto">
                                    <label  class="sr-only" for="inlineFormInput">Rendszám</label>
                                    <input name="licence_plate" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Rendszám" value="{{request()->query('licence_plate')}}">
                                </div>
                                @can("edit_forum")
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInput">Munkatárs ID</label>
                                        <input name="user_id" type="number" class="form-control mb-2" id="inlineFormInput" placeholder="Munkatárs ID" value="{{request()->query('user_id')}}">
                                    </div>
                                @endcan
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Szűrés</button>
                                    <a href="{{route("cars2.index")}}" class="btn btn-primary mb-2">Alapértelmezett</a>

                                </div>
                            </div>
                        </form>
                            </div>
                        <!-- Szűrő/kereső (űrlap) | vége -->

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
