@extends(config('persian-workdays.views.extend'))
@section('title','تعطیلی ها')
@section(config('persian-workdays.views.content'))
    <div class="container">
        @include('flash::message')

        {!! link_to_route(config('persian-workdays.as').'holiday.create','افزودن تعطیلی جدید ',null) !!}
        <table class="striped checkbox-s table-ss table-bordered">
            <thead>
            <tr>
                <th width="1%">ردیف</th>
                <th>عنوان</th>
                <th>تاریخ شمسی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            @foreach($holidays as $item)
                <tr>

                    <td>{{($holidays->currentPage() - 1 ) * ($holidays->perPage() ) + $loop->iteration}}</td>
                    <td>{!! $item->title !!}</td>
                    <td>{!! $item->date !!}</td>
                    <td>
                        <a href="" data-toggle="control-sidebar" class="gearIcon"><i class="fa fa-cog"
                                                                                     aria-hidden="true"></i></a>
                        <div class="gearMenu deactive">
                            {!! link_to_route(config('persian-workdays.as').'holiday.edit','ویرایش',$item->id,['class'=>'btn btn-primary']) !!}

                            {!! Form::model($item, ['route' => [config('persian-workdays.as').'holiday.destroy',$item->id], 'method' => 'DELETE','class'=>'delete_btn']) !!}
                            {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $holidays->appends(Request::all())->links() }}
    </div>
@endsection

