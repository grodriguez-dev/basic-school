@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if (empty($estudent->name))
                <h2><strong>Create Estudent</strong><br/></h2>
              @else
                <h2><strong>Update Estudent: {{$estudent->name}}</strong><br/></h2>
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
                            <form action="@if(empty($estudent->name)){{route('estudents.store')}}@else{{route('estudents.update', $estudent->id)}}@endif" method="POST">
                            @csrf
                            @if (!empty($estudent->name))
                              @method('PUT')
                            @endif
                              <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name Your Estudent" value="{{$estudent->name ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                <label for="lastname">Last Name: </label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name Your Estudent" value="{{$estudent->lastname ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                <label for="semester">Last Name: </label>
                                <input type="text" class="form-control" name="semester" id="semester" placeholder="Your Semester" value="{{$estudent->semester ?? ''}}" required="">
                              </div>
                              <div class="form-group">
                                <label for="teacher_id">Teacher: </label>
                                <select class="form-control" name="teacher_id" id="teacher_id" required="">
                                  <option value="">Select One Teacher...</option>
                                  @foreach($teachers as $teacher)
                                    @if(empty($estudent->name))
                                      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @else
                                      <option value="{{ $teacher->id ?? '' }}"
                                        @foreach($estudent->teachers as $tea)
                                          @if($teacher->id == $tea->id)

                                            selected=""
                                          @endif
                                        @endforeach
                                        >{{ $teacher->name }}</option>
                                    @endif      
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                @if (empty($estudent->name))
                                  <a href="{{route('estudents.create')}}" class="btn btn-danger">Cancel</a>
                                  <button type="submit" class="btn btn-success">Create</button>
                                @else
                                  <a href="{{route('estudents.show', $estudent->id)}}" class="btn btn-danger">Cancel</a>
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