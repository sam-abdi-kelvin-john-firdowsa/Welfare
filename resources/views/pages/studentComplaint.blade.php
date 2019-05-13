@extends('layouts.apptry')

@section('content')
    
    <div class="container">
    <form id="complain-forms" class="form-horizontal" role="form" action="/complain" method="POST" >
        {{csrf_field()}}
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
            <label for="desc">Please state the problem you encountered:</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-block btn-primary" value="Submit">
        </div>
        <div class="form-group">
                <input type="reset" class="btn btn-danger" value="Cancel">
            </div>
    </form>
    </div>
@endsection