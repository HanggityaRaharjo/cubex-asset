<div class="modal fade" id="modalStatusRef" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg  modal-dialog-top" role="document">
        <div class="modal-content" style="">
            <div class="modal-header">

                <h6 style="margin-left:1rem" id='title-status'><b> </b></h6>
                <input type="hidden" id="ParamId" value="">
            </div>
            <div class="modal-body" style="border-radius: 50%">
                <form class="mt-3" id="form-status" action="#"  method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    {{-- <input type="hidden" name="is_type" value="1"> --}}
                    <input type="hidden" name="_method" id="_method">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1" for="Code"><b>Code</b></label>
                                <div class="col-sm-11">
                                    <input type="text" name="code" id="code" class="form-control input-sm" placeholder="Status Code" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1" for="Code"><b>Name</b></label>
                                <div class="col-sm-11">
                                    <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Status Name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1" for="Code"><b>Descr</b></label>
                                <div class="col-sm-11">
                                    <input type="text" name="descr" id="descr" class="form-control input-sm" placeholder="Status Descr" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-sm-1" for="Code"><b>Seq</b></label>
                                <div class="col-sm-5">
                                    <select class="form-control input-sm" name="sequence">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-1" for="Code"><b>Status</b></label>
                                <div class="col-sm-5">
                                    <select class="form-control input-sm" name="active">
                                        <option value="1">Active</option>
                                        <option value="2">In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <input type="hidden" id="type_id"  name="type_id">
                            <input type="button" value="Save" class="btn btn-sm btn-success" id="button-status">
                            <input type="button" value="Cancel" class="btn btn-sm btn-warning" data-dismiss="modal">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
