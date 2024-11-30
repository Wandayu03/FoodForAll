@extends('layout.master')

@section('title', 'Nama Page Kalian')

@section('content')
Isi langsung div dll aja, ga usah pake html lagi

CSS kalian masukin ke master.blade.php, dan karena itu CSS nya digabung, sebisa mungkin tolong jangan ada CSS untuk body dan *
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}"> // Tarok link CSS kelen disini
@endpush