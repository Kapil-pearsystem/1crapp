@extends('layouts.app')

@section('title', isset($details) ? 'Edit Schedule Appointment' : 'Add Schedule Appointment')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ isset($details) ? 'Edit' : 'Add' }} Schedule Appointment
        </h1>

        <a href="{{ route('schedule-appointment.index') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('schedule-appointment.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="row">

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $details->title ?? '') }}" required>
                    </div>

                    {{-- Date --}}
                    <div class="col-md-6 mb-3">
                        <label>Schedule Date *</label>
                        <input type="date" name="schedule_date" class="form-control"
                            value="{{ old('schedule_date', isset($details->schedule_date) ? date('Y-m-d', strtotime($details->schedule_date)) : '') }}"
                            required>
                    </div>

                    {{-- Time --}}
                    <div class="col-md-6 mb-3">
                        <label>Schedule Time *</label>
                        <div class="d-flex">

                            <!-- Hour -->
                            <select name="schedule_hour" class="form-control mr-2" required>
                                <option value="">HH</option>
                                @for($i=1; $i<=12; $i++) <option value="{{ str_pad($i,2,'0',STR_PAD_LEFT) }}"
                                    {{ old('schedule_hour', $details->schedule_hour ?? '') == str_pad($i,2,'0',STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($i,2,'0',STR_PAD_LEFT) }}
                                    </option>
                                    @endfor
                            </select>

                            <!-- Minute -->
                            <select name="schedule_minute" class="form-control mr-2" required>
                                <option value="">MM</option>
                                @for($i=0; $i<=59; $i++) <option value="{{ str_pad($i,2,'0',STR_PAD_LEFT) }}"
                                    {{ old('schedule_minute', $details->schedule_minute ?? '') == str_pad($i,2,'0',STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($i,2,'0',STR_PAD_LEFT) }}
                                    </option>
                                    @endfor
                            </select>

                            <!-- AM/PM -->
                            <select name="schedule_am_pm" class="form-control" required>
                                <option value="AM"
                                    {{ old('schedule_am_pm', $details->schedule_am_pm ?? '') == 'AM' ? 'selected' : '' }}>
                                    AM</option>
                                <option value="PM"
                                    {{ old('schedule_am_pm', $details->schedule_am_pm ?? '') == 'PM' ? 'selected' : '' }}>
                                    PM</option>
                            </select>

                        </div>
                    </div>

                    {{-- Duration --}}
                    <div class="col-md-6 mb-3">
                        <label>Duration (minutes)</label>
                        <input type="number" name="duration" class="form-control"
                            value="{{ old('duration', $details->duration ?? '') }}">
                    </div>

                    {{-- Calendar --}}
                    <div class="col-md-6 mb-3">
                        <label>Select Calendar</label>
                        <select name="calender_id" class="form-control">
                            <option value="">Select</option>
                            @foreach($calenders as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('calender_id', $details->calendar_product_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Meeting URL --}}
                    <div class="col-md-6 mb-3">
                        <label>Meeting URL</label>
                        <input type="text" name="meeting_url" class="form-control"
                            value="{{ old('meeting_url', $details->location_url ?? '') }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Select Contacts</label>
                        <select name="contacts_list[]" class="form-control">
                            @foreach($contacts as $id => $name)
                            <option value="{{ $id }}"
                                {{ (isset($details->contact_list_id) && in_array($id, explode(',', $details->contact_list_id))) ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tags --}}
                    <div class="col-md-6 mb-3">
                        <label>Select Tags</label>
                        <select name="tags[]" id="tags" class="form-control" multiple>
                            @foreach($tags as $id => $name)
                            <option value="{{ $id }}"
                                {{ (isset($details->tags) && in_array($id, $details->tags)) ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Excluded Tags</label>
                        <input type="text" name="excluded_tags" class="form-control"
                            value="{{ old('excluded_tags', isset($details->excluded_tags) ? implode(',', $details->excluded_tags) : '') }}">
                    </div>

                    {{-- Remarks --}}
                    <div class="col-md-12 mb-3">
                        <label>Remarks</label>
                        <textarea name="remarks"
                            class="form-control">{{ old('remarks', $details->remarks ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Remind Me</label><br>
                        <input type="checkbox" id="remind_me" name="remind_me" value="1"
                            {{ old('remind_me', $details->remind_me ?? 0) == 1 ? 'checked' : '' }}>
                    </div>

                    <div class="col-md-12" id="remind_me_fields" style="display:none;">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Remind me via</label>
                                <select name="remind_me_via" class="form-control">
                                    <option value="Email"
                                        {{ old('remind_me_via', $details->remind_me_via ?? '') == 'Email' ? 'selected' : '' }}>
                                        Email</option>
                                    <option value="SMS"
                                        {{ old('remind_me_via', $details->remind_me_via ?? '') == 'SMS' ? 'selected' : '' }}>
                                        SMS</option>
                                    <option value="Email & SMS"
                                        {{ old('remind_me_via', $details->remind_me_via ?? '') == 'Email & SMS' ? 'selected' : '' }}>
                                        Email & SMS</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Remind me at</label>
                                <select name="remind_me_at" class="form-control">
                                    <option value="10 mins before"
                                        {{ old('remind_me_at', $details->remind_me_at ?? '') == '10 mins before' ? 'selected' : '' }}>
                                        10 mins before</option>
                                    <option value="30 mins before"
                                        {{ old('remind_me_at', $details->remind_me_at ?? '') == '30 mins before' ? 'selected' : '' }}>
                                        30 mins before</option>
                                    <option value="1 hour before"
                                        {{ old('remind_me_at', $details->remind_me_at ?? '') == '1 hour before' ? 'selected' : '' }}>
                                        1 hour before</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Remind me message</label>
                                <textarea name="remind_me_message"
                                    class="form-control">{{ old('remind_me_message', $details->remind_me_message ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Remind Customer</label><br>
                        <input type="checkbox" id="remind_customer" name="remind_customer" value="1"
                            {{ old('remind_customer', $details->remind_customer ?? 0) == 1 ? 'checked' : '' }}>
                    </div>

                    <div class="col-md-12" id="remind_customer_fields" style="display:none;">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Remind customer via</label>
                                <select name="remind_customer_via" class="form-control">
                                    <option value="Email"
                                        {{ old('remind_customer_via', $details->remind_customer_via ?? '') == 'Email' ? 'selected' : '' }}>
                                        Email</option>
                                    <option value="SMS"
                                        {{ old('remind_customer_via', $details->remind_customer_via ?? '') == 'SMS' ? 'selected' : '' }}>
                                        SMS</option>
                                    <option value="Email & SMS"
                                        {{ old('remind_customer_via', $details->remind_customer_via ?? '') == 'Email & SMS' ? 'selected' : '' }}>
                                        Email & SMS</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Remind customer at</label>
                                <select name="remind_customer_at" class="form-control">
                                    <option value="10 mins before"
                                        {{ old('remind_customer_at', $details->remind_customer_at ?? '') == '10 mins before' ? 'selected' : '' }}>
                                        10 mins before</option>
                                    <option value="30 mins before"
                                        {{ old('remind_customer_at', $details->remind_customer_at ?? '') == '30 mins before' ? 'selected' : '' }}>
                                        30 mins before</option>
                                    <option value="1 hour before"
                                        {{ old('remind_customer_at', $details->remind_customer_at ?? '') == '1 hour before' ? 'selected' : '' }}>
                                        1 hour before</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Remind customer message</label>
                                <textarea name="remind_customer_message" class="form-control">
    {{ old('remind_customer_message', $details->remind_customer_message ?? '') }}
</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active
                            </option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Save' }}
                </button>

                <a href="{{ route('schedule-appointment.index') }}"
                    class="btn btn-secondary float-right mr-2">Cancel</a>
            </div>

        </form>
    </div>

</div>
@endsection
@section('scripts')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (agar already nahi hai) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {

    // ✅ Tags (multiple with chips)
    $('#tags').select2({
        placeholder: "Select Tags",
        allowClear: true
    });

    // ✅ Excluded Tags (multiple with chips)
    $('#excluded_tags').select2({
        placeholder: "Excluded Tags",
        allowClear: true
    });

    // ✅ Contacts (single select)
    $('#contacts').select2({
        placeholder: "Select Contact",
        allowClear: true
    });

});
</script>
<script>
$(document).ready(function() {

    function toggleRemindMe() {
        if ($('#remind_me').is(':checked')) {
            $('#remind_me_fields').slideDown();
        } else {
            $('#remind_me_fields').slideUp();
        }
    }

    function toggleRemindCustomer() {
        if ($('#remind_customer').is(':checked')) {
            $('#remind_customer_fields').slideDown();
        } else {
            $('#remind_customer_fields').slideUp();
        }
    }

    // 🔥 On page load (edit mode ke liye)
    toggleRemindMe();
    toggleRemindCustomer();

    // 🔥 On change
    $('#remind_me').change(toggleRemindMe);
    $('#remind_customer').change(toggleRemindCustomer);

});
</script>
@endsection