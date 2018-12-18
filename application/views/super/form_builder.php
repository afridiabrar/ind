<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>Form Builder</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="<?= site_url('super/view') ?>"><i
                                        class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                  <h6 style="text-align:-webkit-center;"><button style="display: block;width: 123px" onclick="addelement('fields')">Add Field
                                      </button> </h6>
                                <h6 style="text-align:-webkit-center;">
                                    <button style="display: block;" onclick="addelement('boxes')">Add Checkbox
                                    </button>
                                </h6>
                            </div>
                        </div>
                        <form action="<?= site_url('super/form_builder')?>" method="post">
                            <?php $id = $this->uri->segment(4) ?>
                            <input type="hidden" name="seeker_id" value="<?= $id ?>">
                        <div class="row">
                            <div class="col-md-12" id="drag">
                            </div>
                        </div>
                            <input type="submit"  style="float: right;background: #0a6aa1;width: 10%;margin-top: 30px" class="btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var i = 1;
    var j = 1;
    function addelement(type) {
        if (type == 'fields') {
            var ab = '<div id="removeee' + i + '"><div class="form-group">'+
                '<label>Title</label>' +
                '<input type="text" class="form-control" name="title[]"></div>' +
                '<div class="form-group">' +
                '<label>Question</label>' +
                '<textarea rows="4" class="form-control" name="ques[]"></textarea></div>' +
                '<i  class="icon-close btn-danger" onclick="remove_field('+ i +')" style="float:right;margin-top:10px"></i>'+
                '</div>';
            $("#drag").append(ab);
            i++;

        } else if (type == 'boxes') {
            var box = '<div id="boxremov'+ j +'">'+
                '<div class="form-group">' +
                '<label>Title</label>' +
                '<input style="margin-left: 5px" type="text" class="form-control" name="title[]"></div>'+
                '<div class="form-group">' +
                '<label>Question</label>' +
                '<input style="margin-left: 5px" type="text" class="form-control" name="question[]"></div>'+
                '<div class="checkbox">' +
                '<label style="margin-left:5px">1 </label>' +
                '<input style="margin-left:5px" type="text" name="q1[]">' +
                '<label style="margin-left:5px">2 </label>' +
                '<input style="margin-left:5px" type="text" name="q2[]">' +
                '<label style="margin-left:5px">3 </label>' +
                '<input style="margin-left:5px" type="text" name="q3[]">' +
                '<label style="margin-left:5px">4 </label>' +
                '<input style="margin-left:5px" type="text" name="q4[]">' +
                '</div>'+
                '<i  class="icon-close btn-danger" onclick="remove_bo('+ j +')" style="float:right;margin-top:10px"></i>'+
                '</div>';
            $("#drag").append(box);
            j++;
        }
    }

    function remove_field(id)
    {
        $('#removeee'+id).remove();
    }

    function remove_bo(id)
    {
        $('#boxremov'+id).remove();
    }
</script>