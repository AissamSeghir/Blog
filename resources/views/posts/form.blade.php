@csrf
        <div class="form-group mt-2">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control mt-2"
            @isset($post) value="{{$post->title}}" @endisset>
        </div>
        <div class="form-group mt-2">
            @foreach ($categories as $category)
            <label for="category__{{$category->id}}">{{$category->name}}</label>
            <input type="checkbox" id="category__{{$category->id}}" name="categories[]" value="{{$category->id}}"class="mr-5"
            @if (@isset($post)&& in_array($category->id,$postcateg))
            checked
            @endif>
            
            @endforeach
        </div>
        <div class="form-group mt-2">
            <label for="content">content</label>
            <textarea name="content" cols="30" rows="12" id="content" class="form-control mt-2">@isset($post){{$post->content}}@endisset</textarea>
        </div>
        <div>
            <button class="btn btn-success mt-2">save</button>
        </div>