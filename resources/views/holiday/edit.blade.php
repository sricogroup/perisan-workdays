@extends(config('persian-workdays.views.extend'))
@section('title','ویرایش تعطیلی')

@section('style')
    <style>
        table, table tr, table td {
            text-align: center;
        }
    </style>
@endsection
@section(config('persian-workdays.views.content'))
    <div class="container product">
        @include('flash::message')

        {!! Form::model($holiday,['route'=>[config('persian-workdays.as').'holiday.update',$holiday->id],'method'=>'PATCH']) !!}
        <div class="container product">

            <div class="label-input">
                {!! Form::label('title','عنوان', ['class' => 'pull-right']) !!}
                {{ Form::text('title', old('title'), ['required', 'data-parsley-trigger'=>'change']) }}
                {!! $errors->first('title','<span>:message</span>') !!}
            </div>
            <div class="label-input">
                {!! Form::label('date','تاریخ', ['class' => 'pull-right']) !!}
                {{ Form::text('date', old('date'), ['required', 'data-parsley-trigger'=>'change', 'dir'=>'ltr']) }}
                {!! $errors->first('date','<span>:message</span>') !!}
            </div>

            {!! link_to_route(config('persian-workdays.as').'holiday.index', 'انصراف', [], ['class' =>'btn btn-danger']) !!}
            {!! Form::submit('ارسال', ['class' => 'btn btn-primary']) !!}


        </div>
        {!! Form::close() !!}
    </div>

@endsection


@section('scripts')
    @includeIf(config('persian-workdays.views.parsley'))
@endsection