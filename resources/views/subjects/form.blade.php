@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if (empty($subject->name))
                <h2><strong>Create Subject</strong><br/></h2>
              @else
                <h2><strong>Update Subject: {{$subject->name}}</strong><br/></h2>
              @endif
                <div class="card-body">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <li>{{ $error }}</li>
                       </div>
                      @endforeach
                    </ul>


                    <div class="container"> 
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <!-- Start form -->
                            <form action="@if(empty($subject->name)){{route('subjects.store')}}@else{{route('subjects.update', $subject->id)}}@endif" method="POST">
                            @csrf
                            @if (!empty($subject->name))
                              @method('PUT')
                            @endif
                              <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name Your Subject" value="{{$subject->name ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                <label for="season_start">Season Start: </label>
                                <input type="date" class="form-control" name="season_start" id="season_start" placeholder="Season Start Your Subject" value="{{$subject->season_start ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                <label for="season_end">Season Start: </label>
                                <input type="date" class="form-control" name="season_end" id="season_end" placeholder="Season End Your Subject" value="{{$subject->season_end ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                @if (empty($subject->name))
                                  <a href="{{route('subjects.create')}}" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success">Create</button>
                                @else
                                  <a href="{{route('subjects.show', $subject->id)}}" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success">Edit</button>
                                @endif
                              </div>
                              
                            </form>
                          <!-- End form -->
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection