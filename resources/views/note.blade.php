@extends('layouts.app')

@section('content')
@include('partials.menu')
<div class="container menu-left">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Pendientes</h2>
                </div>
                    <tareas-components>
                    </tareas-components>
            </div>
        </div>
    </div>
</div>
@endsection