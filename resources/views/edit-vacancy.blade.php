<div class="form-group">
    <label for="category_id">Категория</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="tags">Теги</label>
    <select name="tags[]" id="tags" class="form-control" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
</div>