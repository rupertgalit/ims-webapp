    <!-- Client Deposit Modal -->
    <div class="modal fade" id="depositModal" tabindex="-1" role="dialog"
        aria-labelledby="depositModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="depositModalLabel">Deposit Details</h5>
                </div>
                <div class="modal-body">
                    <!-- Error message container -->
                    <div id="errorMessage" class="text-danger mb-3" style="display:none; text-align:center;"></div>
                    <form id="depositForm">
                        <div class="form-group">
                            <label for="totalDeposited">Total Deposited</label>
                            <input type="text" class="form-control" id="totalDeposited" value="0.00" readonly>
                        </div>
                        <div class="form-row flex-row">
                            <div class="form-group col-md-6">
                                <label for="fromDate">From Date</label>
                                <input type="date" class="form-control" id="fromDate">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="toDate">To Date</label>
                                <input type="date" class="form-control" id="toDate">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="totalUndeposited">Total Undeposited</label>
                            <input type="text" class="form-control" id="totalUndeposited" value="0.00" readonly>
                        </div>
                        <div class="form-group">
                            <label for="depositAmount">Deposit Amount</label>
                            <input type="number" class="form-control" id="depositAmount" placeholder="Enter amount"
                                min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="defaultSelect">Company Name</label>
                            <select class="form-select form-control" id="defaultSelect">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
                </div>
            </div>
        </div>
    </div>