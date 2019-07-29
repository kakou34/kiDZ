@extends('layouts.cms')

@section('content')
    <div class="align-self-center">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                                <ul class="py-4">
                                    <li><a href="{{Route('cmsWatch')}}">Je regarde</a></li>
                                    <li><a href="{{Route('cmsRead')}}">Je lis</a></li>
                                    <li><a href="{{Route('cmsLearn')}}">J'apprends</a></li>
                                    <li><a href="{{Route('cmsPlay')}}">Je joue</a></li>
                                    <li><a href="{{Route('cmsDiy')}}">DIY</a></li>
                                    <li><a href="{{Route('cmsAdmins')}}">Administrateurs</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
