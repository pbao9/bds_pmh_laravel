@extends('errors.minimal')

@section('title', isset($title) ? $title : __('Unauthorized'))
@section('code', '401')
@section('message', isset($message) ? $message : __('Unauthorized'))
