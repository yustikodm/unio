@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Wishlist
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($wishlist, ['route' => ['wishlists.update', $wishlist->id], 'method' => 'patch']) !!}

                        @include('wishlists.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection