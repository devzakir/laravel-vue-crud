@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <visitor-edit id="{!! $id !!}"></visitor-edit>
            {{-- <div class="card">
                <div class="card-header bg-primary text-white">Edit Visitor Info</div>
                <div class="card-body">
                    <form action="{{ route('visitor.update', ['id' => $visitor->id]) }}" method="post">
                        @csrf 
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Visitor Name</label>
                            <input type="text" name="name" value="{{ $visitor->name }}" id="name" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="email">Visitor Email</label>
                            <input type="text" value="{{ $visitor->email }}" name="email" id="email" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="details">Visitor Details</label>
                            <textarea rows="4" type="text" name="details" id="details" class="form-control" autofocus required>{{ $visitor->details }}</textarea> 
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Update Details</button>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
