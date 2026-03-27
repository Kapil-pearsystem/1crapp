<tbody>
    <tr class="bg_bluess">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];
    @endphp

    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹4,939</td>    
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹1,178</td>
        @endfor
    </tr>

    <tr class="redss">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹1,178</td>    
        @endfor
    </tr>
</tbody>