<form action="{{route('encryption')}}" method="post">
@csrf
<input type="text" name="password"><br>
<button type="submit">Encryp </button>
</form>