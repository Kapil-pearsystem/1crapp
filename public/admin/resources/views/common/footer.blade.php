<footer class="sticky-footer bg-white">

    <div class="container my-auto">

        <div class="copyright text-center my-auto">

            <span>Copyright &copy; 1CRAPP @ {{date('Y')}}</span>

        </div>

    </div>

</footer>
<script>
    const isFontAwesome5 = typeof window.FontAwesome !== 'undefined' && window.FontAwesome.version && window.FontAwesome.version.startsWith('5');
    document.querySelectorAll('.fa').forEach(function(icon) {
       if (isFontAwesome5) {
          icon.classList.remove('fa');
          icon.classList.add('fas');
       }else{
            icon.classList.remove('fas');
          icon.classList.add('fa');
       }
    });
 </script>
 <script>
    $(document).ready(function () {
        $(".accordion_head").click(function () {
            if ($(".accordion_body").is(":visible")) {
                $(".accordion_body").slideUp(300);
                $(".plusminus").text("+");
                $(".accordion_head").removeClass("clr_tx");
            }
            if ($(this).next(".accordion_body").is(":visible")) {
                $(this).next(".accordion_body").slideUp(300);
                $(this).children(".plusminus").text("+");
            } else {
                $(this).next(".accordion_body").slideDown(300);
                $(this).addClass("clr_tx").siblings().removeClass("clr_tx");
                $(this).children(".plusminus").text("-");
            }
        });
    });
    $(document).ready(function() {
        $('#level2_user_id').select2({
            placeholder: "Select Level 2 Users",
            allowClear: true,
            closeOnSelect: false,
            width: 'resolve' // Let Select2 inherit the container width
        });
    });
    $(document).ready(function() {
        $('#level3_user_id').select2({
            placeholder: "Select Level 3 Users",
            allowClear: true,
            closeOnSelect: false,
            width: 'resolve' // Let Select2 inherit the container width
        });
    });
</script>