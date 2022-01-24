@extends('errors::minimal')

@section('title', __('Niet geautoriseerd'))
@section('code', '401')
@section('message', __('U heeft geen toegang tot deze pagina. Log in en probeer het opnieuw'))
