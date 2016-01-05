@extends('_layout')

@section('content')
    <h1>Selling Your Home?</h1>
    <hr>
    <form>
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="zip">Zip Code:</label>
            <input type="text" name="zip" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <select name="country" class="form-control">
            </select>
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" class="form-control" value="">
        </div>

        <hr>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" class="form-control" value="">
        </div>


        <div class="form-group">
            <label for="description">Home Description:</label>
            <textarea type="text" name="description" class="form-control" rows="10"></textarea>
        </div>
        
        <hr>

        <div class="form-group">
            <label for="description">Home Description:</label>
            <button type="submit" class="btn btn-default">Submit Flyer</button>
        </div>
    </form>
    <hr>

@stop