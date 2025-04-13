<x-basecomponent>
    

    <div class="container-fluid" 
        style="background-image: url('https://school-infrastructure.org/wp-content/uploads/2024/09/015471_EXT002_LOW-1024x683.jpg'); 
            background-size: cover;
            background-clip: border-box;
            background-position: center;
            background-repeat: no-repeat;
            height: 30vh;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 20%;
            border-bottom-right-radius: 20%;
            ">

        <div class="w-50 position-absolute end-0 top-0 mt-2 bg-primary p-2 m-2 rounded-pill">
            <p class="fs-7 text-white text-opacity-75 text-nowrap fw-bold m-0">Test User</p>
        </div>
        <div class=" text-white">
            <p>Test</p>
        </div>

        <div class="row justify-content-center position-absolute w-100 " style="transform: translateY(50%);">
            <div class="col-11 px-0">
                <div class="card rounded-4">
                    <div class="card-body p-1 d-flex flex-column justify-content-evenly shadow">

                        <div class="d-flex flex-row justify-content-evenly">
                            <div class="mx-1 px-1 d-flex flex-column align-items-center  justify-content-end">
                                <img src="{{ asset('assets/img/Schedule Button.png') }}" style="width: 70%; height: 70%;" />
                            </div>
                            <div class="mx-1 px-1 d-flex flex-column align-items-center justify-content-end">
                                <img src="{{ asset('assets/img/Vacant Button.png') }}" style="width: 70%; height: 70%;" />
                            </div>
                            <div class="mx-1 px-1 d-flex flex-column align-items-center justify-content-end">
                                <img src="{{ asset('assets/img/Reservations Button.png') }}" style="width: 70%; height: 70%;" />
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-evenly">
                            <div class="mx-1 px-1 d-flex flex-column align-items-center">
                                <p class="fs-6 text-nowrap fw-bold">Schedule</p>
                            </div>
                            <div class="mx-1 px-1 d-flex flex-column align-items-center">
                                <p class="fs-6 text-nowrap fw-bold">Vacant Rooms</p>
                            </div>
                            <div class="mx-1 px-1 d-flex flex-column align-items-center">
                                <p class="fs-6 text-nowrap fw-bold">Reservations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        


    </div>

    
    <div class="container-fluid d-flex justify-content-between mt-5">
        <p class="fs-6 fw-bold">My Reservations</p>
        <a href="#" class="fw-bold">View All</a>
    </div>

    <div class="w-100 d-flex flex-row  flex-nowrap overflow-scroll">
        <div class="rounded-2 mt-1 mx-3 border-0 shadow-sm px-3 py-1" style="background-color: #EDF8FE">
            <p class="text-nowrap fw-bold m-0">25 Feb 2025 |<span class="fw-normal"> 5:30 - 6:30</span></p>
            <p class="text-nowrap fs-5 fw-bold">IT LAB1 | DCS BUILDING</p>
            <p class="text-nowrap">Duration 60 mins</p>
        </div>
    </div>

    <div class="container-fluid d-flex justify-content-between mt-5">
        <p class="fs-6 fw-bold">Check Rooms</p>
    </div>

    <div class="w-100 d-flex flex-row  flex-nowrap overflow-scroll">
        <div class="mt-1 mx-2 px-3 py-1">
            <img src=" {{ asset('assets/img/DCS building.jpg') }}" style="width: 40vw; height: 40vw; border-radius: 10%;">
            <p class="text-nowrap fs-6 fw-bold">DCS BUILDING</p>
            <p class="text-nowrap text-secondary">18 Rooms</p>
        </div>

        <div class="mt-1 mx-2 px-3 py-1">
            <img src=" {{ asset('assets/img/DCS building.jpg') }}" style="width: 40vw; height: 40vw; border-radius: 10%;">
            <p class="text-nowrap fs-6 fw-bold">DCS BUILDING</p>
            <p class="text-nowrap text-secondary">18 Rooms</p>
        </div>
    </div>

</x-basecomponent>