@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($plans as $plan)
            <div class="col-sm-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $plan->getName() }}</h5>
                        <p class="card-text"></p>
                        <a href="{{ route('subscribe', ['id' => $plan->getId()]) }}" class="btn btn-primary">{{ __('Subscribe') }}</a>                        
                    </div>
                </div>
            </div>            
        @endforeach    
    </div>
</div>
@endsection
