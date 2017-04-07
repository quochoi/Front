<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $front_name = $request->get('front_titlename') ? $request->get('front_name') : @$front->front_name ?>
    {!! Form::label($name, trans('front::front.name').':') !!}
    {!! Form::text($name, $front_name, ['class' => 'form-control', 'placeholder' => trans('front::front.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->