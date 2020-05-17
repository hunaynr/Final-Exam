@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; font-weight:bold">Puskesmas Laravel</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Hello <b>{{ Auth::user()->name }}</b>, Welcome to Puskesmas! <?php echo "<br>"; ?>
                    You're logged in to <b>{{ Auth::user()->email }}</b> account
                </div>
            </div>
        </div>
    </div>
</div>
@endsection