@extends('layouts.master')
@section('page_title', 'Manage TimeTable Record')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-bold">{{ $ttr->name.' ('.$my_class->name.')'.' '.$ttr->year }}</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#manage-ts" class="nav-link active" data-toggle="tab">Manage Time Slots</a></li>
                <li class="nav-item"><a href="#add-sub" class="nav-link" data-toggle="tab">Add Subject</a></li>
                <li class="nav-item"><a href="#edit-subs" class="nav-link " data-toggle="tab">Edit Subjects</a></li>
                <li class="nav-item"><a target="_blank" href="{{ route('ttr.show', $ttr->id) }}" class="nav-link" >View TImeTable</a></li>
            </ul> --}}


            <!-- Font Awesome (if not already included in your layout) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<ul class="nav nav-tabs nav-tabs-highlight" style="border-bottom: none; display: flex; gap: 12px;">

  <!-- Manage Time Slots -->
  <li class="nav-item">
    <a href="#manage-ts" class="nav-link active" data-toggle="tab"
       style="display: inline-flex; align-items: center; gap: 8px;
              color: #1e293b; background: #f0f9ff; border: 3px solid #0ea5e9;
              border-radius: 8px 8px 0 0; padding: 10px 20px; font-weight: 600;
              box-shadow: 0 6px 0 #0369a1, 0 6px 15px rgba(14, 165, 233, 0.4);
              cursor: pointer; user-select: none; transition: all 0.2s ease;"
       onmouseover="this.style.background='#e0f2fe'; this.style.boxShadow='0 4px 0 #0369a1, 0 4px 12px rgba(14, 165, 233, 0.3)'"
       onmouseout="this.style.background='#f0f9ff'; this.style.boxShadow='0 6px 0 #0369a1, 0 6px 15px rgba(14, 165, 233, 0.4)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #0369a1, 0 2px 8px rgba(14, 165, 233, 0.2)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #0369a1, 0 4px 12px rgba(14, 165, 233, 0.3)'">
      <i class="fa-solid fa-clock"></i> Manage Time Slots
    </a>
  </li>

  <!-- Add Subject -->
  <li class="nav-item">
    <a href="#add-sub" class="nav-link" data-toggle="tab"
       style="display: inline-flex; align-items: center; gap: 8px;
              color: #065f46; background: #ecfdf5; border: 3px solid #10b981;
              border-radius: 8px 8px 0 0; padding: 10px 20px; font-weight: 600;
              box-shadow: 0 6px 0 #047857, 0 6px 15px rgba(16, 185, 129, 0.3);
              cursor: pointer; user-select: none; transition: all 0.2s ease;"
       onmouseover="this.style.background='#d1fae5'; this.style.boxShadow='0 4px 0 #047857, 0 4px 12px rgba(16, 185, 129, 0.3)'"
       onmouseout="this.style.background='#ecfdf5'; this.style.boxShadow='0 6px 0 #047857, 0 6px 15px rgba(16, 185, 129, 0.3)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #047857, 0 2px 8px rgba(16, 185, 129, 0.2)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #047857, 0 4px 12px rgba(16, 185, 129, 0.3)'">
      <i class="fa-solid fa-plus"></i> Add Subject
    </a>
  </li>

  <!-- Edit Subjects -->
  <li class="nav-item">
    <a href="#edit-subs" class="nav-link" data-toggle="tab"
       style="display: inline-flex; align-items: center; gap: 8px;
              color: #78350f; background: #fef3c7; border: 3px solid #f59e0b;
              border-radius: 8px 8px 0 0; padding: 10px 20px; font-weight: 600;
              box-shadow: 0 6px 0 #b45309, 0 6px 15px rgba(245, 158, 11, 0.3);
              cursor: pointer; user-select: none; transition: all 0.2s ease;"
       onmouseover="this.style.background='#fde68a'; this.style.boxShadow='0 4px 0 #b45309, 0 4px 12px rgba(245, 158, 11, 0.3)'"
       onmouseout="this.style.background='#fef3c7'; this.style.boxShadow='0 6px 0 #b45309, 0 6px 15px rgba(245, 158, 11, 0.3)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #b45309, 0 2px 8px rgba(245, 158, 11, 0.2)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #b45309, 0 4px 12px rgba(245, 158, 11, 0.3)'">
      <i class="fa-solid fa-pen-to-square"></i> Edit Subjects
    </a>
  </li>

  <!-- View Timetable (opens in new tab) -->
  <li class="nav-item">
    <a target="_blank" href="{{ route('ttr.show', $ttr->id) }}" class="nav-link"
       style="display: inline-flex; align-items: center; gap: 8px;
              color: #1e3a8a; background: #eef2ff; border: 3px solid #6366f1;
              border-radius: 8px 8px 0 0; padding: 10px 20px; font-weight: 600;
              box-shadow: 0 6px 0 #4338ca, 0 6px 15px rgba(99, 102, 241, 0.3);
              cursor: pointer; user-select: none; transition: all 0.2s ease;"
       onmouseover="this.style.background='#e0e7ff'; this.style.boxShadow='0 4px 0 #4338ca, 0 4px 12px rgba(99, 102, 241, 0.3)'"
       onmouseout="this.style.background='#eef2ff'; this.style.boxShadow='0 6px 0 #4338ca, 0 6px 15px rgba(99, 102, 241, 0.3)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #4338ca, 0 2px 8px rgba(99, 102, 241, 0.2)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #4338ca, 0 4px 12px rgba(99, 102, 241, 0.3)'">
      <i class="fa-solid fa-eye"></i> View Timetable
    </a>
  </li>

</ul>


            <div class="tab-content">
                {{--Add Time Slots--}}
                @include('pages.support_team.timetables.time_slots.index')
                {{--Add Subject--}}
                @include('pages.support_team.timetables.subjects.add')
                {{--Edit Subject--}}
                @include('pages.support_team.timetables.subjects.edit')
            </div>
        </div>
    </div>

    {{--TimeTable Manage Ends--}}

@endsection
