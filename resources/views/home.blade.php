@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Notifications</div>

                <div class="card-body">
                    @if(session()->has('sent'))
                        <div class="alert alert-success" role="alert">
                        {{session()->get('sent')}}
                        </div>
                    @endif
                        @if(session()->has('sent_error'))
                            <div class="alert alert-danger" role="alert">
                                {{session()->get('sent_error')}}
                            </div>
                        @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['url' => '/send-notification']) !!}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('title', 'Title') !!}
                                    {!! Form::text('title','',['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('message', 'A Little Portion of Post') !!}
                                    {!! Form::textarea('message','',['class' => 'form-control','rows'=> 3]) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('post_url', 'Post Link') !!}
                                    {!! Form::text('post_url','',['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
                                    {!! Form::reset('Cancel', ['class'=>'btn btn-danger']) !!}
                                </div>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
