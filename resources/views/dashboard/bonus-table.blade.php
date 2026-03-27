

<div class="table-responsive">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Sr.No.</td>
                <td>TXN ID</td>
                <td>Amount</td>
                <td>Date</td>
                <td>Message</td>
                @if($type == 'affiliate')
                <td>Downline Details</td>
                @endif
            </tr>
            @if($lists->count() > 0)
            @foreach ($lists as $key => $list)
            <tr>
                <td>{{ ($lists->currentPage() - 1) * $lists->perPage() + $key + 1 }}</td>
                <td>{{ $list->txnid }}</td>
                <td>{{ $list->amount }}</td>
                <td>{{ $list->created_at }}</td>
                <td>{{ $list->comment }}</td>
                @if($type == 'affiliate')
                    <td><a href="javascript:void(0);" onclick='downline_user_details(<?= json_encode($list->payment_data); ?>)'>View</a></td>
                @endif
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">No data found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
    @if($lists->total() > 0)
        <span class="text-muted">
            Showing {{ $lists->firstItem() }} to {{ $lists->lastItem() }} of {{ $lists->total() }} records
        </span>
    @endif
    <nav>
        {{ $lists->appends(['tab' => $type])->links() }}
    </nav>
</div>

