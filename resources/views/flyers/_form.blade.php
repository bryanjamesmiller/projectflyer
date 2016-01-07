@inject('countries', 'App\Http\Utilities\Country')

{{ csrf_field() }}
<div class="form-group">
    <label for="street">Street:</label>
    <input type="text" name="street" class="form-control" value="" required>
</div>
<div class="form-group">
    <label for="city">City:</label>
    <input type="text" name="city" class="form-control" value="" required>
</div>
<div class="form-group">
    <label for="zip">Zip Code:</label>
    <input type="text" name="zip" class="form-control" value="" required>
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <select name="country" class="form-control">
        @foreach($countries::all() as $country => $code)
            <option value="{{$code}}">{{$country}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="state">State:</label>
    <input type="text" name="state" class="form-control" value="" required>
</div>

<div class="form-group">
    <label for="price">Price:</label>
    <input type="text" name="price" class="form-control" value="" required>
</div>

<div class="form-group">
    <label for="description">Home Description:</label>
    <textarea name="description" class="form-control" rows="10" required></textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit Flyer</button>
</div>