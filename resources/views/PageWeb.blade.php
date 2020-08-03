@extends('layouts.app')

@section('content')
@include('partials.menu')
<div class="container menu-left">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ ucfirst(\Request::route()->getName()) }}</h2>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12"> &nbsp; </div>
                        <div class="col-11">
                            <tablepage-components
                            :data="{{ json_encode($data) }}">
                            </tablepage-components>
                        </div>
                        <div class="col-12"> &nbsp; </div>
                    </div>
                </div>   

            </div>
        </div>
        <div class="col-12"> &nbsp; </div>
        <div class="col-12"> &nbsp; </div>
    </div>
</div>
@endsection