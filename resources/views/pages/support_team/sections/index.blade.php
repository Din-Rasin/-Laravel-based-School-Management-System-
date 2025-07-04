@extends('layouts.master')
@section('page_title', 'Manage Class Sections')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Class Sections</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-section" class="nav-link active" data-toggle="tab">Create New Section</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Sections</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($my_classes as $c)
                            <a href="#c{{ $c->id }}" class="dropdown-item" data-toggle="tab">{{ $c->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul> --}}


            <!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<ul class="nav nav-tabs nav-tabs-highlight" style="border-bottom: none; display: flex; gap: 12px;">

  <!-- Create New Section -->
  <li class="nav-item">
    <a href="#new-section" class="nav-link active" data-toggle="tab"
       style="display: inline-flex; align-items: center; gap: 8px;
              color: #222; background: #f0f4ff; border: 3px solid #4a90e2;
              border-radius: 8px 8px 0 0; padding: 10px 20px; font-weight: 600;
              box-shadow: 0 6px 0 #2e5cb8, 0 6px 15px rgba(46, 92, 184, 0.4);
              cursor: pointer; user-select: none; transition: all 0.2s ease;"
       onmouseover="this.style.background='#d6e1ff'; this.style.boxShadow='0 4px 0 #2e5cb8, 0 4px 12px rgba(46, 92, 184, 0.3)'"
       onmouseout="this.style.background='#f0f4ff'; this.style.boxShadow='0 6px 0 #2e5cb8, 0 6px 15px rgba(46, 92, 184, 0.4)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #2e5cb8, 0 2px 8px rgba(46, 92, 184, 0.2)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #2e5cb8, 0 4px 12px rgba(46, 92, 184, 0.3)'">
      <i class="fa-solid fa-layer-group"></i> Create New Section
    </a>
  </li>

  <!-- Manage Sections Dropdown -->
  <li class="nav-item dropdown" style="position: relative;">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
       style="display: inline-flex; align-items: center; gap: 8px;
              color: #e24a4a; background: #f0f4ff; border: 3px solid #4a90e2;
              border-radius: 8px; padding: 10px 20px; font-weight: 600;
              box-shadow: 0 6px 0 #2e5cb8, 0 6px 15px rgba(46, 92, 184, 0.3);
              cursor: pointer; user-select: none; transition: all 0.2s ease;"
       onmouseover="this.style.background='#d6e1ff'; this.style.boxShadow='0 4px 0 #2e5cb8, 0 4px 12px rgba(46, 92, 184, 0.3)'"
       onmouseout="this.style.background='#f0f4ff'; this.style.boxShadow='0 6px 0 #2e5cb8, 0 6px 15px rgba(46, 92, 184, 0.3)'"
       onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #2e5cb8, 0 2px 8px rgba(46, 92, 184, 0.2)'"
       onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #2e5cb8, 0 4px 12px rgba(46, 92, 184, 0.3)'">
      <i class="fa-solid fa-gear"></i> Manage Sections
    </a>

    <!-- Dropdown content -->
    <div class="dropdown-menu dropdown-menu-right" style="border-radius: 0 0 8px 8px; padding: 0; margin-top: -4px; box-shadow: 0 6px 15px rgba(46, 92, 184, 0.3);">
      @foreach($my_classes as $c)
        <a href="#c{{ $c->id }}" class="dropdown-item" data-toggle="tab"
           style="display: flex; align-items: center; gap: 8px;
                  color: #222; background: #f9fbff; padding: 10px 20px;
                  border-bottom: 1px solid #e2e8f0;
                  box-shadow: 0 6px 0 #a0b9ff, 0 6px 15px rgba(46, 92, 184, 0.2);
                  cursor: pointer; user-select: none; transition: all 0.2s ease;"
           onmouseover="this.style.backgroundColor='#d6e1ff'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 10px rgba(46, 92, 184, 0.4)'"
           onmouseout="this.style.backgroundColor='#f9fbff'; this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 0 #a0b9ff, 0 6px 15px rgba(46, 92, 184, 0.2)'"
           onmousedown="this.style.transform='translateY(2px)'; this.style.boxShadow='0 2px 0 #2e5cb8, 0 2px 8px rgba(46, 92, 184, 0.2)'"
           onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #2e5cb8, 0 4px 12px rgba(46, 92, 184, 0.3)'">
          <i class="fa-solid fa-school"></i> {{ $c->name }}
        </a>
      @endforeach
    </div>
  </li>
</ul>


            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-section">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="ajax-store" method="post" action="{{ route('sections.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name of Section">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Select Class <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class" class="form-control select" name="my_class_id" id="my_class_id">
                                            @foreach($my_classes as $c)
                                                <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Teacher</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Select Teacher" class="form-control select-search" name="teacher_id" id="teacher_id">
                                            <option value=""></option>
                                            @foreach($teachers as $t)
                                                <option {{ old('teacher_id') == Qs::hash($t->id) ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @foreach($my_classes as $d)
                    <div class="tab-pane fade" id="c{{ $d->id }}">                         <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Teacher</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections->where('my_class.id', $d->id) as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->name }} @if($s->active)<i class='icon-check'> </i>@endif</td>
                                    <td>{{ $s->my_class->name }}</td>

                                    @if($s->teacher_id)
                                    <td><a target="_blank" href="{{ route('users.show', Qs::hash($s->teacher_id)) }}">{{ $s->teacher->name }}</a></td>
                                        @else
                                        <td> - </td>
                                    @endif

                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    {{--edit--}}
                                                    @if(Qs::userIsTeamSA())
                                                        <a href="{{ route('sections.edit', $s->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                    @endif
                                                    {{--Delete--}}
                                                    @if(Qs::userIsSuperAdmin())
                                                        <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                        <form method="post" id="item-delete-{{ $s->id }}" action="{{ route('sections.destroy', $s->id) }}" class="hidden">@csrf @method('delete')</form>
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

    {{--Section List Ends--}}

@endsection
