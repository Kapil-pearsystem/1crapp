
<!--// post login-->
@if($page_data->layout == 2)
    @include('front.custom-layout.header')
@elseif($page_data->layout == 1)
    @include('front.layouts.user-header')
    @if($is_banner != 1)
        <section class="tital_mg_cntss">
            <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
            <div class="midils_contnts">
                <div class="medilss">
                    <h4>{!! ucwords($page_data->page_name) !!}</h4>
                    <a href="{{ url('') }}">Home</a> &gt; <span>{!! ucwords($page_data->page_name) !!}</span>
                </div>
            </div>
        </section>
    @endif
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! ucwords($page_data->page_name) !!}</title>
</head>
<body>
@endif
<div class="container mt-5">
   {!! $bodyData !!}
</div>
@if($page_data->layout == 1)
    @include('front.layouts.footer')
@elseif($page_data->layout == 2)
    @include('front.custom-layout.footer')
@else
</body>
</html>
@endif

<script>
    
function runCounterAnimation() {
    $('.counter_title').each(function () {
        var $this = $(this);
        var countTo = parseInt($this.data('count'));
        var plusSign = $this.data('plus') || '';

        $({ countNum: 1 }).animate({ countNum: countTo }, {
            duration: 2000,
            easing: 'swing',
            step: function () {
                $this.text(Math.floor(this.countNum) + plusSign);
            },
            complete: function () {
                $this.text(countTo + plusSign);
            }
        });
    });
}
$(document).ready(function () {
    let hasRun = false;

    const observer = new IntersectionObserver(function (entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasRun) {
                hasRun = true;
                runCounterAnimation();
                observer.unobserve(entry.target); // Optional: stop observing after first run
            }
        });
    }, {
        threshold: 0.1 // 10% of the section must be visible
    });

    const target = document.querySelector('#counter-section');
    if (target) {
        observer.observe(target);
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.tab-link').forEach(tab => {
        tab.addEventListener('click', function () {
            // Remove active from tabs
            document.querySelectorAll('.tab-link').forEach(link => {
                link.classList.remove('active');
            });
            // Active current tab
            this.classList.add('active');
            // Hide all content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.style.display = 'none';
                content.classList.remove('active');
            });
            // Show target content
            const targetTab = document.getElementById(
                'tab-' + this.getAttribute('data-tab')
            );
            if (targetTab) {
                targetTab.style.display = 'block';
                targetTab.classList.add('active');
            }
        });
    });
    // Initial display
    document.querySelectorAll('.tab-content').forEach((content, index) => {
        if (index == 0) {
            content.style.display = 'block';
        } else {
            content.style.display = 'none';
        }
    });
});
</script>