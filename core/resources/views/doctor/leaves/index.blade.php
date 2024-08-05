@extends('doctor.layouts.app')
@section('panel')
<div class="row">
    <div class="col-lg-12">
            <form action="{{ route('doctor.leave.update') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                    <label>@lang('Slot Type') hkhkjhkj</label>
                                    <select name="slot_type" id="slot-type" class="form-control" required>
                                        <option value="" selected disabled>@lang('Select One')</option>
                                        <option value="1" @selected($doctor->slot_type == 1)>@lang('Serial')</option>
                                        <option value="2" @selected($doctor->slot_type == 2)>@lang('Time')</option>
                                    </select>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>