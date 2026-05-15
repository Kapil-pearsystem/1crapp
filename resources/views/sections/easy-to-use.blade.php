@php 
    use App\Models\EasytoUseModel;
    $easytouse = EasytoUseModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->limit(6)->orderBy('id', 'DESC')->get();
@endphp
<!---- 1CR APP Is accurate, easy to use & FAST --->
<section class="al_sec_araea" id="1cr_app_acc">
    <div class="container">
        <h4>1CR APP Is accurate, easy to use & FAST</h4>
    </div>

    <div class="container qu_bx_partss">
        <div class="row scrool_parts">
            <!-- Loop through each box from the database -->
            @foreach($easytouse as $easytouse)
                <div class="col-lg-4">
                    <div class="qu_box_parts">
                        <!-- Check if image exists, then display it -->
                        <img src="{{ ASSETS_PATH.$easytouse->image }}" alt="{{ $easytouse->title }}" />
                        <h4>{{ $easytouse->title }}</h4>
                        <p>{{ $easytouse->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!---- End 1CR APP Is accurate, easy to use & FAST --->