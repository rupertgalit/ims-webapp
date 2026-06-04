      <!-- Merchant Deposit Modal -->
                <div class="modal fade" id="depositModal" tabindex="-1" role="dialog"
                  aria-labelledby="depositModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="background: #05113b; color:#fff!important;">
                        <h5 class="modal-title" id="depositModalLabel">
                          Daily Settlement
                        </h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" style="background: red; padding-bottom:4px; border:none!important;">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" width="16" height="16">
                            <path d="M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z"></path>
                          </svg>
                        </button>
                      </div>

                      <div class="modal-body" style="padding: 20px;">
                        <!-- Error message container -->
                        <div id="errorMessage" class="text-danger mb-3" style="display:none; text-align:center;"></div>

                        <form id="depositForm">
                          <div class="form-group mb-3">
                            <label for="defaultSelect" style="font-weight: bold;">Company Name</label>
                            <select class="form-control" id="defaultSelect" style="height: 40px;">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>

                          <div class="form-row" style="display: flex; gap: 10px;">
                            <div class="form-group col-md-6">
                              <label for="accountnumber" style="font-weight: bold;">Account Number</label>
                              <input type="text" class="form-control" id="accountnumber">
                            </div>

                            <div class="form-group col-md-6" style="text-align: center;">
                              <label for="accountNumber" style="font-weight: bold;">Name of Bank</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">(</span>
                                </div>
                                <input type="text" class="form-control" id="accountNumber" placeholder="ALLBANK" readonly style="text-align: center;">
                                <div class="input-group-append">
                                  <span class="input-group-text">)</span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <hr style="margin: 20px 0;">
                          <h5 style="font-weight: bold; margin-bottom: 15px; color:#495057; text-align:center;">Collection Date</h5>

                          <div class="form-row" style="display: flex; gap: 10px;">
                            <div class="form-group col-md-6">
                              <label for="fromDate" style="font-weight: bold;">From Date</label>
                              <input type="date" class="form-control" id="fromDate">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="toDate" style="font-weight: bold;">To Date</label>
                              <input type="date" class="form-control" id="toDate">
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <label for="totalUndeposited" style="font-weight: bold;">Date of Deposit</label>
                            <input type="date" class="form-control" id="totalUndeposited">
                          </div>

                          <div class="form-row" style="display: flex; gap: 10px;">
                            <div class="form-group col-md-6">
                              <label for="refNumber" style="font-weight: bold;">Reference Number (From Bank)</label>
                              <input type="text" class="form-control" id="refNumber">
                            </div>
                            <div class="form-group col-md-6" style="text-align: center;">
                              <label for="amount" style="font-weight: bold;">Amount</label>
                              <input type="text" class="form-control" id="amount">
                            </div>
                          </div>

                          <div class="form-group mb-4">
                            <label for="depositAmount" style="font-weight: bold;">Less (Adjustments)</label>
                            <input type="number" class="form-control" id="depositAmount" placeholder="Enter amount" min="0" step="0.01">
                          </div>
                        </form>

                        <div style="text-align: right; margin-top: 10px;">
                          <table class="table table-bordered table-hover">
                            <tbody>
                              <tr>
                                <td class="table-light" style="font-weight: bold; width:50%;">Total Collection</td>
                                <td>0.00</td>
                              </tr>
                              <tr>
                                <td class="table-light" style="font-weight: bold; width:50%;">Less (Adjustment)</td>
                                <td>0.00</td>
                              </tr>
                              <tr>
                                <td class="table-light" style="font-weight: bold; width:50%;">Total Deposit</td>
                                <td>0.00</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="modal-footer" style="padding: 15px 20px;">    
                        <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>