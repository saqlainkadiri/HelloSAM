<?php
    include "header.php";
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Take Attendance</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form action="ESP_attendance.php" method="post" class="form-horizontal">
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Department</label>

                                    <div class="col-sm-10"><select class="form-control m-b" name="account">
                                        <option>Computer</option>
                                        <option>Electrical</option>
                                        <option>Mechanical</option>
                                        <option>Electronics</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Subject</label>

                                    <div class="col-sm-10"><select class="form-control m-b" name="subject">
                                        <option value="S001">MCC</option>
                                        <option value="S002">SPCC</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Time From</label>

                                    <div class="col-sm-4"><select class="form-control m-b" name="time_from">
                                        <option value="08:00">08:00</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                    </select>
                                    </div>
                                <label class="col-sm-2 control-label">Time Till</label>

                                    <div class="col-sm-4"><select class="form-control m-b" name="time_to">
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" name="attend" type="submit">Take Attendance</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php
    include "footer.php";
?>