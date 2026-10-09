@extends('rms.layout.app')
@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">
    {{-- Shop / account summary --}}
    <div class="col-12 col-xl-4">
        <div class="card stat">
            <div class="float-icon bg-g-pink"><i class="bi bi-person-fill"></i></div>
            <div class="body"><small>Tenant</small>
                <h4>{{ $tenant->name }}</h4>
            </div>
            <div class="foot">{{ $tenant->mobile }}</div>
        </div>
        <div class="card stat mt-4">
            <div class="float-icon bg-g-blue"><i class="bi bi-house-door-fill"></i></div>
            <div class="body"><small>Shop</small>
                <h4>{{ $tenant->shop->shop_name ?? '-' }}</h4>
            </div>
            <div class="foot">{{ $tenant->project->name ?? 'Project' }}</div>
        </div>
    </div>

    {{-- Profile form --}}
    <div class="col-12 col-xl-8">
        <div class="card tcard">
            <div class="card-head bg-g-pink">
                <h6>Update Profile</h6>
                <small class="opacity-75">Keep your contact details up to date.</small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('rms.profile.update') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')

                    {{-- Profile image --}}
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <img id="profilePreview"
                             src="{{ $tenant->profile ? $tenant->profile : 'https://ui-avatars.com/api/?background=random&name=' . urlencode($tenant->name) }}"
                             alt="Profile" class="rounded-circle border"
                             style="width:90px;height:90px;object-fit:cover;">
                        <div class="flex-grow-1">
                            <label class="form-label fw-bold mb-1">Profile Image</label>
                            <input type="file" name="profile" id="profileInput" accept="image/png,image/jpeg,image/webp"
                                   class="form-control @error('profile') is-invalid @enderror">
                            @error('profile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <small class="text-muted">JPG, PNG or WEBP. Max 2 MB.</small>
                            @if($tenant->profile)
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" name="remove_profile" value="1" id="removeProfile">
                                    <label class="form-check-label" for="removeProfile">Remove current image</label>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $tenant->name) }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $tenant->email) }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Mobile</label>
                            <input type="text" name="mobile" maxlength="10" inputmode="numeric"
                                   class="form-control @error('mobile') is-invalid @enderror"
                                   value="{{ old('mobile', $tenant->mobile) }}" required>
                            @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Shop</label>
                            <input type="text" class="form-control" value="{{ $tenant->shop->shop_name ?? '-' }}" disabled>
                        </div>

                        <!-- <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">Rent Reminder Day</label>
                            <input type="text" class="form-control" value="{{ $tenant->reminder_day ?? '-' }}" disabled>
                        </div> -->
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Save Changes
                        </button>
                        <a href="{{ route('rms.pin') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-key"></i> Change PIN
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Live preview of the selected image
    document.getElementById('profileInput').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            document.getElementById('profilePreview').src = URL.createObjectURL(file);
        }
    });
</script>
@endsection