@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Autók listája</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- Szűrő/kereső (űrlap) | eleje -->
                            <form>
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInput">Autó típus</label>
                                        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Autó típus">
                                    </div>
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInput">Rendszám</label>
                                        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Rendszám">
                                    </div>
                                    @can("edit_forum")
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInput">Munkatárs</label>
                                        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Munkatárs">
                                    </div>
                                    @endcan
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-2">Szűrés</button>
                                    </div>
                                </div>
                            </form>
                        <!-- Szűrő/kereső (űrlap) | vége -->

                        <!-- Listázás (táblázat) | eleje -->
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Munkatárs</th>
                                    <th scope="col">Autó</th>
                                    <th scope="col">Rendszám</th>
                                    <th scope="col">KM</th>
                                    <th scope="col">Évjárat</th>
                                    <th scope="col">Státusz</th>
                                    <th scope="col">Részletek</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        @foreach($car->users as $user)
                                            {{$user->name}},
                                        @endforeach
                                    </td>
                                    <td>{{$car->name}}</td>
                                    <td>{{$car->licence_plate}}</td>
                                    <td>{{$car->km}}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->status }}</td>
                                    <td><button type="button" class="btn btn-secondary btn-sm">Szerkesztés ✏️</button></td>
                                </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            </div>
                            <!-- Listázás (táblázat) | vége -->
                            <!-- Lapozó | eleje -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        <!-- Lapozó | váge -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
