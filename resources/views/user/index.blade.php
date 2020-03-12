@extends('layouts.app')
@section('title', 'Összes munkatárs')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Összes munkatárs listája</div>

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
                                    <th scope="col">Felhasználó</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Telefonszám</th>
                                    <th scope="col">Autók</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Sátusz</th>
                                    <th scope="col">Részletek</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->email}} </td>
                                        <td>{{$user->phone != null ? $user->phone  : null }} </td>
                                        <td>{{$user->cars2->count() != null ? $user->cars2->count()  : null }} </td>

                                        <td>

                                            @foreach( $user->abilities() as $key )
                                                @if ($loop->first)
                                                    👌 Igen
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$user->status != 1 ? '❌ Inaktív'  : '✔️ Aktív'}}</td>
                                        <td><a class="btn btn-secondary btn-sm" href="{{route("user.edit", $user->id)}}"
                                               role="button">Szerkesztés ✏️</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Listázás (táblázat) | vége -->

                            <!-- Lapozó | eleje -->
                            <div class="pagination justify-content-center">
                                {{ $users    ->links() }}
                            </div>
                            <!-- Lapozó | váge -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
