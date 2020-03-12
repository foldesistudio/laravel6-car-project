@extends('layouts.app')
@section('title', 'Vezérlőpul')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kezdőlap | Vezérlőpult</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p> Üdv az adminisztrációs verzérlőpultban!</p><p> Most {{
    // app/User.php
    Auth :: user()->name }} felhasználónévvel vagy bejelentkezve! </p>
                        <p>
                            Jelenleg nem kevesebb, mint {{
    // app/User.php
    Auth :: user()->cars2->count() }} autó van a profilodhoz rögzítve
                            @can("edit_forum")
                               és összesen az adatbázisban
                                {{ App\Car2::count() }}
                                jármű van
                                @endcan
                            !
                        </p></div>
                </div>
            </div>
        </div>
    </div>
@endsection
