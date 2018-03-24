@extends('layout')

@section('content')
    <div id="inbox" class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Classes</h1>
        </div>
        <div class="panel-body">
            Enter your classes here:
        </div>
        <div class="list-group">
            <form action="calendar" method="post">
                @csrf
                Universal Duration<br/>
                <input type="date" name="unistart" placeholder="Universal Start Date">
                <input type="date" name="uniend" placeholder="Universal End Date"><br/>

                <input type="text" name="class1" placeholder="Class">
                <input type="text" name="location1" placeholder="Location">
                <input type="time" name="start1" placeholder="Starting Time">
                -
                <input type="time" name="end1" placeholder="Ending Time"><br/>
                <label>
                    M
                    <input type="checkbox" name="days1[]" value="Monday">
                </label>
                <label>
                    T
                    <input type="checkbox" name="days1[]" value="Tuesday">
                </label>
                <label>
                    W
                    <input type="checkbox" name="days1[]" value="Wednesday">
                </label>
                <label>
                    R
                    <input type="checkbox" name="days1[]" value="Thursday">
                </label>
                <label>
                    F
                    <input type="checkbox" name="days1[]" value="Friday">
                </label>
                Class Duration (if different from global)
                <input type="date" name="dstart1" placeholder="Starting Date">
                <input type="date" name="dend1" placeholder="Ending Date"><br/>

                <input type="text" name="class2" placeholder="Class">
                <input type="text" name="location2" placeholder="Location">
                <input type="time" name="start2" placeholder="Starting Time">
                -
                <input type="time" name="end2" placeholder="Ending Time"><br/>
                <label>
                    M
                    <input type="checkbox" name="days2[]" value="Monday">
                </label>
                <label>
                    T
                    <input type="checkbox" name="days2[]" value="Tuesday">
                </label>
                <label>
                    W
                    <input type="checkbox" name="days2[]" value="Wednesday">
                </label>
                <label>
                    R
                    <input type="checkbox" name="days2[]" value="Thursday">
                </label>
                <label>
                    F
                    <input type="checkbox" name="days2[]" value="Friday">
                </label>
                Class Duration (if different from global)
                <input type="date" name="dstart2" placeholder="Starting Date">
                <input type="date" name="dend2" placeholder="Ending Date"><br/>

                <input type="text" name="class3" placeholder="Class">
                <input type="text" name="location3" placeholder="Location">
                <input type="time" name="start3" placeholder="Starting Time">
                -
                <input type="time" name="end3" placeholder="Ending Time"><br/>
                <label>
                    M
                    <input type="checkbox" name="days3[]" value="Monday">
                </label>
                <label>
                    T
                    <input type="checkbox" name="days3[]" value="Tuesday">
                </label>
                <label>
                    W
                    <input type="checkbox" name="days3[]" value="Wednesday">
                </label>
                <label>
                    R
                    <input type="checkbox" name="days3[]" value="Thursday">
                </label>
                <label>
                    F
                    <input type="checkbox" name="days3[]" value="Friday">
                </label>
                Class Duration (if different from global)
                <input type="date" name="dstart3" placeholder="Starting Date">
                <input type="date" name="dend3" placeholder="Ending Date"><br/>

                <input type="text" name="class4" placeholder="Class">
                <input type="text" name="location4" placeholder="Location">
                <input type="time" name="start4" placeholder="Starting Time">
                -
                <input type="time" name="end4" placeholder="Ending Time"><br/>
                <label>
                    M
                    <input type="checkbox" name="days4[]" value="Monday">
                </label>
                <label>
                    T
                    <input type="checkbox" name="days4[]" value="Tuesday">
                </label>
                <label>
                    W
                    <input type="checkbox" name="days4[]" value="Wednesday">
                </label>
                <label>
                    R
                    <input type="checkbox" name="days4[]" value="Thursday">
                </label>
                <label>
                    F
                    <input type="checkbox" name="days4[]" value="Friday">
                </label>
                Class Duration (if different from global)
                <input type="date" name="dstart4" placeholder="Starting Date">
                <input type="date" name="dend4" placeholder="Ending Date"><br/>

                <input type="text" name="class5" placeholder="Class">
                <input type="text" name="location5" placeholder="Location">
                <input type="time" name="start5" placeholder="Starting Time">
                -
                <input type="time" name="end5" placeholder="Ending Time"><br/>
                <label>
                    M
                    <input type="checkbox" name="days5[]" value="Monday">
                </label>
                <label>
                    T
                    <input type="checkbox" name="days5[]" value="Tuesday">
                </label>
                <label>
                    W
                    <input type="checkbox" name="days5[]" value="Wednesday">
                </label>
                <label>
                    R
                    <input type="checkbox" name="days5[]" value="Thursday">
                </label>
                <label>
                    F
                    <input type="checkbox" name="days5[]" value="Friday">
                </label>
                Class Duration (if different from global)
                <input type="date" name="dstart5" placeholder="Starting Date">
                <input type="date" name="dend5" placeholder="Ending Date"><br/>

                <input type="text" name="class6" placeholder="Class">
                <input type="text" name="location6" placeholder="Location">
                <input type="time" name="start6" placeholder="Starting Time">
                -
                <input type="time" name="end6" placeholder="Ending Time"><br/>
                <label>
                    M
                    <input type="checkbox" name="days6[]" value="Monday">
                </label>
                <label>
                    T
                    <input type="checkbox" name="days6[]" value="Tuesday">
                </label>
                <label>
                    W
                    <input type="checkbox" name="days6[]" value="Wednesday">
                </label>
                <label>
                    R
                    <input type="checkbox" name="days6[]" value="Thursday">
                </label>
                <label>
                    F
                    <input type="checkbox" name="days6[]" value="Friday">
                </label>
                Class Duration (if different from global)
                <input type="date" name="dstart6" placeholder="Starting Date">
                <input type="date" name="dend6" placeholder="Ending Date"><br/>
                <input type="submit">
            </form>

        </div>
    </div>

@endsection