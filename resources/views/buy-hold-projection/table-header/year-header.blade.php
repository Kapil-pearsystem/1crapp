

<tr style="background:#ffe000; color:#000;">
    @php
        $propCreatedDate = $MainProperty->created_at;
        $propCreatedYear = (int)date('Y',strtotime($propCreatedDate));            
    @endphp
    @for ($i = 0; $i < 20; $i++)
        <td>Year {{ $propCreatedYear }} <span class="ful_lanthss">{{$i + 1}}</span></td>
        @php
            $propCreatedYear++;
        @endphp
    @endfor
</tr>


