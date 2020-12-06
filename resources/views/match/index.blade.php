@extends('layouts.app')
@section('title','FIXTURE |')
@section('content')
    <div class="container">
        <table class="table table-responsive table-striped ">
            <thead>
            <tr>
                <th>HOME</th>
                <th>AWAY</th>
                <th>HOME SCORE</th>
                <th>AWAY SCORE</th>
                <th>WEEK</th>
            </tr>
            </thead>
            <tbody>
            @foreach($matches as $match)
                <tr>
                    <td class="font-weight-bold">{{ $match->homeTeam->name }}</td>
                    <td>{{ $match->awayTeam->name }} </td>
                    <td class="font-weight-bold">{{ $match->home_team_score }}</td>
                    <td class="font-weight-bold">{{ $match->away_team_score }}</td>
                    <td>{{ $match->week }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row mt-5">
            <div class="col-md-4">
                <a href="{{route('match.run',['week' => \App\Models\TeamMatches::getNextWeek()])}}"
                   style="text-decoration: none;">
                    <button class="btn btn-success btn-block">
                        Run Match Results
                    </button>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('match.index')}}" style="text-decoration: none;">
                    <button class="btn btn-primary btn-block">
                        See All Fixture
                    </button>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('match.simulation')}}" style="text-decoration: none;">
                    <button class="btn btn-danger btn-block">
                        See Probabilities
                    </button>
                </a>
            </div>
        </div>
@endsection

