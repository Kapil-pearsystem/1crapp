@php
    $encodedPropertyId = base64_encode($propertyID);
    $baseUrl = url('') . '/properties/edit';
    $currentUrl = url()->current();

    $propType = $type ?? ($MainProperty->prop_type ?? '');
@endphp

<div class="pro_btn_linksss">

    <a href="{{ $baseUrl }}/book-finance-payment/{{ $encodedPropertyId }}"
       class="{{ $currentUrl === $baseUrl . '/book-finance-payment/' . $encodedPropertyId ? 'currentstepform' : '' }}">
        Book & Finance
    </a>

    <a href="{{ $baseUrl }}/possession-improvement/{{ $encodedPropertyId }}"
       class="{{ $currentUrl === $baseUrl . '/possession-improvement/' . $encodedPropertyId ? 'currentstepform' : '' }}">
        Possession
    </a>

    @if (in_array(strtolower($propType), ['buy-hold', 'buy-refinance-hold', 'buy and hold', 'buy, refinance and hold']))
        <a href="{{ $baseUrl }}/rentout-operate/{{ $encodedPropertyId }}"
           class="{{ $currentUrl === $baseUrl . '/rentout-operate/' . $encodedPropertyId ? 'currentstepform' : '' }}">
            Rent-out
        </a>
    @endif

    @if (in_array(strtolower($propType), ['buy-refinance-hold', 'buy-refinance-sale', 'buy, refinance and hold', 'buy, refinance and sale']))
        <a href="{{ $baseUrl }}/refinance-cashout/{{ $encodedPropertyId }}"
           class="{{ $currentUrl === $baseUrl . '/refinance-cashout/' . $encodedPropertyId ? 'currentstepform' : '' }}">
            Refinance
        </a>
    @endif

    <a href="{{ $baseUrl }}/future-projection-sale/{{ $encodedPropertyId }}"
       class="{{ $currentUrl === $baseUrl . '/future-projection-sale/' . $encodedPropertyId ? 'currentstepform' : '' }}">
        Projection & Sale
    </a>
</div>

<style>
    .pro_btn_linksss a {
        display: inline-block;
        padding: 8px 14px;
        margin: 4px;
        background-color: #f1f1f1;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;
    }

    .pro_btn_linksss a.currentstepform {
        background-color: #0062cc;
        color: #fff;
        font-weight: bold;
    }
</style>
