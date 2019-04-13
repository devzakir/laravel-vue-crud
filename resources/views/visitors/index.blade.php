@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            @if (session('status'))
                <div class="card mb-2">
                    <div class="card-header">Dashboard</div>    
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>    
                        You are logged in!
                    </div>
                </div>            
            @endif
            <visitors></visitors>
            <div class="text-center mt-3 d-flex justify-content-center">
                {{-- {{ $visitors->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
