@extends('layouts.app')

@section('content')
<section class="content-header">
  <h1>
    Questionnaire Answer
  </h1>
</section>
<div class="content">
  <div class="box box-primary">
    <div class="box-body">
      <div class="row" style="padding-left: 20px">
        @include('questionnaire_answers.show_fields')
        <a href="{{ route('questionnaire-answers.index') }}" class="btn btn-default">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection
