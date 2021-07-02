@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if (empty($teacher->name))
                <h2><strong>Create Teacher</strong><br/></h2>
              @else
                <h2><strong>Update Teacher: {{$teacher->name}}</strong><br/></h2>
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
                            <form action="@if(empty($teacher->name)){{route('teachers.store')}}@else{{route('teachers.update', $teacher->id)}}@endif" method="POST">
                            @csrf
                            @if (!empty($teacher->name))
                              @method('PUT')
                            @endif
                              <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name Your Teacher" value="{{$teacher->name ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                <label for="lastname">Last Name: </label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name Your Teacher" value="{{$teacher->lastname ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                <label for="subject_id">Subject: </label>
                                <select class="form-control" name="subject_id" id="subject_id" required="">
                                  <option value="">Select One Subject...</option>
                                  @foreach($subjects as $subject)
                                    @if(empty($teacher->name))
                                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @else
                                      <option value="{{ $subject->id ?? '' }}"
                                      @if($subject->id == $teacher->subject_id)
                                        selected=""
                                      @endif
                                      >{{ $subject->name }}</option>
                                    @endif      
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                @if (empty($teacher->name))
                                  <a href="{{route('teachers.create')}}" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success">Create</button>
                                @else
                                  <a href="{{route('teachers.show', $teacher->id)}}" class="btn btn-danger">Cancel</a>
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