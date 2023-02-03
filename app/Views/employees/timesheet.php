<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3 d-print-none">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a>Fill Time Sheet</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title text-center">Time Sheet</h4>

                    </div>
                    <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                    <?php endif; ?>
                    <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                    <?php endif; ?>

                    <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->get('error') ?>
                    </div>
                    <?php endif; ?>
                    
                    <form action="<?= base_url('employee/timesheet/' . encryptIt($e_ord['ord_id'])) ?>" method="post">
                        
                            <table  class="table border">
                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>
                                            11:00-12:00pm
                                        </td>


                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="3">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="3">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="4">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="4">
                                                    Default  radio
                                                </label>
                                            </div>
                                        <td>


                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="5">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="5">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            11:00-12:00pm
                                        </td>


                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="3">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="3">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="4">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="4">
                                                    Default  radio
                                                </label>
                                            </div>
                                        <td>


                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="5">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="5">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            11:00-12:00pm
                                        </td>


                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="3">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="3">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="4">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="4">
                                                    Default  radio
                                                </label>
                                            </div>
                                        <td>


                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="5">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="5">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            11:00-12:00pm
                                        </td>


                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="3">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="3">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="4">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="4">
                                                    Default  radio
                                                </label>
                                            </div>
                                        <td>


                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="5">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="5">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            11:00-12:00pm
                                        </td>


                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="1"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="2"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="3">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="3"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="3">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="4">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="4"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="4">
                                                    Default  radio
                                                </label>
                                            </div>
                                        <td>


                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="5">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="5"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="5">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="6">
                                                    Default radio
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="6"
                                                    id="flexRadioDefault2" >
                                                <label class="form-check-label" for="6">
                                                    Default  radio
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

    


                                </tbody>
                            </table>
                            <br>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Save Data</span>
                                </button>
                            </div>

                        </form>
                        



                    </div>
                </div>
        </div>
        </div>
        </div>

