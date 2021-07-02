@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('subjects.create')}}" class="btn btn-info">Crear Subject</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Subjects Table</h4>
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                            <th>Name</th>
                                            <th>Season Start</th>
                                            <th>Season End</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($subjects as $subject)
                                            <tr>
                                                <td>{{$subject->name}}</td>
                                                <td>{{$subject->season_start}}</td>
                                                <td>{{$subject->season_end}}</td>
                                                <td>
                                                    <form action="{{route('subjects.destroy', $subject->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('subjects.show', $subject->id)}}" class="btn btn-primary btn-xs"><i class="bi bi-pencil-square"></i></a>
                                                        <button type="submit" class="btn btn-danger btn-xs"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection