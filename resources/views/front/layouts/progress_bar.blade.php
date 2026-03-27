                <div class="row">
                    <div class="col-12 col-lg-12 my-4">
                        <div class="multisteps-form__progress">
                            <button data-url="{{ url('') }}/properties/new-property/description/<?=base64_encode($propertyID)?>" class="multisteps-form__progress-btn js-active" type="button" title="Property Description">
                                <a href="{{ url('') }}/properties/new-property/description/<?=base64_encode($propertyID)?>" style="font-size: 10.8px;">Property Description</a>
                            </button>
                            <button data-url="{{ url('') }}/properties/new-property/book-finance-payment/<?=base64_encode($propertyID)?>" class="multisteps-form__progress-btn js-active" type="button" title="Book & Finance & Payments">
                                <a href="{{ url('') }}/properties/new-property/book-finance-payment/<?=base64_encode($propertyID)?>" style="font-size: 10.8px;">Book & Finance & Payments</a>
                            </button>
                            <button data-url="{{ url('') }}/properties/new-property/possession-improvement/<?=base64_encode($propertyID)?>" class="multisteps-form__progress-btn js-active" type="button" title="Possesion & Improment">
                                <a href="{{ url('') }}/properties/new-property/possession-improvement/<?=base64_encode($propertyID)?>" style="font-size: 10.8px;">Possesion & Improment</a>
                            </button>

                            <?php if ((isset($type) && ($type == 'buy-hold' || $type == 'buy-refinance-hold')) || (isset($MainProperty->prop_type) && ($MainProperty->prop_type == 'Buy And Hold' || $MainProperty->prop_type == 'Buy, Refinance And Hold'))) { ?>
                            <button data-url="{{ url('') }}/properties/new-property/rentout-operate/<?=base64_encode($propertyID)?>" class="multisteps-form__progress-btn js-active" type="button" title="Rentout & Opearte">
                                <a href="{{ url('') }}/properties/new-property/rentout-operate/<?=base64_encode($propertyID)?>" style="font-size: 10.8px;">Rentout & Opearte</a>
                            </button>
                            <?php } ?>
                            <?php if ((isset($type) && ($type == 'buy-refinance-hold' || $type == 'buy-refinance-sale')) || (isset($MainProperty->prop_type) && ($MainProperty->prop_type == 'Buy, Refinance And Hold' || $MainProperty->prop_type == 'Buy, Refinance And Sale'))) { ?>
                                <button data-url="{{ url('') }}/properties/new-property/refinance-cashout/<?=base64_encode($propertyID)?>" class="multisteps-form__progress-btn js-active" type="button" title="Refinace & Cash Out">
                                    <a href="{{ url('') }}/properties/new-property/refinance-cashout/<?=base64_encode($propertyID)?>" style="font-size: 10.8px;">Refinace & Cash Out</a>
                            </button>
                            <?php } ?>
                            <button data-url="{{ url('') }}/properties/new-property/future-projection-sale/<?=base64_encode($propertyID)?>" class="multisteps-form__progress-btn js-active" type="button" title="Sell">
                                <a href="{{ url('') }}/properties/new-property/future-projection-sale/<?=base64_encode($propertyID)?>" style="font-size: 10.8px;">Projection & Sale</a>
                            </button>
                        </div>
                    </div>
                </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentUrl = window.location.href;
        // console.log("currentUrl: "+currentUrl);

        document.querySelectorAll('.multisteps-form__progress-btn').forEach(button => {
            const btnUrl = button.getAttribute('data-url');

            // console.log("btnUrl: "+btnUrl);
            if (currentUrl === btnUrl) {
                button.classList.add('currentstepform');
            } else {
                button.classList.remove('currentstepform');
            }
        });
    });
</script>
<style>
    button.multisteps-form__progress-btn.js-active.currentstepform {
        color: #0062cc;
    }
</style>