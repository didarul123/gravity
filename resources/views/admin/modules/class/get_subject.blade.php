<option value="">Select</option>
@foreach($subjects as $val)
    <option value="{{$val->id}}">{{@$val->name}}</option>
@endforeach
