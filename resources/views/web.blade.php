@extends('layouts.app')

@section('content')
@include('partials.menu')
<div class="container menu-left">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>&nbsp;&nbsp;{{ ucfirst(\Request::route()->getName()) }}</h2>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12"> &nbsp; </div>
                        <div class="col-4">
                            <cardpresent-components
                            :data="{{ json_encode($data) }}">
                            </cardpresent-components>
                        </div>
                        <div class="col-7">
                            <cardfrase-components
                            :data="{{ json_encode($data) }}">
                            </cardfrase-components>
                            <hr>
                            <cardcarrucel-components
                            :data="{{ json_encode($data) }}">
                            </cardcarrucel-components>
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