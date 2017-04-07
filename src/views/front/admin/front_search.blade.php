
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('front::front.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_front','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('front_name', trans('front::front.front_name_label')) !!}
            {!! Form::text('front_name', @$params['front_name'], ['class' => 'form-control', 'placeholder' => trans('front::front.front_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('front::front.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


