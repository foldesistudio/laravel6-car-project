@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Az e-mail cím hitelességének ellenőrzése</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           A hitelesítő hiperhivatkozás el lett küldve a megadott mail címre.
                        </div>
                    @endif

                  Ha nem érkezett meg a kért jelszó helyrreállító link, akkor kérlek, hogy vedd fel velünk a kapcsolatot vagy próbáld meg az alábbit újra!
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klikk ide egy új hitelesítő link kéréséhez!</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
