<x-basecomponent>
    <div class="position-relative top-0" style=" height: 100vh;">
        <div class="rectangle position-absolute top-0"></div>
        <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card position-absolute start-50 align-items-center w-75 shadow"
                style="transform: translateX(-50%); top: 10%;">
                <div class="card-body">
                    <h5 class="fs-1 card-title text-center fw-bold ">Registration</h5>

                        <div class="input-group my-1 flex-nowrap">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fw-bold fs-1 bi bi-envelope-at"></i></span>
                            <input type="text" class="underline-input" name="email" placeholder="email">
                        </div>
                        <div class="input-group mt-1 mb-2 flex-nowrap">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fw-bold fs-1 bi bi-person"></i></span>
                            <input type="text" class="underline-input" name="username" placeholder="username" autocomplete="off">
                        </div>

                        <div class="input-group my-1 flex-nowrap">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fs-1 bi bi-lock"></i></span>
                            <input type="password" class="underline-input" name="password" placeholder="password" autocomplete="off">
                        </div>
                        <div class="input-group mt-1 mb-2 flex-nowrap">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fs-1 bi bi-arrow-repeat"></i></span>
                            <input type="password" class="underline-input" name="password_confirmation" placeholder="repeat password">
                        </div>
                        <div class="input-group my-1 flex-nowrap">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fs-1 bi bi-person-vcard"></i></span>
                            <input type="text" class="underline-input" name="idnum" placeholder="ID number">
                        </div>
                        <div class="input-group my-1 flex-nowrap">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0"><i
                                    class="text-primary fs-1 bi bi-person-vcard"></i></span>
                                    <input type="file" class="form-control" name="file" placeholder="Picture">
                        </div>
                </div>
            </div>

            <div class="container-fluid d-flex flex-column px-0 position-absolute start-50"
                style="transform: translateX(-50%); top: 60%;">
                <div class="input-group justify-content-center">
                    <button type="submit" class="btn btn-primary bg-gradient btn-lg">
                        Register
                    </button>
                </div>
                <div class="input-group justify-content-center flex-column">
                    <p class="fs-5 fw-bold text-center text-wrap mb-0">Already have an account?</p>
                    <a href="{{ route('home') }}" class="btn btn-link fs-5 fw-bold p-0">Login</a>
                </div>
            </div>
        </form>


        <div class="rectangle position-absolute bottom-0"></div>

    </div>



    @if($errors->any())

        <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Registration
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($errors->all() as $error)
                            <p class="fs-5 fw-bold text-danger">{{ $error }}</p>

                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const myModal = new bootstrap.Modal(
                document.getElementById("msg"),
            );
            myModal.show();
        </script>

    @endif
    


</x-basecomponent>