@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Random Number</div>

                <div class="card-body">
                    
                    <form action="/calcrandom" method="POST">
                        @csrf
                        @method('GET')
                        <div class="flex-column">
                            <div>
                                <label for="input" class="">Input</label>
                                <input type="number" id="input" name="input" class="ml-3">
                                <button class="btn btn-primary ml-4">Submit</button>
                            </div>
                            <div class="pt-4">
                            
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
