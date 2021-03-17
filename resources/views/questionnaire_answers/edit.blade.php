@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Questionnaire Answer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($questionnaireAnswer, ['route' => ['questionnaireAnswers.update', $questionnaireAnswer->id], 'method' => 'patch']) !!}

                        @include('questionnaire_answers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection