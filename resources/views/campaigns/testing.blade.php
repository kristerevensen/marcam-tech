@extends('layouts.app')

@section('content')

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">{{ __('New Link') }}</h4>
                </div>
            </div>

            <div class="card" style="margin-bottom:20px;">
                <div class="card-body">
                    <table class="table datatable">
                        <tr>
                            <th>Domain</th><td>{{ $domain }} </td>
                            <th>Query</th><td>{{ $query }}</td>
                            <th>Fragment</th><td>{{ $fragment }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        <form action="{{ route('campaigns.testing') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                 
                        <div class="form-group">
                            <input type="text" name="url" placeholder="URL" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="Run Test" id="" class="form-control btn btn-block btn-primary">
                        </div>
                   
                </div>
            </div>
        </form>
            
@endsection
