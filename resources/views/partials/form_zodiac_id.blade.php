<div class="row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Zodiac Sign</label>
    <div class="col-sm-8">
        <select class="form-control" id="zodiac_id" name="zodiac_id">
            <option value="">Select</option>
            @foreach($signs as $key => $sign)
            <option value="{{$key}}" <?php if(old('zodiac_id') == $key || (isset($year) && $zodiac_id == $key)) echo "selected"?>>{{$sign}}</option>
            @endforeach
        </select>
        @if($errors->has('zodiac_id'))
            <div class="error">{{ $errors->first('zodiac_id') }}</div>
        @endif
    </div>
  </div>