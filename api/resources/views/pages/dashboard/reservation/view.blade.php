<x-basecomponent>

    <div class="px-3 py-2 mt-2">
        <div class=" mx-1 mt-3" onclick="openSideBar()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-dark"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </div>

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
                                                        <p class="fs-6 my-1"> {{ $r->room->building->name }} Building <span class="ms-3"><a href="{{ route('qr', ['id' => $r->room->id]) }}">Get QR<i class="bi bi-qr-code mx-1 text-primary fs-1 text-end"></i></a></span></p>
                                                        <p class="fs-4 fw-bold my-0">{{ $r->room->room_name }}</p>
                                                        <p class="fs-6 fw-bold my-0 mt-1 text-center text-nowrap text-primary">{{ date('h:i a', strtotime($r->start_time)) }} - {{ date('h:i a', strtotime($r->end_time)) }}</p>
                                                    </div>
                                                    <div class="col p-0 px-1">
                                                        @php 
                                                            $status = $r->room->status;
            $status = $status == 'vacant' ? 'success' : ($status == 'reserved' ? 'warning' : 'danger');
                                                        @endphp

                                                        <div class="text-center rounded-3 bg-{{$status}} my-0">
                                                            <p class="fs-6 text-white mb-0 px-2">{{ ucfirst($r->room->status) }}</p>
                                                        </div>
                                                        <a class="btn btn-danger btn-sm rounded-3 w-100 py-0 my-1" href="{{ route('occupy', ['id' => $r->room->id]) }}">Mark As Occupied</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

        @endforeach

        

    </div>


</x-basecomponent>