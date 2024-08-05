@extends('doctor.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('doctor.schedule.update') }}" method="post">
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

                            <div class="col-md-3 col-lg-6">
                                <div class="form-group">
                                    <label>@lang('For How Many Days')
                                        <i class="fa fa-info-circle text--primary" title="@lang('This will define that your appointment booking will be taken for the next how many days including today. That means with everyday it will add your given value.')">
                                    </i>
                                </label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="serial_day"
                                            value="{{ $doctor->serial_day }}" required>
                                        <span class="input-group-text">@lang('Days')</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-6 start d-none">
                                <div class="form-group">
                                    <label for="WorkingDays">Select Working Days:</label>
                                    <div class="input-group">
                                    <select id="WorkingDays" name="WorkingDays[]" multiple>
                                        <!-- <option value="0">Select Working Days</option> -->
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-6 start d-none">
                                <div class="form-group">
                                    <label>@lang('Start Time')</label>
                                    <div class="input-group">
                                        <input type="text" name="start_time"
                                            value="{{ old('start_time', $doctor->start_time) }}"
                                            class="form-control time-picker" autocomplete="off">
                                        <span class="input-group-text"><i class="las la-clock"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-6 end d-none">
                                <div class="form-group">
                                    <label>@lang('End Time')</label>
                                    <div class="input-group">
                                        <input type="text" name="end_time"
                                            value="{{ old('end_time', $doctor->end_time) }}"
                                            class="form-control time-picker" autocomplete="off">
                                        <span class="input-group-text"><i class="las la-clock"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 duration d-none">
                                <div class="form-group">
                                    <label> @lang('Time Duration')</label>
                                    <div class="input-group">
                                        <input type="text" name="duration" class="form-control"
                                            value="{{ old('duration', $doctor->duration) }}">
                                            <span class="input-group-text">@lang('Minutes')</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-12 serial d-none">
                                <div class="form-group">
                                    <label> @lang('Maximum Serial')</label>
                                    <input type="text" class="form-control" name="max_serial"
                                        value="{{ old('max_serial', $doctor->max_serial) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-none-30 mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($doctor->slot_type && $doctor->serial_or_slot)
                        <h4>@lang('System of Current Schedule')</h4>
                        <hr>
                        <div class="mt-4">
                            @foreach ($doctor->serial_or_slot as $item)
                                <button type="button" class="btn btn--primary mr-2 mb-2">{{ $item }}</button>
                            @endforeach
                        </div>
                    @else
                        <h5 class="text-center">@lang('You have no schedule')!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style-lib')
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor/datepicker.min.css')}}">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/jquery.multiselect.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            'use strict';
       
            $('select[name=slot_type]').on('change', function() {
                var type = $(this).val();
                schedule(type);
            })
            

            $('#serial_day').on('blur', function() { 
                window.location = window.location.href;
            });

            window.onbeforeunload = function() {
                localStorage.setItem("serial_day", $('#serial_day').val());
            }

            window.onload = function() {

                var name = localStorage.getItem("serial_day");
                if (name !== null) $('#serial_day').val(name);
                let days = $("#serial_day").val();
                
                var daysArr = [];
                var currentDate = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                for (var i = 0; i < days; i++) {
                    var nextDay = new Date(currentDate.getTime() + i * 24 * 60 * 60 * 1000);
                    daysArr.push(nextDay.toLocaleDateString('en-US', options));
                }
                var selectElement = $("#WorkingDays");
               
                // $("#ms-list-1").remove();
                $.each(daysArr, function(index, value) {
                    selectElement.append($("<option></option>").attr("value", value).text(value));
                    
                });
                $('#WorkingDays').multiselect({ texts: { placeholder: 'Select options' } ,selectAll: true});
            }


            var type = $('select[name=slot_type]').val();
            if (type) {
                schedule(type);
            }

            function schedule(type) {
                if (type == 1) {
                    $('.duration').addClass('d-none');
                    $('.serial').removeClass('d-none');
                    $('.start').addClass('d-none');
                    $('.end').addClass('d-none');
                } else {
                    $('.start').removeClass('d-none');
                    $('.end').removeClass('d-none');
                    $('.serial').addClass('d-none');
                    $('.duration').removeClass('d-none')
                }
            }

            initTimePicker();

            function initTimePicker() {
                var start = new Date();
                start.setHours(9);
                start.setMinutes(0);

                $('.time-picker').datepicker({
                    onlyTimepicker: true,
                    timepicker: true,
                    startDate: start,
                    language: 'en',
                    minHours: 0,
                    maxHours: 23,
                });
            }
        })(jQuery);
    </script>
@endpush
