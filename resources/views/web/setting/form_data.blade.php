<div class="sign-user_card">
    <h5 class="mb-3 pb-3 a-border">Personal Details</h5>
    <div class="row align-items-center justify-content-between mb-3">
        <div class="col-md-8">
            <div class="emailData">
                <span class="text-light font-size-13">Email</span>
                <p class="mb-0">
                    {{ $user->email }}
                </p>
            </div>
            <div class="form-group d-none emailInput">
                <label>Email</label>
                <input type="text" name="name" class="form-control mb-0" id="emailValue"
                       placeholder="Enter Your Name" value="{{ $user->email }}" autocomplete="off">
                <span class="emailError"></span>
            </div>
        </div>
        <div class="col-md-4 text-md-right text-left">
            <a href="#" class="text-primary ChangeEmailBtn">Change</a>
            <a href="#" class="text-primary d-none CancelEmailBtn">Cancel</a>
            <a href="#" class="text-primary d-none UpdateEmailBtn">Update</a>
        </div>
    </div>
    <div class="row align-items-center justify-content-between mb-3">
        <div class="col-md-8">
            <div class="passwordData">
                <span class="text-light font-size-13">Password</span>
                <p class="mb-0">**********</p>
            </div>
            <div class="form-group d-none passwordInput">
                <label>Password</label>
                <input type="text" name="name" class="form-control mb-0" id="passwordValue"
                       placeholder="Enter Your Password" autocomplete="off">
            </div>
        </div>
        <div class="col-md-4 text-md-right text-left">
            <a href="#" class="text-primary ChangePasswordBtn">Change</a>
            <a href="#" class="text-primary d-none CancelPasswordBtn">Cancel</a>
            <a href="#" class="text-primary d-none UpdatePasswordBtn">Update</a>
        </div>
    </div>
    <div class="row align-items-center justify-content-between mb-3">
        <div class="col-md-8 dateData">
            <span class="text-light font-size-13">Date of Birth</span>
            <p class="mb-0">
                {{ $user->date_of_birth }}
            </p>

        </div>
        <div class="col-md-8 d-none dateInput">
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="date_of_birth" id="dateValue" value="{{ $user->date_of_birth }}" class="form-control date-input basicFlatpickr mb-0" placeholder="Select Date">
            </div>
        </div>
        <div class="col-md-4 text-md-right text-left">
            <a href="#" class="text-primary ChangeDateBtn">Change</a>
            <a href="#" class="text-primary d-none CancelDateBtn">Cancel</a>
            <a href="#" class="text-primary d-none UpdateDateBtn">Update</a>
        </div>
    </div>
    <h5 class="mb-3 mt-4 pb-3 a-border">Billing Details</h5>
    <div class="row justify-content-between mb-3">
        <div class="col-md-8 r-mb-15">
            <p>Your next billing date is 19 September 2020.</p>
            <a href="#" class="btn btn-hover">Cancel Membership</a>
        </div>
        <div class="col-md-4 text-md-right text-left">
            <a href="#" class="text-primary">Update Payment info</a>
        </div>
    </div>
    <h5 class="mb-3 mt-4 pb-3 a-border">Plan Details</h5>
    <div class="row justify-content-between mb-3">
        <div class="col-md-8">
            <p>Premium</p>
        </div>
        <div class="col-md-4 text-md-right text-left">
            <a href="{{ route('page.pricing') }}" class="text-primary">Change Plan</a>
        </div>
    </div>
    <h5 class="mb-3 pb-3 mt-4 a-border">Setting</h5>
    <div class="row">
        <div class="col-12 setting">
            <a href="#" class="text-body d-block mb-1">Recent device streaming activity</a>

            <a href="#" class="text-body d-block mb-1 showLogoutForm">Sign out of all devices </a>

            <form action="{{ route('logoutOtherDevice') }}" method="POST" id="logoutForm" class="my-4 d-none">
                @csrf

                <input type="password" name="password" placeholder="Enter Password To Confirm" class="@error('password') is-invalid @enderror">
                @error('password')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
                <div class="my-3">
                    <button type="submit" class="btn btn-success submitBtn">
                        Sure
                    </button>
                    <button type="button" class="btn btn-dark hideLogoutForm">
                        Close
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
