{{--
  Template Name: About Us Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-about-us')
  @endwhile
@endsection
