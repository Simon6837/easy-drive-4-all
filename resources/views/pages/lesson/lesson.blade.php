<html lang='en'>
    <head>
        <meta charset='utf-8' />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <style>
            #lessonModal{
                margin-top: 80px;
            }
            #update, #saveBtn{
                background-color: #0000ff;
            }

            #update:hover, #saveBtn:hover{
                background-color: #5371f5;
            }

            #close, #edit_close{
                background-color: #575656;
            }

            #close:hover, #edit_close:hover{
                background-color: #969494;
            }
            #delete{
                background-color: #f73333;
            }
            #delete:hover{
                background-color: #fa7b7b;
            }
        </style>

  <x-app-layout>
    <!-- Container -->
      <div id="container" class="flex bg-gray-100 items-top justify-center min-h-screen bg-white sm:items-center sm:pt-0">
            <div class="w-1/2 mt-4 bg-white shadow shadow-gray-600 rounded-lg overflow-hidden">
                @if( Auth::user()->hasRole('owner') ||  Auth::user()->hasRole('instructor'))
                <!-- Add Modal -->
                <div class="modal fade" id="lessonModal" tabindex="-1" aria-labelledby="lessonModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="lessonModalLabel">Les toevoegen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <label class="m-2 bold"> Les start 
                                    <input type="datetime-local"  id="lesson_start" value="YYYY-MM-DD HH:mm:ss"><br>
                                    <span id="start_date" class="text-danger"></span>
                                </label>
                                
                                <label class="m-2"> Les eind
                                    <input type="datetime-local"  id="lesson_end" value="YYYY-MM-DD HH:mm:ss"><br>
                                    <span id="end_date" class="text-danger"></span>
                                </label>

                                <select id="student" class="mt-4 form-select" aria-label="Default select lesson">
                                    <option selected disabled value="0">Select leerling</option>
                                    @foreach ($all_students as $student)
                                        <option value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
                                    @endforeach
                                </select>
                                @if( Auth::user()->hasRole('owner'))
                                <select id="instructor" class="mt-4 form-select" aria-label="Default select lesson">
                                    <option selected disabled value="0">Select instructor</option>
                                    @foreach ($all_instructors as $instructor)
                                        <option value="{{$instructor->id}}">{{$instructor->first_name}} {{$instructor->last_name}}</option>
                                    @endforeach
                                </select>
                                @endif

                                <span id="student_error" class="text-danger"></span>

                                <input type="text" name="adress" class="mt-4 form-control" placeholder="Adres" id="adress">
                                <span id="adress_error" class="text-danger"></span>

                                <input type="text" name="postcode" class="mt-4 form-control" placeholder="Postcode" id="postcode" maxlength="7" RegExp="(/^[0-9]{4}[a-z]{2}$/i)">
                                <span id="postcode_error" class="text-danger"></span>

                                <input type="text" name="city" class="mt-4 form-control" placeholder="Plaats" id="city">
                                <span id="city_error" class="text-danger"></span>

                                <input type="text" name="goal" class="mt-4 form-control" placeholder="Onderwerp" id="goal">
                                <span id="goal_error" class="text-danger"></span>

                            </div>
                            <div class="modal-footer">
                                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="saveBtn" class="btn btn-primary">Opslaan</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Edit Modal -->
                <div class="modal fade" id="editLessonModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Les Bewerken</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label class="font-weight-bold">Leerling Naam:</label>
                                    <label id="first_name" class="font-italic"></label>
                                    <label id="last_name" class="font-italic"></label>
                                </div>

                                @if( Auth::user()->hasRole('owner'))
                                <div>
                                    <label class="font-weight-bold">Leerling Naam:</label>
                                    <label id="instructor_first_name" class="font-italic"></label>
                                    <label id="instructor_last_name" class="font-italic"></label>
                                </div>
                                @endif

                                <label class="m-2"> Les start </label><br>
                                    <input type="text"  id="edit_lesson_start"><br>
                                    <span id="edit_lesson_start" class="text-danger"></span>
                                
                                
                                <label class="m-2"> Les eind </label><br>
                                    <input type="text" class="mb-4" id="edit_lesson_end"><br>
                                    <span id="edit_end_date" class="text-danger"></span>
                                <hr />
                                <p class="row-in-form">
                                    <label class="mt-2">Ophaal adres<span>*</span></label><br>
                                    <input type="text" id="edit_adress" class="mb-4 form-control"  name="edit_adress" placeholder="Ophaal adres">
                                </p>

                                <hr />
                                <p class="row-in-form">
                                    <label class="mt-2">Ophaal postcode<span>*</span></label><br>
                                    <input type="text" id="edit_postcode" class="mb-4 form-control"  name="edit_postcode" placeholder="Ophaal postcode">
                                </p>

                                <hr />
                                <p class="row-in-form">
                                    <label class="mt-2">Ophaal Stad<span>*</span></label><br>
                                    <input type="text" id="edit_city" class="mb-4 form-control"  name="edit_city" placeholder="Ophaal Stad">
                                </p>
                                <hr />
                                <p class="row-in-form">
                                    <label class="mt-2">Taak/en<span>*</span></label><br>
                                    <input type="text" id="edit_goal" class="mb-4 form-control"  name="edit_goal" placeholder="Taak">
                                </p>

                                <hr />
                                <p class="row-in-form">
                                    <label class="mt-2">Resultaat</label><br>
                                    <input type="text" id="result" class="mb-4 form-control"  name="result" placeholder="Resultaat">
                                </p>

                                <hr class="red" />
                                <p class="row-in-form">
                                    <label class="mt-2">Commentaar</label><br>
                                    <input type="text" id="comment" class="mb-4 form-control"  name="comment" placeholder="Commentaar">
                                    @error('lastname') <span class="text-danger"> {{ $message}} </span> @enderror
                                </p>

                            </div>
                            <button type="button" id="update" class="btn btn-primary">Update</button>

                            <div class="modal-footer">
                                @if( Auth::user()->hasRole('owner') ||  Auth::user()->hasRole('instructor'))
                                    <button type="button" id="delete" class="float-left btn btn-danger">Delete</button>
                                @endif
                                <button type="button" id="edit_close" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload('#calendar');">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='calendar'></div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            var lessons = @json($lessons);
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                events: lessons,
                selectable: true,
                selectHelper: true,
                editable: true,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                    event.allDay = true;
                    } else {
                    event.allDay = false;
                    }
                },
                select: function(start, end, allDay){
                   $('#lessonModal').modal('toggle');

                   // Add new les
                   $('#saveBtn').click(function(){
                    var student = $('#student').val();
                    var instructor = $('#instructor').val();
                    var adress = $('#adress').val();
                    var postcode = $('#postcode').val();
                    var city = $('#city').val();
                    var goal = $('#goal').val();
                    var start_date = $('#lesson_start').val();
                    var end_date = $('#lesson_end').val();
                    $.ajax({
                        url: "{{ route('lesson.option')}}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            student,
                            instructor,
                            adress,
                            postcode,
                            city,
                            goal,
                            start_date,
                            end_date,
                            type: 'add'
                        },
                        success:function(data)
                        {
                            if (data.status == 'same' || data.status == false)
                            {
                                $('#lessonModal').modal('hide');
                                swal({
                                    title: "Oops!",
                                    text: (data.message),
                                    icon: "error",
                                    button: "Ok!",
                                    });
                            }
                            else
                            {
                                $('#lessonModal').modal('hide');
                                swal({
                                    title: "Good jop!",
                                    text: (data.message),
                                    icon: "success",
                                    button: "Ok!",
                                    });
                                    calendar.fullCalendar('renderEvent', {
                                            id:data.id,
                                            start: start_date,
                                            end: end_date,
                                        }, true);
                                    calendar.fullCalendar('unselect');
                            }


                        },
                        error:function(error)
                        {

                        },
                    });

                   });
                    
                },
                
                // Find data for edit
                eventClick: function(event, delta)
                {
                    $('#editLessonModal').modal('toggle');
                    var id = event.id;
                    $.ajax({
                        url: "{{ route('lesson.option')}}",
                        type: "GET",
                        data:{
                            id:id,
                            type:"edit"
                        },
                        success:function(response)
                        {
                            $('#first_name').text(response.student_firstName);
                            $('#last_name').text(response.student_lastName);

                            $('#instructor_first_name').text(response.instructor_firstName);
                            $('#instructor_last_name').text(response.instructor_lastName);

                            $('#edit_adress').val(response.lesson.pickup_address);
                            $('#edit_postcode').val(response.lesson.pickup_postal_code);
                            $('#edit_city').val(response.lesson.pickup_city);
                            $('#edit_goal').val(response.lesson.goal);
                            $('#edit_lesson_start').val(response.lesson.start_date);
                            $('#edit_lesson_end').val(response.lesson.end_date);
                            $('#result').val(response.lesson.result);
                            $('#comment').val(response.lesson.comment);
                        }
                        
                    });
                        // Update
                        $('#update').click(function(){
                            var adress = $('#edit_adress').val();
                            var postcode = $('#edit_postcode').val();
                            var city = $('#edit_city').val();
                            var goal = $('#edit_goal').val();
                            var result = $('#result').val();
                            var comment = $('#comment').val();
                            var start_date = $('#edit_lesson_start').val();
                            var end_date = $('#edit_lesson_end').val();
                            $.ajax({
                                url: "{{ route('lesson.option')}}",
                                type: "POST",
                                dataType: 'json',
                                data: {
                                    id:id,
                                    adress,
                                    postcode,
                                    city,
                                    goal,
                                    result,
                                    comment,
                                    start_date,
                                    end_date,
                                    type: 'update'
                                },
                                success:function(data)
                                {
                                    if (data.status == true)
                                    {
                                        $('#editLessonModal').modal('hide');
                                        swal({
                                            title: "Good jop!",
                                            text: (data.message),
                                            icon: "success",
                                            button: "Ok!",
                                            });
                                            calendar.fullCalendar('renderEvent', {
                                                id:data.id,
                                                start: start_date,
                                                end: end_date,
                                            }, true);
                                            calendar.fullCalendar('unselect');
                                            window.location.reload('#calendar')
                                    }
                                    else 
                                    {
                                        $('#editLessonModal').modal('hide');
                                        swal({
                                            title: "Oops!",
                                            text: (data.message),
                                            icon: "error",
                                            button: "Ok!",
                                            });
                                    }
                                },
                                error:function(error)
                                {

                                },
                            });
                        });
                        // Delete
                        $('#delete').click(function(){
                            if(confirm("Wil je de les verwijdering?")){
                            $.ajax({
                                url: "{{ route('lesson.option')}}",
                                type: "POST",
                                dataType: 'json',
                                data: {
                                    id:id,
                                    type:"delete"
                                },
                                success:function(data)
                                {
                                    $('#editLessonModal').modal('hide')
                                    swal({
                                        title: "Good job!",
                                        text: "Les verwijderd!",
                                        icon: "success",
                                        button: "Ok!",
                                        });
                                        $('#calendar').fullCalendar('removeEvents', event.id);
                                },
                                error:function(error)
                                {

                                },
                            })
                        };
                        });
                },
            })
        });

    </script>
    <script>
    function updateDiv() {
        window.location.href + " #container";
    }
    </script>
</x-app-layout>
</html>
