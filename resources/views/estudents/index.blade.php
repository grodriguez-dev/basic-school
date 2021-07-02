@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('estudents.create')}}" class="btn btn-info">Crear Estudent</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Estudents Table</h4>
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                            <th>Name</th>
                                            <th>Last Name</th>
                                            <th>Teacher</th>
                                            <th>Subject</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach($estudents as $estudent)
                                            <tr>
                                                <td>{{$estudent->name}}</td>
                                                <td>{{$estudent->lastname}}</td>
                                                @foreach($estudent->teachers as $teacher)
                                                    <td>{{$teacher->name}}</td>
                                                    <td>{{$teacher->subject->name}}</td>
                                                @endforeach
                                                <td>{{$estudent->semester}}</td>
                                                <td>
                                                    <form action="{{route('estudents.destroy', $estudent->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('estudents.show', $estudent->id)}}" class="btn btn-primary btn-xs"><i class="bi bi-pencil-square"></i></a>
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