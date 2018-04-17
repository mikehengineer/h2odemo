@extends('layouts.frontlayout')

@section('content')
    <div class="row">
        <div class="column"></div>
        <div class="col-sm-2" id="">
            <h1>Contact</h1>

        <form method="POST" action="/contact">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="title">E-mail</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="body"></label>
                <textarea id="body" name="body" class="form-control" rows="10"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            @include('layouts.errors')
        </form>
            @if ($flash = session('contactmessage'))
                <div class="alert alert-success" role="alert" id="contactMsg">
                    {{ $flash }}
                </div>
            @endif
    </div>
    </div>
@endsection