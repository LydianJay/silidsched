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
                    <img src="{{ asset('storage/buildings/' . $current->building_img) }}" alt="" class="rounded-4" style="width: 40vw; height: 35vw;">
                </div>
                <div class="col text-white">
                    <p class="fs-1 fw-bold m-0">{{ $current->name }}</p>
                    <p class="fs-2 fw-bold m-0 mt-1">{{ $current->rooms_count }} room(s)</p>
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

                @foreach ($buildings as $building)
                    <div class="container-fluid rounded-4 border my-1">
                        <div class="row">
                            <div class="col-3 p-0 ps-1">
                                <p class="fs-2 fw-bold my-0">{{$building['room_name']}}</p>
                            </div>
                            <div class="col p-0">
                                <p class="fs-2 my-0 {{ $building['status'] == 'vacant' ? 'text-success' : 'text-danger' }}"><span class="text-secondary fs-5 fw-normal">Status </span>{{$building['status']}}</p>
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-center align-items-center p-0">
                                <button class="btn btn-sm  {{ $building['status'] == 'vacant' ? 'btn-primary' : 'disabled btn-secondary'}} rounded-3">Reserve</button>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>
            
        </div>


    </div>



</x-basecomponent>