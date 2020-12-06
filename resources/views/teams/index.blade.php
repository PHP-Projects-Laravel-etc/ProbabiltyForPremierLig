@extends('layouts.app')
@section('title','TEAMS |')
@section('content')
    <div class="container">
        <table class="table table-responsive table-striped ">
            <thead>
            <tr>
                <th>Team Name</th>
                <th>Str</th>
                <th>Agi</th>
                <th>Int</th>
                <th>PTS</th>
                <th>P</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>GD</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td class="font-weight-bold">{{ $team->name }}</td>
                    <td>{{ $team->overall_strength }} </td>
                    <td>{{ $team->overall_agility }}</td>
                    <td>{{ $team->overall_intelligence}}</td>
                    <td>{{ $team->points}}</td>
                    <td>{{ $team->played}}</td>
                    <td>{{ $team->won}}</td>
                    <td>{{ $team->draw}}</td>
                    <td>{{ $team->lost}}</td>
                    <td>{{ $team->goals_for - $team->goals_against}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row mt-5">
            <div class="col-md-4">
                <a href="{{route('match.index',['week' => 1])}}">
                    <button class="btn btn-success btn-block">
                        Go To Match Results
                    </button>
                </a>
            </div>
            <div class="mol-md-4">
                <form action="/createPlan" method="get">
                    <button type="submit" class="btn btn-primary btn-block" formmethod="get">Create Plan</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="/emptyPlan" method="get">
                    <button type="submit" class="btn btn-danger btn-block" formmethod="get">Empty Plan</button>
                </form>
            </div>

        </div>
    </div>
@endsection

