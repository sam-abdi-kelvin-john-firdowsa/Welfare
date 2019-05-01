@extends('layouts.apphtml')

@section('content')
    
    <div class="container">
    <form id="complain-form">
        <div class="form-group">
            <label for="department">Select Department:</label>
            <select name="department" id="department"required>
                <option value="">--please select a department--</option>
                <option value="catering">Catering</option>
                <option value="accomodation">Accomodation</option>
                <option value="disability">Disability</option>
                <option value="security">Security</option>
            </select>
        </div>
        <div class="form-group">
            <label for="desc"></label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-block btn-primary" value="Submit">
        </div>
    </form>
    </div>
@endsection