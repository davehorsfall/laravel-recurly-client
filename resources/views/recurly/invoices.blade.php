@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">   
            <ul class="nav nav-pills my-5">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscriptions.index') }}">Subscriptions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('invoices.index') }}">Invoices</a>
                </li>
            </ul>
            <table class="table">
                <thead>
                    <tr>
                    <th class="list-number">#</th>
                    <th class="list-status">Status</th>
                    <th class="list-created">Subscription</th>
                    <th class="list-created">Created</th>
                    <th class="list-tax text-right">Tax</th>
                    <th class="list-total text-right">Total price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->getNumber() }}</td>
                            <td><div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-success" href="#">{{ $invoice->getState() }}</a>
                            <a class="btn btn-secondary" href="{{ URL::to('invoices/' . $invoice->getId()) }}" role="button">PDF</a>
                            </div>
                            </td>
                            <td>
                            <p>{{ $invoice->getId() }}</p>
                            @foreach ($invoice->getSubscriptionIds() as $sid)
                                <p>This is user {{ $sid }}</p>
                            @endforeach
                            </td>              
                            <td>{{ date('d/m/Y', strtotime($invoice->getCreatedAt())) }}</td>
                            <td class="text-right">{{ $invoice->getCurrency() }} {{ $invoice->getTax() }}</td>
                            <td class="text-right">{{ $invoice->getCurrency() }} {{ $invoice->getTotal() }}</td>
                        </tr>            
                    @endforeach              
                </tbody>
            </table>   
        </div>    
    </div>
</div>
@endsection
