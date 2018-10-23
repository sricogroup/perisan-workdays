@extends(config('persian-workdays.views.extend'))
@section('title','افزودن تعطیلی جدید')

@section('style')
    <style>
        table, table tr, table td {
            text-align: center;
        }
    </style>
@endsection
@section(config('persian-workdays.views.content'))

    <div class="container product">

        {!! Form::open(['route'=>config('persian-workdays.as').'holiday.store','class'=>'product-create', 'data-parsley-validate']) !!}

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
        {!! Form::close() !!}


    </div>



@endsection

@section('scripts')
    @includeIf(config('persian-workdays.views.parsley'))

@endsection