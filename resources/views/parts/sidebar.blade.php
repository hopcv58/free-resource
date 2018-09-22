<div class="sidebar-left">
    <div class="row lever-employ">
        <form action="" id="search-form">
            <label>Position: </label>
            <select name="position" id="position" class="form-control">
                <option value=""></option>
                @foreach($postions as $key => $postion)
                    <optgroup label="{{$postion}}">
                        @foreach($technicals[$key] as $technical)
                            <option value="{{$technical}}"
                                    @if(isset($employee) && $employee->position == $technical) selected @endif >{{$technical}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>

            <label>Level: </label>
            <div class="row">
                @foreach($levels as $key => $level)
                    <div class="col-md-6"><input type="checkbox" name="level[]" value={{$key}}>
                        {{$level}}
                    </div>
                @endforeach
            </div>
            <label>From: </label>
            <input type="date" name="date_begin" placeholder="YYYY-MM-DD" class="form-control">
            <label>To: </label>
            <input type="date" name="date_end" class="form-control">
            <label>Min price($/Day): </label>
            <input type="text" name="min_price" class="form-control">
            <label>Max price($/Day): </label>
            <input type="text" name="max_price" class="form-control">
            <div>
                <a class="btn-search" onclick="$('#search-form').submit();"><p>SEARCH</p></a>
            </div>
        </form>
    </div>
</div>