<div id="monkey-datos" class="container-fluid">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ">
            <div class="card h-90 m-5 w-60">
                <div class="card-body">
                    <div class="account-settings text-center">
                        <div class="monkey-profile">
                            <div class="monkey-avatar">
                                <img src="<?= $monkey['img']; ?>" alt="Maxwell Admin">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-90 m-5">
                <div class="card-body m-2">
                    <div class="row gutters">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                            <h6 class="mb-2 text-primary">Monkey Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="name">
                                    <h6 class="monkey-name">
                                        Name:
                                    </h6>
                                </label>
                                <input type="text" class="form-control" id="name"
                                    placeholder=" <?= $monkey['name']; ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="age">
                                    <h6 class="monkey-age">
                                        Age:
                                    </h6>
                                </label>
                                <input type="text" class="form-control" id="age" placeholder="<?= $monkey['age']; ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="sex">
                                    <h6 class="monkey-sex">
                                        Sex:
                                    </h6>
                                </label>
                                <input type="text" class="form-control" id="sex" placeholder="<?= $monkey['sex']; ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-3">
                            <div class="form-group">
                                <label for="birthday">
                                    <h6 class="monkey-birthday">Date of Birth:</h6>
                                </label>
                                <input class="form-control" id="birthday" type="text"
                                    placeholder="<?= $monkey['date-of-birth']; ?>">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                            <div class="form-group">
                                <label for="breed">
                                    <h6 class="monkey-breed">
                                        Breed:
                                    </h6>
                                </label>
                                <input type="text" class="form-control" id="breed"
                                    placeholder="<?= $monkey['breed']; ?>">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                            <div class="form-group">
                                <!-- <label for="description">
                                    <h6 class="monkey-description">Description:</h6>
                                </label>
                                <input class="form-control" id="description" type="text"
                                    placeholder="<?= $monkey['description']; ?>"> -->
                                <label for="comment">
                                    <h6 class="monkey-description">Description:</h6>
                                </label>
                                <textarea class="form-control" rows="5" id="comment" name="text"
                                    placeholder="<?= $monkey['description']; ?>"></textarea>
                            </div>
                        </div>
                        <a href="contact.php">
                            <button class="btn btn-dark mt-4">Adopt</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background: #f5f6fa;
    }

    #monkey-datos {
        margin: 0;
        padding-top: 40px;
        padding-bottom: 40px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .account-settings .monkey-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .monkey-profile .monkey-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .monkey-profile .monkey-avatar img {
        width: 100%;
        height: 100%;
    }

    .account-settings .monkey-profile h5.monkey-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .monkey-profile h6.monkey-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
</style>