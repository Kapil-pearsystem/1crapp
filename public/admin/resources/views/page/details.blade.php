<table class="table table-sm">
  <tbody>
    <tr>
      <th scope="row">Pre Head Line</th>
      <td>
        <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->pre_heading_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Head Line</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->title_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Post Head Line</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->subtitle_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Bullets</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->bullet_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Media File Visible</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->media_file_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Media Type</th>
      <td>
          @if($details->media_type == 2)
            <span class="badge badge-success" style="font-size:12px;">Video <i class="fa fa-circle text-light" aria-hidden="true"></i></span>
          @else
            <span class="badge badge-danger" style="font-size:12px;"><i class="fa fa-circle text-light" aria-hidden="true"></i> Image</span>
          @endif
      </td>
    </tr>
    <tr>
      <th scope="row">Count Down</th>
      <td style="white-space:normal;">
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->countdown_status == 1) checked @endif>
            <small></small>
        </label>
        @if($details->countdown_status == 1)
          <span>&ensp;&ensp;{{ $details->countdown_time }}</span>
        @endif
      </td>
    </tr>
    <tr>
      <th scope="row">Pre CTA Text</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->pre_cta_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Pop Up Status</th>
      <td style="white-space:normal;">
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->popup_status == 1) checked @endif>
            <small></small>
        </label>
        <!--@if($details->popup_status == 0)-->
        <!--<span>&ensp;&ensp;{{ $details->page_cta_url }}</span>-->
        <!--@else-->
        <!--<span>&ensp;&ensp;{{ $details->popup_destination }}</span>-->
        <!--@endif-->
      </td>
    </tr>
    <tr>
      <th scope="row">CTA Opens</th>
      <td>
        @if($details->open_new_tab == 0)
            <span class="badge badge-success" style="font-size:12px;">Same Tab <i class="fa fa-circle text-light" aria-hidden="true"></i></span>
          @else
            <span class="badge badge-danger" style="font-size:12px;"><i class="fa fa-circle text-light" aria-hidden="true"></i> New Tab</span>
          @endif
      </td>
    </tr>
    <tr>
      <th scope="row">PS Text</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->ps_text_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Post Popup Destination</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->popup_destination_status == 1) checked @endif>
            <small></small>
        </label>
      </td>
    </tr>
    <tr>
      <th scope="row">Additional CTA</th>
      <td>
      <label class="switch">
            <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $details->id }}" @if($details->addination_cta_status == 1) checked @endif>
            <small></small>
        </label>
        @if($details->addination_cta_new_tab == 0)
            <span class="badge badge-success" style="font-size:12px;">Same Tab <i class="fa fa-circle text-light" aria-hidden="true"></i></span>
          @else
            <span class="badge badge-danger" style="font-size:12px;"><i class="fa fa-circle text-light" aria-hidden="true"></i> New Tab</span>
          @endif
      </td>
    </tr>
    
  </tbody>
</table>