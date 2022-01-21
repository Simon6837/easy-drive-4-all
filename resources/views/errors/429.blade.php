@extends('errors::minimal')

@section('title', __('Te veel requests'))
@section('code', '429')
@section('message', __('Wij ontvangen teveel aanvragen, probeer het later nog eens'))
