@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="my-5">Your Subscription</h1>
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title my-5">{{ $subscriptions->getFirst()->getPlan()->getName() }}</h3>
                </div>        
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">CANCEL</a>
                            <a href="#" class="btn btn-primary">CHANGE PLAN</a>
                        </div>
                        <div class="col-6">
                            <h5 class="card-title">Payment</h5>
                            <p class="card-text">Your next bill is for £9.99 on 01/03/2021.</p>
                            
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text">Your card ending in 1358</p>
                                            <p class="card-text muted">Expires: 07/2022</p>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-primary">UPDATE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
            <ul class="nav nav-pills my-5">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('subscriptions.index') }}">Subscriptions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoices.index') }}">Invoices</a>
                </li>
            </ul>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Plan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col">Expired</th>
                        <th scope="col">Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->getPlan()->getName() }}</td>
                            <td>{{ $subscription->getState() }}</td>
                            <td>{{ date('d/m/Y', strtotime($subscription->getCreatedAt())) }}</td>
                            <td>{{ date('d/m/Y', strtotime($subscription->getExpiresAt())) }}</td>
                            <td>{{ $subscription->getExpirationReason() }}</td>
                        </tr>            
                    @endforeach              
                </tbody>
            </table>    
        </div>                
    </div>
</div>
@endsection
