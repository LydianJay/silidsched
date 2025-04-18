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

        <div class="w-50 position-absolute end-0 top-0 mt-2 p-2 m-2 rounded-pill" style="background-color: #0D35E5;">
            <p class="fs-7 text-white px-1 text-nowrap fw-bold m-0">Ma'am Jaypee
                <span> 
                    <img class="rounded-4 mx-2" src="{{ asset('assets/img/generic-avatar.png') }}" alt="" style="width: 32px; height: 32px;"> 
                </span>
            </p>
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
        <a href="{{ route('reservation') }}" class="fw-bold">View All</a>
    </div>

    <div class="w-100 d-flex flex-row  flex-nowrap overflow-scroll">
        <div class="rounded-2 mt-1 mx-3 border-0 shadow-sm px-3 py-1" style="background-color: #EDF8FE">
            <p class="text-nowrap fw-bold m-0">25 Feb 2025 |<span class="fw-normal"> 5:30 - 6:30</span></p>
            <p class="text-nowrap fs-5 fw-bold">IT LAB1 | DCS BUILDING</p>
            <p class="text-nowrap">Duration 60 mins</p>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-between mt-3">
        <p class="fs-6 fw-bold">Check Rooms</p>
    </div>

    <div class="w-100 d-flex flex-row  flex-nowrap overflow-scroll">
        @foreach ($buildings as $building)

            <div class="mt-1 mx-2 px-3 py-1" onclick="document.location = '{{ route('reservation', ['bldg_id' => $building['id']] ) }}'">
                <img src=" {{ asset('storage/buildings/' . $building['building_img']) }}" style="width: 35vw; height: 35vw; border-radius: 10%;">
                <p class="text-nowrap fs-6 fw-bold">{{ $building['name'] }}</p>
                <p class="text-nowrap text-secondary">{{ $building['rooms_count'] }} Room(s)</p>
            </div>
        @endforeach

        
    </div>


    <div class="d-flex flex-row justify-content-center   text-center text-nowrap">
        <button class="text-white py-2 px-4 btn rounded-4" style="background-color: #0D35E5;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle-dotted"
                viewBox="0 0 16 16">
                <path
                    d="M8 0q-.264 0-.523.017l.064.998a7 7 0 0 1 .918 0l.064-.998A8 8 0 0 0 8 0M6.44.152q-.52.104-1.012.27l.321.948q.43-.147.884-.237L6.44.153zm4.132.271a8 8 0 0 0-1.011-.27l-.194.98q.453.09.884.237zm1.873.925a8 8 0 0 0-.906-.524l-.443.896q.413.205.793.459zM4.46.824q-.471.233-.905.524l.556.83a7 7 0 0 1 .793-.458zM2.725 1.985q-.394.346-.74.74l.752.66q.303-.345.648-.648zm11.29.74a8 8 0 0 0-.74-.74l-.66.752q.346.303.648.648zm1.161 1.735a8 8 0 0 0-.524-.905l-.83.556q.254.38.458.793l.896-.443zM1.348 3.555q-.292.433-.524.906l.896.443q.205-.413.459-.793zM.423 5.428a8 8 0 0 0-.27 1.011l.98.194q.09-.453.237-.884zM15.848 6.44a8 8 0 0 0-.27-1.012l-.948.321q.147.43.237.884zM.017 7.477a8 8 0 0 0 0 1.046l.998-.064a7 7 0 0 1 0-.918zM16 8a8 8 0 0 0-.017-.523l-.998.064a7 7 0 0 1 0 .918l.998.064A8 8 0 0 0 16 8M.152 9.56q.104.52.27 1.012l.948-.321a7 7 0 0 1-.237-.884l-.98.194zm15.425 1.012q.168-.493.27-1.011l-.98-.194q-.09.453-.237.884zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a7 7 0 0 1-.458-.793zm13.828.905q.292-.434.524-.906l-.896-.443q-.205.413-.459.793zm-12.667.83q.346.394.74.74l.66-.752a7 7 0 0 1-.648-.648zm11.29.74q.394-.346.74-.74l-.752-.66q-.302.346-.648.648zm-1.735 1.161q.471-.233.905-.524l-.556-.83a7 7 0 0 1-.793.458zm-7.985-.524q.434.292.906.524l.443-.896a7 7 0 0 1-.793-.459zm1.873.925q.493.168 1.011.27l.194-.98a7 7 0 0 1-.884-.237zm4.132.271a8 8 0 0 0 1.012-.27l-.321-.948a7 7 0 0 1-.884.237l.194.98zm-2.083.135a8 8 0 0 0 1.046 0l-.064-.998a7 7 0 0 1-.918 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
            </svg>
            <span class="fs-6 fw-bold m-0">Quick Reserve</span>
        </button>
       
    </div>

</x-basecomponent>