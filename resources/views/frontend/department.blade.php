@extends('frontend.layout.master')


@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp


@section('main')
    <<header class="position-relative">
        <div class="page-header min-vh-75 position-relative"
            style="background-image: url('{{ asset('images/department/' . $department->image) }}');" loading="lazy">
            <span class="mask bg-gradient-dark"></span>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center mx-auto mt-n7">
                        <h1 class="text-white fadeIn2 fadeInBottom">
                            @if ($loc == '_ku')
                                فاکەڵتی زانست بەشی
                                {{ $department->name_ku }}
                            @else
                                Faculty of Science {{ $department->name }} Department
                            @endif
                        </h1>
                        {{-- <p class="lead mb-5 fadeIn3 fadeInBottom text-white opacity-8">
                        Stay connected for life to our University community.
                    </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>

        {{-- Body --}}
        <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
            <section class="py-5 mt-2">
                <div class="container">
                    <div class="row" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="col-lg-8 ms-auto me-auto">
                            <h3 class="title mb-4 text-center">
                                @if ($loc == '_ku')
                                    بەشی
                                    {{ $department->name_ku }}
                                @else
                                    Department
                                    {{ $department->name }}
                                @endif
                            </h3>
                            <p class="text-dark">
                                {!! $department->{"description$loc"} !!}
                            </p>
                        </div>
                    </div>

            </section>


            <section class="features-3 py-4">
                <div class="container">
                    <div class="row text-center justify-content-center">
                        <div class="col-lg-6">
                            <span class="badge rounded-pill bg-primary  mb-2">
                            @if ($loc=='_ku')
                              کۆرسەکان
                            @else
                            Courses
                            @endif
                              
                            </span>
                            <h2>{{__('message.course_header1')}} </h2>
                            <p>
                                {{__('message.course_header')}}
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4 m-0 p-1 d-flex align-items-center">
                            <i class="ms-3 material-icons text-gradient text-dark text-2xl fa fa-filter"></i>
                           

                            <ul class=" mt-3 ms-2 list-unstyled">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mb-0 px-0 py-1 show" id="dropdownMenuPages5" data-bs-toggle="dropdown" aria-expanded="true" aria-selected="false" tabindex="-1" role="tab">
                                        Level
                                        <img src="{{asset('frontend/assets/img/down-arrow-dark.svg')}}" class="arrow ms-auto ms-md-2">
                                    </a>
                                
                                    <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3 show" aria-labelledby="dropdownMenuPages5" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(469.6px, -40px, 0px);" data-popper-placement="top-start">
                                        <div class="d-lg-block">
                                          <p class="text-sm m-0 p-0"><a href="{{route('frontend.department_f', ['id' => $department->id, 'type' => 'bachelor'])}}">Bechelor</a></p>
                                          <p class="text-sm m-0 p-0"><a href="{{route('frontend.department_f', ['id' => $department->id, 'type' => 'high'])}}">High Education</a></p>
                                        </div>   
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                    </div>

                    <div class="row g-4 g-xl-5 slider-container d-flex justify-content-center">
                        @foreach ($courses as $item)
                            <div class="col-lg-4 col-sm-6 col-md-6 mx-auto mb-4 text-start">
                                <div class="card shadow-lg mt-4 h-100">
                                    
                                    <div class="card-body text-center d-flex flex-column">

                                      
                                        
                                        <h4 class="flex-grow-1">
                                            <a class="text-dark"
                                                href="{{ route('forntend.course', $item->id) }}">
                                                {{ $item->{"name$loc"} }}
                                            </a>
                                        </h4>
                                        @if ($loc=='_ku')
                                        <p class="text-dark">ئاست{{$item->type}}: یەکە{{$item->cts }}:</p>

                                        @else
                                        <p class="text-dark">Level:{{$item->type}}  CTS:{{$item->cts }}</p>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- For Course Pagination -->
                    <div class="pagination pagination-primary m-4 pagination-wrap" style="margin-left:10%">
                        {{ $courses->links('vendor.pagination.custom', ['paginator' => $courses]) }}
                    </div>
                </div>
            </section>

            <section class="py-2" >
                <div class="container">
                    <div class="row">
                        <div class="col-9 text-center mx-auto">
                            <h3 class="mb-1">
                                @if ($loc == '_ku')
                                    مامۆستایانی بەشی
                                    {{ $department->name_ku }}
                                @else
                                    {{ $department->name }} Scince Teachers
                                @endif
                            </h3>
                            <p class="mb-1">{{ __('message.department_teacher') }}</p>
                        </div>
                        <div class="row g-4 g-xl-5 slider-container d-flex mt-1 justify-content-center">
                            @foreach ($teacher as $item)
                                <div class="col-lg-3 col-sm-6 col-md-4 mx-auto mb-4 text-start">
                                    <div class="card shadow-lg mt-4 h-100">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <a class="d-block blur-shadow-image">
                                                <img style="width:100%; height:200px"
                                                     src="{{ asset('images/teacher/'.$item->image) }}"
                                                     alt="{{ $item->name }}"
                                                     class="img-fluid shadow border-radius-lg">
                                            </a>
                                        </div>
                                        <div class="card-body text-center d-flex flex-column">
                                            <h4 class="flex-grow-1">
                                                <a class="text-dark"
                                                    href="{{ route('forntend.teacher', $item->id) }}">
                                                    {{ $item->{"name$loc"} }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                       
                    </div>
                     <!-- pagination start -->
                     <div class="pagination pagination-primary m-4 pagination-wrap" style="margin-left:10%">
                        {{ $teacher->links('vendor.pagination.custom', ['paginator' => $teacher,'id' => 'coursesection']) }}
                    </div>
                    <!-- pagination end --> 
                </div>
            </section>


        </div>
        

        
         
        @endsection

        
