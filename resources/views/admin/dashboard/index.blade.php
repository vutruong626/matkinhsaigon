@extends('admin.layouts.master')

@section('content')
  <!-- BEGIN: Global messenger-->
  @include('admin.layouts.include.messages')
  <!-- END: Global messenger-->
<section id="dashboard-ecommerce">
    @include('admin.dashboard.chart.default')
</section>
@endsection