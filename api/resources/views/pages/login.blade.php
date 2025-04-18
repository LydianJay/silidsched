<x-basecomponent>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="position-relative top-0" style=" height: 100vh;">
            <div class="rectangle position-absolute top-0"></div>

            <div class="card position-absolute start-50 align-items-center w-75 shadow"
                style="transform: translateX(-50%); top: 12%;">
                <div class="card-body">
                    <h5 class="fs-1 card-title text-center fw-bold ">Welcome!</h5>
            
                        <div class="input-group mt-5">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0">
                                <i class="text-primary fw-bold fs-1 bi bi-person"></i>
                            </span>
                            <input type="text" name="name" class="underline-input" placeholder="username">
                        </div>
                        <div class="input-group mt-2 mb-5">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0">
                                <i class="text-primary fs-1 bi bi-lock"></i>
                            </span>
                            <input type="password" name="password" class="underline-input" placeholder="password">
                        </div>
            
                </div>
            
            </div>

            <div class="container-fluid d-flex flex-column px-0 position-absolute start-50" style="transform: translateX(-50%); top: 60%;">
                <div class="input-group justify-content-center">
                    <button type="submit" class="btn btn-primary bg-gradient btn-lg">
                        Login
                    </button>
                </div>
                <div class="input-group justify-content-center flex-column">
                    <p class="fs-5 fw-bold text-center text-wrap mb-0">If you don't have an account</p>
                    <a href="{{ route('register') }}" class="btn btn-link fs-5 fw-bold p-0">Register</a>
                </div>
            </div>


            <div class="rectangle position-absolute bottom-0"></div>

        </div>
    </form>

    
    
    


    @if(session('error'))

        <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Login
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 fw-bold text-danger">Incorrect username or password</p>
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
                document.getElementById("msg"),
            );
            myModal.show();
        </script>

    @endif


    @if(session('msg'))

        <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Registration
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 fw-bold text-danger">{{ session('msg') }}</p>
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