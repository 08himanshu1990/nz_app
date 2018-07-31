<div class="modal fade bd-example-modal-md" id="modalOne" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content  py-3">
                    <div class="text-center">
                        <h5>Edit a Shared Link to a File</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputLink" class="col-sm-3 col-form-label">File Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputLink" placeholder="http://127.0.0.1:5500/customers.html#">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLink1" class="col-sm-3 col-form-label">Shared Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputLink1" placeholder="http://127.0.0.1:5500/customers.html#">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary col-sm-4 offset-sm-0" data-dismiss="modal">Back</button>

                        <button type="button" class="btn btn-primary col-sm-4 offset-sm-1">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Invite Team member starts -->
        <div class="modal fade bd-example-modal-md" id="modalTwo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content  py-3">
                    <div class="text-center">
                        <h5 class="modal-title">Invite Team Member</h5>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group row mb-1">
                                <label for="firstName" class="col-sm-3 col-form-label">firstName</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="firstName" value="Jerry">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="lastName" class="col-sm-3 col-form-label">lastName</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPassword" value="Patmore">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="inputEmail" class="col-sm-3 col-form-label">email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" value="jerry@patmore.com">
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Resource Group</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Installer</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-1">
                                <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label">Intro Group</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Lorem ipsum dolor sit amet, an cum nonumy accusam pertinacia. Sonet incorrupte vis no, electram tincidunt no eos, te cum impetus scriptorem."></textarea>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary col-sm-4 offset-sm-0" data-dismiss="modal">Back</button>
                        <button type="button" class="btn btn-primary col-sm-4 offset-sm-1">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Invite Team Members Ends -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="http://workondesk.com/demo/terry/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
 $(function () {
        $(".dates").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());

    });
</script>
</html>