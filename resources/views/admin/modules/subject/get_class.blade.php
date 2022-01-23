<option value="">Select</option>
@foreach($classes as $val)
    <option value="{{$val->id}}">{{@$val->title}}</option>
@endforeach