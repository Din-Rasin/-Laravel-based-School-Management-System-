@extends('layouts.master')
@section('page_title', 'Student Information - '.$my_class->name)
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Students List</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-students" class="nav-link active" data-toggle="tab">All {{ $my_class->name }} Students</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sections</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($sections as $s)
                            <a href="#s{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $my_class->name.' '.$s->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul> --}}
<ul class="nav nav-tabs nav-tabs-highlight" style="border-bottom: none;">
  <li class="nav-item">
    <a href="#all-students" class="nav-link active" data-toggle="tab"
       style="
         color: #0400ff;
         border: 2px solid #9b99e5;
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
      <i class="fa fa-users" style="margin-right: 8px;"></i>
      All {{ $my_class->name }} Students
    </a>
  </li>

  <li class="nav-item dropdown" style="position: relative;">
    <a href="#" class="nav-link dropdown-toggle"
       data-toggle="dropdown"
       style="
         color: #000000;
         border: 2px solid #7d9ce4;
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
      <i class="fa fa-layer-group" style="margin-right: 8px;"></i>
      Sections
    </a>

    <div class="dropdown-menu dropdown-menu-right" style="border-radius: 0 0 5px 5px; padding: 0;">
      @foreach($sections as $s)
        <a href="#s{{ $s->id }}" class="dropdown-item" data-toggle="tab"
           style="
             color: #9f0000;
             padding: 8px 16px;
             border-bottom: 1px solid #ddd;
             transition: all 0.2s ease;
             box-shadow: 0 6px 0 #ffc400, 0 6px 15px rgba(53, 122, 189, 0.15);
             border-radius: 0;"
           onmouseover="this.style.backgroundColor='#e6f0ff'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 10px rgba(53, 122, 189, 0.3)'"
           onmouseout="this.style.backgroundColor=''; this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 0 #357ABD, 0 6px 15px rgba(53, 122, 189, 0.15)'"
           onmousedown="this.style.transform='translateY(2px)'; this.style.boxShadow='0 2px 0 #357ABD, 0 2px 8px rgba(53, 122, 189, 0.1)'"
           onmouseup="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 10px rgba(53, 122, 189, 0.3)'">
          <i class="fa fa-file" style="margin-right: 8px;"></i>
          {{ $my_class->name.' '.$s->name }}
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
                            <th>Email</th>
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
                                <td>{{ $my_class->name.' '.$s->section->name }}</td>
                                <td>{{ $s->user->email }}</td>
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

                @foreach($sections as $se)
                    <div class="tab-pane fade" id="s{{$se->id}}">                         <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>ADM_No</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students->where('section_id', $se->id) as $sr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $sr->user->photo }}" alt="photo"></td>
                                    <td>{{ $sr->user->name }}</td>
                                    <td>{{ $sr->adm_no }}</td>
                                    <td>{{ $sr->user->email }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('students.show', Qs::hash($sr->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Info</a>
                                                    @if(Qs::userIsTeamSA())
                                                        <a href="{{ route('students.edit', Qs::hash($sr->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                        <a href="{{ route('st.reset_pass', Qs::hash($sr->user->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>
                                                    @endif
                                                    <a href="#" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                                    {{--Delete--}}
                                                    @if(Qs::userIsSuperAdmin())
                                                        <a id="{{ Qs::hash($sr->user->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                        <form method="post" id="item-delete-{{ Qs::hash($sr->user->id) }}" action="{{ route('students.destroy', Qs::hash($sr->user->id)) }}" class="hidden">@csrf @method('delete')</form>
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
