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
                        <div class="col-4">
                            <cardpresent-components
                            :date="{{ json_encode($data) }}">
                            </cardpresent-components>
                        </div>
                        <div class="col-7">
                            <cardfrase-components>
                            </cardfrase-components>
                            <hr>
                            <cardcarrucel-components>
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