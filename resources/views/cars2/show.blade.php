@extends('layouts.app')
@section('title', 'Autó részletei')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Autó részletei
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif

{{--                            protected $fillable = ['brand','year','km','licence_plate','status','user_id'];--}}
                            <ul>
                                <li>id: {{$car->id}}</li>
                                <li>brand: {{$car->brand}}</li>
                                <li>year: {{$car->year}}</li>
                                <li>km: {{$car->km}}</li>
                                <li>licence_plate: {{$car->licence_plate}}</li>
                                <li>status: {{$car->status}}</li>
                                <li>user_id: {{$car->user_id}}</li>
                            </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
