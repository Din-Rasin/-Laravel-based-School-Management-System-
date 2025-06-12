@extends('layouts.master')
@section('page_title', 'Create Payment')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Create Payment</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-store" method="post" action="{{ route('payments.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Title <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="title" value="{{ old('title') }}" required type="text" class="form-control" placeholder="Eg. School Fees">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Class </label>
                            <div class="col-lg-9">
                                <select class="form-control select-search" name="my_class_id" id="my_class_id">
                                    <option value="">All Classes</option>
                                    @foreach($my_classes as $c)
                                        <option {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="method" class="col-lg-3 col-form-label font-weight-semibold">Payment Method</label>
                            <div class="col-lg-9">
                                <select class="form-control select" name="method" id="method">
                                    <option selected value="Cash">Cash</option>
                                    <option disabled value="Online">Online</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-lg-3 col-form-label font-weight-semibold">Amount (<del style="text-decoration-style: double">N</del>) <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input class="form-control" value="{{ old('amount') }}" required name="amount" id="amount" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-lg-3 col-form-label font-weight-semibold">Description</label>
                            <div class="col-lg-9">
                                <input class="form-control" value="{{ old('description') }}" name="description" id="description" type="text">
                            </div>
                        </div>

                        {{-- <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div> --}}

                        <div class="text-right">
                              <button type="submit" class="btn btn-primary"
                                style="
                                  border: 2px solid #007bff;
                                  border-radius: 5px;
                                  padding: 10px 18px;
                                  font-weight: bold;
                                  background-color: #007bff;
                                  color: white;
                                  transition: all 0.2s ease;
                                  box-shadow: 0 6px 0 #0056b3, 0 6px 15px rgba(0, 0, 0, 0.2);
                                  cursor: pointer;"
                                onmouseover="this.style.boxShadow='0 4px 0 #0056b3, 0 4px 12px rgba(0, 0, 0, 0.15)'"
                                onmouseout="this.style.boxShadow='0 6px 0 #0056b3, 0 6px 15px rgba(0, 0, 0, 0.2)'"
                                onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #0056b3, 0 2px 8px rgba(0, 0, 0, 0.1)'"
                                onmouseup="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 0 #0056b3, 0 4px 12px rgba(0, 0, 0, 0.15)'"
                              >
                                Submit form <i class="icon-paperplane ml-2"></i>
                              </button>
                       </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Payment Create Ends--}}

@endsection
