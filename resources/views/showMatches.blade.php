@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">List of contacts assigned to each agent</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Agent Id</th>
                            <th>Agent Name</th>
                            <th>Contact Name</th>
                            <th>Contact Zip Code</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item['agent']->id }}</th>
                                <td>{{ $item['agent']->name }}</td>
                                <td>{{ $item['customer']->name }}</td>
                                <td>{{ $item['customer']->zip_code }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

