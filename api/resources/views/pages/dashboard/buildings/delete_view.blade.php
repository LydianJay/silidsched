<x-basecomponent>
    <form action="{{ route('delete_building_post') }}" method="POST">
        @csrf
        <div class="position-relative top-0" style=" height: 100vh;">
            <div class="rectangle position-absolute top-0"></div>

            <div class="card position-absolute start-50 align-items-center w-75 shadow"
                style="transform: translateX(-50%); top: 12%;">
                <div class="card-body">
                    <h5 class="fs-1 card-title text-center fw-bold ">Delete building</h5>
                    <div class="input-group mt-5">
                       <select name="building" class="form-control">
                            <option value="" disabled selected>Select a building to delete</option>
                            @foreach($buildings as $building)
                                <option value="{{ $building->id }}">{{ $building->name }}</option>
                            @endforeach
                       </select>
                    </div>
                    

                </div>

            </div>

            <div class="container-fluid d-flex flex-column px-0 position-absolute start-50"
                style="transform: translateX(-50%); top: 60%;">
                <div class="input-group justify-content-center">
                    <button type="submit" class="btn btn-primary bg-gradient btn-lg">
                        Delete
                    </button>
                </div>
                <div class="input-group justify-content-center flex-column">
                    <a href="{{ route('dashboard') }}" class="btn btn-link fs-5 fw-bold p-0">Cancel</a>
                </div>
            </div>


            <div class="rectangle position-absolute bottom-0"></div>

        </div>
    </form>



    @if(session('msg'))

        <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Deletion Confirmation
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 fw-bold text-info">{{ session('msg') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional: Place to the bottom of scripts -->
        <script>
            const myModal = new bootstrap.Modal(
                document.getElementById("success"),
            );
            myModal.show();
        </script>

    @endif






</x-basecomponent>