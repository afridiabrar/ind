<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .over {
            background: url('<?= base_url('assets_b/images/logoooo1.png')  ?>');
            background-repeat: no-repeat;
            background-size: cover;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 15;
            min-height: 1000px;
        }

        body {
            line-height: 0;
        }
    </style>
</head>
<br>
<div class="over">
    <div class="container">
        <?php if (!empty($msg)) { ?>
            <!-- <span style="width: 100%;display: block" >
                        <img src="<? /*= base_url('assets_b')*/ ?>/images/tick.png" >
                    </span>-->

            <div class="modal fade active show in" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="position: relative;top: 20%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" onclick="testtt()" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                           <h6 style="text-align: center">
                               <img style="height: 164px;"
                                                               src="<?= base_url('assets_b')?>/images/tick.png"></h6>
                            <p style="text-align: center;letter-spacing: 3px;text-transform: uppercase;">Our Team Will
                                Contact You Shortly</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="testtt()" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        <?php } else { ?>
            <div id="signupbox" style="  margin-top:140px"
                 class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading" style="padding: 20px">
                        <div class="panel-title">Select Category</div>
                    </div>
                    <div class="panel-body"
                         style="padding-right: 45px;padding-top: 100px;padding-bottom: 100px">
                        <form class="form-horizontal" method="post">
                            <div id="div_id_username" class="form-group required">
                                <label for="id_username" class="control-label col-md-4  requiredField">Select
                                    Region<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <select name="e_state" required class="form-control">
                                        <option value="aci">Ashmore and Cartier Islands</option>
                                        <option value="aat">Australian Antarctic Territory</option>
                                        <option value="act">Australian Capital Territory</option>
                                        <option value="ci">Christmas Island</option>
                                        <option value="ki">Cocos (Keeling) Islands</option>
                                        <option value="csi">Coral Sea Islands</option>
                                        <option value="himi">Heard Island and McDonald Islands</option>
                                        <option value="jb">Jervis Bay Territory</option>
                                        <option value="nsw">New South Wales</option>
                                        <option value="ni">Norfolk Island</option>
                                        <option value="nt">Northern Territory</option>
                                        <option value="qld">Queensland</option>
                                        <option value="sa">South Australia</option>
                                        <option value="tas">Tasmania</option>
                                        <option value="vic">Victoria</option>
                                        <option value="wa">Western Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div id="div_id_username" class="form-group required">
                                <label for="id_username" class="control-label col-md-4  requiredField">Job
                                    Category<span
                                            class="asteriskField">*</span> </label>
                                <div class="controls col-md-8">
                                    <select name="e_industry" required class="form-control">
                                        <?php foreach ($industry as $v) { ?>
                                            <option value="<?= $v['industry'] ?>"><?= $v['industry'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="aab controls col-md-4 "></div>
                                <div class="controls col-md-8 ">
                                    <input type="button" value="Submit" onclick="test()"
                                           class="btn btn-primary btn btn-info"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title" style="padding-top: 30px">Recruitment form</div>
            </div>
            <div class="panel-body" style="padding-right: 45px;padding-top: 13px;padding-bottom: 100px">
                <form method="post" enctype="multipart/form-data" action="<?= site_url('home/jobRequest') ?>"
                      class="form-horizontal">
                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4  requiredField">First Name<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="id_username"
                                   maxlength="30" name="s_first" placeholder="First Name"
                                   style="margin-bottom: 10px" type="text"/>
                        </div>
                    </div>
                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4  requiredField">Last Name<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="id_username"
                                   maxlength="30" name="s_last" placeholder="Last Name"
                                   style="margin-bottom: 10px" type="text"/>
                        </div>
                    </div>
                    <div id="div_id_email" class="form-group required">
                        <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md emailinput form-control" id="id_email" name="s_email"
                                   placeholder="current email address" required style="margin-bottom: 10px"
                                   type="email"/>
                        </div>
                    </div>
                    <div id="div_id_gender" class="form-group required">
                        <label for="id_gender" class="control-label col-md-4  requiredField"> Gender<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8">
                            <select name="s_gender" required class="select-md form-control">
                                <option hidden>SELECT Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div id="div_id_company" class="form-group required">
                        <label for="id_company" class="control-label col-md-4  requiredField"> Data of Birth<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="id_company" name="s_dob"
                                   placeholder="your company name" style="margin-bottom: 10px" type="date"/>
                        </div>
                    </div>
                    <div id="div_id_company" class="form-group required">
                        <label for="id_company" class="control-label col-md-4  requiredField">National id<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="id_company"
                                   name="s_national_id"
                                   placeholder="12332113" style="margin-bottom: 10px" type="number"/>
                        </div>
                    </div>
                    <div id="div_id_catagory" class="form-group required">
                        <label for="id_catagory" class="control-label col-md-4  requiredField">Marital Status<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <select name="s_marital" class="select-md form-control">
                                <option hidden>Select Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                    </div>
                    <div id="div_id_number" class="form-group required">
                        <label for="id_number" class="control-label col-md-4  requiredField"> contact number<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="id_number" name="s_contact"
                                   style="margin-bottom: 10px" type="number"/>
                        </div>
                    </div>
                    <div id="div_id_company" class="form-group required">
                        <label for="id_company" class="control-label col-md-4  requiredField">State<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" readonly id="state" name="s_state"
                                   style="margin-bottom: 10px" type="text"/>
                        </div>
                    </div>
                    <div id="div_id_company" class="form-group required">
                        <label for="id_company" class="control-label col-md-4  requiredField">Industry<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" readonly id="industry"
                                   name="s_industry" style="margin-bottom: 10px" type="text"/>
                        </div>
                    </div>
                    <div id="div_id_company" class="form-group required">
                        <label for="id_company" class="control-label col-md-4  requiredField">Address<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="id_company" name="s_address"
                                   placeholder="your company name" style="margin-bottom: 10px" type="text"/>
                        </div>
                    </div>
                    <div id="div_id_company" class="form-group required">
                        <label for="id_company" class="control-label col-md-4  requiredField">Upload C.v<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="id_company" name="file"
                                   style="margin-bottom: 10px" type="file" required/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-8 ">
                            <input type="submit" value="Signup" class="btn btn-primary btn btn-info"
                                   id="submit-id-signup"/>
                        </div>
                    </div>
                </form>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="conf">
</div>
<script>
    function test() {
        var region = $("[name=e_state]").val();
        var cate = $("[name=e_industry]").val();
        $(".over").css({"z-index": "0"});
        $("#state").val(region);
        $("#industry").val(cate);
    }

    function testtt() {
        location.reload();
    }
</script>
</body>
</html>

<!------ Include the above in your HEAD tag ---------->

