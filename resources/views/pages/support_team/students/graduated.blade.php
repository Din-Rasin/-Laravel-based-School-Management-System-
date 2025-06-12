@extends('layouts.master')
@section('page_title', 'Graduated Students')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Students Graduated</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        {{-- <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-students" class="nav-link active" data-toggle="tab">All Graduated Students</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Select Class</a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach($my_classes as $c)
                    <a href="#c{{ $c->id }}" class="dropdown-item" data-toggle="tab">{{ $c->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul> --}}

<!-- Add this in your <head> if not added yet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<ul class="nav nav-tabs nav-tabs-highlight" style="border-bottom: none;">
  <li class="nav-item">
    <a href="#all-students" class="nav-link active" data-toggle="tab"
       style="
         color: #000000;
         border: 2px solid #4a90e2;
         border-radius: 5px 5px 0 0;
         padding: 8px 16px;
         font-weight: 600;
         box-shadow: 0 6px 0 #357ABD, 0 6px 15px rgba(53, 122, 189, 0.3);
         transition: all 0.2s ease;
         display: inline-block;"
       onmouseover="this.style.boxShadow='0 4px 0 #357ABD, 0 4px 12px rgba(53, 122, 189, 0.2)'"
       onmouseout="this.style.boxShadow='0 6px 0 #357ABD, 0 6px 15px rgba(53, 122, 189, 0.3)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #357ABD, 0 2px 8px rgba(53, 122, 189, 0.15)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #357ABD, 0 4px 12px rgba(53, 122, 189, 0.2)'">
      <i class="fa-solid fa-graduation-cap" style="margin-right: 8px;"></i>
      All Graduated Students
    </a>
  </li>

  <li class="nav-item dropdown" style="position: relative;">
    <a href="#" class="nav-link dropdown-toggle"
       data-toggle="dropdown"
       style="
         color: #e24a4a;
         border: 2px solid #4a90e2;
         border-radius: 5px;
         padding: 8px 16px;
         font-weight: 600;
         box-shadow: 0 6px 0 #357ABD, 0 6px 15px rgba(53, 122, 189, 0.3);
         transition: all 0.2s ease;
         display: inline-block;"
       onmouseover="this.style.boxShadow='0 4px 0 #357ABD, 0 4px 12px rgba(53, 122, 189, 0.2)'"
       onmouseout="this.style.boxShadow='0 6px 0 #357ABD, 0 6px 15px rgba(53, 122, 189, 0.3)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #357ABD, 0 2px 8px rgba(53, 122, 189, 0.15)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #357ABD, 0 4px 12px rgba(53, 122, 189, 0.2)'">
      <i class="fa-solid fa-book" style="margin-right: 8px;"></i>
      Select Class
    </a>

    <div class="dropdown-menu dropdown-menu-right" style="border-radius: 0 0 5px 5px; padding: 0;">
      @foreach($my_classes as $c)
        <a href="#c{{ $c->id }}" class="dropdown-item" data-toggle="tab"
           style="
             color: #000000;
             padding: 8px 16px;
             border-bottom: 1px solid #ffffff;
             transition: all 0.2s ease;
             box-shadow: 0 6px 0 #000000, 0 6px 15px rgba(53, 122, 189, 0.15);
             border-radius: 0;"
           onmouseover="this.style.backgroundColor='#e6f0ff'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 10px rgba(53, 122, 189, 0.3)'"
           onmouseout="this.style.backgroundColor=''; this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 0 #357ABD, 0 6px 15px rgba(53, 122, 189, 0.15)'"
           onmousedown="this.style.transform='translateY(2px)'; this.style.boxShadow='0 2px 0 #357ABD, 0 2px 8px rgba(53, 122, 189, 0.1)'"
           onmouseup="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 10px rgba(53, 122, 189, 0.3)'">
          <i class="fa-solid fa-school" style="margin-right: 8px;"></i>
          {{ $c->name }}
        </a>
      @endforeach
    </div>
  </li>
</ul>



        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-students">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>ADM_No</th>
                        <th>Section</th>
                        <th>Grad Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="photo"></td>
                        <td>{{ $s->user->name }}</td>
                        <td>{{ $s->adm_no }}</td>
                        <td>{{ $s->my_class->name.' '.$s->section->name }}</td>
                        <td>{{ $s->grad_date }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="{{ route('students.show', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                        @if(Qs::userIsTeamSA())
                                        <a href="{{ route('students.edit', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                        <a href="{{ route('st.reset_pass', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>

                                        {{--Not Graduated--}}
                                        <a id="{{ Qs::hash($s->id) }}" href="#" onclick="$('form#ng-'+this.id).submit();" class="dropdown-item"><i class="icon-stairs-down"></i> Not Graduated</a>
                                            <form method="post" id="ng-{{ Qs::hash($s->id) }}" action="{{ route('st.not_graduated', Qs::hash($s->id)) }}" class="hidden">@csrf @method('put')</form>
                                        @endif

                                        <a target="_blank" href="{{ route('marks.year_selector', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                        {{--Delete--}}
                                        @if(Qs::userIsSuperAdmin())
                                        <a id="{{ Qs::hash($s->user->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                        <form method="post" id="item-delete-{{ Qs::hash($s->user->id) }}" action="{{ route('students.destroy', Qs::hash($s->user->id)) }}" class="hidden">@csrf @method('delete')</form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @foreach($my_classes as $mc)
            <div class="tab-pane fade" id="c{{$mc->id}}">                                      <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>ADM_No</th>
                        <th>Section</th>
                        <th>Grad Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students->where('my_class_id', $mc->id) as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $s->user->photo }}" alt="photo"></td>
                            <td>{{ $s->user->name }}</td>
                            <td>{{ $s->adm_no }}</td>
                            <td>{{ $s->my_class->name.' '.$s->section->name }}</td>
                            <td>{{ $s->grad_date }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a href="{{ route('students.show', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                            @if(Qs::userIsTeamSA())
                                                <a href="{{ route('students.edit', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                <a href="{{ route('st.reset_pass', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>

                                                {{--Not Graduated--}}
                                                <a id="{{ Qs::hash($s->id) }}" href="#" onclick="$('form#ng-'+this.id).submit();" class="dropdown-item"><i class="icon-stairs-down"></i> Not Graduated</a>
                                                <form method="post" id="ng-{{ Qs::hash($s->id) }}" action="{{ route('st.not_graduated', Qs::hash($s->id)) }}" class="hidden">@csrf @method('put')</form>
                                            @endif

                                            <a target="_blank" href="{{ route('marks.year_selector', Qs::hash($s->user->id)) }}" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                            {{--Delete--}}
                                            @if(Qs::userIsSuperAdmin())
                                                <a id="{{ Qs::hash($s->user->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ Qs::hash($s->user->id) }}" action="{{ route('students.destroy', Qs::hash($s->user->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach

        </div>
    </div>
</div>

{{--Student List Ends--}}

@endsection
