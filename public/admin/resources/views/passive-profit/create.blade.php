@extends('layouts.app')
@php
$module_name = 'Passive Profit';
$module_url = 'passive-profit';
@endphp

@section('title', isset($details) ? 'Edit '.$module_name : 'Add '.$module_name)
@section('content')
<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery and Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} {{ $module_name }}</h1>
        <a href="{{ route('passive-profit.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <form method="POST" action="{{ route('passive-profit.store') }}">
        @csrf
        <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
        <div class="form-group row">
            <div class="card-body mt-5" style="background: rgb(190, 218, 253);">

                <div id="brd_box" class="form-group row">
                    <div class="col-sm-4 mb-3 mt-1 mb-sm-0">
                        <span style="color: red;">*</span>Property
                        <select name="property_id" id="property_id" class="form-control" required>
                            <option value="">Select</option>
                            @foreach($properties as $property)
                            <option value="{{ $property->id }}" {{ (old('property_id') ?? ($details->property_id ?? '')) == $property->id ? 'selected' : '' }}>{{ $property->property_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4 mb-2 mt-1 mb-sm-0"><span style="color: red;">*</span>Consideration Value/Amount
                        <input type="text" id="amount" placeholder="Enter Amount" name="amount" value="{{ old('amount') ?? ($details->amount ?? '') }}" class="form-control form-control-user" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required/>
                    </div>
                    <div class="col-sm-4 mb-2 mt-1 mb-sm-0"><span style="color: red;">*</span>Max Commission Percentage
                        <input type="text" id="max_commission_percentage" placeholder="Enter Max Commission Percentage" name="max_commission_percentage" value="{{ old('max_commission_percentage') ?? ($details->max_commission_percentage ?? '') }}" class="form-control form-control-user" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required/>
                    </div>
                </div>
                <div id="brd_box" class="form-group row">
                    <div class="col-sm-6 mb-3 mt-1 mb-sm-0">
                        <span style="color: red;">*</span>Level 1 User <br>
                        <select name="level1_user_id[]" id="level1_user_id" class="form-control" required>
                            <option value="">Select User</option>
                            @foreach($customers as $user)
                            <option value="{{ $user->id }}"
                                {{ collect(old('level1_user_id', (isset($level1['ids']) && is_array($level1['ids']) ? $level1['ids'] : [])))->contains($user->id) ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0"><span style="color: red;">*</span>Level 1 Commission (%)
                        <input type="text" id="level1_commission" placeholder="Enter Level 1 Commission" name="level1_commission" value="{{ old('level1_commission') ?? (isset($level1['percentage'])?$level1['percentage']: '') }}" class="form-control form-control-user user_commission" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required/>
                    </div>
                </div>
                <div id="brd_box" class="form-group row">
                    <div class="col-sm-6 mb-3 mt-1 mb-sm-0">

                         Level 2 Users <br>
                        <select name="level2_user_id[]" id="level2_user_id" style="width: 100%;" class="form-control" multiple>
                            @foreach($customers as $user)
                                <option value="{{ $user->id }}"
                                    {{ collect(old('level2_user_id', (isset($level2['ids']) && is_array($level2['ids']) ? $level2['ids'] : [])))->contains($user->id) ? 'selected' : '' }}
                                    >


                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0">Level 2 Commission (%)
                        <input type="text" id="level2_commission" placeholder="Enter Level 2 Commission" name="level2_commission" value="{{ old('level2_commission') ?? (isset($level2['percentage'])?$level2['percentage']: '') }}" class="form-control form-control-user user_commission" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
                    </div>
                </div>
                <div id="brd_box" class="form-group row">
                    <div class="col-sm-6 mb-3 mt-1 mb-sm-0">

                         Level 3 Users <br>
                        <select name="level3_user_id[]" id="level3_user_id" style="width: 100%;" class="form-control" multiple>
                            @foreach($customers as $user)
                                <option value="{{ $user->id }}"
                                    {{ collect(old('level3_user_id', (isset($level3['ids']) && is_array($level3['ids']) ? $level3['ids'] : [])))->contains($user->id) ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-6 mb-2 mt-1 mb-sm-0">Level 3 Commission (%)
                        <input type="text" id="level3_commission" placeholder="Enter Level 3 Commission" name="level3_commission" value="{{ old('level3_commission') ?? (isset($level3['percentage'])?$level3['percentage']: '') }}" class="form-control form-control-user user_commission" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
                    </div>
                </div>

                <div class="card-footer" style="display: inline-block; width: 100%; background: transparent; border: none; text-align: center; padding-bottom: 0px;">
                    <a href="{{ route('passive-profit.index') }}" class="btn btn-primary mb-3 mr-3">Cancel</a>
                    <button type="submit" class="btn btn-success btn-user mb-3">{{ isset($details) ? 'Update' : 'Submit' }}</button>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#level1_user_id').on('change', function () {
            // alert('Level 1 User changed');
            const selectedLevel1 = $(this).val();
            console.log('Selected Level 1:', selectedLevel1);
            // Re-enable and show all Level 2 options first
            $('#level2_user_id option').prop('disabled', false).show();

            if (selectedLevel1) {
                // Disable & hide the same user in Level 2
                $('#level2_user_id option[value="' + selectedLevel1 + '"]').prop('disabled', true).hide();
                $('#level3_user_id option[value="' + selectedLevel1 + '"]').prop('disabled', true).hide();
            }

            // If you're using Select2
            $('#level2_user_id').trigger('change.select2');
            $('#level3_user_id').trigger('change.select2');
        });

        // Trigger on page load (to reflect initial value)
        $('#level1_user_id').trigger('change');
    });
   $(document).ready(function () {
        function updateLevel3Options() {
            const selectedLevel1Raw = $('#level1_user_id').val();
            const selectedLevel1 = selectedLevel1Raw ? [selectedLevel1Raw] : [];
            const selectedLevel2 = $('#level2_user_id').val() || [];
            // Merge both arrays into one
            const allSelected = [...new Set([...selectedLevel2, ...selectedLevel1])];
            // Re-enable and show all Level 3 options
            $('#level3_user_id option').prop('disabled', false).show();

            // Disable & hide any users selected in Level 1 or 2
            allSelected.forEach(function (userId) {
                $('#level3_user_id option[value="' + userId + '"]').prop('disabled', true).hide();
            });

            // Refresh Select2 if you're using it
            $('#level3_user_id').trigger('change.select2');
        }

        // Bind the change events
        $('#level1_user_id, #level2_user_id').on('change', updateLevel3Options);

        // Trigger on page load to reflect initial state
        updateLevel3Options();
    });

    $(document).ready(function () {
        $('.user_commission').on('input', function () {
            const $current = $(this);
            let currentVal = parseFloat($current.val()) || 0;

            // Calculate total of other fields
            let totalOthers = 0;
            $('.user_commission').not($current).each(function () {
                totalOthers += parseFloat($(this).val()) || 0;
            });
            const total = totalOthers + currentVal;

            if (total > 100) {
                alert('Total commission cannot exceed 100%');
            }
            let maxAllowed = 100 - totalOthers;

            if (currentVal > maxAllowed) {
                $current.val(maxAllowed);
                currentVal = maxAllowed;
            }
        });
    });
</script>

