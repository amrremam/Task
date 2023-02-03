@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section style="background-color: #eee;">
                <div class="container my-5 py-5">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                      <div class="row">
                        {{$errors}}
                      <form action="{{route('store')}}" method="POST">
                        @csrf
                      <input type="text" name="title" placeholder="Enter Post"><br><br>
                      <button type="submit">Submit</button>
                      </form>
                      <form action="{{route('comment')}}" method="POST">
                        @csrf
                      <input type="text" name="Body" placeholder="Enter Comment"><br><br>
                      <button type="submit">Submit</button>
                      </form>
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-start align-items-center">
                            <img class="rounded-circle shadow-1-strong me-3"
                              height="60" />
                            <div>
                              <h6 class="fw-bold text-primary mb-1">{{ Auth::User()->name}}</h6>
                              <p class="text-muted small mb-0">
                                Shared publicly - Jan 2020
                              </p>
                            </div>
                          </div>
                          <p class="mt-3 mb-4 pb-2">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Processes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>
                                            {{-- <a href="{{route('edit',$post->id)}}" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Edit</a> --}}
                                            <form action="{{route('destroy',$post->id)}}" method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <button type="submit">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($comments as $comment)
                                <tr>
                                  <td>{{$comment->Body}}</td>
                                </tr>
                                @endforeach
                                <a href="{{route('soft')}}">Archive</a>
                            </table>
                          </p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <form action="{{route('image')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="image_input">Image:</label>
                    <input type="file" name="image" id="image_input"
                           class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
              </form>
              @foreach($images as $image)
              <tr>
                <td>{{$image->id}}</td>
                <td><img src="{{asset('imgs/'.$image->path)}}"></td>
              </tr>
            @endforeach
        </div>
    </div>
</div>
@endsection
