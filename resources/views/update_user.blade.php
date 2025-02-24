@include('layouts.navbar')

<div class="content-wrapper d-flex flex-column min-vh-100">
    <div class="container mt-5 mb-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4 bg-dark text-white border-0">
                    <div class="card-header bg-danger text-white text-center py-3 rounded-top">
                        <h4 class="mb-0">Edit User</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="/users/{{ $user->id }}/update" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 text-center">
                                <img src="{{ $user->profile_image }}" id="profilePreview" width="80"
                                    class="rounded-circle border" alt="Profile Image">
                                <label for="profile_image" class="form-label d-block mt-2"><i class="fas fa-image"></i>
                                    Profile Image:</label>
                                <input type="file" name="profile_image" id="profile_image" class="form-control"
                                    accept="image/jpg, image/jpeg, image/png" onchange="previewImage(event)">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label"><i class="fas fa-user"></i> Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    maxlength="25" value="{{ $user->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label"><i class="fas fa-phone"></i> Phone:</label>
                                <input type="text" name="phone" id="phone" class="form-control" required
                                    value="{{ $user->phone }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required
                                    value="{{ $user->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="street_address" class="form-label"><i class="fas fa-map-marker-alt"></i>
                                    Street Address:</label>
                                <input type="text" name="street_address" id="street_address" class="form-control"
                                    required value="{{ $user->street_address }}">
                            </div>

                            <div class="mb-3">
                                <label for="city" class="form-label"><i class="fas fa-city"></i> City:</label>
                                <input type="text" name="city" id="city" class="form-control" required
                                    value="{{ $user->city }}">
                            </div>

                            <div class="mb-3">
                                <label for="state" class="form-label"><i class="fas fa-flag"></i> State:</label>
                                <select name="state" id="state" class="form-select" required>
                                    <option value="">Select a state</option>
                                    <option value="{{ $user->state }}" selected>{{ $user->state }}</option>
                                    <option value="CA">CA</option>
                                    <option value="NY">NY</option>
                                    <option value="AT">AT</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label"><i class="fas fa-globe"></i> Country:</label>
                                <select name="country" id="country" class="form-select" required>
                                    <option value="">Select a country</option>
                                    <option value="{{ $user->country }}" selected>{{ $user->country }}</option>
                                    <option value="IN">IN</option>
                                    <option value="US">US</option>
                                    <option value="EU">EU</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-danger w-100 fw-bold">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto bg-dark text-white text-center py-3">
        &copy; 2025 Your Company. All Rights Reserved.
    </footer>
</div>

<script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let output = document.getElementById('profilePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
