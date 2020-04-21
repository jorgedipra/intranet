@extends('layouts.app')

@section('content')
@include('partials.menu')
<div class="container menu-left">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">App de notas</div>
                <div class="card-body">
                    <tareas-components>
                    </tareas-components>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection