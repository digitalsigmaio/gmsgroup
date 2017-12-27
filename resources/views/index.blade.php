@extends('layouts.master')

@section('content')


            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">{{ $parentCompany->en_name }}</h3>
                </div>
            </div>

            <div class="row">
                <a href="{{ route('products') }}">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 card">
                    <div class="info-box blue-bg">
                        <i class="icon_gift"></i>
                        <div class="count">{{ count($parentCompany->products) }}</div>
                        <div class="title">Product{{ count($parentCompany->products) > 1 && count($parentCompany->products) < 11 ? 's' : '' }}</div>
                    </div>
                    <!--/.info-box-->
                </div>
                </a>
                <!--/.col-->
                <a href="{{ route('services') }}">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 card">
                    <div class="info-box brown-bg">
                        <i class="icon_datareport"></i>
                        <div class="count">{{ count($parentCompany->services) }}</div>
                        <div class="title">Service{{ count($parentCompany->services) > 1 && count($parentCompany->services) < 11 ? 's' : '' }}</div>
                    </div>
                    <!--/.info-box-->
                </div>
                </a>
                <!--/.col-->
                <a href="{{ route('projects') }}">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 card">
                    <div class="info-box dark-bg">
                        <i class="icon_easel"></i>
                        <div class="count">{{ count($parentCompany->projects) }}</div>
                        <div class="title">Project{{ count($parentCompany->projects) > 1 && count($parentCompany->projects) < 11 ? 's' : '' }}</div>
                    </div>
                    <!--/.info-box-->
                </div>
                </a>
                <!--/.col-->
                <a href="{{ route('clients') }}">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 card">
                    <div class="info-box green-bg">
                        <i class="icon_group"></i>
                        <div class="count">{{ count($parentCompany->clients) }}</div>
                        <div class="title">Client{{ count($parentCompany->clients) > 1 && count($parentCompany->clients) < 11 ? 's' : '' }}</div>
                    </div>
                    <!--/.info-box-->
                </div>
                </a>
                <!--/.col-->

            </div>

            <!-- Content -->
            <section class="panel">
                <div class="panel-body progress-panel">
                    <div class="row">
                        <div class="col-lg-8 task-progress pull-left">
                            <h1>Company info</h1>
                        </div>
                        <div class="col-lg-4">
                                 <span class="pull-right">
                                        <img alt="" class="simple" src="{{ $parentCompany->logo }}" style="height: 40px;">
                                </span>
                        </div>
                    </div>
                </div>
                <table class="table table-hover personal-task">
                    <tbody>
                    <tr>
                        <td><span class="fa fa-flag"></span></td>
                        <td>
                            {{ $parentCompany->en_name }}
                        </td>
                        <td><div dir="rtl">
                            {{ $parentCompany->ar_name }}
                        </div></td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td><span class="fa fa-info"></span></td>
                        <td>
                            {{ $parentCompany->en_about }}
                        </td>
                        <td><div dir="rtl">
                            {{ $parentCompany->ar_about }}
                        </div></td>
                        <td>
                        </td>
                    </tr>
					<tr>
                        <td><span class="fa fa-bullseye"></span></td>
                        <td>
                            {{ $parentCompany->en_vision }}
                        </td>
                        <td><div dir="rtl">
                            {{ $parentCompany->ar_vision }}
                        </div></td>
                        <td>
                        </td>
                    </tr>
					<tr>
                        <td><span class="fa fa-certificate"></span></td>
                        <td>
                            {{ $parentCompany->en_slogan }}
                        </td>
                        <td><div dir="rtl">
                            {{ $parentCompany->ar_slogan }}
                        </div></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="fa fa-envelope-o"></span></td>
                        <td>
                            {{ $parentCompany->en_address }}
                        </td>
                        <td><div dir="rtl">
                            {{ $parentCompany->ar_address }}
                        </div></td>
                        <td>

                        </td>
                    </tr>
					
                    <tr>
                        <td><span class="fa fa-mail-forward"></span></td>
                        <td>
                            {{ $parentCompany->email }}
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td><span class="fa fa-phone"></span></td>
                        <td>
                            {{ $parentCompany->tel }}
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td><span class="fa fa-map-marker"></span></td>
                        <td>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1728.3324665203047!2d30.918476250741758!3d29.96031504795505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU3JzM2LjkiTiAzMMKwNTUnMTUuMiJF!5e0!3m2!1sen!2seg!4v1511875304558" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td >
                            <a href="{{ route('editCompany', compact('parentCompany')) }}"><span class="btn btn-info">Edit</span></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>


@endsection