<x-basecomponent>
    <div class="position-relative top-0" style=" height: 100vh;">
        <div class="rectangle position-absolute top-0"></div>

        <div class="card position-absolute start-50 align-items-center w-75 shadow"
            style="transform: translateX(-50%); top: 12%;">
            <div class="card-body">
                <h5 class="fs-1 card-title text-center fw-bold ">Welcome!</h5>
        
                <form action="">
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
                        <input type="text" name="password" class="underline-input" placeholder="password">
                    </div>
        
                </form>
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
    


</x-basecomponent>