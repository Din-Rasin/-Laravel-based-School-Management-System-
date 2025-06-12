@extends('layouts.master')
@section('page_title', 'My Dashboard')
@section('content')

    @if(Qs::userIsTeamSA())
       {{-- <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-blue-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Students</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-danger-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Teachers</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-success-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-pointer icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'admin')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Administrators</span>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-indigo-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-user icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Parents</span>
                       </div>
                   </div>
               </div>
           </div>
       </div> --}}



<style>
    .dashboard-card {
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 0 rgba(255, 0, 0, 0.2), 0 8px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(0);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 0 rgba(243, 0, 0, 0.2), 0 12px 24px rgba(255, 0, 0, 0.2);
    }

    .dashboard-card:active {
        transform: translateY(4px);
        box-shadow: 0 4px 0 rgba(238, 0, 0, 0.1), 0 4px 12px rgba(93, 232, 1, 0.1);
    }

    .dashboard-icon {
        font-size: 48px;
        opacity: 0.85;
        transition: transform 0.3s ease;
        animation: floatIcon 3s infinite ease-in-out;
    }

    .dashboard-card:hover .dashboard-icon {
        transform: scale(1.1);
    }

    @keyframes floatIcon {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-6px);
        }
    }
</style>

<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-primary dashboard-card text-white">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                    <span class="text-uppercase font-size-xs font-weight-bold">Total Students</span>
                </div>
                <div class="ml-3 align-self-center">
                    <i class="icon-graduation dashboard-icon"></i>
                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="col-sm-6 col-xl-3">
    <div class="card card-body bg-danger dashboard-card text-white">
        <div class="media">
            <div class="media-body">
                <h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                <span class="text-uppercase font-size-xs">Total Teachers</span>
            </div>
            <div class="ml-3 align-self-center">
                <i class="fas fa-chalkboard-teacher dashboard-icon"></i>
            </div>
        </div>
    </div>
</div>


    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success dashboard-card text-white">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-shield-check dashboard-icon"></i>
                </div>
                <div class="media-body text-right">
                    <h3 class="mb-0">{{ $users->where('user_type', 'admin')->count() }}</h3>
                    <span class="text-uppercase font-size-xs">Total Administrators</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-indigo dashboard-card text-white">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-users dashboard-icon"></i>
                </div>
                <div class="media-body text-right">
                    <h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3>
                    <span class="text-uppercase font-size-xs">Total Parents</span>
                </div>
            </div>
        </div>
    </div>
</div>


       @endif

    {{--Events Calendar Begins--}}
 <style>
  .card-3d {
    border: 2px solid #00d5ff;
    border-radius: 10px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 6px 0 #c00000, 0 6px 15px rgba(53, 122, 189, 0.3);
    cursor: pointer;
  }

  .card-3d:hover {
    box-shadow: 0 10px 0 #357ABD, 0 10px 25px rgba(53, 122, 189, 0.5);
    transform: translateY(-4px);
  }

  .card-3d:active {
    box-shadow: 0 2px 0 #357ABD, 0 2px 8px rgba(53, 122, 189, 0.15);
    transform: translateY(6px);
  }

  .card-3d .card-title {
    font-weight: bold;
    color: #357ABD;
  }
</style>

<div class="card card-3d">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">School Events Calendar</h5>
    {!! Qs::getPanelOptions() !!}
  </div>

  <div class="card-body">
    <div class="fullcalendar-basic"></div>
  </div>
</div>

    {{--Events Calendar Ends--}}
    @endsection
