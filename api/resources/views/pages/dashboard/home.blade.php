<x-basecomponent>
    

    <div class="container-fluid" 
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://school-infrastructure.org/wp-content/uploads/2024/09/015471_EXT002_LOW-1024x683.jpg'); 
            background-size: cover;
            background-clip: border-box;
            background-position: center;
            background-repeat: no-repeat;
            height: 30vh;
            background-blend-mode: multiply;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 20%;
            border-bottom-right-radius: 20%;
            
            ">
        <div class="position-absolute top-0 mx-1 mt-3" onclick="openSideBar()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </div>

        <div class="w-50 position-absolute end-0 top-0 mt-2 p-2 m-2 rounded-pill d-flex flex-row justify-content-evenly align-items-center" style="background-color: #0D35E5;">
            <p class="fs-7 text-white px-1 text-nowrap fw-bold m-0">{{ Auth::user()->name }} </p>
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <img class="rounded-4 mx-2" src="{{ asset( 'storage/uploads/profile/' . Auth::user()->profile_pic) }}" alt=""
                    style="width: 32px; height: 32px;">
            </a>
        </div>


        <div class="row position-absolute text-white" style="top: 12%;">
            <div class="col-4">
                <img class="rounded-5 mx-2 bg-white" src="{{ asset('assets/img/Logo.png') }}" alt="" style="width: 80px; height: 80px;">
            </div>
            <div class="col">
                <p class="fs-2 text-white px-1 text-nowrap fw-bold m-0">SilidSched:</p>
                <p class="fs-6 text-white px-1 fw-bold m-0">Reserved & Schedule Rooms</p>
            </div>
        </div>
    </div>

    
    <div class="container-fluid d-flex justify-content-between mt-3">
        <p class="fs-6 fw-bold">My Reservations</p>
        <a href="{{ route('view_reservation') }}" class="fw-bold">View All</a>
    </div>
    <div class="w-100 d-flex flex-row overflow-scroll">

        @foreach ($reservations as $r)
            <div class="rounded-2 mt-1 mx-3 border-0 shadow-sm px-3 py-1" style="background-color: #EDF8FE">
                <p class="text-nowrap fw-bold m-0">{{ date('d M o', strtotime($r->reserved_date)) }} |<span class="fw-normal"> {{ date('h:i a', strtotime($r->start_time)) }} - {{ date('h:i a', strtotime($r->end_time)) }}</span></p>
                <p class="text-nowrap fs-5 fw-bold">{{ $r->room->room_name }} | {{$r->room->building->name}} BUILDING</p>
                <p class="text-nowrap">Duration {{ (strtotime($r->end_time) - strtotime($r->start_time)) / 60 }} mins</p>
            </div>
        @endforeach
    </div>

    {{-- <div class="w-100 d-flex flex-row  flex-nowrap overflow-scroll">
        <div class="rounded-2 mt-1 mx-3 border-0 shadow-sm px-3 py-1" style="background-color: #EDF8FE">
            <p class="text-nowrap fw-bold m-0">25 Feb 2025 |<span class="fw-normal"> 5:30 - 6:30</span></p>
            <p class="text-nowrap fs-5 fw-bold">IT LAB1 | DCS BUILDING</p>
            <p class="text-nowrap">Duration 60 mins</p>
        </div>
    </div> --}}

    <div class="container-fluid d-flex justify-content-between mt-3">
        <p class="fs-6 fw-bold">Check Rooms</p>
    </div>

    <div class="w-100 d-flex flex-row  flex-nowrap overflow-scroll">
        @foreach ($buildings as $building)

            <div class="mt-1 mx-2 px-3 py-1" onclick="document.location = '{{ route('reservation', ['bldg_id' => $building['id']]) }}'">
                <img src=" {{ asset('storage/buildings/' . $building['building_img']) }}" style="width: 35vw; height: 35vw; border-radius: 10%;">
                <p class="text-nowrap fs-6 fw-bold">{{ $building['name'] }}</p>
                <p class="text-nowrap text-secondary">{{ $building['rooms_count'] }} Room(s)</p>
            </div>
        @endforeach

        
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users_edit') }}" enctype="multipart/form-data" method="POST">

                    <div class="modal-body">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="input-group my-3">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Name" aria-label="Name">
                            </div>
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Profile Picture</span>
                                <input type="file" class="form-control" name="file">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



</x-basecomponent>