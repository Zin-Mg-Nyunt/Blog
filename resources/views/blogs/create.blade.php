<x-layout>
    <h3 class="text-center">Blog Create Form</h3>
    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form action="/admin/blogs/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('title') }}" required>
                    <x-error name='title' />
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" aria-describedby="emailHelp" value="{{ old('slug') }}" required>
                    <x-error name='slug' />
                </div>
                <div class="mb-3">
                    <label for="intro" class="form-label">Intro</label>
                    <input type="text" name="intro" class="form-control" id="intro" aria-describedby="emailHelp" value="{{ old('intro') }}" required>
                    <x-error name='intro' />
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control" required>{{ old('body') }}</textarea>
                    <x-error name='body' />
                </div>
                <div>
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                        {{-- $category->id ထဲ validation စစ်ပြီး fail ဖြစ်လို့ ပြန်ရောက်လာမှာက name="category_id" ကပြန်ရောက်လာမှာ။ အဲ့ကောင်က string တန်ဖိုးပြန်လာမှာ ဘာလို့လဲဆိုတော့ value မှာ "" double quote ပါနေလို့  --}}
                        <option {{ $category->id==old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>
