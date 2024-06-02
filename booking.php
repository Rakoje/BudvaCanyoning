<?php include('helpers/header.php');
include('helpers/navbar.php'); ?>
    <div class="booking-bg">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-6 d-flex justify-content-center align-items-center">
                    <div class=" margin-responsive">
                        <h1 class="slide_up1">Booking</h1>
                        <div class="slide_up1_5">Book your adventure today and secure your spot for this unforgettable
                            experience.
                            Simply choose your desired dates below and get ready for an exciting journey through Hidden Gem of Budva!
                        </div>
                        <br>
                        <form action="send_mail.php" method="post" class="mb-3 slide_up_form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="Phone number with country code" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Number of participants</label>
                                <input type="number" class="form-control" id="number" name="number" min="1" value="1" required>
                            </div>
                            <div id="guests">
                                <div id="guest_1">
                                    <div class="mb-2 text-center">
                                        <label for="guest_1" class="form-label">Guest 1</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="guest_1_height" class="form-label">Height</label>
                                        <input type="number" class="form-control" id="guest_1_height"
                                               name="guest_1_height" placeholder="Height (in cm)" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="guest_1_weight" class="form-label">Weight</label>
                                        <input type="number" class="form-control" id="guest_1_weight"
                                               name="guest_1_weight" placeholder="Weight (in kg)" min="27" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="guest_1_shoe_size" class="form-label">Shoe size</label>
                                        <input type="number" class="form-control" id="guest_1_shoe_size"
                                               name="guest_1_shoe_size" placeholder="Shoe size (EU standard)" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Additional notes</label>
                                <textarea rows="5" class="form-control" id="notes" name="notes"
                                          placeholder="Additional notes (optional)"></textarea>
                            </div>
                            <div id="price" class="text-center"><h1>Price: 80€</h1></div>
                            <div class="mb-3 text-center">Please double check the data you entered before submitting<br>
                                <button class="mt-3 blue-button" type="submit">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <?php include('helpers/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>