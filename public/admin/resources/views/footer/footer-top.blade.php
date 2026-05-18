@extends('layouts.app')
@section('title', isset($details) ? 'Edit Footer Top' : 'Add Footer Top')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Footer Top</h1>
        <div class="justify-content-end">
        <a href="{{ route('footer-top.menu') }}" class="btn btn-sm btn-info shadow-sm">
            <i class="fas fa-list fa-sm text-white-50"></i> Menu
        </a>
        <a href="#" onclick="window.history.back()" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
        </div>
    </div>
    @include('common.alert')
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('footer-top.save') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- logo Upload -->
                    <div class="col-sm-5 mb-2">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control" />
                        @if(isset($details) && $details->logo)
                        <div class="mt-2">
                            <img src="{{ $details->logo }}" width="100" alt="Current logo">
                        </div>
                        @endif
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-5 mb-2">
                        <label>Logo Link</label>
                        <input type="url" name="logo_link" placeholder="Enter logo link" value="{{ old('logo_link', $details->logo_link ?? '') }}" class="form-control" />
                        @error('logo_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Logo Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="logo_enable" value="1" {{ (old('logo_enable', $details->logo_enable ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5 mb-2">
                        <label>Playstore Logo</label>
                        <input type="file" name="playstore_logo" class="form-control" />
                        @if(isset($details) && $details->playstore_logo)
                        <div class="mt-2">
                            <img src="{{ $details->playstore_logo }}" width="100" alt="Current Playstore Logo">
                        </div>
                        @endif
                        @error('playstore_logo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-5 mb-2">
                        <label>Playstore Link</label>
                        <input type="url" name="playstore_link" placeholder="Enter Playstore Link" value="{{ old('playstore_link', $details->playstore_link ?? '') }}" class="form-control" />
                        @error('playstore_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Playstore Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="playstore_enable" value="1" {{ (old('playstore_enable', $details->playstore_enable ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Promotion Title</label>
                        <input type="text" name="promo_title" class="form-control" required
                            value="{{ old('promo_title', $details->promo_title ?? '') }}" placeholder="Enter promotion title" />
                        @error('promo_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Promotion Sub Title</label>
                        <input type="text" name="promo_subtitle" class="form-control" required
                            value="{{ old('promo_subtitle', $details->promo_subtitle ?? '') }}" placeholder="Enter promotion sub title" />
                        @error('promo_subtitle')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label>Promotion Content</label>
                        <input type="text" name="promo_content" class="form-control" required
                            value="{{ old('promo_content', $details->promo_content ?? '') }}" placeholder="Enter promotion content" />
                        @error('promo_content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-2">
                        <label>Promotion Icon</label>
                        <input type="file" name="promo_icon" class="form-control" />
                        @if(isset($details) && $details->promo_icon)
                        <div class="mt-2">
                            <img src="{{ $details->promo_icon }}" width="100" alt="Current promotion icon">
                        </div>
                        @endif
                        @error('promo_icon')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Promotion Button Text</label>
                        <input type="text" name="promo_btn_text" class="form-control" value="{{ old('promo_btn_text', $details->promo_btn_text ?? '') }}" placeholder="Enter Promotion Button Text" />
                        @error('promo_btn_text')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Promotion Button Link</label>
                        <input type="url" name="promo_btn_link" class="form-control" value="{{ old('promo_btn_link', $details->promo_btn_link ?? '') }}" placeholder="Enter Promotion Button Link" />
                        @error('promo_btn_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Open in new tab -->
                    <div class="col-sm-6 mb-2 swich_bntts">
                        <label>Promotion Enable</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="promo_enable" value="1" {{ (old('promo_enable', $details->promo_enable ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12" id="social-wrapper">
                        <span class="form-text text-muted ml-4">Please enter fontawesome icon classes only like <code>fa-check</code> for <i class="fa fa-check"></i> To get icons got to <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome Icons <i class="fas fa-external-link-alt"></i></a></span>
                        @if(isset($details) && $socialLinks->isNotEmpty())
                        @foreach($socialLinks as $sLink)
                        <div class="row social-item mb-3">
                            <div class="col-sm-5 swich_bntts">
                                <label>Social Icon Class</label>
                                <input type="text"
                                    name="icon[]"
                                    value="{{ $sLink->icon }}"
                                    class="form-control icon-field"
                                    placeholder="Enter Social Icon Class">
                                <span class="text-danger icon-error"></span>
                            </div>
                            <div class="col-sm-5 swich_bntts">
                                <label>Social Link</label>
                                <input type="url"
                                    name="link[]"
                                    value="{{ $sLink->link }}"
                                    class="form-control link-field"
                                    placeholder="Enter Social Link">
                                <span class="text-danger link-error"></span>
                            </div>
                            <div class="col-sm-2 mt-2 ">
                                <br>
                                <button type="button"
                                    class="btn btn-success btn-sm add-social">
                                    + ADD
                                </button>
                                <button type="button"
                                    class="btn btn-danger btn-sm remove-social">
                                    REMOVE
                                </button>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row social-item mb-3">
                            
                            <div class="col-sm-5 swich_bntts">
                                <label>Social Icon Class</label>
                                <input type="text"
                                    name="icon[]"
                                    class="form-control icon-field"
                                    placeholder="Enter Social Icon Class">
                                <span class="text-danger icon-error"></span>
                            </div>
                            <div class="col-sm-5 swich_bntts">
                                <label>Social Link</label>
                                <input type="url"
                                    name="link[]"
                                    class="form-control link-field"
                                    placeholder="Enter Social Link">
                                <span class="text-danger link-error"></span>
                            </div>
                            <div class="col-sm-2 mt-2 ">
                                <br>
                                <button type="button"
                                    class="btn btn-success btn-sm add-social">
                                    + ADD
                                </button>
                                <button type="button"
                                    class="btn btn-danger btn-sm remove-social">
                                    REMOVE
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- Status -->
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" onclick="window.history.back()" href="#">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // ADD NEW ROW
    $(document).on('click','.add-social',function(){
        let clone = $('.social-item:first').clone();
        clone.find('input').val('');
        clone.find('.text-danger').html('');
        $('#social-wrapper').append(clone);
    });
    // REMOVE ROW
    $(document).on('click','.remove-social',function(){
        if($('.social-item').length > 1){
            $(this)
            .closest('.social-item')
            .remove();
        }
    });
    // FORM VALIDATION
    $('form').submit(function(e){
        let valid = true;
        $('.icon-error').html('');
        $('.link-error').html('');
        $('.social-item').each(function(){
            let icon = $(this)
                        .find('.icon-field')
                        .val()
                        .trim();
            let link = $(this)
                        .find('.link-field')
                        .val()
                        .trim();
            if(icon == ''){
                valid = false;
                $(this)
                .find('.icon-error')
                .html('Icon required');
            }
            if(link == ''){
                valid = false;
                $(this)
                .find('.link-error')
                .html('Link required');
            }
        });
        if(!valid){
            e.preventDefault();
        }
    });
});
</script>
@endsection