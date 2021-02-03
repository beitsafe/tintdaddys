<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('question', 'Question') }}
        {{ Form::text('question', old('question'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('answer', 'Answer') }}
        {{ Form::text('answer', old('answer'), ['class' => 'form-control']) }}
    </div>
</div>

{!! Form::submit( "Submit", ['class' => 'btn btn-success']) !!}
{!! Html::link('/admin/faqs', 'Back', ['class' => 'btn btn-secondary']) !!}
