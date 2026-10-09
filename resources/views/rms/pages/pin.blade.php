@extends('rms.layout.app')
@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-xl-5">
        <div class="card tcard">
            <div class="card-head bg-g-pink">
                <h6>Update PIN</h6>
                <small class="opacity-75">Your PIN must be exactly 4 digits.</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('rms.pin.update') }}" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Current PIN</label>
                        <input type="password" name="current_pin" maxlength="4" inputmode="numeric"
                               autocomplete="off"
                               class="form-control @error('current_pin') is-invalid @enderror" required>
                        @error('current_pin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">New PIN</label>
                        <input type="password" name="pin" maxlength="4" inputmode="numeric"
                               autocomplete="off"
                               class="form-control @error('pin') is-invalid @enderror" required>
                        @error('pin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Confirm New PIN</label>
                        <input type="password" name="pin_confirmation" maxlength="4" inputmode="numeric"
                               autocomplete="off" class="form-control" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-shield-lock"></i> Update PIN
                        </button>
                        <a href="{{ route('rms.profile') }}" class="btn btn-outline-secondary">Back to Profile</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Allow digits only --}}
<script>
    document.querySelectorAll('input[inputmode="numeric"]').forEach(el => {
        el.addEventListener('input', () => el.value = el.value.replace(/\D/g, ''));
    });
</script>
@endsection
