<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>


	<link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/font-icons.css" type="text/css" />

	<!-- Date & Time Picker CSS -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/components/datepicker.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/components/timepicker.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/')?>timepicker/css/components/daterangepicker.css" type="text/css" />

    <script src="<?=base_url('assets/js/custom/highcharts.js?v='.filemtime('./assets/js/custom/highcharts.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/series-label.js?v='.filemtime('./assets/js/custom/series-label.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/exporting.js?v='.filemtime('./assets/js/custom/exporting.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/export-data.js?v='.filemtime('./assets/js/custom/export-data.js'))?>"></script>
    <script src="<?=base_url('assets/js/custom/accessibility.js?v='.filemtime('./assets/js/custom/accessibility.js'))?>"></script>




</head>
<body>

    <div class="main-container">
		<div id="viewfulldata_vue" class="pd-ltr-20">


        <!-- Set Point Zone -->
        <div class="modal fade bs-example-modal-lg" id="setpoint_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveSpoint" autocomplete="off" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="spointTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveSetpoint" name="btn-saveSetpoint" @click="saveSpoint"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger" id="btn-closeSetpoint"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="modal-body">
                        <input hidden type="text" name="mdsp_m_code" id="mdsp_m_code">
                        <!-- <div class="col-lg-12 bottommargin">
                            <label>ภาพก่อนการทำงาน</label><br>
                            <input id="mdsp_f_name" name="mdsp_f_name[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true">
                        </div> -->

                        <div id="show_spointFromTemplate"></div>
                    </div>
                
                </div>
                </form>
            </div>
        </div>
        <!-- Set Point Zone -->


        <!-- runDetail_modal Zone -->
        <div class="modal fade bs-example-modal-lg" id="runDetail_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form @submit.prevent="saveRunDetail" id="frm_saveRunDetail" class="needs-validation" novalidate style="width:100%;" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailTitle"></div>
                        <div>
                            <button type="button" class="close close_runDetail_modal" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveRunDetail" name="btn-saveRunDetail"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger close_runDetail_modal" data-dismiss="modal" id="btn-closeRunDetail"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <span><b>ขั้นตอน : </b><span id="showProcess">รอนำสินค้าใส่ถาด</span></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <input hidden type="text" name="mdrd_m_code" id="mdrd_m_code">
                        <input hidden type="text" name="mdrd_d_code" id="mdrd_d_code">
                        <input hidden type="text" name="mdrd_sd_status" id="mdrd_sd_status">

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for=""><b>กรุณาเลือกเวลาเดินงาน</b></label>

                                <!-- <div class="form-group">
                                    <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker1">
                                        <input type="text" id="mdrd_chooseTime" name="mdrd_chooseTime" class="form-control datetimepicker-input datetimepicker1" data-target=".datetimepicker1" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker1" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div> -->


                                <div class="form-group">
                                    <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker1">
                                        <input type="text" id="mdrd_chooseTime" name="mdrd_chooseTime" class="form-control datetimepicker-input datetimepicker1" data-target=".datetimepicker1" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-append" data-target=".datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 bottommargin-sm">
                                <label for="">กรุณาเลือกวัน</label>
                                <input id="mdrd_chooseDate" name="mdrd_chooseDate" class="form-control date-picker" placeholder="กรุณาเลือกวัน" type="text">
                            </div>
                        </div>

                        <div class="row form-group loadOven" style="display:none;">
                            <!-- <div class="col-md-12">
                                <label for=""><b>โหลดของใส่ถาด</b></label>
                                <div class="form-group">
                                    <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker2">
                                        <input type="text" id="mdrd_loadoven" name="mdrd_loadoven" class="form-control datetimepicker-input datetimepicker2" data-target=".datetimepicker2" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker2" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-lg-12 bottommargin">
                                <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                <input id="mdrd_f_loadoven" name="mdrd_f_loadoven[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*">
                            </div>

                        </div>

                        <div style="margin-bottom:50px;"></div>


                        <div class="row form-group loadOven2" style="display:none;">
                            <div class="col-md-12">
                                <label for=""><b>ปิดตู้เซ็ทอุณหภูมิ</b></label>

                                <!-- <div class="form-group">
                                    <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker3">
                                        <input type="text" id="mdrd_closeoven" name="mdrd_closeoven" class="form-control datetimepicker-input datetimepicker3" data-target=".datetimepicker3" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker3" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker3">
                                        <input type="text" id="mdrd_closeoven" name="mdrd_closeoven" class="form-control datetimepicker-input datetimepicker3" data-target=".datetimepicker3" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-append" data-target=".datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div style="margin-bottom:50px;"></div>

                        <div class="row form-group loadOven3" style="display:none;">
                            <div class="col-md-12">
                                <label for=""><b>เริ่ม อบ ( กดบันทึกเมื่ออุณหภูมิถึงจุดที่กำหนด )</b></label>

                                <!-- <div class="form-group">
                                    <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker4">
                                        <input type="text" id="mdrd_runoven" name="mdrd_runoven" class="form-control datetimepicker-input datetimepicker4" data-target=".datetimepicker4" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker4" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker4">
                                        <input type="text" id="mdrd_runoven" name="mdrd_runoven" class="form-control datetimepicker-input datetimepicker4" data-target=".datetimepicker4" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-append" data-target=".datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div style="margin-bottom:50px;"></div>


                        <div class="row form-group loadOven4" style="display:none;">
                            <div class="col-md-12">
                                <label for=""><b>อบเสร็จ</b></label>

                                <!-- <div class="form-group">
                                    <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker5">
                                        <input type="text" id="mdrd_stopoven" name="mdrd_stopoven" class="form-control datetimepicker-input datetimepicker5" data-target=".datetimepicker5" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker5" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker5">
                                        <input type="text" id="mdrd_stopoven" name="mdrd_stopoven" class="form-control datetimepicker-input datetimepicker5" data-target=".datetimepicker5" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-append" data-target=".datetimepicker5" data-toggle="datetimepicker">
                                            <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 bottommargin-sm">
                                <label for="">กรุณาเลือกวัน</label>
                                <input id="mdrd_stopovenDate" name="mdrd_stopovenDate" class="form-control date-picker" placeholder="กรุณาเลือกวัน" type="text">
                            </div>
                        </div>

                        <div style="margin-bottom:50px;"></div>

                        <div class="row form-group loadOven5" style="display:none;">
                            <div class="col-md-12">
                                <label for=""><b>เทสี</b></label>

                                <!-- <div class="form-group">
                                    <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker6">
                                        <input type="text" id="mdrd_endoven" name="mdrd_endoven" class="form-control datetimepicker-input datetimepicker6" data-target=".datetimepicker6" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker6" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker6">
                                        <input type="text" id="mdrd_endoven" name="mdrd_endoven" class="form-control datetimepicker-input datetimepicker6" data-target=".datetimepicker6" placeholder="กรุณาเลือกเวลา" required/>
                                        <div class="input-group-append" data-target=".datetimepicker6" data-toggle="datetimepicker">
                                            <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 bottommargin-sm form-group">
                                <label for="">กรุณาเลือกวัน</label>
                                <input id="mdrd_endovenDate" name="mdrd_endovenDate" class="form-control date-picker" placeholder="กรุณาเลือกวัน" type="text">
                            </div>

                            <div class="col-lg-12 bottommargin">
                                <label>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</label><br>
                                <input id="mdrd_f_endoven" name="mdrd_f_endoven[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*">
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col-md-12 form-group">
                                <label for="">หมายเหตุ</label>
                                <textarea name="mdrd_d_run_memo" id="mdrd_d_run_memo" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                        </div>


                        <div class="refZone">
                            <div class="dropdown-divider"></div>
                            <h3>Reference</h3>
                            <div class="dropdown-divider"></div>
                            <div id="show_spointFromMain"></div>
                        </div>
                        
                    </div>
                
                </div>
                </form>
                
            </div>
        </div>
        <!-- runDetail_modal Zone -->


        <!-- Image View Modal -->
        <div class="modal fade bs-example-modal-lg" id="runDetailImage_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailImageTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-body">

                        <div id="showImageRunDetail"></div>
                  
                    </div>
                </div>
    
                
            </div>
        </div>
        <!-- Image View Modal -->



        <!-- Run Memo View -->
        <div class="modal fade bs-example-modal-lg" id="runDetailMemo_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailMemoTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div id="showMemoRunDetail"></div>
                    </div>
                </div>
    
            </div>
        </div>
        <!-- Run Memo View -->



        <!-- Stop Memo -->
        <div class="modal fade bs-example-modal-lg" id="mainMemo_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="mainMemoTitle"></div>
                        <div>
                            <button type="button" class="close close_mainMemo_modal" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveMainMemo" name="btn-saveMainMemo" @click="saveMemoStop"><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-danger close_mainMemo_modal" data-dismiss="modal" id="btn-closeMainMemo"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div></div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">หมายเหตุ</label>
                                <textarea name="m_memo_v" id="m_memo_v" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <!-- Stop Memo -->



        <!-- Stop Memo -->
        <div class="modal fade bs-example-modal-lg" id="cancelMemo_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="cancelMemoTitle"></div>
                        <div>
                            <button type="button" class="close close_cancelMemo_modal" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveMainMemo" name="btn-saveMainMemo" @click="saveMemoCancel"><i class="fi-save mr-2"></i>บันทึก</button>
                            <button type="button" class="btn btn-danger close_cancelMemo_modal" data-dismiss="modal" id="btn-closeMainMemo"><i class="fi-x mr-2"></i>ปิด</button>
                        </div>
                        <div></div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">หมายเหตุ</label>
                                <textarea name="m_memo_v2" id="m_memo_v2" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <!-- Stop Memo -->



        <!-- Edit Run Data Modal -->
        <div class="modal fade bs-example-modal-lg" id="editRunDetail_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <form id="frm_saveRunDetailEdit" autocomplete="off" style="width:100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="runDetailEditTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveRunDetail_edit" name="btn-saveRunDetail_edit" @click="saveRunDetailEdit"><i class="fi-save mr-2"></i>บันทึก การแก้ไข</button>
                            <button type="button" class="btn btn-danger" id="btn-deleteRunDetail" @click="deleteRunDetail"><i class="fa fa-trash mr-2" aria-hidden="true"></i>ลบรายการ</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeRunDetail" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <span id="mdEditShowStatus"></span>
                        </div>
                    </div>

                    <div class="modal-body">
                        <input hidden type="text" name="mdrde_m_code" id="mdrde_m_code">

                        <div id="showRunGroupList"></div>
                        <div class="dropdown-divider"></div>


                        <div class="editSpointSection row form-group" style="display:none;">
                            <div class="col-lg-12 form-group">
                                <div id="edit_showSpointImage"></div>
                            </div>

                            <div class="col-lg-12 bottommargin">
                                <label>ภาพก่อนการทำงาน</label><br>
                                <input id="mdrdsp_f_name" name="mdrdsp_f_name[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true">
                            </div>
                        </div>

                        
                        <div class="detailEditSection" style="display:none;">

                            <div class="row form-group loadOven_edit" style="display:none;">

                                <div class="col-md-12">
                                    <label for=""><b>เวลาเดินงาน</b></label>
                                    <div class="form-group">
                                        <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepickerRun">
                                            <input type="text" id="mdrd_chooseTime_edit" name="mdrd_chooseTime_edit" class="form-control datetimepicker-input datetimepickerRun" data-target=".datetimepickerRun" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-append" data-target=".datetimepickerRun" data-toggle="datetimepicker">
                                                <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <label for=""><b>โหลดของใส่ถาด</b></label>

                                    <!-- <div class="form-group">
                                        <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker2">
                                            <input type="text" id="mdrd_loadoven_edit" name="mdrd_loadoven_edit" class="form-control datetimepicker-input datetimepicker2" data-target=".datetimepicker2" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker2" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker2">
                                            <input type="text" id="mdrd_loadoven_edit" name="mdrd_loadoven_edit" class="form-control datetimepicker-input datetimepicker2" data-target=".datetimepicker2" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-append" data-target=".datetimepicker2" data-toggle="datetimepicker">
                                                <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 bottommargin-sm form-group">
                                    <label for=""><b>วันที่โหลดของใส่ถาด</b></label>
                                    <input id="mdrd_loadoven_date_edit" name="mdrd_loadoven_date_edit" class="form-control date-picker" placeholder="กรุณาเลือกวัน" type="text">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <div id="edit_showOven1"></div>
                                </div>
                                <div class="col-lg-12 bottommargin">
                                    <label><b>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</b></label><br>
                                    <input id="mdrd_f_loadoven_edit" name="mdrd_f_loadoven_edit[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*">
                                </div>
                            </div>

                            <div style="margin-bottom:50px;"></div>

                            <div class="row form-group loadOven2_edit" style="display:none;">
                                <div class="col-md-12">
                                    <label for=""><b>ปิดตู้เซ็ทอุณหภูมิ</b></label>

                                    <!-- <div class="form-group">
                                        <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker3">
                                            <input type="text" id="mdrd_closeoven_edit" name="mdrd_closeoven_edit" class="form-control datetimepicker-input datetimepicker3" data-target=".datetimepicker3" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker3" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker3">
                                            <input type="text" id="mdrd_closeoven_edit" name="mdrd_closeoven_edit" class="form-control datetimepicker-input datetimepicker3" data-target=".datetimepicker3" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-append" data-target=".datetimepicker3" data-toggle="datetimepicker">
                                                <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div style="margin-bottom:50px;"></div>

                            <div class="row form-group loadOven3_edit" style="display:none;">
                                <div class="col-md-12">
                                    <label for=""><b>เริ่ม อบ ( กดบันทึกเมื่ออุณหภูมิถึงจุดที่กำหนด )</b></label>

                                    <!-- <div class="form-group">
                                        <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker4">
                                            <input type="text" id="mdrd_runoven_edit" name="mdrd_runoven_edit" class="form-control datetimepicker-input datetimepicker4" data-target=".datetimepicker4" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker4" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker4">
                                            <input type="text" id="mdrd_runoven_edit" name="mdrd_runoven_edit" class="form-control datetimepicker-input datetimepicker4" data-target=".datetimepicker4" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-append" data-target=".datetimepicker4" data-toggle="datetimepicker">
                                                <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div style="margin-bottom:50px;"></div>


                            <div class="row form-group loadOven4_edit" style="display:none;">
                                <div class="col-md-12">
                                    <label for=""><b>อบเสร็จ</b></label>

                                    <!-- <div class="form-group">
                                        <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker5">
                                            <input type="text" id="mdrd_stopoven_edit" name="mdrd_stopoven_edit" class="form-control datetimepicker-input datetimepicker5" data-target=".datetimepicker5" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker5" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker5">
                                            <input type="text" id="mdrd_stopoven_edit" name="mdrd_stopoven_edit" class="form-control datetimepicker-input datetimepicker5" data-target=".datetimepicker5" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-append" data-target=".datetimepicker5" data-toggle="datetimepicker">
                                                <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 bottommargin-sm form-group">
                                    <label for=""><b>วันที่อบเสร็จ</b></label>
                                    <input id="mdrd_stopoven_date_edit" name="mdrd_stopoven_date_edit" class="form-control date-picker" placeholder="กรุณาเลือกวัน" type="text">
                                </div>
                            </div>

                            <div style="margin-bottom:50px;"></div>

                            <div class="row form-group loadOven5_edit" style="display:none;">
                                <div class="col-md-12">
                                    <label for=""><b>เทสี</b></label>

                                    <!-- <div class="form-group">
                                        <div class="input-group text-start inputTime flex-container" data-target-input="nearest" data-target=".datetimepicker6">
                                            <input type="text" id="mdrd_endoven_edit" name="mdrd_endoven_edit" class="form-control datetimepicker-input datetimepicker6" data-target=".datetimepicker6" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-text clockIcondiv" style="align-self: center" data-target=".datetimepicker6" data-toggle="datetimepicker"><i class="fa fa-clock-o"></i></div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="input-group text-left" data-target-input="nearest" data-target=".datetimepicker6">
                                            <input type="text" id="mdrd_endoven_edit" name="mdrd_endoven_edit" class="form-control datetimepicker-input datetimepicker6" data-target=".datetimepicker6" placeholder="กรุณาเลือกเวลา" required/>
                                            <div class="input-group-append" data-target=".datetimepicker6" data-toggle="datetimepicker">
                                                <div class="input-group-text bgClock"><i class="icon-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 bottommargin-sm form-group">
                                    <label for=""><b>วันที่เทสี</b></label>
                                    <input id="mdrd_endoven_date_edit" name="mdrd_endoven_date_edit" class="form-control date-picker" placeholder="กรุณาเลือกวัน" type="text">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <div id="edit_showOven2"></div>
                                </div>

                                <div class="col-lg-12 bottommargin">
                                    <label><b>อัพโหลดรูปภาพ , เอกสารที่เกี่ยวข้อง</b></label><br>
                                    <input id="mdrd_f_endoven_edit" name="mdrd_f_endoven_edit[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-show-preview="true" accept="image/*">
                                </div>
                            </div>

                        </div>
                        <div id="showGroupDetailEdit" class=""></div>
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Edit Run Data Modal -->



        <!-- Edit Head Modal -->
        <div class="modal fade bs-example-modal-lg" id="editHead_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">
                    <div class="modal-header">
                        <div id="">แก้ไขข้อมูลหลัก : <span id="ehTitle"></span></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="button" class="btn btn-success" id="btn-saveHead_edit" name="btn-saveHead_edit" @click="saveEditHead"><i class="fi-save mr-2"></i>บันทึก การแก้ไข</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeHead" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <input hidden type="text" name="ehmd_mcode" id="ehmd_mcode">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for=""><b>Order (kg.)</b></label>
                                <input type="text" name="ehmd_order" id="ehmd_order" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for=""><b>Output (kg./hr)</b></label>
                                <input type="text" name="ehmd_output" id="ehmd_output" class="form-control">
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for=""><b>Machine Name</b></label>
                                <select name="ehmd_m_machine" id="ehmd_m_machine" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                </div>
 
            </div>
        </div>
        <!-- Edit Head Modal -->



        <!-- Machine Check Modal -->
        <div class="modal fade bs-example-modal-lg" id="machineCheck_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frm_saveMachineCheck" autocomplete="off" style="width:100%;" @submit.prevent="saveMachineCheck">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="mcmdTitle"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveMachineCheck" name="btn-saveMachineCheck" @click=""><i class="fi-save mr-2"></i>บันทึก</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeMachineCheck" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <input hidden type="text" name="mcmd_mcode" id="mcmd_mcode">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""><b>Machine Name</b></label>
                                <input type="text" name="mck_machinename" id="mck_machinename" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for=""><b>วันที่</b></label>
                                <input type="text" name="mck_datetime" id="mck_datetime" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""><b>Item Number</b></label>
                                <input type="text" name="mck_itemnumber" id="mck_itemnumber" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""><b>Batch Number</b></label>
                                <input type="text" name="mck_batchnumber" id="mck_batchnumber" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div id="showMachineCheckList_md"></div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Machine Check Modal -->



        <!-- Machine Check Modal -->
        <div class="modal fade bs-example-modal-lg" id="machineCheckEdit_modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">

            <form id="frm_saveMachineCheckEdit" autocomplete="off" style="width:100%;" @submit.prevent="saveEditMachineCheck">
                <div class="modal-content">
                    <div class="modal-header">
                        <div id="mcmdTitleEdit"></div>
                        <div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                    </div>

                    <div class="modal-header">
                        
                        <div>
                            <button type="submit" class="btn btn-success" id="btn-saveMachineCheckEdit" name="btn-saveMachineCheckEdit"><i class="fi-save mr-2"></i>บันทึกการแก้ไข</button>
                            <button type="button" class="btn btn-danger" id="btn-delMachineCheckEdit" @click="deleteMachineCheck"><i aria-hidden="true" class="fa fa-trash mr-2"></i>ลบ</button>
                            <!-- <button type="button" class="btn btn-warning" id="btn-closeMachineCheckEdit" data-dismiss="modal"><i class="fi-x mr-2"></i>ปิด</button> -->
                        </div>
                        <div>
                            <input hidden type="text" name="mcmd_mcodeEdit" id="mcmd_mcodeEdit">
                        </div>
                    </div>

                    <div class="modal-body">

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">เลือกข้อมูลที่ต้องการแก้ไข</label>
                                <div id="showCheckListGroupEdit"></div>
                            </div> 
                        </div>
                        <hr>


                        <div id="sectionEditData" style="display:none;">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for=""><b>Machine Name</b></label>
                                    <input type="text" name="mck_machinenameEdit" id="mck_machinenameEdit" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><b>วันที่</b></label>
                                    <input type="text" name="mck_datetimeEdit" id="mck_datetimeEdit" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for=""><b>Item Number</b></label>
                                    <input type="text" name="mck_itemnumberEdit" id="mck_itemnumberEdit" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><b>Batch Number</b></label>
                                    <input type="text" name="mck_batchnumberEdit" id="mck_batchnumberEdit" class="form-control" readonly>
                                </div>
                            </div>
                            <hr>
                            <div id="showMachineCheckListEdit_md"></div>
                        </div>


                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Machine Check Modal -->

		
			<div class="row">
				<div class="col-xl-12 mb-30">
					<div class="card-box height-100-p pd-20">
						<h3 style="text-align:center;">หน้าแสดงรายละเอียด</h3>

                        <h5 style="text-align:center;margin-top:10px;">เอกสารเลขที่ : <?=$mainformno?></h5>

                        <input hidden type="text" name="getMaincode" id="getMaincode" value="<?=getMaincode($mainformno)?>">
                        <input hidden type="text" name="getFormStatus" id="getFormStatus" value="<?=getviewfulldata(getMaincode($mainformno))->m_status?>">
                        <input hidden type="text" name="getCheckMachine" id="getCheckMachine" value="<?=getCheckMachine(getMaincode($mainformno));?>">

                        <!-- Head zone -->
						<div class="row headzone mt-3">

                        <!-- Edit Button -->
                        <a href="javascript:void(0)" class="editHeadDataA"
                            data_m_code="<?=getMaincode($mainformno)?>"
                            data_m_formno="<?=$mainformno?>"
                            data_m_order="<?=getviewfulldata(getMaincode($mainformno))->m_order?>"
                            data_m_output="<?=getviewfulldata(getMaincode($mainformno))->m_std_output?>"
                            data_m_machine="<?=getviewfulldata(getMaincode($mainformno))->m_machine?>"
                        >
                            <i class="fa fa-edit mr-2 editHeadData" aria-hidden="true"></i>
                        </a>
                        <!-- Edit Button -->
                            <div class="col-md-4 form-group">
                                <label for=""><b>Company</b></label>
                                <input type="text" name="m_company_v" id="m_company_v" class="form-control" readonly value="<?=conCompany(getviewfulldata(getMaincode($mainformno))->m_areaid)?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>STD. Name</b></label>
                                <input type="text" name="m_template_name_v" id="m_template_name_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_template_name?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Machine Name</b></label>
                                <input type="text" name="m_machine_v" id="m_machine_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_machine?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Product Number</b></label>
                                <input type="text" name="m_product_number_v" id="m_product_number_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_product_number?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Item Number</b></label>
                                <input type="text" name="m_item_number_v" id="m_item_number_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_item_number?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Batch Number</b></label>
                                <input type="text" name="m_batch_number_v" id="m_batch_number_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_batch_number?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Order (kg.)</b></label>
                                <input type="text" name="m_order_v" id="m_order_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_order?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Output (kg./hr)</b></label>
                                <input type="text" name="m_std_output_v" id="m_std_output_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_std_output?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Max. Temperature (°C)</b></label>
                                <input type="text" name="m_max_temperature_v" id="m_max_temperature_v" class="form-control" readonly value="<?=getviewfulldata(getMaincode($mainformno))->m_max_temperature?>">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for=""><b>Date</b></label>
                                <input type="text" name="m_datetime_v" id="m_datetime_v" class="form-control" readonly value="<?=conDateFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime)?>">
                            </div>

                            
                        </div>
                        <input hidden type="text" name="m_dataareaid_v" id="m_dataareaid_v" value="<?=getviewfulldata(getMaincode($mainformno))->m_dataareaid?>">
                        <input hidden type="text" name="sd_lastStatusCheck" id="sd_lastStatusCheck">
                        <!-- Head zone -->

                        

							
							<div class="tab mt-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a id="tabpage1" class="nav-link text-gray" data-toggle="tab" href="#page1" role="tab" aria-selected="true"><b>รายละเอียดเครื่องจักร</b></a>
									</li>
                                    <li class="nav-item">
										<a id="tabpage2" class="nav-link text-gray" data-toggle="tab" href="#page2" role="tab" aria-selected="true"><b>ตรวจสอบเครื่องจักร</b></a>
									</li>
									<li class="nav-item">
										<a id="tabpage3" class="nav-link text-gray" data-toggle="tab" href="#page3" role="tab" aria-selected="false"><b>Qc Sampling</b></a>
									</li>
                                    <li class="nav-item">
										<a id="tabpage4" class="nav-link text-gray" data-toggle="tab" href="#page4" role="tab" aria-selected="false"><b>Job Card</b></a>
									</li>
                                    <li class="nav-item">
										<a id="tabpage5" class="nav-link text-gray" data-toggle="tab" href="#page5" role="tab" aria-selected="false"><b>Packing List</b></a>
									</li>
								</ul>
								<div class="tab-content">

									<div class="tab-pane fade" id="page1" role="tabpanel">
										<div class="pd-20">

                                            <div id="forPd_v">
                                                <!-- start button zone -->
                                                <div class="row startButtonZone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button @click="saveStart" type="button" id="btn-start" class="btn btn-primary btn-start"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                        ><i class="fa fa-play mr-2" aria-hidden="true"></i>Start</button>
                                                    </div>
                                                </div>
                                                <!-- start button zone -->

                                                <!-- stop button zone -->
                                                <div class="row stopButtonZone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button @click="saveStop" type="button" id="btn-stop" class="btn btn-danger btn-stop"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                        ><i class="fa fa-stop mr-2" aria-hidden="true"></i>Stop</button>
                                                    </div>
                                                </div>
                                                <!-- stop button zone -->

                                                <!-- Spoint Zone -->
                                                <div class="row spointzone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button type="button" class="btn btn-primary" id="btn-openSetPoint"
                                                            data_m_product_number="<?=getviewfulldata(getMaincode($mainformno))->m_product_number?>"
                                                            data_m_batch_number="<?=getviewfulldata(getMaincode($mainformno))->m_batch_number?>"
                                                            data_m_template_name="<?=getviewfulldata(getMaincode($mainformno))->m_template_name?>"
                                                            data_m_template_code="<?=getviewfulldata(getMaincode($mainformno))->m_template_code?>"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                            data_m_item_number="<?=getviewfulldata(getMaincode($mainformno))->m_item_number?>"
                                                        ><i class="fi-save mr-2"></i>บันทึก S/POINT</button>
                                                    </div>
                                                </div>
                                                <!-- Spoint Zone -->

                                                <!-- cancel button zone -->
                                                <div class="row cancelButtonZone mt-3 text-center" style="display:none;">
                                                    <div class="col-md-12 form-group">
                                                        <button @click="saveCancel" type="button" id="btn-cancel" class="btn btn-danger btn-cancel"
                                                            data_m_code="<?=getMaincode($mainformno)?>"
                                                        >Cancel</button>
                                                    </div>
                                                </div>
                                                <!-- cancel button zone -->
                                            </div>

                                            <div id="line_forPd_v" class="dropdown-divider"></div>


                                            <div id="speacial_section" class="row align-items-center mt-3" style="display:none;">
                                                <div class="col-md-12 text-center">
                                                    <h4>ข้อแนะนำพิเศษ</h4>
                                                </div>
                                            </div>

                                            <div id="otherImage_view_section" class="row form-group" style="display:none;">
                                                <div class="col-md-12">
                                                    <label for=""><b>รูปภาพอื่นๆ</b></label>
                                                    <div id="show_otherImage_viewpage"></div>
                                                </div>
                                            </div>

                                            <div id="templateRemark_view_section" class="row form-group" style="display:none;">
                                                <div class="col-md-12">
                                                    <label for=""><b>หมายเหตุ</b></label>
                                                    <textarea name="show_templateRemark" id="show_templateRemark" cols="30" rows="10" class="form-control" style="height:100px;" readonly></textarea>
                                                </div>
                                            </div>


                                            <!-- Show Detail Zone -->
                                            <div id="show_detail"></div>
										</div>
									</div>

									<div class="tab-pane fade" id="page2" role="tabpanel">
										<div class="pd-20">
                                            <div id="showMachineCheck"></div>
										</div>
									</div>

                                    <div class="tab-pane fade" id="page3" role="tabpanel">
										<div class="pd-20">
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div id="showQcSampling" class="col-lg-10" style="width:100%"></div>
                                                <div class="col-lg-1"></div>
                                            </div>

                                            <div id="qcsticker" class="row mt-5"></div>
                                            <div id="showCheckGraph" class="row mt-5"></div>

                                        <!-- <div class="row mt-4">
                                            <div class="col-lg-12">
                                                <div id="showGraph"></div>
                                            </div>
                                        </div> -->

                                            <div class="row mt-4">
                                                <div class="col-lg-12">
                                                    <div id="showGraphMain"></div>
                                                </div>
                                            </div>
										</div>
									</div>

                                    <div class="tab-pane fade" id="page4" role="tabpanel">
										<div class="pd-20">
                                            <div id="showJobcard" class="row"></div>
                                        </div>
									</div>

                                    <div class="tab-pane fade" id="page5" role="tabpanel">
										<div class="pd-20">
                                            <div id="showPackingList" class="row"></div>
                                        </div>
									</div>

								</div>
							</div>

                        <div class="row form-group text-center">
                            <div class="col-md-4">
                                <span><b>Start By : </b><?=getviewfulldata(getMaincode($mainformno))->m_user_start?></span><br>
                                <span><b>Start Date : </b><?=conDateTimeFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime_start)?></span>
                            </div>
                            <div class="col-md-4">
                                <span><b>Modify By : </b><?=getviewfulldata(getMaincode($mainformno))->m_user_modify?></span><br>
                                <span><b>Modify Date : </b><?=conDateTimeFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime_modify)?></span>
                            </div>
                            <div class="col-md-4">
                                <span><b>Stop By : </b><?=getviewfulldata(getMaincode($mainformno))->m_user_stop?></span><br>
                                <span><b>End Date : </b><?=conDateTimeFromDb(getviewfulldata(getMaincode($mainformno))->m_datetime_stop)?></span>
                            </div>
                        </div>

					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>



<script>

$(document).ready(function(){
    clearLocalstorage();
    // checkFormStatus();

    // $(document).on('click' , '#btn-saveSetpoint' , function (){
    //     saveSpoint();
    // });
    loadTabSelect();


    let spointData = [];
    let runData = [];
    let beforeStartImage = "";

    checkFormStatus();
    loadDetailData();
    loadRunDetailData();
    
    let get_templatecode = "<?php echo getviewfulldata(getMaincode($mainformno))->m_template_code ?>";

    let viewfulldata_vue = new Vue({
        el:"#viewfulldata_vue",
        data:{
            title:"test",
        },
        methods: {
            saveSpoint()
            {
                $('#setpoint_modal').modal('hide');
                $('.loader').fadeIn(800);
                const form = $('#frm_saveSpoint')[0]
                const data = new FormData(form);

                axios.post(url+'main/saveSpoint' , data ,{
                    header:{
                        'Content-Type' : 'multipart/form-data'
                    },
                }).then(res => {
                    console.log(res);
                    // location.reload();
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                        // $('.loader').fadeOut(800);
                        // viewfulldata_vue.checkFormStatus();
                        location.reload();
                    });
                }).catch(err => {
                    console.error('Err' , err);
                });
            },

            saveStart()
            {
                $('.loader').fadeIn(400);
                const data_m_code = $('.btn-start').attr("data_m_code");
                axios.post(url+'main/saveStart',{
                    action:"saveStart",
                    m_code:data_m_code
                }).then(res=>{
                    console.log(res);
                    if(res.data.status == "Update Data Success"){
                        swal({
                            title: 'บันทึกข้อมูลสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });

                    }else{
                        swal({
                            title: 'บันทึกข้อมูลไม่สำเร็จ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });
                    }
                })
            },

            saveCancel()
            {
                swal({
                    title: 'ต้องการยกเลิกเอกสารใบนี้ ใช่หรือไม่',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText:'ยกเลิก'
                }).then((result)=> {
                    if(result.value == true){
                        $('#cancelMemo_modal').modal('show');

                        const machineName = $('#m_template_name_v').val();
                        const batchNumber = $('#m_batch_number_v').val();
                        const productNumber = $('#m_product_number_v').val();
                        const itemNumber = $('#m_item_number_v').val();

                        let title = '';
                        title +=`
                        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
                        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
                        `;

                        $('#cancelMemoTitle').html(title);
                    }
                });
            },


            saveMemoCancel()
            {
                $('.loader').fadeIn(400);
                const data_m_code = $('.btn-cancel').attr("data_m_code");
                const m_memo_v2 = $('#m_memo_v2').val();
                axios.post(url+'main/saveCancel',{
                    action:"saveCancel",
                    m_code:data_m_code,
                    m_memo:m_memo_v2
                }).then(res=>{
                    console.log(res);
                    if(res.data.status == "Update Data Success"){
                        swal({
                            title: 'บันทึกข้อมูลสำเร็จ',
                            type: 'success',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });

                    }else{
                        swal({
                            title: 'บันทึกข้อมูลไม่สำเร็จ',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        }).then(function(){
                            // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                            // $('.loader').fadeOut(800);
                            // viewfulldata_vue.checkFormStatus();
                            location.reload();
                        });
                    }
                });
            },

            saveStop()
            {
                swal({
                    title: 'ต้องการ Stop เอกสารนี้ ใช่หรือไม่',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText:'ยกเลิก'
                }).then((result)=> {

                    if(result.value == true){
                        $('#mainMemo_modal').modal('show');

                        const machineName = $('#m_template_name_v').val();
                        const batchNumber = $('#m_batch_number_v').val();
                        const productNumber = $('#m_product_number_v').val();
                        const itemNumber = $('#m_item_number_v').val();

                        let title = '';
                        title +=`
                        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
                        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
                        `;

                        $('#mainMemoTitle').html(title);
                    }

                });

            },

            saveMemoStop()
            {
                const getMaincode = $('#getMaincode').val();
                const m_memo_v = $('#m_memo_v').val();

                axios.post(url+'main/saveMemoStop' , {
                    action:"saveMemoStop",
                    maincode:getMaincode,
                    mainmemo:m_memo_v
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        axios.post(url+'main/saveStop',{
                            action:"saveStop",
                            m_code:getMaincode
                        }).then(res=>{
                            console.log(res);
                            if(res.data.status == "Update Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });

                            }else{
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            },


            saveRunDetail()
            {
                // Check Data Request
                $('#btn-saveRunDetail').prop('disabled' , true);
                let sd_status = $('#mdrd_sd_status').val();

                // Check ว่าเป็นการบันทึกแบบไหน
                if(sd_status == "โหลดของใส่ถาดเสร็จแล้ว รอปิดตู้"){

                    if($('#mdrd_closeoven').val() != ""){

                        const form = $('#frm_saveRunDetail')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/saveOven2' ,data, {
                        }).then(res=>{
                            console.log(res.data);
                            if(res.data.status == "Update Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                });
                            }
                        });
                    }else{
                        swal({
                            title: 'กรุณาระบุเวลา ปิดตู้',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }

                }else if(sd_status == "ปิดตู้ตั้งอุณหภูมิแล้วรอ เริ่มอบ"){

                    if($('#mdrd_runoven').val() != ""){

                        const form = $('#frm_saveRunDetail')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/saveOven3' ,data, {
                        }).then(res=>{
                            console.log(res.data);
                            if(res.data.status == "Update Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                });
                            }
                        });
                    }else{
                        swal({
                            title: 'กรุณาระบุเวลา ปิดตู้',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }

                }else if(sd_status == "เริ่มอบแล้ว"){

                    if($('#mdrd_stopoven').val() != "" && $('#mdrd_stopovenDate').val() != ""){

                        const form = $('#frm_saveRunDetail')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/saveOven4' ,data, {
                        }).then(res=>{
                            console.log(res.data);
                            if(res.data.status == "Update Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                });
                            }
                        });
                    }else if($('#mdrd_stopoven').val() == ""){
                        swal({
                            title: 'กรุณาระบุเวลา ปิดตู้',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }else if($('#mdrd_stopovenDate').val() == ""){
                        swal({
                            title: 'กรุณาระบุวัน ปิดตู้',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }

                }else if(sd_status == "อบเสร็จแล้วรอเทสี"){

                    if($('#mdrd_endoven').val() != "" && $('#mdrd_endovenDate').val() != ""){

                        const form = $('#frm_saveRunDetail')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/saveOven5' ,data, {
                        }).then(res=>{
                            console.log(res.data);
                            if(res.data.status == "Update Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                });
                            }
                        });
                    }else if($('#mdrd_endoven').val() == ""){
                        swal({
                            title: 'กรุณาระบุเวลา ปิดตู้',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }else if($('#mdrd_endovenDate').val() == ""){
                        swal({
                            title: 'กรุณาระบุวัน ปิดตู้',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }

                }else if(sd_status == ""){
                    if($('#mdrd_chooseTime').val() != "" && $('#mdrd_chooseDate').val() != "")
                    {
                        const form = $('#frm_saveRunDetail')[0];
                        const data = new FormData(form);

                        axios.post(url+'main/saveRunDetail' , data , {
                            header:{
                                'Content-Type' : 'multipart/form-data'
                            },
                        }).then(res => {
                            console.log(res.data);
                            if(res.data.status == "Insert Data Success"){
                                swal({
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    type: 'success',
                                    showConfirmButton: false,
                                    timer:800
                                }).then(function(){
                                    // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                    // $('.loader').fadeOut(800);
                                    // viewfulldata_vue.checkFormStatus();
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                                    type: 'error',
                                    showConfirmButton: false,
                                    timer:800
                                })
                                $('#btn-saveRunDetail').prop('disabled' , false);
                            }
                        });
                    }else if($('#mdrd_chooseTime').val() == ""){
                        swal({
                            title: 'กรุณาเลือกเวลาเดินงาน',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        })
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }else if($('#mdrd_chooseDate').val() == ""){
                        swal({
                            title: 'กรุณาเลือกวันเดินงาน',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        })
                        $('#btn-saveRunDetail').prop('disabled' , false);
                    }
                }

                

            },

            saveRunDetailEdit()
            {
                if($('#listOfRunGroup').val() != ""){
                    $('#btn-saveRunDetail_edit').prop('disabled' , true);
                    const form = $('#frm_saveRunDetailEdit')[0];
                    const data = new FormData(form);

                    axios.post(url+'main/saveRunDetailEdit' , data , {
                        header:{
                            'Content-Type' : 'multipart/form-data'
                        },
                    }).then(res => {
                        console.log(res.data);
                        if(res.data.status == "Update Data Success"){
                            swal({
                                title: 'แก้ไขข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                location.reload();
                            });
                            
                        }else{
                            $('#btn-saveRunDetail_edit').prop('disabled' , false);
                            swal({
                                title: 'บันทึกข้อมูลไม่สำเร็จกรุณาลองใหม่',
                                type: 'error',
                                showConfirmButton: false,
                                timer:800
                            })
                        }
                    })
                }else{
                    swal({
                        title: 'กรุณาเลือกช่วงเวลาที่ต้องการแก้ไข',
                        type: 'warning',
                        showConfirmButton: false,
                        timer:800
                    });
                }
            },


            deleteRunDetail()
            {
                if($('#listOfRunGroup').val() != ""){

                    if($('#listOfRunGroup').val() == "Spoint"){
                        swal({
                            title: 'รายการ S/POINT ไม่สามารถลบได้',
                            type: 'error',
                            showConfirmButton: false,
                            timer:800
                        });
                    }else{
                        swal({
                            title: 'ต้องการลบรายการนี้ ใช่หรือไม่',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText:'ยกเลิก'
                        }).then((result)=> {
                            if(result.value == true){
                                const form = $('#frm_saveRunDetailEdit')[0];
                                const data = new FormData(form);

                                axios.post(url+'main/deleteRunDetail' , data , {
                                    header:{
                                        'Content-Type' : 'multipart/form-data'
                                    },
                                }).then(res => {
                                    console.log(res.data);
                                    if(res.data.status == "Delete Data Success"){
                                        swal({
                                            title: 'ลบข้อมูลสำเร็จ',
                                            type: 'success',
                                            showConfirmButton: false,
                                            timer:800
                                        }).then(function(){
                                            location.reload();
                                        });
                                    }
                                });
                            }
                        });
                    }

                    
                }else{
                    swal({
                        title: 'กรุณาเลือกรายการที่ต้องการลบ',
                        type: 'warning',
                        showConfirmButton: false,
                        timer:800
                    });
                }

                console.log($('#listOfRunGroup').val());
            },

            saveEditHead()
            {
                axios.post(url+'main/saveEditHead' ,{
                    action:"saveEditHead",
                    m_order:$('#ehmd_order').val(),
                    m_code:$('#ehmd_mcode').val(),
                    m_output:$('#ehmd_output').val(),
                    m_machine:$('#ehmd_m_machine').val()
                }).then(res=>{
                    console.log(res.data);
                    if(res.data.status == "Update Data Success"){
                        swal({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                // location.href = url+'viewfulldata.html/'+res.data.templateformno;
                                // $('.loader').fadeOut(800);
                                // viewfulldata_vue.checkFormStatus();
                                location.reload();
                            });
                    }
                });
            },

            saveMachineCheck()
            {
                if($('#mcmd_mcode').val() != ""){
                    const form = $('#frm_saveMachineCheck')[0];
                    const data = new FormData(form);
                    axios.post(url+'main/saveMachineCheck' , data , {

                    }).then(res=>{
                        console.log(res.data);
                        if(res.data.status == "Insert Data Success"){
                            swal({
                                title: 'บันทึกข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                location.reload();
                            });
                        }else if(res.data.status == "Insert Data Not Success Found Duplicate Data"){
                            swal({
                                title: 'บันทึกข้อมูลไม่สำเร็จ พบข้อมูลซ้ำในระบบ',
                                type: 'error',
                                showConfirmButton: false,
                                timer:1000
                            });
                        }
                    });
                }
            },

            saveEditMachineCheck()
            {
                if($('#lineGroupForEdit').val() != ""){
                    const form = $('#frm_saveMachineCheckEdit')[0];
                    const data = new FormData(form);

                    axios.post(url+'main/saveEditMachineCheck' , data , {

                    }).then(res => {
                        console.log(res.data);
                        if(res.data.status == "Update Data Success"){
                            swal({
                                title: 'อัพเดตข้อมูลสำเร็จ',
                                type: 'success',
                                showConfirmButton: false,
                                timer:800
                            }).then(function(){
                                location.reload();
                            });
                        }
                    });
                }else{
                    $('#lineGroupForEdit').addClass('inputNull');
                }
            },

            deleteMachineCheck()
            {
                swal({
                title: 'ต้องการลบรายการนี้ ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
                }).then((result)=>{
                    if(result.value == true){
                        let lineGroupForEdit = $('.lineGroupForEdit').val();
                        let m_code = $('#mcmd_mcodeEdit').val();

                        if(lineGroupForEdit != "" && m_code != ""){
                            axios.post(url+'main/deleteMachineCheck' , {
                                action:"deleteMachineCheck",
                                m_code:m_code,
                                linenum_group:lineGroupForEdit
                            }).then(res=>{
                                console.log(res.data);
                                if(res.data.status == "Delete Data Success"){
                                    swal({
                                        title: 'ลบข้อมูลสำเร็จ',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer:800
                                    }).then(function(){
                                        location.reload();
                                    });
                                }
                            });
                        }
                    }
                });
            },



        },
        created() {
            // this.checkFormStatus();
            // this.loadDetailData();
            // this.loadRunDetailData();
            console.log('create');
        },
        mounted() {
            console.log('mounted');
        },
    });

    loadQcSampling();

    $('#btn-openSetPoint').click(function(){
        const data_m_product_number = $(this).attr("data_m_product_number");
        const data_m_batch_number = $(this).attr("data_m_batch_number");
        const data_m_template_name = $(this).attr("data_m_template_name");
        const data_m_template_code = $(this).attr("data_m_template_code");
        const data_m_code = $(this).attr("data_m_code");
        const data_m_item_number = $(this).attr("data_m_item_number");

        $('#setpoint_modal').modal('show');

        let spointTextTitle = `
            <span><b>Machine Name : </b>`+data_m_template_name+`</span>&nbsp;&nbsp;
            <span><b>Batch Number : </b>`+data_m_batch_number+`</span><br>
            <span><b>Product Number : </b>`+data_m_product_number+`</span>&nbsp;&nbsp;
            <span><b>Item Number : </b>`+data_m_item_number+`</span>
        `;
        $('#spointTitle').html(spointTextTitle);
        $('#mdsp_m_code').val(data_m_code);
        loadSpoint(data_m_template_code);
    });

    $(document).on('click' , '.add-detail' , function(){
        let resultMachineCheck = $('#getCheckMachine').val();

        if(resultMachineCheck == 1){
            const data_m_code = $(this).attr('data_m_code');
            $('#runDetail_modal').modal('show');
            $('.loadOven').css('display' , '');
            $('#mdrd_m_code').val(data_m_code);
            loadSpointInMainData(data_m_code);

            const machineName = $('#m_template_name_v').val();
            const batchNumber = $('#m_batch_number_v').val();
            const productNumber = $('#m_product_number_v').val();
            const itemNumber = $('#m_item_number_v').val();

            let title = '';
            title +=`
            <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
            <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
            `;

            $('#runDetailTitle').html(title);
        }else{
            swal({
                title: 'กรุณาตรวจสอบเครื่องจักรให้เรียบร้อยก่อน',
                type: 'warning',
                showConfirmButton: false,
                timer:2000
            });
        }


    });

    $(document).on('click' , '.runImageI' , function(){
        let title = '';
        const data_maincode = $(this).attr("data_maincode");
        const data_detailcode = $(this).attr("data_detailcode");

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        title +=`
        <span><b>รูปภาพ</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        loadImageRunDetailForShow(data_maincode , data_detailcode);
    });

    $(document).on('click','.beforeImageI',function(){
        let title = '';
        const data_maincode = $(this).attr("data_maincode");
        const data_detailcode = $(this).attr("data_detailcode");

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        title +=`
        <span><b>รูปภาพก่อนเดินเครื่อง</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        loadImageBeforeStart(data_maincode,data_detailcode);
    });

    $(document).on('click' , '.runMemo' , function(){
        let title = '';
        const data_maincode = $(this).attr("data_maincode");
        const data_detailcode = $(this).attr("data_detailcode");
        const data_memo = $(this).attr("data_memo");

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        title +=`
        <span><b>หมายเหตุ</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailMemoTitle').html(title);

        $('#runDetailMemo_modal').modal('show');
        let memoText = `
        <textarea id="" name="" cols="10" rows="10" class="form-control" readonly>`+data_memo+`</textarea>
        `;
        $('#showMemoRunDetail').html(memoText);
    });


    $(document).on('click','.edit-detail',function(){
        const m_code = $('#getMaincode').val();
        $('#mdrde_m_code').val(m_code);
        $('#editRunDetail_modal').modal('show');
        loadRunGroupList(m_code);
        $('.detailEditSection').css('display' , 'none');
        $('.editSpointSection').css('display' , 'none');
        $('#showGroupDetailEdit').html('');

        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        let title = '';
        title +=`
        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
        `;

        $('#runDetailEditTitle').html(title);
    });


    $(document).on('change' ,'.selectDetailEdit' , function(){
        const d_code = $(this).val();
        const m_code = $('#getMaincode').val();

        if($(this).val() == "Spoint")
        {
            loadSpointForEdit(m_code);
            $('.editSpointSection').css('display' , '');
            $('.detailEditSection').css('display' , 'none');
        }else{
            loadDataForEdit(m_code , d_code);
            $('.detailEditSection').css('display' , '');
            $('.editSpointSection').css('display' , 'none');
        }
        
    });


    $(document).on('click' , '.imageDelEdit' , function(){
        const data_m_code = $(this).attr("data_m_code");
        const data_d_code = $(this).attr("data_d_code");
        const data_f_name = $(this).attr("data_f_name");
        const data_f_path = $(this).attr("data_f_path");
        const data_f_autoid = $(this).attr("data_f_autoid");

            swal({
                title: 'ต้องการลบรูปนี้ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
                }).then((result)=>{
                    if(result.value == true){
                        deleteFileEdit(data_m_code , data_d_code , data_f_name , data_f_path , data_f_autoid);
                    }
                });
    });


    $(document).on('click' , '.imageDelSpointEdit' , function(){
        const data_m_code = $(this).attr("data_m_code");
        const data_f_name = $(this).attr("data_f_name");
        const data_f_path = $(this).attr("data_f_path");
        const data_f_autoid = $(this).attr("data_f_autoid");

            swal({
                title: 'ต้องการลบรูปนี้ใช่หรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText:'ยกเลิก'
                }).then((result)=>{
                    if(result.value == true){
                        deleteFileSpointEdit(data_m_code , data_f_name , data_f_path , data_f_autoid);
                    }
                });
    });


    $(document).on('click' , '.close_runDetail_modal' , function(){
        $('#frm_saveRunDetail input').val('');
        $('.fileinput-remove').trigger('click');
    });


    $(document).on('click' , '.areaD' , function(){
        $('.arrowArea').css('display' , '');
        const data_linenum_group = $(this).attr("data_linenum_group");
        dataGroupSelected(data_linenum_group);
    });


    $(document).on('click' , '.runDownArrow_detail' , function(){
        const initialIndex = parseInt($(this).attr('data_indexofarray'));
        const finalIndex = initialIndex+1 ;
        const data_linenum_group = $(this).attr('data_linenum_group');

        // console.log(data_linenum_group);

        runData = moveElement(runData,initialIndex,finalIndex);
        checkFormStatus();
        dataGroupSelected(data_linenum_group);
        // document.getElementById("selectTime_"+data_linenum_group).scrollIntoView();
        console.log(runData);

        for(let i = 0; i < runData.length; i ++){
            axios.post(url+'main/updateLinenumGroup',{
                action:"updateLinenumGroup",
                detailcode:runData[i].detailcode,
                d_linenum_group:i+1
            }).then(res=>{
                console.log(res.data);
            });
        }
    });



    $(document).on('click' , '.runUpArrow_detail' , function(){
        const initialIndex = $(this).attr('data_indexofarray');
        const finalIndex = initialIndex-1 ;
        const data_linenum_group = $(this).attr('data_linenum_group');

        console.log(data_linenum_group);

        runData = moveElement(runData,initialIndex,finalIndex);
        checkFormStatus();
        // $('#selectTime_'+data_linenum_group).prop('checked' , true);
        dataGroupSelected(data_linenum_group);
        // document.getElementById("selectTime_"+data_linenum_group).scrollIntoView();
        for(let i = 0; i < runData.length; i ++){
            axios.post(url+'main/updateLinenumGroup',{
                action:"updateLinenumGroup",
                detailcode:runData[i].detailcode,
                d_linenum_group:i+1
            }).then(res=>{
                console.log(res.data);
            });
        }
    });


    $('#tabpage1').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_oven' , 'tabpage1');
    });
    $('#tabpage2').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_oven' , 'tabpage2');
      loadCheckMachinePage();
    });
    $('#tabpage3').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_oven' , 'tabpage3');

        let prodid = $('#m_product_number_v').val();
        let dataareaid = $('#m_dataareaid_v').val();
        let status = $('#getFormStatus').val();
        let batchnumber = $('#m_batch_number_v').val();
        let formno = "<?php echo $mainformno; ?>";
        loaddataSticker(formno , prodid , batchnumber , dataareaid , status);

    });
    $('#tabpage4').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_oven' , 'tabpage4');
        let prodid = $('#m_product_number_v').val();
        let dataareaid = $('#m_dataareaid_v').val();
        let status = $('#getFormStatus').val();
        let formno = "<?php echo $mainformno; ?>";
      loaddatajobcard(prodid , dataareaid , status , formno);
    });
    $('#tabpage5').click(function(){
    //   const id = $(this).attr("href").substr(1);
    //   window.location.hash = id;
      localStorage.setItem('tab_oven' , 'tabpage5');
        let prodid = $('#m_product_number_v').val();
        let dataareaid = $('#m_dataareaid_v').val();
        loaddatapackinglist(prodid , dataareaid);
    });


    $(document).on('click' , '.qclink' , function(){
        const data_qcSampleId = $(this).attr("data_qcSampleId");
        const data_qcSampleNum = $(this).attr("data_qcSampleNum");
        const data_areaId = $(this).attr("data_areaId");
        loadQcsamplingByLinenum(data_qcSampleId, data_qcSampleNum, data_areaId);

        $('#titleQcnumber').html(data_qcSampleNum);
        $('#qcsampling_modal').modal('show');

    });
    

    $(document).on('click','.testid_check',function(){
        const data_testid = $(this).attr("data_testid");
        const data_maincode = $(this).attr("data_maincode");
        // console.log(data_testid);
        // console.log(testIDShowArray.length);

        if($(this).prop('checked') == true){
            // console.log("Not check");
            testIDShowArray.push(data_testid);
            updateTestIDUse(testIDShowArray,data_maincode);
        }else{
            // console.log("check");
            testIDShowArray = arrayRemove(testIDShowArray , data_testid);
            updateTestIDUse(testIDShowArray,data_maincode);
        }
    });


    $(document).on('click' , '.editHeadDataA' , function(){
        const data_m_code = $(this).attr("data_m_code");
        const data_m_formno = $(this).attr("data_m_formno");
        const data_m_order = $(this).attr("data_m_order");
        const data_m_output = $(this).attr("data_m_output");
        const data_m_typeofbag = $(this).attr("data_m_typeofbag");
        const data_m_typeofbagtxt = $(this).attr("data_m_typeofbagtxt");
        const data_m_machine = $(this).attr("data_m_machine");

        getMachine_edit(data_m_machine);

        $('#editHead_modal').modal('show');
        $('#ehmd_mcode').val(data_m_code);
        $('#ehTitle').html(data_m_formno);
        $('#ehmd_order').val(data_m_order);
        $('#ehmd_output').val(data_m_output);
        $('#ehmd_typeofbag').val(data_m_typeofbag);
        $('#ehmd_typeofbagtxt').val(data_m_typeofbagtxt);
    });

    function getMachine_edit(data_m_machine)
    {
        axios.post(url+'main/getMachine' , {
            action:"getMachine"
        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let machinelist = res.data.result;

                let html = `
                    <option value="">กรุณาเลือกเครื่องจักร</option>
                `;
                for(let i = 0; i < machinelist.length; i++){
                    html += `
                        <option value="`+machinelist[i].mach_name+`">`+machinelist[i].mach_name+`</option>
                    `;
                }

                $('#ehmd_m_machine').html(html);
                $('#ehmd_m_machine option[value="'+data_m_machine+'"]').prop("selected" , true);
            }
        });
    }

    $(document).on('keyup' , '.ehmd_typeofbag' , function(){
        if($(this).val() != ""){
            //Query
            eh_searchBag($(this).val());
        }else{
            $('#eh_showBagCode').html('');
        }
    });

    $(document).on('click' , '.eh_searchBagLi' , function(){
        const data_m_typeofbag = $(this).attr("data_m_typeofbag");
        const data_m_typeofbagtxt = $(this).attr("data_m_typeofbagtxt");

        $('#ehmd_typeofbag').val(data_m_typeofbag);
        $('#ehmd_typeofbagtxt').val(data_m_typeofbagtxt);

        $('#eh_showBagCode').html('');
    });


    $(document).on('click' , '.export-detail' , function(){
        const data_m_code = $(this).attr('data_m_code');
        location.href = url+'main/exportdata/exportdataRun/'+data_m_code;
    });


    $(document).on('click' , '.addMachineCheck' , function(){
        const m_code = $(this).attr('data_m_code');
        const machine_name = $(this).attr('data_machine_name');
        const datetime = $(this).attr('data_datetime');
        const item_number = $(this).attr('data_item_number');
        const batch_number = $(this).attr('data_batch_number');


        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        let title = '';
        title +=`
        <span><b>รายการตรวจสอบเครื่องจักร</b></span><br>
        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
        `;


        $('#machineCheck_modal').modal('show');
        $('#mcmdTitle').html(title);
        $('#mck_machinename').val(machine_name);
        $('#mck_datetime').val(datetime);
        $('#mck_itemnumber').val(item_number);
        $('#mck_batchnumber').val(batch_number);
        $('#mcmd_mcode').val(m_code);
    });


    $(document).on('click' , '.editMachineCheck' , function(){
        const data_m_code = $(this).attr('data_m_code');
        const data_machine_name = $(this).attr('data_machine_name');


        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        let title = '';
        title +=`
        <span><b>แก้ไขรายการตรวจสอบเครื่องจักร</b></span><br>
        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
        `;
      

        $('#machineCheckEdit_modal').modal('show');
        $('#mcmdTitleEdit').html(title);
        $('#mcmd_mcodeEdit').val(data_m_code);
        $('#mck_machinenameEdit').val(data_machine_name);
        
        loadCheckGroupForEdit(data_m_code);
    });


    $(document).on('change' , '.lineGroupForEdit' , function(){
        console.log($(this).val());
        if($(this).val() != ""){
            $('#lineGroupForEdit').removeClass('inputNull');
            $('#sectionEditData').css('display' , '');
            let m_code = $('#mcmd_mcodeEdit').val();
            let linegroup = $('#lineGroupForEdit').val();
            loadCheckMainPageEdit(m_code,linegroup);
        }else{
            $('#sectionEditData').css('display' , 'none');
        }
    });

    $(document).on('focus' , '.mdsp_d_run_value' , function(){
        $(this).select();
    });

    $(document).on('focus' , '.mdrd_d_run_value' ,function(){
        $(this).select();
    });

    $(document).on('focus' , '.mdrde_d_run_value' , function(){
        $(this).select();
    });

    $(document).on('click' , '.textAreaM' , function(){
        const data_m_code = $(this).attr('data_m_code');
        const data_d_code = $(this).attr('data_d_code');
        const data_sd_status = $(this).attr('data_sd_status');
        const data_d_worktime = $(this).attr('data_d_worktime');
        const data_d_workdate = $(this).attr('data_d_workdate');
        const data_memo = $(this).attr('data_memo');

        const machineName = $('#m_template_name_v').val();
        const batchNumber = $('#m_batch_number_v').val();
        const productNumber = $('#m_product_number_v').val();
        const itemNumber = $('#m_item_number_v').val();

        let title = '';
        title +=`
        <span><b>Machine Name : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNumber+`</span><br>
        <span><b>Production Number : </b>`+productNumber+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNumber+`</span>
        `;

        $('#runDetailTitle').html(title);

        if(data_sd_status != "เทสีเสร็จเรียบร้อย"){
            $('#runDetail_modal').modal('show');
            $('#btn-saveRunDetail').html('<i class="fi-save mr-2"></i>บันทึกการอบ');
            $('#mdrd_d_code').val(data_d_code);
            $('#mdrd_m_code').val(data_m_code);
            $('#mdrd_sd_status').val(data_sd_status);
            $('#showProcess').text(data_sd_status);
            $('#mdrd_chooseTime').val(data_d_worktime).prop('disabled' , true);
            $('#mdrd_chooseDate').val(data_d_workdate).prop('disabled' , true);
            $('#mdrd_d_run_memo').val(data_memo);
            // loadSpointInMainData(data_m_code);
            loadDataProcessing(data_m_code , data_d_code);

            if(data_sd_status == "โหลดของใส่ถาดเสร็จแล้ว รอปิดตู้"){
                $('.loadOven2').css('display' , '');
            }else if(data_sd_status == "ปิดตู้ตั้งอุณหภูมิแล้วรอ เริ่มอบ"){
                $('.loadOven3').css('display' , '');
            }else if(data_sd_status == "เริ่มอบแล้ว"){
                $('.loadOven4').css('display' , '');
            }else if(data_sd_status == "อบเสร็จแล้วรอเทสี"){
                $('.loadOven5').css('display' , '');
            }
        }else{
            swal({
                title: 'การอบรอบนี้เสร็จเรียบร้อยแล้ว',
                type: 'warning',
                showConfirmButton: false,
                timer:1000
            });
        }


    });

    $(document).on('click' , '.runImageII' , function(){
        const data_maincode = $(this).attr('data_maincode');
        const data_detailcode = $(this).attr('data_detailcode');

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        let title = '';
        title +=`
        <span><b>รูปภาพ เริ่ม</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        getImageLoadOven(data_maincode,data_detailcode,"โหลดของใส่ถาด");
    });


    $(document).on('click' , '.runImageIII' , function(){
        const data_maincode = $(this).attr('data_maincode');
        const data_detailcode = $(this).attr('data_detailcode');

        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const machineName = $('#m_template_name_v').val();
        const batchNo = $('#m_batch_number_v').val();

        let title = '';
        title +=`
        <span><b>รูปภาพ จบ</b></span><br>
        <span><b>Machine Name. : </b>`+machineName+`</span>&nbsp;&nbsp;<span><b>Batch Number : </b>`+batchNo+`</span><br>
        <span><b>Production Number : </b>`+productionNo+`</span>&nbsp;&nbsp;<span><b>Item Number : </b>`+itemNo+`</span>
        `;
        $('#runDetailImageTitle').html(title);

        $('#runDetailImage_modal').modal('show');
        getImageLoadOven(data_maincode,data_detailcode,"เทสี");
    });

// Condition Zone ######################################################################














// Function Zone ##########################################################################

    function loadCheckMainPageEdit(m_code,linegroup)
    {
        if(m_code != "" && linegroup != ""){
            axios.post(url+'main/loadCheckMainPageEdit' , {
                action:"loadCheckMainPageEdit",
                m_code:m_code,
                linegroup:linegroup
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let getCheckData = res.data.mcCheckEdit;
                    $('#mck_datetimeEdit').val(res.data.datetime);
                    $('#mck_itemnumberEdit').val(res.data.itemno);
                    $('#mck_batchnumberEdit').val(res.data.batchno);


                    let outputmd = '';
                    for(let i = 0; i < getCheckData.length; i++){
                        outputmd +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <label>`+getCheckData[i].mck_list+`</label>
                                <input hidden type="text" id="mck_autoid_edit" name="mck_autoid_edit[]" value="`+getCheckData[i].mck_autoid+`">
                            </div>
                            <div class="col-md-6">
                                <select id="mckval_edit" name="mckval_edit[]" class="form-control">
                                    <option value="`+getCheckData[i].mck_value+`">`+getCheckData[i].mck_value+`</option>
                                    <option value="ปกติ">ปกติ</option>
                                    <option value="ผิดปกติ">ผิดปกติ</option>
                                    <option value="ไม่มีการใช้งาน">ไม่มีการใช้งาน</option>
                                    <option value="เครื่องจอด">เครื่องจอด</option>
                                </select>
                            </div>
                        </div>
                        `;
                    }

                    $('#showMachineCheckListEdit_md').html(outputmd);
                }
            })
        }
    }



    function loadTabSelect()
    {
        let tabSelect = localStorage.getItem('tab_oven');
        console.log(tabSelect);

        if(tabSelect == "tabpage1"){
            $('#tabpage1').addClass('active');
            $('#page1').addClass('active').addClass('show');
        }else if(tabSelect == "tabpage2"){
            $('#tabpage2').addClass('active');
            $('#page2').addClass('active').addClass('show');
            loadCheckMachinePage();
        }else if(tabSelect == "tabpage3"){
            $('#tabpage3').addClass('active');
            $('#page3').addClass('active').addClass('show');

            let prodid = $('#m_product_number_v').val();
            let dataareaid = $('#m_dataareaid_v').val();
            let status = $('#getFormStatus').val();
            let batchnumber = $('#m_batch_number_v').val();
            let formno = "<?php echo $mainformno; ?>";
            loaddataSticker(formno , prodid , batchnumber , dataareaid , status);

        }else if(tabSelect == "tabpage4"){
            $('#tabpage4').addClass('active');
            $('#page4').addClass('active').addClass('show');

            let prodid = $('#m_product_number_v').val();
            let dataareaid = $('#m_dataareaid_v').val();
            let status = $('#getFormStatus').val();
            let formno = "<?php echo $mainformno; ?>";
            loaddatajobcard(prodid , dataareaid , status , formno);
        }else if(tabSelect == "tabpage5"){
            $('#tabpage5').addClass('active');
            $('#page5').addClass('active').addClass('show');

            let prodid = $('#m_product_number_v').val();
            let dataareaid = $('#m_dataareaid_v').val();
            loaddatapackinglist(prodid , dataareaid);
        }else{
            $('#tabpage1').addClass('active');
            $('#page1').addClass('active').addClass('show');
        }
    }


    function loadSpoint(templatecode)
    {
        if(templatecode != ""){
            axios.post(url+'main/loadSpoint',{
                action:"loadSpoint",
                templatecode:templatecode
            }).then(res=>{
                console.log(res.data);
                let spointData = res.data.resultSetpoint;
                let output = '';

                for(let i = 0; i < spointData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointData[i].detail_column_name+`</b></span>
                                <input hidden type="text" id="mdsp_d_run_name" name="mdsp_d_run_name[]" value="`+spointData[i].detail_column_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdsp_d_run_value" name ="mdsp_d_run_value[]" class="form-control mdsp_d_run_value" value="`+spointData[i].detail_spoint+`">
                                <input hidden type="text" id="mdsp_d_run_min" name ="mdsp_d_run_min[]" value="`+spointData[i].detail_min+`">
                                <input hidden type="text" id="mdsp_d_run_max" name ="mdsp_d_run_max[]" value="`+spointData[i].detail_max+`">
                                <input hidden type="text" id="mdsp_d_linenum" name ="mdsp_d_linenum[]" value="`+spointData[i].detail_linenum+`">
                                <input hidden type="text" id="mdsp_d_templatecode" name ="mdsp_d_templatecode[]" value="`+spointData[i].detail_mastercode+`">
                            </div>
                        </div>
                    `;
                }
                $('#show_spointFromTemplate').html(output);

                let posi = "<?php echo getUser()->posi; ?>";
                let deptcode = "<?php echo getUser()->DeptCode; ?>";
                let ecode = "<?php echo getUser()->ecode; ?>";

                if(posi == 15){
                    if(ecode != "M2067"){
                        $('.mdsp_d_run_value').prop('readonly' , true);
                    }
                }

            });
        }
    }


    function loadSpointInMainData(m_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadSpointInMainData',{
                action:"loadSpointInMainData",
                m_code:m_code
            }).then(res=>{
                console.log(res.data);
                let spointMainData = res.data.spointMainData;
                let output = '';

                for(let i = 0; i < spointMainData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointMainData[i].d_run_name+`</b></span>
                                <input hidden type="text" id="mdrd_d_run_name" name="mdrd_d_run_name[]" value="`+spointMainData[i].d_run_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdrd_d_run_value" name ="mdrd_d_run_value[]" class="form-control mdrd_d_run_value" value="`+spointMainData[i].d_run_value+`">
                                <input hidden type="text" id="mdrd_d_run_min" name ="mdrd_d_run_min[]" value="`+spointMainData[i].d_run_min+`">
                                <input hidden type="text" id="mdrd_d_run_max" name ="mdrd_d_run_max[]" value="`+spointMainData[i].d_run_max+`">
                                <input hidden type="text" id="mdrd_d_linenum" name ="mdrd_d_linenum[]" value="`+spointMainData[i].d_linenum+`">
                                <input hidden type="text" id="mdrd_d_templatecode" name ="mdrd_d_templatecode[]" value="`+spointMainData[i].d_templatecode+`">
                            </div>
                        </div>
                    `;
                }
                $('#show_spointFromMain').html(output);
            });
        }
    }


    function loadSpointForEdit(m_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadSpointForEdit',{
                action:"loadSpointForEdit",
                m_code:m_code
            }).then(res=>{
                console.log(res.data);
                let spointMainData = res.data.spointMainData;
                let spointImage = res.data.spointImage;
                let output = '';

                output +=`
                    <h3>Run Screen</h3>
                    <div class="dropdown-divider"></div>
                    `;
                for(let i = 0; i < spointMainData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointMainData[i].d_run_name+`</b></span>
                                <input hidden type="text" id="mdrde_d_run_name" name="mdrde_d_run_name[]" value="`+spointMainData[i].d_run_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdrde_d_run_value" name ="mdrde_d_run_value[]" class="form-control mdrde_d_run_value" value="`+spointMainData[i].d_run_value+`">
                                <input hidden type="text" id="mdrde_d_autoid" name="mdrde_d_autoid[]" value="`+spointMainData[i].d_autoid+`"> 
                            </div>
                        </div>
                    `;
                }
                $('#showGroupDetailEdit').html(output);

                let posi = "<?php echo getUser()->posi; ?>";
                let deptcode = "<?php echo getUser()->DeptCode; ?>";
                let ecode = "<?php echo getUser()->ecode; ?>";

                if(posi == 15){
                    if(ecode != "M2067"){
                        $('.mdrde_d_run_value').prop('readonly' , true);
                    }
                }

                // Get Image Zone
                let imageSpointImageHtml = '';

                imageSpointImageHtml +=`
                <span><b>รูปก่อนการทำงาน</b></span>
                <div class="row form-group">`;
                    if(spointImage != null){
                        for(let i = 0; i < spointImage.length; i++){
                            imageSpointImageHtml +=`
                                <div class="col-md-4 col-lg-3 col-6 divImage mt-2">
                                    <img class="runImageView" src="`+url+spointImage[i].f_path+spointImage[i].f_name+`">
                                    <div class="iconZone">
                                        <i class="fa fa-trash imageDelSpointEdit" aria-hidden="true"
                                            data_m_code="`+m_code+`"
                                            data_f_name="`+spointImage[i].f_name+`"
                                            data_f_path="`+spointImage[i].f_path+`"
                                            data_f_autoid="`+spointImage[i].f_autoid+`"
                                        ></i>
                                    </div>
                                </div>
                                `;
                        }
                    }else{
                        imageSpointImageHtml +=`
                            <div class="col-md-12">
                                <span>ไม่พบรูปภาพ</span>
                            </div>
                            `;
                    }
                    imageSpointImageHtml +=`
                </div>
                `;
                $('#edit_showSpointImage').html(imageSpointImageHtml);

                
            });
        }
    }


    function loadDataProcessing(m_code , d_code)
    {
        if(m_code != ""){
            axios.post(url+'main/loadDataProcessing',{
                action:"loadDataProcessing",
                m_code:m_code,
                d_code:d_code
            }).then(res=>{
                console.log(res.data);
                let spointMainData = res.data.spointMainData;
                let output = '';

                for(let i = 0; i < spointMainData.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+spointMainData[i].d_run_name+`</b></span>
                                <input hidden type="text" id="mdrd_d_run_name" name="mdrd_d_run_name[]" value="`+spointMainData[i].d_run_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdrd_d_run_value" name ="mdrd_d_run_value[]" class="form-control mdrd_d_run_value" value="`+spointMainData[i].d_run_value+`">
                                <input hidden type="text" id="mdrd_d_run_min" name ="mdrd_d_run_min[]" value="`+spointMainData[i].d_run_min+`">
                                <input hidden type="text" id="mdrd_d_run_max" name ="mdrd_d_run_max[]" value="`+spointMainData[i].d_run_max+`">
                                <input hidden type="text" id="mdrd_d_linenum" name ="mdrd_d_linenum[]" value="`+spointMainData[i].d_linenum+`">
                                <input hidden type="text" id="mdrd_d_templatecode" name ="mdrd_d_templatecode[]" value="`+spointMainData[i].d_templatecode+`">
                            </div>
                        </div>
                    `;
                }
                $('#show_spointFromMain').html(output);
            });
        }
    }

    function loadImageRunDetailForShow(m_code,d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadImageRunDetailForShow',{
                action:"loadImageRunDetailForShow",
                m_code:m_code,
                d_code:d_code
            }).then(res => {
                console.log(res);
                if(res.data.status == "Select Data Success"){
                    let output ='';
                    let resultImage = res.data.imageRunDetail;
                    output +=`<div class="row form-group">`;
                        for(let i = 0; i < resultImage.length; i++){
                            output +=`
                            <div class="col-md-4 col-lg-3 col-6 mt-2">
                            <a href="`+url+resultImage[i].f_path+resultImage[i].f_name+`" data-toggle="lightbox">
                                <img class="runImageView" src="`+url+resultImage[i].f_path+resultImage[i].f_name+`">
                            </a>
                            </div>`;
                        }
                    output += `</div>`;
                    $('#showImageRunDetail').html(output);
                }
            });
        }
    }

    function loadImageBeforeStart(m_code,d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadImageBeforeStart',{
                action:"loadImageBeforeStart",
                m_code:m_code,
                d_code:d_code
            }).then(res => {
                console.log(res);
                if(res.data.status == "Select Data Success"){
                    let output ='';
                    let resultImageBeforeStart = res.data.imageBeforeStart;
                    output +=`<div class="row form-group">`;
                        for(let i = 0; i < resultImageBeforeStart.length; i++){
                            output +=`
                            <div class="col-md-4 col-lg-3 col-6 mt-2">
                            <a href="`+url+resultImageBeforeStart[i].f_path+resultImageBeforeStart[i].f_name+`" data-toggle="lightbox">
                                <img class="runImageView" src="`+url+resultImageBeforeStart[i].f_path+resultImageBeforeStart[i].f_name+`">
                            </a>
                            </div>`;
                        }
                    output += `</div>`;
                    $('#showImageRunDetail').html(output);
                }
            });
        }
    }

    function getImageLoadOven(m_code,d_code,imageType)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/getImageLoadOven',{
                action:"getImageLoadOven",
                m_code:m_code,
                d_code:d_code,
                imageType:imageType
            }).then(res => {
                console.log(res);
                if(res.data.status == "Select Data Success"){
                    let output ='';
                    let resultImageLoadOven = res.data.imageLoadOven;
                    output +=`<div class="row form-group">`;
                        for(let i = 0; i < resultImageLoadOven.length; i++){
                            output +=`
                            <div class="col-md-4 col-lg-3 col-6 mt-2">
                            <a href="`+url+resultImageLoadOven[i].f_path+resultImageLoadOven[i].f_name+`" data-toggle="lightbox">
                                <img class="runImageView" src="`+url+resultImageLoadOven[i].f_path+resultImageLoadOven[i].f_name+`">
                            </a>
                            </div>`;
                        }
                    output += `</div>`;
                    $('#showImageRunDetail').html(output);
                }
            });
        }
    }
    

    function loadRunGroupList(m_code)
    {
        axios.post(url+'main/loadRunGroupList',{
            action:"loadRunGroupList",
            m_code:m_code
        }).then(res => {
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let output =`
                <div class="row form-group">
                    <input hidden type="text" id="spointDCode" name="spointDCode" value="`+res.data.runSpointDCode.d_detailcode+`">
                    <div class="col-md-12">
                `;
                output +=`
                <select name="listOfRunGroup" id="listOfRunGroup" class="form-control selectDetailEdit">
                <option value="">กรุณาเลือกรายการที่ต้องการแก้ไข</option>
                <option value="Spoint">S/POINT</option>
                `;
                let runGroupLists = res.data.runGroupList;
                    for(let i = 0; i < runGroupLists.length; i++){
                        let conWorkdate = moment(runGroupLists[i].d_workdate).format('DD/MM/yy');
                        output +=`<option value="`+runGroupLists[i].d_detailcode+`">`+runGroupLists[i].d_worktime+` `+conWorkdate+`</option>`;
                    }
                output += `</select>`;
                output +=`
                    </div>               
                </div>`;

                $('#showRunGroupList').html(output);
            }
        });
    }


    function loadDataForEdit(m_code , d_code)
    {
        if(m_code != "" && d_code != ""){
            axios.post(url+'main/loadDataForEdit',{
                action:"loadDataForEdit",
                m_code:m_code,
                d_code:d_code
            }).then(res => {
                console.log(res.data);

                let runDetailEdit = res.data.runDetailForEdit;
                let output = '';
                let runImages = res.data.runImage;
                let runImageOven1 = res.data.runImageOven1;
                let runImageOven2 = res.data.runImageOven2;
                let sd_status = res.data.subDetail.sd_status;
                let runDetailTime = res.data.runDetailTime;


            // Zone โหลดของใส่ถาด
                let imageOven1Html = '';
                $('#mdrd_loadoven_edit').val(res.data.subDetail.sd_loadoven);
                $('#mdrd_chooseTime_edit').val(runDetailTime);
                $('#mdrd_loadoven_date_edit').val(res.data.subDetail.sd_loadoven_date);
                imageOven1Html +=`
                <span><b>รูปโหลดของใส่ถาด</b></span>
                <div class="row form-group">`;
                    if(runImageOven1 != null){
                        for(let i = 0; i < runImageOven1.length; i++){
                            imageOven1Html +=`
                                <div class="col-md-4 col-lg-3 col-6 divImage mt-2">
                                    <img class="runImageView" src="`+url+runImageOven1[i].f_path+runImageOven1[i].f_name+`">
                                    <div class="iconZone">
                                        <i class="fa fa-trash imageDelEdit" aria-hidden="true"
                                            data_m_code="`+m_code+`"
                                            data_d_code="`+d_code+`"
                                            data_f_name="`+runImageOven1[i].f_name+`"
                                            data_f_path="`+runImageOven1[i].f_path+`"
                                            data_f_autoid="`+runImageOven1[i].f_autoid+`"
                                        ></i>
                                    </div>
                                </div>
                                `;
                        }
                    }else{
                        imageOven1Html +=`
                            <div class="col-md-12">
                                <span>ไม่พบรูปภาพ</span>
                            </div>
                            `;
                    }
                    imageOven1Html +=`
                </div>
                `;
                $('#edit_showOven1').html(imageOven1Html);
            // Zone โหลดของใส่ถาด




            // Zone ปิดตู้
                $('#mdrd_closeoven_edit').val(res.data.subDetail.sd_closeoven);
            // Zone ปิดตู้


            // Zone เริ่มอบ
                $('#mdrd_runoven_edit').val(res.data.subDetail.sd_runoven);
            // Zone เริ่มอบ


            // Zone อบเสร็จ
                $('#mdrd_stopoven_edit').val(res.data.subDetail.sd_stopoven);
                $('#mdrd_stopoven_date_edit').val(res.data.subDetail.sd_stopoven_date);
            // Zone อบเสร็จ


            // Zone เทสี
                let imageOven2Html = '';
                $('#mdrd_endoven_edit').val(res.data.subDetail.sd_endoven);
                $('#mdrd_endoven_date_edit').val(res.data.subDetail.sd_endoven_date);
                imageOven2Html +=`
                <span><b>รูปเทสี</b></span>
                <div class="row form-group">`;
                    if(runImageOven2 != null){
                        for(let i = 0; i < runImageOven2.length; i++){
                            imageOven2Html +=`
                                <div class="col-md-4 col-lg-3 col-6 divImage mt-2">
                                    <img class="runImageView" src="`+url+runImageOven2[i].f_path+runImageOven2[i].f_name+`">
                                    <div class="iconZone">
                                        <i class="fa fa-trash imageDelEdit" aria-hidden="true"
                                            data_m_code="`+m_code+`"
                                            data_d_code="`+d_code+`"
                                            data_f_name="`+runImageOven2[i].f_name+`"
                                            data_f_path="`+runImageOven2[i].f_path+`"
                                            data_f_autoid="`+runImageOven2[i].f_autoid+`"
                                        ></i>
                                    </div>
                                </div>
                                `;
                        }
                    }else{
                        imageOven2Html +=`
                            <div class="col-md-12">
                                <span>ไม่พบรูปภาพ</span>
                            </div>
                            `;
                    }
                    imageOven2Html +=`
                </div>
                `;
                $('#edit_showOven2').html(imageOven2Html);
            // Zone เทสี

                output +=`
                <div class="row form-group">
                    <div class="col-md-12 form-group">
                        <label for="">หมายเหตุ</label>
                        <textarea name="mdrde_d_run_memo" id="mdrde_d_run_memo" cols="10" rows="5" class="form-control">`+res.data.memo+`</textarea>
                    </div>
                </div>
                `;

                    output +=`
                    <h3>Run Screen</h3>
                    <div class="dropdown-divider"></div>
                    `;
                for(let i = 0; i < runDetailEdit.length; i++){
                    output +=`
                        <div class="row form-group flex-container">
                            <div class="col-md-6" style="align-self: center">
                                <span><b>`+runDetailEdit[i].d_run_name+`</b></span>
                                <input hidden type="text" id="mdrde_d_run_name" name="mdrde_d_run_name[]" value="`+runDetailEdit[i].d_run_name+`">
                            </div>
                            <div class="col-md-6">
                                <input type="tel" id="mdrde_d_run_value" name ="mdrde_d_run_value[]" class="form-control mdrde_d_run_value" value="`+runDetailEdit[i].d_run_value+`">
                                <input hidden type="text" id="mdrde_d_autoid" name="mdrde_d_autoid[]" value="`+runDetailEdit[i].d_autoid+`"> 
                            </div>
                        </div>
                    `;
                }
                $('#showGroupDetailEdit').html(output);


                // Control Section By Status
                if(sd_status == "โหลดของใส่ถาดเสร็จแล้ว รอปิดตู้"){
                    $('.loadOven_edit').css('display' , '');
                }else if(sd_status == "ปิดตู้ตั้งอุณหภูมิแล้วรอ เริ่มอบ"){
                    $('.loadOven_edit').css('display' , '');
                    $('.loadOven2_edit').css('display' , '');
                }else if(sd_status == "เริ่มอบแล้ว"){
                    $('.loadOven_edit').css('display' , '');
                    $('.loadOven2_edit').css('display' , '');
                    $('.loadOven3_edit').css('display' , '');
                }else if(sd_status == "อบเสร็จแล้วรอเทสี"){
                    $('.loadOven_edit').css('display' , '');
                    $('.loadOven2_edit').css('display' , '');
                    $('.loadOven3_edit').css('display' , '');
                    $('.loadOven4_edit').css('display' , '');
                }else if(sd_status == "อบเสร็จแล้วรอเทสี"){
                    $('.loadOven_edit').css('display' , '');
                    $('.loadOven2_edit').css('display' , '');
                    $('.loadOven3_edit').css('display' , '');
                    $('.loadOven4_edit').css('display' , '');
                    $('.loadOven5_edit').css('display' , '');
                }else if(sd_status == "เทสีเสร็จเรียบร้อย"){
                    $('.loadOven_edit').css('display' , '');
                    $('.loadOven2_edit').css('display' , '');
                    $('.loadOven3_edit').css('display' , '');
                    $('.loadOven4_edit').css('display' , '');
                    $('.loadOven5_edit').css('display' , '');
                }

                let statusHtml = `<b>ขั้นตอน : </b>`+sd_status;
                $('#mdEditShowStatus').html(statusHtml);

                // console.log(sd_status);


            });
        }
    }

    function deleteFileEdit(m_code , d_code , f_name , f_path , f_autoid)
    {
        if(m_code != "" &&
        d_code != "" &&
        f_name != "" &&
        f_path != "" &&
        f_autoid != "")
        {
            axios.post(url+'main/deleteFileEdit' , {
                action:"deleteFileEdit",
                m_code:m_code,
                d_code:d_code,
                f_name:f_name,
                f_path:f_path,
                f_autoid:f_autoid
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Delete Data Success"){
                    swal({
                        title: 'ลบข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        loadDataForEdit(m_code , d_code);
                    });
                }else{
                    swal({
                        title: 'ลบข้อมูลไม่สำเร็จ',
                        type: 'error',
                        showConfirmButton: false,
                        timer:800
                    })
                }
            });
        }
    }


    function deleteFileSpointEdit(m_code , f_name , f_path , f_autoid)
    {
        if(m_code != "" &&
        f_name != "" &&
        f_path != "" &&
        f_autoid != "")
        {
            axios.post(url+'main/deleteFileSpointEdit' , {
                action:"deleteFileSpointEdit",
                m_code:m_code,
                f_name:f_name,
                f_path:f_path,
                f_autoid:f_autoid
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Delete Data Success"){
                    swal({
                        title: 'ลบข้อมูลสำเร็จ',
                        type: 'success',
                        showConfirmButton: false,
                        timer:800
                    }).then(function(){
                        loadSpointForEdit(m_code);
                    });
                }else{
                    swal({
                        title: 'ลบข้อมูลไม่สำเร็จ',
                        type: 'error',
                        showConfirmButton: false,
                        timer:800
                    })
                }
            });
        }
    }


    function dataGroupSelected(linenum_group)
    {
        // console.log(linenum_group);
        // console.log(data_run_autoid);
        let linenumGroupArray = [];
        for(let i = 0; i < runData.length; i++){
            linenumGroupArray.push(runData[i].d_linenum_group);
        }
        console.log('LineGroup :'+linenumGroupArray);
        console.log('LineGroupNow :'+linenum_group);
        let index = linenumGroupArray.indexOf(linenum_group);
        console.log('index :'+index);

        // control arrow fix min and max
        let min = 0;
        let max = runData.length-1;

        if(index == min){
            $('.runDownArrow_detail').css('display' , '');
        }else if(index > min && index != max){
            $('.runDownArrow_detail').css('display' , '');
        }else if(index == max){
            $('.runDownArrow_detail').css('display' , 'none');
        }

        if(index == max){
            $('.runUpArrow_detail').css('display' , '');
        }else if(index < max && index != min){
            $('.runUpArrow_detail').css('display' , '');
        }else if(index == min){
            $('.runUpArrow_detail').css('display' , 'none');
        }

        if(min == 0 && max == 0){
            $('.runUpArrow_detail').css('display' , 'none');
            $('.runDownArrow_detail').css('display' , 'none');
        }

        // ส่งข้อมูลไปเก็บไว้ที่ Attr ของลูกศร
        $('.runDownArrow_detail , .runUpArrow_detail').attr({
            'data_indexofarray':index,
            'data_linenum_group':linenum_group
        });


        console.log('Min:'+min+' Max:'+max);
        console.log(linenum_group);
        // runAutoidArray = [];
        // index = null;

        localStorage.setItem('linenumGroup' , linenum_group);
        localStorage.setItem('indexofarray' , index);
    }


    function moveElement(array,initialIndex,finalIndex) 
    {
        array.splice(finalIndex,0,array.splice(initialIndex,1)[0])
        console.log(array);
        return array;
    }


    function checkFormStatus()
    {
        let m_code = $('#getMaincode').val();
        axios.post(url+'main/checkFormStatus' , {
            action:"checkFormStatus",
            m_code:m_code
        }).then(res=>{
            // console.log(res);
            if(res.data.status == "Select Data Success"){
                let deptcode = "<?php echo getUser()->DeptCode; ?>";
                let ecode = "<?php echo getUser()->ecode; ?>";
                let posi = "<?php echo getUser()->posi; ?>";
                // check PD Dept
                if(deptcode != "1007"){

                    if(ecode == "M1809" || ecode == "M0282"){

                        if(res.data.form_status == "Wait Start"){

                            $('.startButtonZone').css('display' , '');
                            $('.spointzone').css('display' , 'none');
                            createDataPage(m_code);

                        }else if(res.data.form_status == "Open"){

                            $('.spointzone').css('display' , '');
                            $('.startButtonZone').css('display' , 'none');
                            $('.cancelButtonZone').css('display' , '');
                            $('#checkPageMenu').css('display' , '');

                        }else if(res.data.form_status == "Start"){

                            $('.startButtonZone').css('display' , 'none');
                            $('.spointzone').css('display' , 'none');
                            $('.stopButtonZone').css('display' , '');
                            $('.cancelButtonZone').css('display' , 'none');
                            
                            // console.log(spointData);
                            createDataPage(m_code);

                            $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , '');
                            $('#checkPageMenu').css('display' , '');

                            // Other Image
                            getSpeacialData(get_templatecode);

                        }else if(res.data.form_status == "Cancel"){

                            $('.cancelButtonZone').css('display' , 'none');
                            $('.spointzone').css('display' , 'none');
                            $('.startButtonZone').css('display' , 'none');
                            $('.stopButtonZone').css('display' , 'none');

                            $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , 'none');
                            $('#checkPageMenu').css('display' , 'none');

                            $('.textAreaM').prop('disabled' , true);
                            $('.editHeadData').css('display' , 'none');

                        }else if(res.data.form_status == "Stop"){

                            $('.cancelButtonZone').css('display' , 'none');
                            $('.spointzone').css('display' , 'none');
                            $('.startButtonZone').css('display' , 'none');
                            $('.stopButtonZone').css('display' , 'none');

                            $('.btnGroup , .add-detail , .edit-detail').css('display' , 'none');
                            $('#checkPageMenu').css('display' , 'none');

                            createDataPage(m_code);

                            $('.textAreaM').prop('disabled' , true);
                            $('.editHeadData').css('display' , 'none');
                            $('.export-detail').css('display' , '');

                            // Other Image
                            getSpeacialData(get_templatecode);
                        }

                    }else{

                        $('.cancelButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');
                        $('.startButtonZone').css('display' , 'none');
                        $('.stopButtonZone').css('display' , 'none');
                        $('.btnGroup , .add-detail , .edit-detail').css('display' , 'none');
                        $('#checkPageMenu').css('display' , 'none');

                        createDataPage(m_code);
                        $('.textAreaM').prop('disabled' , true);
                        $('.editHeadData').css('display' , 'none');

                    }  
                    
                }else{

                    if(res.data.form_status == "Wait Start"){

                        $('.startButtonZone').css('display' , '');
                        $('.spointzone').css('display' , 'none');
                        createDataPage(m_code);

                    }else if(res.data.form_status == "Open"){

                        $('.spointzone').css('display' , '');
                        $('.startButtonZone').css('display' , 'none');
                        $('.cancelButtonZone').css('display' , '');
                        $('#checkPageMenu').css('display' , '');

                    }else if(res.data.form_status == "Start"){

                        $('.startButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');

                        $('.cancelButtonZone').css('display' , 'none');

                        if(posi < 35){
                            $('.stopButtonZone').css('display' , 'none');
                        }else{
                            $('.stopButtonZone').css('display' , '');
                        }
                        // console.log(spointData);
                        createDataPage(m_code);

                        $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , '');
                        $('#checkPageMenu').css('display' , '');

                        // Other Image
                        getSpeacialData(get_templatecode);

                    }else if(res.data.form_status == "Cancel"){

                        $('.cancelButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');
                        $('.startButtonZone').css('display' , 'none');
                        $('.stopButtonZone').css('display' , 'none');

                        $('.btnGroup , .add-detail , .edit-detail , .export-detail').css('display' , 'none');
                        $('#checkPageMenu').css('display' , 'none');

                        $('.textAreaM').prop('disabled' , true);
                        $('.editHeadData').css('display' , 'none');

                    }else if(res.data.form_status == "Stop"){

                        $('.cancelButtonZone').css('display' , 'none');
                        $('.spointzone').css('display' , 'none');

                        if(ecode == "M0085"){
                            $('.startButtonZone').css('display' , '');
                        }else{
                            $('.startButtonZone').css('display' , 'none');
                        }
                        
                        $('.stopButtonZone').css('display' , 'none');

                        $('.btnGroup , .add-detail , .edit-detail').css('display' , 'none');
                        $('#checkPageMenu').css('display' , 'none');

                        createDataPage(m_code);

                        $('.textAreaM').prop('disabled' , true);
                        $('.editHeadData').css('display' , 'none');
                        $('.export-detail').css('display' , '');

                        // Other Image
                        getSpeacialData(get_templatecode);
                    }
                }


            }
        });
    }


    function createDataPage(m_code)
    {
        
        // console.log(spointData);
        // console.log(spointData);
        let output = '';
        output +=`
            <div id="forPd_v2" class="row">
                <div class="col-md-12 form-group">
                    <button style="display:none;" type="button" id="add-detail" class="btn btn-primary add-detail"
                        data_m_code="`+m_code+`"
                    ><i class="fi-plus mr-2"></i>เพิ่มข้อมูล</button>
                    <button style="display:none;" type="button" id="edit-detail" class="btn btn-warning edit-detail">
                    <i class="fa fa-edit mr-2" aria-hidden="true"></i>แก้ไขข้อมูล</button>
                    <button style="display:none;" type="button" id="export-detail" class="btn btn-info export-detail"
                        data_m_code="`+m_code+`"
                    ><i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>ส่งออกข้อมูล</button>
                </div>
            </div>
            
            <div style="display:none;" class="dropdown-divider btnGroup"></div>

            <div class="row mainDivTable">

                <div class="arrowArea" style="display:none;">
                    <i id="runUp" aria-hidden="true" class="fa fa-chevron-circle-up runUpArrow_detail" style=""></i>&nbsp;&nbsp;
                    <i id="runDown" aria-hidden="true" class="fa fa-chevron-circle-down runDownArrow_detail" style=""></i>
                </div>

                <div class="col-md-12 table-responsive">
                    <table id="tb_detail_main" class="table table-bordered table-striped">`;
            output +=`<tr>`;
                output +=`
                <th class="tb_runscreenName">Run Screen</th>
                <th class="tb_runscreenName">Date</th>

                <th class="tb_loadOven1">นำสินค้าใส่ถาด</th>
                <th class="tb_loadOven2">รูปภาพเริ่ม</th>
                <th class="tb_loadOven3">ปิดตู้อบ</th>
                <th class="tb_loadOven4">เริ่มอบ</th>
                <th class="tb_loadOven5">อบเสร็จ</th>
                <th class="tb_loadOven5">รออุณหภูมิลด</th>
                <th class="tb_loadOven6">นำสินค้าออกจากถาด</th>
                <th class="tb_loadOven7">รูปภาพจบ</th>
                `;
                let iconBeforeImage = '';
                    for(let i = 0; i < spointData.length; i++){

                        
                        if(beforeStartImage != ""){
                            iconBeforeImage = `<i class="fa fa-file-picture-o beforeImageI" aria-hidden="true"
                                data_maincode="`+spointData[i].d_maincode+`"
                                data_detailcode="`+spointData[i].d_detailcode+`"
                            ></i>`;
                        }else{
                            iconBeforeImage = '';
                        }

                        output +=`
                        <th class="tb_runscreenName">`+spointData[i].d_run_name+`</th>
                        `;
                    }  
            output +=`
                <th class="tb_loadOven8">Memo</th>
            </tr>`;

            output +=`<tr>`;
            output +=`<td><b>S/POINT</b></td>

           
            <td colspan="9"></td>
            `;
                    for(let i = 0; i < spointData.length; i++){
                        output +=`
                        <td class="">`+spointData[i].d_run_value+`</td>
                        `;
                    }
            output +=`
            <td></td>
            </tr>`;

            if(runData != null){
                let iconImageRun = "";
                let iconMemoRun = "";
                for(let i = 0; i < runData.length; i++){

                // Icon Image Spoint
                    if(runData[i].imageRun != ""){
                        iconImageRun = `<i class="fa fa-file-picture-o runImageI" aria-hidden="true"
                            data_maincode="`+runData[i].imageRun+`"
                            data_detailcode="`+runData[i].detailcode+`"
                        ></i>`;
                    }else{
                        iconImageRun = '';
                    }
                // Icon Image Spoint


                // Icon Image Run Oven Zone
                    if(runData[i].imageRunLoadOven != ""){
                        iconImageRunOven1 = `<i class="fa fa-file-picture-o runImageII" aria-hidden="true"
                            data_maincode="`+runData[i].imageRunLoadOven+`"
                            data_detailcode="`+runData[i].detailcode+`"
                        ></i>`;
                    }else{
                        iconImageRunOven1 = '';
                    }


                    if(runData[i].imageRunLoadOven2 != ""){
                        iconImageRunOven2 = `<i class="fa fa-file-picture-o runImageIII" aria-hidden="true"
                            data_maincode="`+runData[i].imageRunLoadOven2+`"
                            data_detailcode="`+runData[i].detailcode+`"
                        ></i>`;
                    }else{
                        iconImageRunOven2 = '';
                    }
                 // Icon Image Run Oven Zone


                //  Memo Zone
                    // if(runData[i].memo != ""){
                    //     iconMemoRun = `<i class="fa fa-sticky-note runMemo" aria-hidden="true"
                    //         data_maincode="`+runData[i].imageRun+`"
                    //         data_detailcode="`+runData[i].detailcode+`"
                    //         data_memo="`+runData[i].memo+`"
                    //     ></i>`;
                    // }else{
                    //     iconMemoRun = '';
                    // }

                    let memoCount = runData[i].memo.length;
                    let resultMemocut = '';

                    if(memoCount > 60){
                        resultMemocut = runData[i].memo.slice(0,50)+`
                        <br>
                        <a href="javascript:void(0)" class="runMemo"
                            data_maincode="`+runData[i].imageRun+`"
                            data_detailcode="`+runData[i].detailcode+`"
                            data_memo="`+runData[i].memo+`"
                        >
                            <span style="font-size:14px;">[ อ่านเพิ่มเติม ]</span>
                        </a>
                        `;
                    }else{
                        resultMemocut = runData[i].memo;
                    }
                //  Memo Zone


                // sd Zone
                if(runData[i].sd_loadoven == null){
                    runData[i].sd_loadoven = '';
                }
                if(runData[i].sd_closeoven == null){
                    runData[i].sd_closeoven = '';
                }
                if(runData[i].sd_runoven == null){
                    runData[i].sd_runoven = '';
                }
                if(runData[i].sd_stopoven == null){
                    runData[i].sd_stopoven = '';
                }
                if(runData[i].sd_endoven == null){
                    runData[i].sd_endoven = '';
                }
                // sd Zone
                let classProcess1 , classProcess2 , classProcess3 , classProcess4;
                switch(runData[i].sd_status){
                    case "โหลดของใส่ถาดเสร็จแล้ว รอปิดตู้":
                        classProcess1 = 'processIRun';
                        classProcess2 = '';
                        classProcess3 = '';
                        classProcess4 = '';
                        break;
                    case "ปิดตู้ตั้งอุณหภูมิแล้วรอ เริ่มอบ":
                        classProcess1 = 'processIFinish';
                        classProcess2 = 'processIRun';
                        classProcess3 = '';
                        classProcess4 = '';
                        break;
                    case "เริ่มอบแล้ว":
                        classProcess1 = 'processIFinish';
                        classProcess2 = 'processIFinish';
                        classProcess3 = 'processIRun';
                        classProcess4 = '';
                        break;
                    case "อบเสร็จแล้วรอเทสี":
                        classProcess1 = 'processIFinish';
                        classProcess2 = 'processIFinish';
                        classProcess3 = 'processIFinish';
                        classProcess4 = 'processIRun';
                        break;
                    case "เทสีเสร็จเรียบร้อย":
                        classProcess1 = 'processIFinish';
                        classProcess2 = 'processIFinish';
                        classProcess3 = 'processIFinish';
                        classProcess4 = 'processIFinish';
                        break;
                }


                // Con 00:00:00 value to null
                // if(runData[i].sd_loadoven == '00:00:00'){
                //     runData[i].sd_loadoven = '';
                // }

                // if(runData[i].sd_closeoven == '00:00:00'){
                //     runData[i].sd_closeoven = '';
                // }

                // if(runData[i].sd_runoven == '00:00:00'){
                //     runData[i].sd_runoven = '';
                // }

                // if(runData[i].sd_stopoven == '00:00:00'){
                //     runData[i].sd_stopoven = '';
                // }

                // if(runData[i].sd_endoven == '00:00:00'){
                //     runData[i].sd_endoven = '';
                // }

                if(runData[i].sd_waitlowtemp == null){
                    runData[i].sd_waitlowtemp = "";
                }

                let dateShow = '';
                if(runData[i].sd_loadoven_date == null){
                    dateShow = '';
                }else{
                    dateShow = runData[i].sd_loadoven_date;
                }

                    output +=`
                    <tr>
                        <td class="areaM">
                            <span class="textAreaM"
                                data_m_code="`+m_code+`"
                                data_d_code="`+runData[i].detailcode+`"
                                data_sd_status="`+runData[i].sd_status+`"
                                data_d_worktime="`+runData[i].d_worktime+`"
                                data_d_workdate="`+runData[i].d_workdate+`"
                                data_memo="`+runData[i].memo+`"
                            ><b>`+runData[i].d_worktime+`</b></span>
                            <input type="radio" id="selectTime_`+runData[i].d_linenum_group+`" name="selectTime" class="areaD" data_linenum_group="`+runData[i].d_linenum_group+`"
                            >
                            <div class="processIMain">
                                <i class="ion-ios-lightbulb processI processI1 `+classProcess1+`"></i>
                                <i class="ion-ios-lightbulb processI processI2 `+classProcess2+`"></i>
                                <i class="ion-ios-lightbulb processI processI3 `+classProcess3+`"></i>
                                <i class="ion-ios-lightbulb processI processI4 `+classProcess4+`"></i>
                            </div>
                            
                        </td>
                        <td>`+dateShow+`</td>
                        <td>`+runData[i].sd_loadoven+`</td>
                        <td>`+iconImageRunOven1+`</td>
                        <td>`+runData[i].sd_closeoven+`</td>
                        <td>`+runData[i].sd_runoven+`</td>
                        <td>`+runData[i].sd_stopoven+`</td>
                        <td>`+runData[i].sd_waitlowtemp+`</td>
                        <td>`+runData[i].sd_endoven+`</td>
                        <td>`+iconImageRunOven2+`</td>
                        `;
                    for(let j = 0; j < runData[i].runByGroup.length; j++){
                        output +=`
                        <td>`+runData[i].runByGroup[j].d_run_value+`</td>
                        `;
                    }
                    output +=`
                        <td>`+resultMemocut+`</td>
                    </tr>
                    `;
                }
            }
            
            

                    output +=`</table>
                </div>
            </div>
        `;

        $('#show_detail').html(output);

        let linenumGroup = localStorage.getItem("linenumGroup");
        let indexofarray = localStorage.getItem("indexofarray");
        if(linenumGroup != null && indexofarray != null){
            $('#selectTime_'+linenumGroup).prop('checked' , true);
            $('.arrowArea').css('display' , '');
            $('.runDownArrow_detail , .runUpArrow_detail').attr({
                'data_indexofarray':indexofarray,
                'data_linenum_group':linenumGroup
            });
            dataGroupSelected(linenumGroup);
        }

        checkProductionUser();
        if($('#sd_lastStatusCheck').val() != "เทสีเสร็จเรียบร้อย" && $('#sd_lastStatusCheck').val() != ""){
            $('#add-detail').prop('disabled' , true);
        }else if($('#sd_lastStatusCheck').val() == ""){
            $('#add-detail').prop('disabled' , false);
        }else{
            $('#add-detail').prop('disabled' , false);
        }
    }




    function loadDetailData()
    {
        let m_code = $('#getMaincode').val();
        axios.post(url+'main/loadDetailData',{
            action:"loadDetailData",
            m_code:m_code
        }).then(res => {
            
            spointData = res.data.spoint;
            beforeStartImage = res.data.beforeStartImage;
            checkFormStatus();
            console.log(beforeStartImage);
        })
    }

    function loadRunDetailData()
    {
        let m_code = $('#getMaincode').val();
        axios.post(url+'main/loadRunDetailData',{
            action:"loadRunDetailData",
            m_code:m_code
        }).then(res => {
            
            $('#sd_lastStatusCheck').val(res.data.sd_lastStatus);
            console.log(res.data.run);
            runData = res.data.run;
            checkFormStatus();
        })
    }

    function clearLocalstorage()
    {
        localStorage.removeItem("indexofarray");
        localStorage.removeItem("linenumGroup");
    }


    function loadQcSampling() 
    {
        const batchNo = $('#m_batch_number_v').val();
        const productionNo = $('#m_product_number_v').val();
        const itemNo = $('#m_item_number_v').val();
        const dataareaid = $('#m_dataareaid_v').val();

        $.ajax({
            url: "/intsys/msd_oven/main/loadQcSampling",
            method: "POST",
            data: {
            batchNo: batchNo,
            productionNo: productionNo,
            itemNo: itemNo,
            dataareaid: dataareaid
            },
            beforeSend: function () {},
            success: function (res) {

                // console.log(res);

                $("#showQcSampling").html(res);

                const browserWidth = $(window).width();
                if (browserWidth <= 768) {
                    $("#qcSamplingTable").addClass("table-responsive");
                }

                $(window).resize(function () {
                    if (browserWidth <= 768) {
                    $("#qcSamplingTable").addClass("table-responsive");
                    }
                });

                var table = $("#qcSamplingTable").DataTable({
                    paging: false,
                    searching: false,
                    columnDefs: [
                    {
                        searching: false,
                        orderable: false,
                        targets: "_all",
                    },
                    { width: "120", targets: 0 },
                    { width: "100", targets: 1 },
                    { width: "50", targets: 2 },
                    { width: "100", targets: 3 },
                    { width: "100", targets: 4 },
                    { width: "80", targets: 5 },
                    { width: "80", targets: 6 },
                    { width: "80", targets: 7 },
                    { width: "80", targets: 8 },
                    { width: "80", targets: 9 },
                    { width: "200", targets: 10 }
                    ],
                    ordering: false,
                });

                const checkQcID = $('#checkQcID').val();
                const maincode = $('#getMaincode').val();
                if(checkQcID != "" && maincode != ""){
                    loadGraphByItem(checkQcID , maincode);
                }
            

            }
        });
    }




    function loadQcsamplingByLinenum(data_qcSampleId, data_qcSampleNum, data_areaId)
    {
        $.ajax({
            url:"/intsys/msd/main/loadQcsamplingByLinenum",
            method:"POST",
            data:{
                data_qcSampleId:data_qcSampleId,
                data_qcSampleNum:data_qcSampleNum,
                data_areaId:data_areaId
            },
            beforeSend:function(){},
            success:function(res){
                // console.log(res);
                $('#showQcSamplingByLinenum').html(res);

                const browserWidth = $(window).width();

                // if (browserWidth <= 768) {
                //     $("#qcSamplingTableByLinenum").addClass("table-responsive");
                // }

                // $(window).resize(function () {
                //     if (browserWidth <= 768) {
                //     $("#qcSamplingTableByLinenum").addClass("table-responsive");
                //     }
                // });

                var table = $("#qcSamplingTableByLinenum").DataTable({
                    paging: false,
                    searching: false,
                    columnDefs: [
                    {
                        searching: false,
                        orderable: false,
                        targets: "_all",
                    },
                    // { width: "80", targets: 0 },
                    // { width: "200", targets: 1 },
                    // { width: "80", targets: 2 },
                    // { width: "80", targets: 3 },
                    // { width: "80", targets: 4 },
                    // { width: "200", targets: 5 },
                    ],
                    ordering: false,
                });

            }
        });
    }


    function loadGraphByItem(checkQcID , maincode)
    {
        $.ajax({
            url:"/intsys/msd_oven/main/graph",
            method:"POST",
            data:{
                checkQcID:checkQcID,
                maincode:maincode
            },
            beforeSend:function(){
                testIDShowArray = [];
                // $('.loader').fadeIn(1000);
            },
            success:function(res){

                // console.log(JSON.parse(res).linenum.length);
                console.log(JSON.parse(res));

                if(JSON.parse(res).status == "Select Data Success"){
                    let totalQcline = JSON.parse(res).totalQcline;
                    let graphDataArray = [];
                    let newResult = [];
                    
                    for(let i =0; i < JSON.parse(res).checkData.length;i++){
                        
                        let graphdata = {
                            "name":JSON.parse(res).checkData[i].testid,
                            "data":JSON.parse(res).checkData[i].value,
                            "unitId":JSON.parse(res).checkData[i].unitid,
                            "lowerLimit":JSON.parse(res).checkData[i].lowerlimit,
                            "upperLimit":JSON.parse(res).checkData[i].upperlimit,
                            "valueOutcome":JSON.parse(res).checkData[i].valueOutcome,
                            "sumValueOutcome":JSON.parse(res).checkData[i].sumOutcome,
                        }
                        testIDShowArray.push(JSON.parse(res).checkData[i].testid);
                        graphDataArray.push(graphdata);
                    }

                    // console.log(graphDataArray);             
                    // console.log(testIDShowArray);
                    // console.log(totalQcline);
                    let areaGraph = '';
                    for(let i = 0; i < graphDataArray.length;i++){
                        // Loop for create graph
                        areaGraph += `<div id="areaGraphShow_`+i+`" class="mt-5">`+graphDataArray[i].name+`</div>`;
                        $('#showGraphMain').html(areaGraph);
                    }

                    // graphByLot(totalQcline , graphDataArray);
                    loadCheckGraph(maincode);
                    let resultData;
                    let maxLimit;
                    let conUnitid;
                    for(let i = 0; i < graphDataArray.length;i++){

                        if(graphDataArray[i].sumValueOutcome == 0){
                            resultData = graphDataArray[i].data;
                            maxLimit = graphDataArray[i].upperLimit;
                            if(graphDataArray[i].unitId == null){
                                conUnitid = "";
                            }else{
                                conUnitid = graphDataArray[i].unitId;
                            }
                        }else{
                            resultData = graphDataArray[i].valueOutcome;
                            maxLimit = 1;
                        }
                        // Loop for create graph
                        graphByLot(totalQcline , graphDataArray[i].name , resultData , i , conUnitid , graphDataArray[i].lowerLimit , maxLimit , graphDataArray[i].sumValueOutcome);
                    }

                    $('.loader').fadeOut(1000);
                }else{
                    loadCheckGraph(maincode);
                }
            }
        });
    }



    function loadCheckGraph(maincode)
    {
        $.ajax({
            url:"/intsys/msd_oven/main/graph/loadCheckGraph",
            method:"POST",
            data:{
                maincode:maincode
            },
            beforeSend:function(){},
            success:function(res){
                // console.log(res);
                $('#showCheckGraph').html(res);
            }
        });
    }


    function graphByLot(totalQcline , graphDataArrayName , graphDataArrayData , graphNumber , unitid , lowerLimit , upperLimit , sumOutcome)
    {
        let dataLabelShow;
        if(sumOutcome == 0){
            dataLabelShow = false;
        }else{
            dataLabelShow = true;
        }

        let minwidth = 0;
        if(graphDataArrayData.length > 300){
            minwidth = 4000;
        }else{
            minwidth = 1200;
        }

        return Highcharts.chart('areaGraphShow_'+graphNumber, {

                chart: {
                    type: 'spline',
                    scrollablePlotArea: {
                    minWidth: minwidth,
                    scrollPositionX: 1
                    }
                },
                title: {
                    text: graphDataArrayName
                },

                subtitle: {
                    text: 'Min: '+lowerLimit+' , Max: '+upperLimit+' &nbsp;'+unitid
                },

                yAxis: {
                    // floor: lowerLimit,
                    // max: upperLimit,
                    title: {
                        text: 'รายการ'
                    },
                    allowDecimals:true,
                },

                xAxis: {
                    categories: totalQcline
                },

                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom',
                    itemMarginTop: 5,
                    itemMarginBottom: 5,
                },

                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        dataLabels: {
                            enabled: dataLabelShow,
                            // format: '<span style="font-size:10px;">{point.y:.3f}'+unitid+'</span>'
                            formatter: function() {
                                if(sumOutcome == 0){
                                    return '<span style="font-size:10px;">'+this.point.y.toFixed(3)+' '+unitid+'</span>';
                                }else{
                                    if (this.y == 0) {
                                        return '<span style="font-size:10px;"> ' + this.point.y + ' = Fail</span>';
                                    }else{
                                        return '<span style="font-size:10px;"> ' + this.point.y + ' = Pass</span>';
                                    }
                                }
                            },
                            rotation: 310,
                            y: -30
                        },
                        pointStart: 0
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.category}</span>: <b>{point.y:,.3f} '+unitid+'</b><br/>',
                    animation:true,
                },

                series: [
                    {
                        name:graphDataArrayName,
                        data:graphDataArrayData,
                        label:false
                    }
                ],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
        });
    }



    function arrayRemove(array , value)
    {
        return array.filter(function(ele){
            return ele != value;
        });
    }


    function updateTestIDUse(testIDShowArray,data_maincode)
    {
        $.ajax({
            url:"/intsys/msd_oven/main/graph/updateTestIDUse",
            method:"POST",
            data:{
                testIDShowArray:testIDShowArray,
                data_maincode:data_maincode
            },
            beforeSend:function(){
                $('.loader').fadeIn();
            },
            success:function(res){
                
                console.log(JSON.parse(res));
                if(JSON.parse(res).status == "Update Success"){
                    const checkQcID = $('#checkQcID').val();
                    loadGraphByItem(checkQcID , data_maincode);
                }else{
                    $('#showGraphMain').html('');
                    $('.loader').fadeOut(1000);
                }

            }
        });
    }

    function conValOutcomeToString(valueOutcome , sumOutcome , unitid)
    {
        if(sumOutcome == 0){
            return unitid;
        }else{
            if(valueOutcome == 1){
                return "Pass";
            }else{
                return "Fail";
            }
        }
        
    }



    function checkProductionUser()
    {
        const deptcode = "<?php echo getUser()->DeptCode; ?>";
        const ecode = "<?php echo getUser()->ecode; ?>";
        if(deptcode != "1007"){
            if(ecode == "M1809" || ecode == "M0282"){
                $('#forPd_v , #forPd_v2').css('display' , '');
                $('#line_forPd_v').css('display' , '');
            }else{
                $('#forPd_v , #forPd_v2').css('display' , 'none');
                $('#line_forPd_v').css('display' , 'none');
            }

        }else{
            $('#forPd_v , #forPd_v2').css('display' , '');
            $('#line_forPd_v').css('display' , '');
        }
    }

    function eh_searchBag(bagCode)
    {
        if(bagCode != ""){
            axios.post(url+'main/searchBag' , {
                action:"searchBag",
                bagCode:bagCode
            }).then(res => {
                // console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let resultOfBagData = res.data.resultBag;
                    let outputHtml = `<ul class="list-group mt-2 eh_searchBagUl">`;
                    for(let i = 0; i < resultOfBagData.length; i++){
                        outputHtml += `
                        <li class="list-group-item list-group-item list-group-item-action eh_searchBagLi"
                            data_m_typeofbag="`+resultOfBagData[i].packageid+`"
                            data_m_typeofbagtxt="`+resultOfBagData[i].packagetxt+`"
                        >
                            <span><b>`+resultOfBagData[i].packageid+`</b></span><br>
                            <span>`+resultOfBagData[i].packagetxt+`</span>
                        </li>
                        `;
                    }
                    outputHtml += `</ul>`;
                    $('#eh_showBagCode').html(outputHtml);
                }
            });
        }
    }

    function loadCheckMachinePage()
    {
        const m_code = $('#getMaincode').val();
        const machine_name = $('#m_template_name_v').val();
        const datetime = $('#m_datetime_v').val();
        const item_number = $('#m_item_number_v').val();
        const batch_number = $('#m_batch_number_v').val();

        axios.post(url+'main/loadCheckMachinePage',{
            action:"loadCheckMachinePage",
            m_code:m_code
        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let output ='';
                let checktemplate = res.data.check_template;
                let checkValue = res.data.value;
                let linegroup = res.data.lineGroup;
                let loop = 1;
                output +=`
                <div id="checkPageMenu" class="row form-group" style="display:none;">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary addMachineCheck"
                            data_m_code="`+m_code+`"
                            data_machine_name="`+machine_name+`"
                            data_datetime="`+datetime+`"
                            data_item_number="`+item_number+`"
                            data_batch_number="`+batch_number+`"
                        ><i class="fi-plus mr-2"></i>เพิ่ม</button>
                        <button type="button" class="btn btn-secondary editMachineCheck"
                            data_m_code="`+m_code+`"
                            data_machine_name="`+machine_name+`"
                            data_batch_number="`+batch_number+`"
                        ><i class="fa fa-edit mr-2" aria-hidden="true"></i>แก้ไข</button>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-striped table-bordered mck_tbl">
                    <tr>
                        <th class="mck_no">ลำดับ</th>
                        <th class="mck_list">รายการตรวจเช็ค</th>`;
                        for(let li = 0; li < linegroup.length; li++){
                            output +=`
                            <th class="mck_val"><span>Item Number : </span><span class="subItemTbl">`+linegroup[li].itemno+`</span><br>
                            <span>Batch Number : </span><span class="subItemTbl">`+linegroup[li].batchno+`</span><br>
                            <span>Date : </span><span class="subItemTbl">`+linegroup[li].datetime+`</span></th>
                            `;
                            loop++;
                        }
                    output +=`
                    </tr>`;
                    let no = 1;
                    let icon = '';
                    let textStatus = '';
                    for(let i = 0; i < checktemplate.length; i++){
                        output +=`
                        <tr>
                            <td>`+no+`</td>
                            <td>`+checktemplate[i].mckt_checklist+`</td>`;
                
                                for(let j = 0; j < checkValue.length; j++){

                                    if(checkValue[j][i].mck_value == "ปกติ"){
                                        icon = '<i class="fa fa-check iNormal" aria-hidden="true"></i>';
                                        textStatus = '<span class="iNormal">'+checkValue[j][i].mck_value+'</span>';
                                    }else if(checkValue[j][i].mck_value == "ไม่มีการใช้งาน"){
                                        icon = '<i class="fa fa-circle-o iNotuse" aria-hidden="true"></i>';
                                        textStatus = '<span class="iNotuse">'+checkValue[j][i].mck_value+'</span>';
                                    }else if(checkValue[j][i].mck_value == "ผิดปกติ"){
                                        icon = '<i class="fa fa-close iNotOk" aria-hidden="true"></i>';
                                        textStatus = '<span class="iNotOk">'+checkValue[j][i].mck_value+'</span>';
                                    }else if(checkValue[j][i].mck_value == "เครื่องจอด"){
                                        icon = '<i class="fa fa-minus iStop" aria-hidden="true"></i>';
                                        textStatus = '<span class="iStop">'+checkValue[j][i].mck_value+'</span>';
                                    }

                                    output +=`
                                    <td>`+textStatus+`</td>
                                    `;
                                }
                          
                            
                        output +=`
                        </tr>
                        `;
                        no++;
                    }

                output +=`
                </table>
                </div>
                `;

                $('#showMachineCheck').html(output);


                let outputmd = '';
                for(let i = 0; i < checktemplate.length; i++){
                    outputmd +=`
                    <div class="row form-group flex-container">
                        <div class="col-md-6" style="align-self: center">
                            <label>`+checktemplate[i].mckt_checklist+`</label>
                            <input hidden type="text" id="mcklist" name="mcklist[]" value="`+checktemplate[i].mckt_checklist+`">
                            <input hidden type="text" id="mcklinenum" name="mcklinenum[]" value="`+checktemplate[i].mckt_checklist_linenum+`">
                        </div>
                        <div class="col-md-6">
                            <select id="mckval" name="mckval[]" class="form-control">
                                <option value="">กรุณาเลือกรายการ</option>
                                <option value="ปกติ">ปกติ</option>
                                <option value="ผิดปกติ">ผิดปกติ</option>
                                <option value="ไม่มีการใช้งาน">ไม่มีการใช้งาน</option>
                                <option value="เครื่องจอด">เครื่องจอด</option>
                            </select>
                        </div>
                    </div>
                    `;
                }

                $('#showMachineCheckList_md').html(outputmd);
                checkFormStatus();
                
            }
        });
    }

    function loadCheckGroupForEdit(m_code)
    {
        axios.post(url+'main/loadCheckGroupForEdit' , {
            action:"loadCheckGroupForEdit",
            m_code:m_code
        }).then(res=>{
            console.log(res.data);
            if(res.data.status == "Select Data Success"){
                let linegroupResult = res.data.lineGroupEdit;
                let output ='';

                output +=`
                <select id="lineGroupForEdit" name="lineGroupForEdit" class="form-control lineGroupForEdit">
                    <option value="">กรุณาเลือกข้อมูล</option>`;
                    for(let i = 0; i < linegroupResult.length; i++){
                        output +=`
                        <option value="`+linegroupResult[i].mck_linenumgroup+`">`+linegroupResult[i].mck_itemno+` | `+linegroupResult[i].mck_batchno+`</option>
                        `;
                    }
                output +=`
                </select>
                `;

                $('#showCheckListGroupEdit').html(output);
            }
        });
    }


    function getSpeacialData(get_templatecode)
    {
        if(get_templatecode != ""){
            axios.post(url+'main/getSpeacialData' , {
                action:"getSpeacialData",
                get_templatecode:get_templatecode
            }).then(res=>{
                console.log(res.data);
                if(res.data.status == "Select Data Success"){
                    let templateremark = res.data.templateRemark;

                    // Show Other Image
                    let outputOtherImage ='';
                        let resultOtherImage = res.data.imageOther;
                        outputOtherImage +=`<div class="row form-group">`;
                            for(let i = 0; i < resultOtherImage.length; i++){
                                outputOtherImage +=`
                                <div class="col-md-4 col-lg-3 col-6 mt-2 divOtherImage">
                                <a href="`+url+resultOtherImage[i].tm_imagepath+resultOtherImage[i].tm_imagename+`" data-toggle="lightbox">
                                    <img class="runImageView" src="`+url+resultOtherImage[i].tm_imagepath+resultOtherImage[i].tm_imagename+`">
                                </a>
                                </div>`;
                            }
                        outputOtherImage += `</div>`;
                        $('#show_otherImage_viewpage').html(outputOtherImage);
                        // Show Other Image
                        $('#show_templateRemark').val(templateremark);

                        // check publish
                        if(resultOtherImage.length != 0){
                            $('#speacial_section').css('display' , '');
                            $('#otherImage_view_section').css('display' , '');
                            // $('#templateRemark_view_section').css('display' , '');
                        }else{
                            $('#otherImage_view_section').css('display' , 'none');
                        }

                        if(templateremark != null){
                            $('#speacial_section').css('display' , '');
                            $('#templateRemark_view_section').css('display' , '');
                        }else{
                            $('#templateRemark_view_section').css('display' , 'none');
                        }

                        if(resultOtherImage.length == 0 && templateremark == null){
                            $('#speacial_section').css('display' , 'none');
                        }else{
                            $('#speacial_section').css('display' , '');
                        }
                }
            });
        }
    }


    function loaddatajobcard(prodid , dataareaid , status , formno)
    {
        if(prodid != "" && dataareaid != "" && status != "" && formno != ""){
            // convert status 
            if(status == "Start"){
                status = 0;
            }else if(status == "Stop"){
                status = 1;
            }

            if(localStorage.getItem('tab_oven') == "tabpage4"){
                let output =`
                <div class="col-md-12">
                    <div class="container-iframe">

                        <iframe width="100%" height="1000" frameBorder="0" src="https://intranet.saleecolour.com/intsys/production_plan/machine/jobcard/`+prodid+`/`+dataareaid+`/1/11/`+status+`/`+formno+`/"></iframe>

                    </div>
                </div>
                `;
                $('#showJobcard').html(output);
            }else{
                $('#showJobcard').html('');
            }




            console.log(prodid);
            console.log(dataareaid);
            console.log(status);
            console.log(formno);
        }
    }


    function loaddatapackinglist(productionid , areaid)
    {
        if(productionid != "" && areaid != ""){
            if(localStorage.getItem('tab_oven') == "tabpage5"){
                let output =`
                <div class="col-md-12">
                    <div class="">
                        <iframe class="" width="100%" height="950" frameBorder="0" src="/intsys/msd_mix/packing_list/data/`+productionid+`/`+areaid+`"></iframe>
                    </div>
                </div>
                `;
                $('#showPackingList').html(output);
            }else{
                $('#showPackingList').html('');
            }
        }
    }



    function loaddataSticker(formno , prodid , batchnumber , dataareaid , status)
    {
        if(formno != "" && prodid != "" && batchnumber != "" && dataareaid != "" && status != ""){
            // convert status 
            if(status == "Start"){
                status = 0;
            }else if(status == "Stop"){
                status = 1;
            }

            let output =`
                <div class="col-md-12">
                    <div class="">

                    <iframe class="" width="100%" height="500px" frameBorder="0" src=" https://intranet.saleecolour.com/intsys/lab_matching/qc/sample/`+formno+`/`+prodid+`/`+batchnumber+`/`+dataareaid+`/1O/`+status+`"></iframe>
                            
                    </div>
                </div>
                `;
                $('#qcsticker').html(output);
  
            // console.log("https://intranet.saleecolour.com/intsys/production_plan/machine/jobcard/"+prodid+"/"+dataareaid+"/2-3-4/0/"+status+"/"+formno+"/");
        }
            console.log(prodid);
            console.log(dataareaid);
            console.log(status);
            console.log(formno);
            console.log(batchnumber);
    }









}); //End ready function 


</script>
