@php 

use App\Models\FaqCategoryModel;
use App\Models\FaqModel;
$categories = FaqCategoryModel::where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->orderBy('priority', 'DESC')->get(); 
$faqData = [];
foreach ($categories as $category) {
    $faqs = FaqModel::where(['category'=> $category->id, 'created_by'=>app('currentAgent')->id])->get(['id', 'title', 'description', 'status', 'created_by', 'created_at', 'updated_at']);
    $faqData[] = [
        'category' => $category,
        'faqs' => $faqs,
    ];
}
@endphp
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
                    <div id="tab-{{ $data['category']->id }}" class="tab-content {{ $index == 0 ? 'active' : '' }}">
                    <!-- <div id="tab-{{ $index + 1 }}" class="tab-content {{ $index == 0 ? 'active' : '' }}"> -->
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
            </div>
        </div>
    </div>
</section>