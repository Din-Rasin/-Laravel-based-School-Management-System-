@extends('layouts.master')
@section('page_title', 'Manage Users')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Users</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            {{-- <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-user" class="nav-link active" data-toggle="tab">Create New User</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Users</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($user_types as $ut)
                            <a href="#ut-{{ Qs::hash($ut->id) }}" class="dropdown-item" data-toggle="tab">{{ $ut->name }}s</a>
                        @endforeach
                    </div>
                </li>
            </ul> --}}

            {{-- <style>
    .nav-tabs-highlight .nav-link {
        color: #ff0000;
        font-weight: 600;
        border: 2px solid #4a90e2;
        border-radius: 8px;
        padding: 8px 16px;
        margin-right: 8px;
        background-color: white;
        box-shadow: 0 6px 0 #357ABD, 0 6px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: inline-block;
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

    .nav-tabs-highlight .dropdown-menu {
        animation: fadeInScale 0.3s ease-in-out;
        border-radius: 8px;
        padding: 10px 0;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .nav-tabs-highlight .dropdown-item {
        padding: 10px 20px;
        transition: background 0.3s ease, transform 0.2s ease;
        border-radius: 6px;
    }

    .nav-tabs-highlight .dropdown-item:hover {
        background-color: #f0f8ff;
        transform: translateX(5px);
    }

    @keyframes fadeInScale {
        0% {
            opacity: 0;
            transform: scale(0.95);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

<ul class="nav nav-tabs nav-tabs-highlight">
  <!-- 3D CSS Styling -->
<style>
    .nav-tabs-highlight .nav-link {
        color: #e24a4a;
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
</style>

<!-- Nav Tabs -->
<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item">
        <a href="#new-user" class="nav-link active" data-toggle="tab">
            Create New User
        </a>
    </li>
</ul>

    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            Manage Users
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @foreach($user_types as $ut)
                <a href="#ut-{{ Qs::hash($ut->id) }}" class="dropdown-item" data-toggle="tab">
                    {{ $ut->name }}s
                </a>
            @endforeach
        </div>
    </li>
</ul> --}}
<!-- 3D CSS Styling -->
<style>
    .nav-tabs-highlight .nav-link {
        color: #e24a4a;
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
</style>

<!-- Nav Tabs -->
<ul class="nav nav-tabs nav-tabs-highlight">
    <li class="nav-item">
        <a href="#new-user" class="nav-link active" data-toggle="tab">Create New User</a>
    </li>

    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Users</a>
        <div class="dropdown-menu dropdown-menu-right">
            @foreach($user_types as $ut)
                <a href="#ut-{{ Qs::hash($ut->id) }}" class="dropdown-item" data-toggle="tab">
                    {{ $ut->name }}s
                </a>
            @endforeach
        </div>
    </li>
</ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="new-user">
                    <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('users.store') }}" data-fouc>
                        @csrf
                    <h6>Personal Data</h6>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="user_type"> Select User: <span class="text-danger">*</span></label>
                                        <select required data-placeholder="Select User" class="form-control select" name="user_type" id="user_type">
                                @foreach($user_types as $ut)
                                    <option value="{{ Qs::hash($ut->id) }}">{{ $ut->name }}</option>
                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Full Name: <span class="text-danger">*</span></label>
                                        <input value="{{ old('name') }}" required type="text" name="name" placeholder="Full Name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address: <span class="text-danger">*</span></label>
                                        <input value="{{ old('address') }}" class="form-control" placeholder="Address" name="address" type="text" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email address: </label>
                                        <input value="{{ old('email') }}" type="email" name="email" class="form-control" placeholder="your@email.com">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Username: </label>
                                        <input value="{{ old('username') }}" type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input value="{{ old('phone') }}" type="text" name="phone" class="form-control" placeholder="+2341234567" >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telephone:</label>
                                        <input value="{{ old('phone2') }}" type="text" name="phone2" class="form-control" placeholder="+2341234567" >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date of Employment:</label>
                                        <input autocomplete="off" name="emp_date" value="{{ old('emp_date') }}" type="text" class="form-control date-pick" placeholder="Select Date...">

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Password: </label>
                                        <input id="password" type="password" name="password" class="form-control"  >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Gender: <span class="text-danger">*</span></label>
                                        <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                            <option value=""></option>
                                            <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                            <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                                        <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                            <option value=""></option>
                                            @foreach($nationals as $nal)
                                                <option {{ (old('nal_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{--State--}}
                                <div class="col-md-4">
                                    <label for="state_id">State: <span class="text-danger">*</span></label>
                                    <select onchange="getLGA(this.value)" required data-placeholder="Choose.." class="select-search form-control" name="state_id" id="state_id">
                                        <option value=""></option>
                                        @foreach($states as $st)
                                            <option {{ (old('state_id') == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--LGA--}}
                                <div class="col-md-4">
                                    <label for="lga_id">LGA: <span class="text-danger">*</span></label>
                                    <select required data-placeholder="Select State First" class="select-search form-control" name="lga_id" id="lga_id">
                                        <option value=""></option>
                                    </select>
                                </div>
                                {{--BLOOD GROUP--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bg_id">Blood Group: </label>
                                        <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">
                                            <option value=""></option>
                                            @foreach($blood_groups as $bg)
                                                <option {{ (old('bg_id') == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                {{--PASSPORT--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="d-block">Upload Passport Photo:</label>
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                                        <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                                    </div>
                                </div>
                            </div>

                        </fieldset>



                    </form>
                </div>

                @foreach($user_types as $ut)
                    <div class="tab-pane fade" id="ut-{{Qs::hash($ut->id)}}">                         <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users->where('user_type', $ut->title) as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="{{ $u->photo }}" alt="photo"></td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->username }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    {{--View Profile--}}
                                                    <a href="{{ route('users.show', Qs::hash($u->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                                    {{--Edit--}}
                                                    <a href="{{ route('users.edit', Qs::hash($u->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                @if(Qs::userIsSuperAdmin())

                                                        <a href="{{ route('users.reset_pass', Qs::hash($u->id)) }}" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>
                                                        {{--Delete--}}
                                                        <a id="{{ Qs::hash($u->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                        <form method="post" id="item-delete-{{ Qs::hash($u->id) }}" action="{{ route('users.destroy', Qs::hash($u->id)) }}" class="hidden">@csrf @method('delete')</form>
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
