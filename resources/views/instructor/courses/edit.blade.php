@extends('layouts.sidebar')
@section('content')
    @if(Session::has('update-success'))
        <div class="alert alert-success">
            <p>@lang('module.success.success-updating')</p>
        </div>
    @endif
    @if(Session::has('update-fail'))
        <div class="alert alert-warning">
            <p>@lang('module.success.update-failed')</p>
        </div>
    @endif
    @if(Session::has('material-name-error'))
        <div class="alert alert-danger">
            <p>
                @lang('module.errors.error-material-name')
            </p>
        </div>
    @endif
    @if(Session::has('failed_to_save'))
        <div class="alert alert-danger">
            <p>{{Session::get('failed_to_save')}}</p>
        </div>
    @endif
    {!! Form::open(['method' => 'POST', 'route' => ['courses.update'], 'enctype' => 'multipart/form-data'])!!}
    <h3 class="page-title">@lang('module.courses.view-course')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $course->title }}
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('access-code', Lang::get('module.courses.fields.access_code'), ['class' => 'control-label']) !!}
                    {!! Form::text('access_code', $course->access_code,['class' => 'form-control ']) !!}
                    @if($errors->has('access_code'))
                        <p class="help-block alert-danger" data-value="shake">
                            {{ $errors->first('access_code') }}

                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course-title', Lang::get('module.courses.fields.course'), ['class' => 'control-label']) !!}
                    {!! Form::text('title', $course->title, ['class' => 'form-control ']) !!}
                    @if($errors->has('title'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('assistant-professor', Lang::get('module.courses.fields.assistant_professor'), ['class' => 'control-label']) !!}
                    {!! Form::text('assistant_professor', old('assistant_professor'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    @if($errors->has('assistant_professor'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('assistant_professor') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('desc', Lang::get('module.courses.fields.desc'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', $course->description, ['class' => 'form-control ','resize' => 'none']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block alert-danger">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('material-name', Lang::get('module.courses.fields.material-name'), ['class' => 'control-label']) !!}
                    {!! Form::text('material-name', old('access_code'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    @if($errors->has('material-name'))
                        <p class="help-block alert-danger" data-value="shake">
                            {{ $errors->first('material-name') }}

                        </p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('course_material', trans('module.courses.fields.material-1'), ['class' => 'control-label']) !!}
                {!! Form::file('material', null,['required','class' => 'close fileupload-exists']) !!}
                @if($errors->has('file'))
                    <p class="help-block alert-danger">
                        {{ $errors->first('file') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="panel-footer">
            <input type="hidden" name="id" value="{{encrypt($course->id)}}">
            {!! Form::submit(trans('module.save'), ['class' => 'btn btn-danger' ,'data-value' => 'shake', 'onclick' => 'shake()']) !!}
            {{ Form::reset(trans('module.reset'), ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
