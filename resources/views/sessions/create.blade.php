@extends('layouts.frontlayout')

@section('content')

    <div class="row">
        <div class="column"></div>
        <div class="column">
            <div class="col-sm-4" id="rform">
                <h1>Login</h1>

                <form METHOD="POST" action="/login">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection