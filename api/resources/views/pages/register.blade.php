<x-basecomponent>
    <div class="position-relative top-0" style=" height: 100vh;">
        <div class="rectangle position-absolute top-0"></div>
        <form action="{{ route('create') }}" method="POST">
            @csrf
            <div class="card position-absolute start-50 align-items-center w-75 shadow"
                style="transform: translateX(-50%); top: 10%;">
                <div class="card-body">
                    <h5 class="fs-1 card-title text-center fw-bold ">Registration</h5>

                        <div class="input-group my-1">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fw-bold fs-1 bi bi-envelope-at"></i></span>
                            <input type="text" class="underline-input" name="email" placeholder="email">
                        </div>
                        <div class="input-group mt-1 mb-3">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fw-bold fs-1 bi bi-person"></i></span>
                            <input type="text" class="underline-input" name="username" placeholder="username" autocomplete="off">
                        </div>

                        <div class="input-group my-1">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fs-1 bi bi-lock"></i></span>
                            <input type="password" class="underline-input" name="password" placeholder="password" autocomplete="off">
                        </div>
                        <div class="input-group mt-1 mb-3">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fs-1 bi bi-arrow-repeat"></i></span>
                            <input type="password" class="underline-input" name="password_confirmation" placeholder="repeat password">
                        </div>
                        <div class="input-group my-1">
                            <span class="input-group-text bg-white border-0 px-1 flex-column justify-content-end py-0" ><i
                                    class="text-primary fs-1 bi bi-person-vcard"></i></span>
                            <input type="text" class="underline-input" name="idnum" placeholder="ID number">
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



</x-basecomponent>