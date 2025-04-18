<x-basecomponent>

    <div class="px-3 py-2 mt-2">
        <p class="fs-4 fw-bold">My Reservations</p>
    </div>

    <div class="container-fluid d-flex flex-column px-2">

        <div class="container-fluid rounded-3 shadow-lg border">
            <div class="row">
                <div class="col-4 p-0">
                    <img src="{{ asset('assets/img/BG.jpg') }}" class="img-fluid rounded-start-3" style="height: 100%;" alt="">
                </div>
                <div class="col py-2">
                    <div class="row">
                        <div class="col p-0 ps-1">
                            <p class="fs-6 my-1">DCS Building</p>
                            <p class="fs-4 fw-bold my-0">IT-Lab 1</p>
                            <p class="fs-6 fw-bold my-0 mt-1 text-center text-primary">8:00 - 9:00</p>
                        </div>
                        <div class="col p-0 px-1">
                            <div class="text-center rounded-3 bg-danger my-0">
                                <p class="fs-6 text-white mb-0">Occupied</p>
                            </div>
                            <button class="btn btn-danger btn-sm rounded-3 w-100 py-0">Quit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-basecomponent>