<x-basecomponent>

    <div class="px-3 py-2 mt-2">
        <p class="fs-4 fw-bold">My Reservations</p>
    </div>

    <div class="container-fluid d-flex flex-column px-2">
        @foreach ($reservations as $r)
            <div class="container-fluid rounded-3 shadow-lg border">
                <div class="row">
                    <div class="col-4 p-0">
                        <img src="{{ asset('assets/img/BG.jpg') }}" class="img-fluid rounded-start-3" style="height: 100%;" alt="">
                    </div>
                    <div class="col py-2">
                        <div class="row">
                            <div class="col p-0 ps-1">
                                <p class="fs-6 my-1"> {{ $r->room->building->name }} Building</p>
                                <p class="fs-4 fw-bold my-0">{{ $r->room->room_name }}</p>
                                <p class="fs-6 fw-bold my-0 mt-1 text-center text-nowrap text-primary">{{ date('h:i a', strtotime($r->start_time)) }} - {{ date('h:i a', strtotime($r->end_time)) }}</p>
                            </div>
                            <div class="col p-0 px-1">
                                <div class="text-center rounded-3 bg-danger my-0">
                                    <p class="fs-6 text-white mb-0 px-2">{{ ucfirst($r->room->status) }}</p>
                                </div>
                                <button class="btn btn-danger btn-sm rounded-3 w-100 py-0">Quit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        

    </div>


</x-basecomponent>