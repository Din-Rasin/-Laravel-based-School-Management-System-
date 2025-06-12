@extends('layouts.master')
@section('page_title', 'Manage Dorms')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Dorms</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <style>

            </style>
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-dorms" class="nav-link active" data-toggle="tab">Manage Dorms</a></li>
                <li class="nav-item"><a href="#new-dorm" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Dorm</a></li>
            </ul> --}}
<style>
  /* Base style for nav links */
  .nav-tabs-highlight .nav-link {
    color: #4a90e2;
    border: 2px solid transparent;
    border-radius: 6px;
    padding: 8px 16px;
    font-weight: 600;
    transition:
      box-shadow 0.3s ease,
      border-color 0.3s ease,
      transform 0.15s ease;
    cursor: pointer;
    perspective: 500px; /* for 3D effect */
    display: inline-flex;
    align-items: center;
  }

  /* Icon spacing */
  .nav-tabs-highlight .nav-link i {
    margin-right: 6px;
    transition: transform 0.3s ease;
  }

  /* Hover effect */
  .nav-tabs-highlight .nav-link:hover:not(.active) {
    border-color: #4a90e2;
    box-shadow: 0 6px 15px rgba(74, 144, 226, 0.4);
    transform: translateZ(10px) rotateX(5deg);
  }

  /* Active tab style */
  .nav-tabs-highlight .nav-link.active {
    color: white;
    background: #4a90e2;
    border-color: #357ABD;
    box-shadow: 0 8px 18px rgba(53, 122, 189, 0.6);
    transform: translateZ(12px);
  }

  /* Press effect when clicking */
  .nav-tabs-highlight .nav-link:active {
    transform: translateZ(0) translateY(4px);
    box-shadow: 0 3px 6px rgba(53, 122, 189, 0.4);
    transition: none;
  }

  /* Icon animation on hover */
  .nav-tabs-highlight .nav-link:hover i {
    transform: rotate(20deg) scale(1.2);
  }
</style>

<ul class="nav nav-tabs nav-tabs-highlight">
  <li class="nav-item">
    <a href="#all-dorms" class="nav-link active" data-toggle="tab">Manage Dorms</a>
  </li>
  <li class="nav-item">
    <a href="#new-dorm" class="nav-link" data-toggle="tab">
      <i class="icon-plus2"></i> Create New Dorm
    </a>
  </li>
</ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-dorms">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dorms as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->description}}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('dorms.edit', $d->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                   @endif
                                                        @if(Qs::userIsSuperAdmin())
                                                    {{--Delete--}}
                                                    <a id="{{ $d->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ $d->id }}" action="{{ route('dorms.destroy', $d->id) }}" class="hidden">@csrf @method('delete')</form>
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

                <div class="tab-pane fade" id="new-dorm">

                    <div class="row">
                        <div class="col-md-6">
                            <form class="ajax-store" method="post" action="{{ route('dorms.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name of Dormitory">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Description</label>
                                    <div class="col-lg-9">
                                        <input name="description" value="{{ old('description') }}"  type="text" class="form-control" placeholder="Description of Dormitory">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Dorm List Ends--}}

@endsection
