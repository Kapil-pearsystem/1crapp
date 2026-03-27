@include('web.common.header')

<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png') }}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>FAQ</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>FAQ</span>
        </div>
    </div>
</section>

<section class="dash_board_pages faq_q_liststs">
    <div class="container">
        <div class="row">

            <!-- Sidebar for Categories -->
            <div class="col-lg-3">
                <div class="tab-wrapper">
                    <h4>Table Of Contents</h4>
                    @foreach($categories as $key => $cat)
                        <ul class="tabs">
                            <li class="tab-link @if($key == 0) active @endif" data-tab="{{ $cat->id }}">{{ $cat->title }}</li>
                        </ul>
                    @endforeach
                </div>
            </div>

            <!-- Content Area for FAQs -->
            <div class="col-lg-9">
                <div class="faq_hedings">Frequently Asked Questions</div>

                <div class="content-wrapper">
                    @foreach ($faqData as $index => $data)
                        <div id="tab-{{ $index + 1 }}" class="tab-content {{ $index == 0 ? 'active' : '' }}">
                            <h6>{{ $data['category']->title }}</h6>

                            <div class="panel-group" id="accordionMenu{{ $index }}" role="tablist" aria-multiselectable="true">
                                @foreach ($data['faqs'] as $key => $faq)
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{ $faq->id }}">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionMenu{{ $index }}" href="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                                                    <strong>{{ $faq->title }}</strong>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse{{ $faq->id }}" class="panel-collapse collapse {{ $key == 0 ? 'in' : '' }}" role="tabpanel" aria-labelledby="heading{{ $faq->id }}">
                                            <div class="panel-body">
                                                <p>{{ $faq->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Bottom Contact Area -->
                <div class="btm_contect">
                    <h3>Ready To Dive In? Book A Demo Or Try It Free For 14 Day</h3>
                    <p>Property Deals Insight: Unleash The Power Of Data And Insights To Discover Lucrative Opportunities in The UK Property Market</p>

                    <div class="bunnt_araeae_bnt">
                        <a href="javascript:void(0);">Talk To An Expert</a>
                        <a href="javascript:void(0);">Get Started for Free</a>
                    </div>

                    <div class="box_parts_areaese">
                        <ul>
                            <li>
                                <img src="{{ url('home/img/off-market-deals.png') }}" alt="" />
                                <h6>28M <span class="lst_wordds">+</span></h6>
                                <p>Off market deals</p>
                            </li>
                            <li>
                                <img src="{{ url('home/img/motivated-vendors.png') }}" alt="" />
                                <h6>100k <span class="lst_wordds">+</span></h6>
                                <p>Motivated Vendors</p>
                            </li>
                            <li>
                                <img src="{{ url('home/img/on-market-deals.png') }}" alt="" />
                                <h6>2m <span class="lst_wordds">+</span></h6>
                                <p>On Market Deals</p>
                            </li>
                            <li>
                                <img src="{{ url('home/img/deals-closed.png') }}" alt="" />
                                <h6>1000 <span class="lst_wordds">s</span></h6>
                                <p>Deals Closed</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.tab-link').forEach(tab => {
        tab.addEventListener('click', function() {

            document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('active'));


            this.classList.add('active');


            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));


            const targetTab = document.getElementById('tab-' + this.getAttribute('data-tab'));
            targetTab.classList.add('active');
        });
    });
</script>


@include('web.common.footer')