<section class="container">
    <div class="col-md-8  mx-auto">
        <h5 class="my-3 text-secondary">Comments (3)</h5>
        @foreach (range(1,3) as $item)
        {{-- range() function က foreach loop အတုပတ်ဖို့သုံးတာ range() function ကိုသုံးလိုက်တဲ့အခါ php က array တစ်ခုကိုဖန်တီးပေးပြီး အဲ့ array ကို loop ပတ်စေလိုက်တဲ့အခါ။ range(1,3) ဆိုရင် array ထဲမှာ [1,2,3] | range(1.4) ဆိုရင် array ထဲမှာ [1,2,3,4] --}}
            <x-single-comment />
        @endforeach
    </div>
</section>