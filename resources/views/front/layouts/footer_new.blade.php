
@php
$type = $type??request()->segment(1)??'buy-sale';
@endphp

<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--  -->
<script src="{{ url('') }}/js/responsivenew.js"></script>
<script type="text/javascript">
    @if(isset($property_type))
        getdata("","{{$property_type}}");
    @else
        getdata();
    @endif


function getByTitle(title=null,property_type=null) {
    getdata(title,property_type);
}


// $(document).ready(function() {
function getdata(title=null,property_type=null) {
    var token = "{{ csrf_token() }}";
    var p_type = @json($type);
    $.ajax({
        type: "POST",
        url: "/getPropertyList",
        data: {
            _token: token,
            title: title,
            prop_type : property_type,
            prop_parent_type : p_type,
        },
        success: function(response) {
            $("#property_data").html(response);
        }
    });

      $.ajax({
        type: "POST",
        url: "/getArchivePropertyList",
        data: {
            _token: token,
            title: title,
            prop_type : property_type,
            prop_parent_type : p_type,
        },
        success: function(response) {
            $("#archive_property_data").html(response);
        }
    });

}
// });
</script>
<script type="text/javascript">
function purchase_criteria(id) {
    // alert(id);
    var token = "{{ csrf_token() }}";
    var url = '{{url('')}}' + '/getPropertyCriteria'
    $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: token,
            id: id,
        },
        success: function(response) {
            console.log(response);
            $("#modelData").html(response);
        }
    });
}
</script>
<script>
$(function() {
    $('#language-wrapper').hover(
        function() {
            $('.language-text').fadeIn();
        },
        function() {
            $('.language-text').fadeOut();
        }
    );
});
</script>

<!-- start new add -->
<script>
$(document).ready(function() {
    $("#extend").click(function(e) {
        e.preventDefault();
        $("#extend-field").append(
            '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
        )
    });
    $("#extend-field").on("click", ".remove-extend-field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
    });


});
// 1
$(document).ready(function() {
    $("#extend1").click(function(e) {
        e.preventDefault();
        $("#extend-field1").append(
            '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
        )
    });
    $("#extend-field1").on("click", ".remove-extend-field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
    });


});
// 2
$(document).ready(function() {
    $("#extend2").click(function(e) {
        e.preventDefault();
        $("#extend-field2").append(
            '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
        )
    });
    $("#extend-field2").on("click", ".remove-extend-field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
    });


});
// 3
$(document).ready(function() {
    $("#extend3").click(function(e) {
        e.preventDefault();
        $("#extend-field3").append(
            '<div class="row p-3 justify-content-end"><div class="col-5 d-flex px-0"><input class="multisteps-form__input form-control" type="number" placeholder="10" value="10"><button class="btn rbtn px-4 text-muted">%</button></div> <div class="col-5"><h6 class="font-weight-bold d-flex">in years:-&nbsp;<input type="text" name="number[]" placeholder="Ex. 5,10, 12-14" class="form-control total_amount"></h6></div><a class="remove-extend-field"><button type="button" name="remove" class="btn btn-danger">X</button></a></div>'
        )
    });
    $("#extend-field3").on("click", ".remove-extend-field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
    });


});
</script>

<script>
$("#search-icon").click(function() {
    $(".nav").toggleClass("search");
    $(".nav").toggleClass("no-search");
    $(".search-input").toggleClass("search-active");
});

$('.menu-toggle').click(function() {
$(".nav").toggleClass("mobile-nav");
$(this).toggleClass("is-active");
});
</script>

</body>

</html>