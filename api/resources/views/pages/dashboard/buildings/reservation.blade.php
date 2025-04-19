<x-basecomponent>
    

    <div class="container-fluid px-0 vh-100" style="background-image: linear-gradient(to right, #007bff, #00d4ff);">
        
        <a href="{{route('dashboard')}}" class="mt-2 mx-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-arrow-left text-white" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
        </a>

        <div class="container-fluid px-2 mt-2">
            <div class="row">
                <div class="col">
                    @if (isset($current->building_img))
                        <img src="{{ asset('storage/buildings/' . $current->building_img) }}" alt="" class="rounded-4" style="width: 40vw; height: 35vw;">
                    @endif
                </div>
                <div class="col text-white">
                    <p class="fs-1 fw-bold m-0">{{ $current->name }}</p>
                    <p class="fs-1 fw-bold m-0">Building</p>
                    <p class="fs-2 fw-bold m-0 mt-1">{{ $current->rooms_count }} Room(s)</p>
                </div>
            </div>
        </div>

        <div class="container-fluid rounded-top-5 mt-4 px-0 py-5 vh-100 bg-white">
            <ul class="nav nav-pills nav-justified">
                @foreach ($nav_titles as $key => $title)
                    <li class="nav-item border">
                        <a class="nav-link {{ $index == $key ? 'active' : ''}}" href="{{ route('reservation', array_merge(request()->query(), ['i' => $key])) }}">{{ $title }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="px-2 mt-2">

                @foreach ($buildings as $key => $building)
                    <div class="container-fluid rounded-4 border my-1">
                        <div class="row">
                            <div class="col-3 p-0 ps-1">
                                <p class="fs-2 fw-bold my-0">{{$building['room_name']}}</p>
                            </div>
                            <div class="col p-0">
                                <p class="fs-2 my-0 {{ $building['status'] == 'vacant' ? 'text-success' : 'text-danger' }}"><span class="text-secondary fs-5 fw-normal">Status </span>{{ucfirst($building['status'])}}</p>
                                {{-- @if($building['status'] == 'reserved')
                                    <p class="fs-6 text-secondary text-center mx-1 my-0">{{ $building['start_time'] }}-{{ $building['end_time'] }}</p>
                                @endif --}}
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-center align-items-center p-0">
                                <button class="btn btn-sm  {{ $building['status'] == 'vacant' ? 'btn-primary' : 'disabled btn-secondary'}} rounded-3" onclick="window.location = '{{ route('reservation', array_merge(request()->query(), ['room_idx' => $key])) }}'">Reserve</button>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>
            
        </div>


    </div>

    


    @if(isset($room_idx) && isset($buildings[$room_idx]))
        <div class="modal fade" id="form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{route('add_reservation')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="p-1 bg-primary rounded-4 mx-5 text-white">
                                <p class="fs-6 fw-bold text-center m-0">Reservation Options</p>
                            </div>
                            <p class="fs-4 fw-bold text-center my-2">{{ $buildings[$room_idx]['room_name'] }}</p>
                            <input type="number" name="room_id" hidden value="{{ $buildings[$room_idx]['room_id'] }}">
                            <input type="number" name="bldg_id" hidden value="{{ request('bldg_id') }}">
                            <div class="px-5 my-2 ">
                                <label for="" class="form-label m-0">Reservation Date:</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="px-5 my-2">
                                <label for="" class="form-label m-0">Start Time:</label>
                                <input type="time" name="start" class="form-control">
                            </div>
                            <div class="px-5 my-2">
                                <label for="" class="form-label m-0">End Time:</label>
                                <input type="time" name="end" class="form-control">
                            </div>

                            <div class="d-flex flex-row justify-content-between  mt-2">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    onclick="window.location = '{{ route('reservation', request()->except('room_idx')) }}'"
                                >
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-outline-primary">Confirm</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <script>
            const myModal = new bootstrap.Modal(
                document.getElementById("form"),
            );
            @if(!$errors->any())
                myModal.show();
            @endif
        </script>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mx-4 mt-3" role="alert">
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    
</x-basecomponent>