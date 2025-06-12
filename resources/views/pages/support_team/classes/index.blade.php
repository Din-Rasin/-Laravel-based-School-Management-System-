@extends('layouts.master')
@section('page_title', 'Manage Classes')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Classes</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Classes</a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Class</a></li>
            </ul> --}}
            <!-- 3D Tab Styles with Icon Support -->
<style>
    .nav-tabs-highlight .nav-link {
        color: rgb(255, 0, 0);
        font-weight: 600;
        border: 2px solid #4a90e2;
        border-radius: 8px;
        padding: 8px 16px;
        margin-right: 8px;
        background-color: white;
        box-shadow: 0 6px 0 #357ABD, 0 6px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }

    .nav-tabs-highlight .nav-link:hover {
        background-color: #eaf4ff;
        box-shadow: 0 4px 0 #357ABD, 0 4px 12px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .nav-tabs-highlight .nav-link:active {
        transform: translateY(3px);
        box-shadow: 0 2px 0 #357ABD, 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .nav-tabs-highlight .nav-link.active {
        background-color: #dceeff;
        font-weight: bold;
        box-shadow: 0 6px 0 #357ABD, 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .nav-tabs-highlight .nav-link i {
        margin-right: 6px;
    }
</style>

<!-- Updated Nav Tabs with Icons -->
<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item">
        <a href="#all-classes" class="nav-link active" data-toggle="tab">
            <i class="icon-grid52"></i> Manage Classes
        </a>
    </li>
    <li class="nav-item">
        <a href="#new-class" class="nav-link" data-toggle="tab">
            <i class="icon-plus2"></i> Create New Class
        </a>
    </li>
</ul>


            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Class Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($my_classes as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->class_type->name }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('classes.edit', $c->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                   @endif
                                                        @if(Qs::userIsSuperAdmin())
                                                    {{--Delete--}}
                                                    <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ $c->id }}" action="{{ route('classes.destroy', $c->id) }}" class="hidden">@csrf @method('delete')</form>
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

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                                <span>When a class is created, a Section will be automatically created for the class, you can edit it or add more sections to the class at <a target="_blank" href="{{ route('sections.index') }}">Manage Sections</a></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <form class="ajax-store" method="post" action="{{ route('classes.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name of Class">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Class Type</label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class Type" class="form-control select" name="class_type_id" id="class_type_id">
                                            @foreach($class_types as $ct)
                                                <option {{ old('class_type_id') == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div> --}}

                                <!-- 3D Button Styles -->
<style>
    .btn-3d {
        background-color: #007bff;
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        box-shadow: 0 6px 0 #0056b3, 0 6px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.2s ease-in-out;
        position: relative;
    }

    .btn-3d i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .btn-3d:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 0 #003f88, 0 4px 12px rgba(0, 0, 0, 0.15);
        transform: translateY(-1px);
    }

    .btn-3d:active {
        transform: translateY(3px);
        box-shadow: 0 2px 0 #003f88, 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-3d:hover i {
        transform: translateX(3px);
    }
</style>

<!-- Submit Button HTML -->
<div class="text-right">
    <button id="ajax-btn" type="submit" class="btn btn-3d">
        Submit form <i class="icon-paperplane"></i>
    </button>
</div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Class List Ends--}}

@endsection
