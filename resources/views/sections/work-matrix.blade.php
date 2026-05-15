@php 
    use App\Models\WorkMatrixModel;
    $workmatrix = WorkMatrixModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'DESC')->get();
@endphp
<section class="al_sec_araea" id="counter-section">
    <div class="container">
        <div class="box_parts_areaese more_x">
            <ul>
                @foreach($workmatrix as $item)
                    <li>
                        <img src="{{ ASSETS_PATH.$item->image }}" alt="" />
                        @php
                            preg_match('/(\d+)(\+{1,2})?/', $item->title, $matches);
                            $number = $matches[1] ?? 0;
                            $plus = $matches[2] ?? '';
                        @endphp
                        <h6 class="counter_title" data-count="{{ $number }}" data-plus="{{ $plus }}">0</h6>
                        <p>{{ $item->description }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>