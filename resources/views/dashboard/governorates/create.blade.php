<h1>Create governorate</h1>
<form action="{{route('governorates.store')}}" method="post">
    @csrf
    <input type="text" name="name" value="{{old('name')}}">
    <button type="submit" name="submit">Save</button>

</form>
