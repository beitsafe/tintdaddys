@extends('layouts.master')

@section('seo')
    @include('site.seo.about')
@stop

@section('content')

    @include('site.partials.about.landing')
    @include('site.partials.about.logoBanner')
    @include('site.partials.about.text')
    @include('site.partials.homepage.accountC2a')
    @include('site.partials.about.installers')

@stop
