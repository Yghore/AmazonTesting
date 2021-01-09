@extends('admin.dashboard')


@section('title', 'Amazon Testing | Administration')
@section('dashboard_title', 'Dashboard - Home')


@section('content')
    
    <p>Bienvenue sur le panel d'administration de {{ trans('product.app_name') }}</p>
    <object width="1200" height="600" type="application/pdf" data="storage/AmazonTesting-Recap-des-differentes-stps.pdf?#scrollbar=0&toolbar=0&navpanes=0">
        <p>Une erreur est survenue, merci de contacter un administrateur..</p>
    </object>

@endsection