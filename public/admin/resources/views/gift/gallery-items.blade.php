




<?php
 use Illuminate\Support\Str;
 $collection_id = '';
 $s_gift_ids = array();
 if(isset($collection) && !empty($collection->gift_ids)){
     $s_gift_ids = explode(',',$collection->gift_ids);
 }
?>
 <!--- Item List --->
 <input type="hidden" id="total_gift" value="{{ count($gifts) }}">
 @foreach($gifts as $gift)
 @php
    $discountedPrice = $gift->mrp - ($gift->mrp * ($gift->discount / 100));
@endphp
<div class="col-lg-4">
    <div class="it_emms">
        @if($gift->ribbon == 'available')
            <div class="ribbon-wrap">
                <div class="ribbon">Available</div>
            </div>
        @else
            <div class="ribbon-wrap">
                <div class="ribbon bg_red">Sold Out</div>
            </div>
        @endif
        <input type="checkbox" value="{{ $gift->id }}" class="ck_bx_box gift_items_id" id="ck_1_{{ $gift->id }}" name="gift_id[]" @if(in_array($gift->id, $s_gift_ids)) checked @endif/>
        <label for="ck_1_{{ $gift->id }}"></label>
        <div class="usr_mgss othr_gf"><img src="{{ asset('').'/'.$gift->thumbnail }}" /></div>
        <h3>{{ $gift->title }}</h3>
        <p class="add-read-more show-less-content">
        {!! Str::words($gift->description, 40) !!}
        </p>
        <p class="mb-2"><span class="red_tx cut_pricess">Rs.{{ $gift->mrp }}</span> Rs.{{ $discountedPrice }} <span class="red_tx">(Save Rs. {{ $gift->mrp-$discountedPrice }}/)</span></p>
        <p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
        <div class="snd_btnns"><a href="javascript:void(0);" class="click_m" onclick="show_gift_images({{ $gift->id }})" data-page="1">View Gallery & Video</a></div>
    </div>
</div>

<script>
$(document).ready(function(){
     function AddReadMore() {
      var carLmt = 80;
      var readMoreTxt = " ...Read More";
      var readLessTxt = " Read Less";


      $(".add-read-more").each(function () {
         if ($(this).find(".first-section").length)
            return;

         var allstr = $(this).text();
         if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='second-section'>" + secdHalf + "</span><span class='read-more'  title='Click to Show More'>" + readMoreTxt + "</span><span class='read-less' title='Click to Show Less'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
         }
      });

      $(document).on("click", ".read-more,.read-less", function () {
         $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
      });
   }

   AddReadMore();
});
</script>

<script>
function ModalSlider() {
  this.changeSlide = function(back, idx) {
    var $active = $(".slides .active");
    $(".slide")
      .not(".active")
      .css("z-index", 1);
    var $next =
      $active.next(".slide").length > 0
        ? $active.next(".slide")
        : $(".slides .slide:first");
    var $last =
      $active.prev(".slide").length > 0
        ? $active.prev(".slide")
        : $(".slides .slide:last");
    $next = back === true ? $last : $next;
    $next.css("z-index", 2);
    $active.fadeOut(400, function() {
      $active
        .css("z-index", 1)
        .show()
        .removeClass("active");
      $next.css("z-index", 3).addClass("active");
    });
    var $caption = $(".slider-image-caption");
    var captionText = $next.attr("title");
    $caption.html(captionText);
    if (idx === -1) {
      $('.slide[data-index="0"]')
        .addClass("active")
        .css("z-index", 3);
    }
  };
  this.nextSlide = function() {
    this.changeSlide();
  };
  this.lastSlide = function() {
    this.changeSlide(true);
  };
  this.init = function() {
    $(".slider-image-caption").html($(".slide.active").attr("title"));
  };
  this.setSlide = function(slideIndex) {
    var slideIdx = parseInt(slideIndex);
    if (typeof slideIdx === "number") {
      var idx = slideIndex - 1;
      var lastSlide = $(".slide").length;
      $(".slide").removeClass("active");
      $('.slide[data-index="' + idx + '"]').addClass("active");
      this.changeSlide(false, idx);
    }
  };
}

var Slider = new ModalSlider();

Slider.init();

$(".nav-arrow.right").on("click", function() {
  Slider.nextSlide();
});

$(".nav-arrow.left").on("click", function() {
  Slider.lastSlide();
});

$(".modal-close").on("click", function() {
  $(this)
    .parent()
    .addClass("modal-close")
    .delay(200)
    .promise()
    .done(function() {
      $(this).removeClass("modal-active modal-close");
    });
});

$(".click_m").on("click", function() {
  $(".slider-modal").addClass("modal-active");
});
</script>

@endforeach
<!--- End Item List --->


