 <!-- Details Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content rounded-3 shadow">

                <div class="modal-header text-white" style="background: #05113b;">
                    <h5 class="modal-title" id="viewModalLabel">
                        View Details
                    </h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                            <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z" />
                        </svg>
                    </button>
                </div>

                <div class="modal-body" id="modalBody">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-xl-6 col-sm-6 col-12 d-flex flex-column">
                            <!-- Primary Info -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <strong>Primary Info</strong>
                                    <span class="mx-2"id="primary-status"></span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3"><label>Type</label><input class="form-control"  id="type" readonly value=""></div>
                                    <div class="mb-3"><label>Company Name</label><input class="form-control" id="company-name" readonly value="SAN JOSE BATANGAS LGU"></div>
                                    <div class="mb-3"><label>Txn Ref</label><input class="form-control" id="txn-ref" readonly value="PGCAG00000000026"></div>
                                    <div class="mb-3"><label>Reference No.</label><input class="form-control" id="reference-no" readonly value="250415130654109494000005"></div>
                                    <div class="mb-3"><label>Merchant Ref.</label><input class="form-control" id="merchant-ref" readonly value="Online Banking"></div>
                                    <div class="mb-3"><label>Email</label><input class="form-control" id="email" readonly value="Mobile App"></div>
                                </div>
                            </div>

                            <!-- Other Details (no table) -->
                            <div id="other-details"></div>
                            <!-- <div class="card mb-4 flex-fill">
                                <div class="card-header">
                                    <strong>Other Details</strong>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <strong>Key:</strong>
                                        <span class="float-end">value</span>
                                    </div>
                                    <div class="mb-2">
                                        <strong>Account No.:</strong>
                                        <span class="float-end">0123456789</span>
                                    </div>
                                    <div class="mb-2">
                                        <strong>Amount:</strong>
                                        <span class="float-end">₱1,500.00</span>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <!-- Right Column -->
                        <div class="col-xl-6 col-sm-6 col-12 d-flex flex-column">
                            <!-- Date and Time Created -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <strong>Date and Time Created</strong>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3"><label>Date</label><input class="form-control" id="date-created" readonly value=""></div>
                                    <div class="mb-3"><label>Time</label><input class="form-control" id="time-created" readonly value=""></div>
                                </div>
                            </div>

                            <!-- Date and Time Modified -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <strong>Date and Time Modified</strong>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3"><label>Date</label><input class="form-control" id="date-modified" readonly value=""></div>
                                    <div class="mb-3"><label>Time</label><input class="form-control" id="time-modified" readonly value=""></div>
                                </div>
                            </div>

                            <!-- Status Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <strong>Status Information</strong>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3"><label>Status</label><input class="form-control" id="payment-status" readonly value="Completed"></div>
                                    <div class="mb-3"><label>TxId</label><input class="form-control" id="txid" readonly value="APRV123456"></div>
                                    <div class="mb-3"><label>Bank Ref</label><input class="form-control" id="bank-ref" readonly value="APRV123456"></div>
                                    <div class="mb-3"><label>Remarks</label><textarea class="form-control" id="remarks" readonly></textarea></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>