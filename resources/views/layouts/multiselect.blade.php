<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />

<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" integrity="sha512-3lMc9rpZbcRPiC3OeFM3Xey51i0p5ty5V8jkdlNGZLttjj6tleviLJfHli6p8EpXZkCklkqNt8ddSroB3bvhrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.rawgit.com/crlcu/multiselect/v2.5.1/dist/js/multiselect.min.js"></script>

<form action="{{route('multiselect.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-5">
            <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                <option value="1">Item 1</option>
                <option value="2">Item 2</option>
                <option value="3">Item 3</option>
                <option value="4">Item 4</option>
                <option value="5">Item 5</option>
            </select>
        </div>

        <div class="col-2">
            <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
            <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
            <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
            <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
        </div>

        <div class="col-5">
            <select name="items_id[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
        </div>
        @error('items_id') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <input type="submit" value="submit">
</form>


<script>
    $('#multiselect').multiselect();
</script>
