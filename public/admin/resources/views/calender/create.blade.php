@extends('layouts.app')

@section('title', isset($details) ? 'Edit Appointment Booking' : 'Appointment Booking')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ isset($details) ? 'Edit' : 'Add' }} Appointment Booking
        </h1>

        <a href="{{ route('calender.index') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('calender.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                {{-- ✅ TITLE --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $details->title ?? '') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Page Name *</label>
                        <input type="text" name="page_name" class="form-control"
                            value="{{ old('page_name', $details->page_name ?? '') }}" required>
                    </div>
                </div>

                {{-- ✅ STEP WIZARD --}}
                <div class="step-wrapper">
                    <div class="step active" data-step="1">
                        <div class="circle">1</div>
                        <p>Select LP</p>
                    </div>
                    <div class="step" data-step="2">
                        <div class="circle">2</div>
                        <p>Select AA Page</p>
                    </div>
                    <div class="step" data-step="3">
                        <div class="circle">3</div>
                        <p>Select Booking Page</p>
                    </div>
                    <div class="step" data-step="4">
                        <div class="circle">4</div>
                        <p>Select Homework Page</p>
                    </div>
                    <div class="step" data-step="5">
                        <div class="circle">5</div>
                        <p>Select Thank You Page</p>
                    </div>
                </div>

                {{-- ✅ STEP 1 --}}
                <div class="step-content" id="step-1">
                    <label>Select Landing Page</label>
                    <select name="select_lp_id" id="select_lp_id" class="form-control">
                        <option value="">Select LP</option>
                        @foreach($pages as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('select_lp_id', $details->select_lp_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- STEP 2 --}}
                <div class="step-content d-none" id="step-2">
                    <label>Select AA Page</label>
                    <select name="aa_page_id" id="aa_page_id" class="form-control">
                        <option value="">Select AA Page</option>
                        @foreach($pages as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('aa_page_id', $details->aa_page_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div id="lp-aa-error" class="text-danger mt-2" style="display:none;">
    LP and AA Page cannot be same!
</div>

                {{-- STEP 3 --}}
                <div class="step-content d-none" id="step-3">
                    <label>Select Booking Page</label>
                    <select name="select_booking_page_id" class="form-control">
                        <option value="">Select Booking Page</option>
                        @foreach($appointmentbooking as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('select_booking_page_id', $details->select_booking_page_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- STEP 4 --}}
                <div class="step-content d-none" id="step-4">
                    <label>Select Homework Page</label>
                    <select name="homework_page_id" class="form-control">
                        <option value="">Select Homework Page</option>
                        @foreach($appointmenthomework as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('homework_page_id', $details->homework_page_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- STEP 5 --}}
                <div class="step-content d-none" id="step-5">
                    <label>Select Thank You Page</label>
                    <select name="thank_you_id" class="form-control">
                        <option value="">Select Thank You Page</option>
                        @foreach($thankyou as $id => $name)
                            <option value="{{ $id }}"
                                {{ old('thank_you_id', $details->thank_you_id ?? '') == $id ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- BUTTONS --}}
                <div class="mt-3">
                    <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<style>
.step-wrapper {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
.step {
    text-align: center;
    flex: 1;
}
.circle {
    width: 30px;
    height: 30px;
    background: #ccc;
    border-radius: 50%;
    margin: auto;
    color: white;
    line-height: 30px;
}
.step.active .circle {
    background: #007bff;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {

    let step = 1;
    const total = 5;

    function showStep(n) {
        document.querySelectorAll('.step-content').forEach(el => el.classList.add('d-none'));
        document.getElementById('step-'+n).classList.remove('d-none');

        document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
        document.querySelector('[data-step="'+n+'"]').classList.add('active');
    }

    function validateStep() {

        let lp = document.getElementById('select_lp_id').value;
        let aa = document.getElementById('aa_page_id').value;
        let errorBox = document.getElementById('lp-aa-error');

        if (step >= 2 && lp && aa && lp === aa) {
            errorBox.style.display = 'block';
            return false;
        } else {
            errorBox.style.display = 'none';
        }

        return true;
    }

    document.getElementById('nextBtn').onclick = function () {

        if (!validateStep()) return;

        if (step < total) {
            step++;
            showStep(step);
        }
    };

    document.getElementById('prevBtn').onclick = function () {
        if (step > 1) {
            step--;
            showStep(step);
        }
    };

    // 🔥 Real-time validation
    document.getElementById('select_lp_id').addEventListener('change', validateStep);
    document.getElementById('aa_page_id').addEventListener('change', validateStep);

    // 🔥 Final submit validation
    document.querySelector('form').addEventListener('submit', function(e){
        if (!validateStep()) {
            e.preventDefault();
        }
    });

});
</script>
@endsection