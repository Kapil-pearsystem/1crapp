@foreach($lists as $key => $list)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>
        <input type="checkbox" value="{{ $list->id }}" class="list-checkbox">
    </td>
    <td>{{ $list->memberid }}</td>
    <td title="{{ $list->name }}">{{ Str::words($list->name, 5) }}
        <a href="#"><i class="fas fa-external-link-alt" aria-hidden="true"></i></a>
    </td>
    <td>
        {{ date('M d, Y', strtotime($list->created_at)) }}
    </td>
    <td>
        @if($list->status == 1)
            <span class="badge badge-success">
                Active
            </span>
        @else
            <span class="badge badge-danger">
                Inactive
            </span>
        @endif
    </td>
    <td>
        <?php  
            $editRoute = route('customer.edit', ['user' => $list->id]);
            $deleteRoute = route('customer.destroy', ['user' => $list->id]);
        ?>
        <a href="#" data-message="{{ json_encode($list) }}" onclick="viewMessage(this)" class="btn btn-info bnt_alsss"  data-toggle="modal" data-target="#view_message"><i aria-hidden="true" class="fa fa-eye"></i></a>
        <a href="{{ $editRoute }}" class="btn btn-primary bnt_alsss"><i class="fa fa-pen"></i></a>
        <a href="{{ $deleteRoute }}" class="btn btn-danger bnt_alsss delete-btn"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@endforeach