@extends('layouts.master')
@section('page_title', 'Manage TimeTables')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage TimeTables</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <ul class="nav nav-tabs nav-tabs-highlight">
                @if(Qs::userIsTeamSA())
                <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">Create Timetable</a></li>
                @endif
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Show TimeTables</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($my_classes as $mc)
                            <a href="#ttr{{ $mc->id }}" class="dropdown-item" data-toggle="tab">{{ $mc->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul> --}}
<ul class="nav nav-tabs nav-tabs-highlight">

    @if(Qs::userIsTeamSA())
    <li class="nav-item">
        <a href="#add-tt" class="nav-link active"
           data-toggle="tab"
           style="
             color: #28a745;
             border: 2px solid #28a745;
             border-radius: 5px;
             padding: 8px 12px;
             background-color: #fff;
             transition: all 0.2s ease;
             box-shadow: 0 6px 0 #1e7e34, 0 6px 15px rgba(0, 0, 0, 0.2);
             display: inline-block;
             text-decoration: none;
             font-weight: bold;"
           onmouseover="this.style.boxShadow='0 4px 0 #1e7e34, 0 4px 12px rgba(0, 0, 0, 0.15)'"
           onmouseout="this.style.boxShadow='0 6px 0 #1e7e34, 0 6px 15px rgba(0, 0, 0, 0.2)'"
           onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #1e7e34, 0 2px 8px rgba(0, 0, 0, 0.1)'"
           onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #1e7e34, 0 4px 12px rgba(0, 0, 0, 0.15)'">
          <i class="icon-calendar2"></i> Create Timetable
        </a>
    </li>
    @endif

    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle"
           data-toggle="dropdown"
           style="
             color: #17a2b8;
             border: 2px solid #17a2b8;
             border-radius: 5px;
             padding: 8px 12px;
             background-color: #fff;
             transition: all 0.2s ease;
             box-shadow: 0 6px 0 #117a8b, 0 6px 15px rgba(0, 0, 0, 0.2);
             display: inline-block;
             text-decoration: none;
             font-weight: bold;"
           onmouseover="this.style.boxShadow='0 4px 0 #117a8b, 0 4px 12px rgba(0, 0, 0, 0.15)'"
           onmouseout="this.style.boxShadow='0 6px 0 #117a8b, 0 6px 15px rgba(0, 0, 0, 0.2)'"
           onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #117a8b, 0 2px 8px rgba(0, 0, 0, 0.1)'"
           onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #117a8b, 0 4px 12px rgba(0, 0, 0, 0.15)'">
          <i class="icon-menu7"></i> Show TimeTables
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            @foreach($my_classes as $mc)
                <a href="#ttr{{ $mc->id }}" class="dropdown-item"
                   data-toggle="tab"
                   style="
                     transition: all 0.2s ease;
                     font-weight: bold;">
                  <i class="icon-list"></i> {{ $mc->name }}
                </a>
            @endforeach
        </div>
    </li>

</ul>


            <div class="tab-content">

                @if(Qs::userIsTeamSA())
                <div class="tab-pane fade show active" id="add-tt">
                   <div class="col-md-8">
                       <form class="ajax-store" method="post" action="{{ route('ttr.store') }}">
                           @csrf
                           <div class="form-group row">
                               <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                               <div class="col-lg-9">
                                   <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name of TimeTable">
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Class <span class="text-danger">*</span></label>
                               <div class="col-lg-9">
                                   <select required data-placeholder="Select Class" class="form-control select" name="my_class_id" id="my_class_id">
                                       @foreach($my_classes as $mc)
                                           <option {{ old('my_class_id') == $mc->id ? 'selected' : '' }} value="{{ $mc->id }}">{{ $mc->name }}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>

                           <div class="form-group row">
                               <label for="exam_id" class="col-lg-3 col-form-label font-weight-semibold">Type (Class or Exam)</label>
                               <div class="col-lg-9">
                                   <select class="select form-control" name="exam_id" id="exam_id">
                                       <option value="">Class Timetable</option>
                                       @foreach($exams as $ex)
                                           <option {{ old('exam_id') == $ex->id ? 'selected' : '' }} value="{{ $ex->id }}">{{ $ex->name }}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>


                           {{-- <div class="text-right">
                               <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                           </div> --}}


                           <div class="text-right">
    <button id="ajax-btn" type="submit" class="btn btn-primary"
        style="
            background-color: #007bff;
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 10px 18px;
            font-weight: bold;
            transition: all 0.2s ease;
            box-shadow: 0 6px 0 #0056b3, 0 6px 15px rgba(0, 0, 0, 0.2);"
        onmouseover="this.style.boxShadow='0 4px 0 #0056b3, 0 4px 12px rgba(0, 0, 0, 0.15)'"
        onmouseout="this.style.boxShadow='0 6px 0 #0056b3, 0 6px 15px rgba(0, 0, 0, 0.2)'"
        onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #0056b3, 0 2px 8px rgba(0, 0, 0, 0.1)'"
        onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #0056b3, 0 4px 12px rgba(0, 0, 0, 0.15)'">
        Submit Form <i class="icon-paperplane ml-2"></i>
    </button>
</div>

                       </form>
                   </div>

                </div>
                @endif

                @foreach($my_classes as $mc)
                    <div class="tab-pane fade" id="ttr{{ $mc->id }}">                         <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Type</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tt_records->where('my_class_id', $mc->id) as $ttr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ttr->name }}</td>
                                    <td>{{ $ttr->my_class->name }}</td>
                                    <td>{{ ($ttr->exam_id) ? $ttr->exam->name : 'Class TimeTable' }}
                                    <td>{{ $ttr->year }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                {{-- <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a> --}}
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"
                                                 style="
                                                     color: #000000;
                                                     border: 2px solid #0013df;
                                                     border-radius: 5px;
                                                     padding: 8px 10px;
                                                     background-color: #f0f0f0;
                                                     transition: all 0.2s ease;
                                                     box-shadow: 0 6px 0 #d30000, 0 6px 15px rgba(0, 0, 0, 0.2);
                                                     display: inline-block;"
                                                 onmouseover="this.style.boxShadow='0 4px 0 #5a6268, 0 4px 12px rgba(0, 0, 0, 0.15)'"
                                                 onmouseout="this.style.boxShadow='0 6px 0 #5a6268, 0 6px 15px rgba(0, 0, 0, 0.2)'"
                                                 onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #5a6268, 0 2px 8px rgba(0, 0, 0, 0.1)'"
                                                 onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #5a6268, 0 4px 12px rgba(0, 0, 0, 0.15)'">
                                                 <i class="icon-menu9"></i>
                                              </a>


                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{--View--}}
                                                    <a href="{{ route('ttr.show', $ttr->id) }}" class="dropdown-item"><i class="icon-eye"></i> View</a>

                                                    @if(Qs::userIsTeamSA())
                                                    {{--Manage--}}
                                                    <a href="{{ route('ttr.manage', $ttr->id) }}" class="dropdown-item"><i class="icon-plus-circle2"></i> Manage</a>
                                                    {{--Edit--}}
                                                    <a href="{{ route('ttr.edit', $ttr->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                    @endif

                                                    {{--Delete--}}
                                                    @if(Qs::userIsSuperAdmin())
                                                        <a id="{{ $ttr->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                        <form method="post" id="item-delete-{{ $ttr->id }}" action="{{ route('ttr.destroy', $ttr->id) }}" class="hidden">@csrf @method('delete')</form>
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

    {{--TimeTable Ends--}}

@endsection
