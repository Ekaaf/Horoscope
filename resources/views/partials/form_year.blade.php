<div class="row">
    <label for="inputEmail3" class="col-sm-4 col-form-label">Year</label>
    <div class="col-sm-8">
        <select class="form-control" id="year" name="year">
            <option value="">Select</option>
            @for($i = 2015; $i <=2050; $i++)
            <option value="{{$i}}" <?php if(old('year') == $i || (isset($year) && $year == $i)) echo "selected"?>>{{$i}}</option>
            @endfor
        </select>
        @if($errors->has('year'))
            <div class="error">{{ $errors->first('year') }}</div>
        @endif
    </div>
  </div>