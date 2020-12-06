@extends('layouts.app')
@section('title','FIXTURE |')
@section('content')
    <div class="container">
        <table class="table table-responsive table-striped ">
            <thead>
            <tr>
                <th>TEAM</th>
                <th>WINING PERCENTAGE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td class="font-weight-bold">{{ $team['Team'] }} </td>
                    <td class="font-weight-bold">{{ $team['Percentage'] }} %</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

