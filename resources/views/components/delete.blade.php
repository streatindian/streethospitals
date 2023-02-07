<div>
    <form action="{{$url}}" method="POST">
        <input type="hidden" name="_method" value="delete" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary btn-sm status" >Delete</button>
    </form>
</div>
